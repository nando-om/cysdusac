<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Centro\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Centro\Model\Data\Centro;
use Centro\Form\CentroForm;

class CentroController extends AbstractActionController {

    protected $centroTable;

    public function indexAction() {
        return new ViewModel(array(
            'centros' => $this->getCentroTable()->fetchAll(),
        ));
    }

    public function findAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('centro', array(
                        'action' => 'find'
            ));
        }

        try {
            $centro = $this->getCentroTable()->get($id);
            return new ViewModel(array(
                'centro' => $centro,
            ));
        } catch (\Exception $ex) {
            return $this->redirect()->toRoute('centro', array(
                        'action' => 'index'
            ));
        }
    }

    public function getCentroTable() {
        if (!$this->centroTable) {
            $sm = $this->getServiceLocator();
            $this->centroTable = $sm->get('Centro\Model\Logic\CentroTable');
        }
        return $this->centroTable;
    }

    public function addAction() {
        $form = new CentroForm();
        $form->get('submit')->setValue('Agregar');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $centro = new Centro();
            $form->setInputFilter($centro->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $centro->exchangeArray($form->getData());
                $this->getCentroTable()->save($centro);

                // Redireccionar a la lista de centros
                return $this->redirect()->toRoute('centro');
            }
        }
        return array('form' => $form);
    }

    public function editAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('centro', array(
                        'action' => 'add'
            ));
        }

        // Get the Album with the specified id.  An exception is thrown
        // if it cannot be found, in which case go to the index page.
        try {
            $centro = $this->getCentroTable()->get($id);
        } catch (\Exception $ex) {
            return $this->redirect()->toRoute('centro', array(
                        'action' => 'index'
            ));
        }

        $form = new CentroForm();
        $form->bind($centro);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($centro->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getCentroTable()->save($centro);

                // Redirect to list of albums
                return $this->redirect()->toRoute('centro');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function deleteAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('centro');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->getCentroTable()->delete($id);
            }

            // Redirect to list of albums
            return $this->redirect()->toRoute('centro');
        }

        return array(
            'id' => $id,
            'centro' => $this->getCentroTable()->get($id)
        );
    }

}
