<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Centro\Model\Data;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Centro implements InputFilterAwareInterface
 {
     public $id;
     public $tipo;
     public $nombre;
     public $siglas;
     public $pais;
     public $sitio_web;
     public $direccion;
     public $telefono;
     public $url_imagen;
     public $mision;
     public $vision;
     public $descripcion;
     
     protected $inputFilter;  
     

     public function exchangeArray($data)
     {
         $this->id     = (!empty($data['id'])) ? $data['id'] : null;
         $this->tipo = (!empty($data['tipo'])) ? $data['tipo'] : null;
         $this->nombre  = (!empty($data['nombre'])) ? $data['nombre'] : null;
         $this->siglas  = (!empty($data['siglas'])) ? $data['siglas'] : null;
         $this->pais  = (!empty($data['pais'])) ? $data['pais'] : null;
         $this->sitio_web  = (!empty($data['sitio_web'])) ? $data['sitio_web'] : null;
         $this->direccion  = (!empty($data['direccion'])) ? $data['direccion'] : null;
         $this->telefono  = (!empty($data['telefono'])) ? $data['telefono'] : null;
         $this->url_imagen  = (!empty($data['url_imagen'])) ? $data['url_imagen'] : null;
         
         $this->mision = (!empty($data['mision'])) ? $data['mision'] : null;
         $this->vision = (!empty($data['vision'])) ? $data['vision'] : null;
         $this->descripcion = (!empty($data['descripcion'])) ? $data['descripcion'] : null;
     }    
     
     
     public function getArrayCopy()
     {
         return get_object_vars($this);
     }

     
     
     
     public function setInputFilter(InputFilterInterface $inputFilter)
     {
         throw new \Exception("Not used");
     }

     
     public function getInputFilter()
     {
         if (!$this->inputFilter) {
             $inputFilter = new InputFilter();

             $inputFilter->add(array(
                 'name'     => 'id',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'Int'),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'nombre',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 100,
                         ),
                     ),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'siglas',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 100,
                         ),
                     ),
                 ),
             ));
             
             $this->inputFilter = $inputFilter;
         }

         return $this->inputFilter;
     }

 }