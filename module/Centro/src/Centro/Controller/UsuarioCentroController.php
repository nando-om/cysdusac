<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Centro\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Centro\Model\Data\UsuarioCentro;

class UsuarioCentroController extends AbstractActionController {

    protected $centro;
    protected $centroTable;
    protected $usuarioTable;
    protected $usuariocentroTable;

    public function getUsuarioCentroTable() {
        if (!$this->usuariocentroTable) {
            $sm = $this->getServiceLocator();
            $this->usuariocentroTable = $sm->get('Centro\Model\Logic\UsuarioCentroTable');
        }
        return $this->usuariocentroTable;
    }
    
    public function getCentroTable() {
        if (!$this->centroTable) {
            $sm = $this->getServiceLocator();
            $this->centroTable = $sm->get('Centro\Model\Logic\CentroTable');
        }
        return $this->centroTable;
    }
    
    public function getUsuarioTable() {
        if (!$this->usuarioTable) {
            $sm = $this->getServiceLocator();
            $this->usuarioTable = $sm->get('Centro\Model\Logic\UsuarioTable');
        }
        return $this->usuarioTable;
    }
    
    
    
    public function indexAction() {
        //var_dump($usuariocentro);
        //var_dump($this->getUsuarioCentroTable()->getCentrosPorUsuario(1));
        
        return new ViewModel(array(
            'usuarioscentros' => $this->getUsuarioCentroTable()->getByCentro(2),
        ));
        
    }
    
    public function add(){
        
    }
    
     public function findAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('usuariocentro', array(
                        'action' => 'find'
            ));
        }

        try { 
            
            //variable global
            $this->centro = $this->getCentroTable()->get($id);
            $usuarios = $this->getUsuarioTable()->fetchAll();
            $usuarioscentros = $this->getUsuarioCentroTable()->getByCentro($id);
            
            /*$listausuarios=array();
            foreach($usuarioscentros as $usuariocentro){
                foreach($usuarios as $usuario){
                    if($usuariocentro->usuario_id==$usuario->id){
                        echo "XD";
                        //array_push($listausuarios, array('key'=>$usuario->id, 'value'=>$usuario->valor));
                    }else{
                        echo ":S";
                    }
                }
            }*/
            //var_dump($usuarios);
            //$usuariosnoasignados=array();
            
            
             
                
            /*foreach($usuarios as $usuario){
                
            }*/
            //var_dump($usuariosnoasignados);
            
                $request = $this->getRequest();
                if ($request->isPost()){
                    $usuariocentro = new UsuarioCentro();
                    $usuario_id = $request->getPost()->selectusuario;
                
                    $usuariocentro->exchangeArray(array('usuario_id'=>$usuario_id, 'centro_id'=>$this->centro->id));
                    $this->getUsuarioCentroTable()->save($usuariocentro);
                    
                    // Redireccionar a la lista de centros
                    return $this->redirect()->toRoute('usuariocentro', 
                        array(
                        'action' => 'find',
                        'id' => $this->centro->id
                    ));
                }
            
            
           
            return new ViewModel(array(
                'usuarioscentros' => $usuarioscentros, 'centro'=>$this->centro, 'usuarios' => $usuarios
            ));
        } catch (\Exception $ex) {
            return $this->redirect()->toRoute('usuariocentro', array(
                        'action' => 'find',
            ));
        }
    }

    
    public function deleteAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
             return $this->redirect()->toRoute('usuariocentro', 
                        array(
                        'action' => 'find',
                        'id' => $id,
                    ));
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $usuariocentro = $this->getUsuarioCentroTable()->get($id);
            $del = $request->getPost('del', 'No');
            if ($del == 'Yes'){
                $id = (int) $request->getPost('id');
                $this->getUsuarioCentroTable()->delete($id);
            }
            
            return $this->redirect()->toRoute('usuariocentro', 
                        array(
                        'action' => 'find',
                        'id' => $usuariocentro->centro_id,
                    ));
        }

        return array(
            'id' => $id,
            'usuariocentro' => $this->getUsuarioCentroTable()->get($id)
        );
    }

}
