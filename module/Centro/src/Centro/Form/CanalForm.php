<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Centro\Form;

use Zend\Form\Form;

 class CanalForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('canal');

         $this->add(array(
             'name' => 'id',
             'type' => 'Hidden',
         ));
         
          $this->add(array(
             'name' => 'secuencia',
             'type' => 'Hidden',
         ));
         
         $this->add(array(
             'name' => 'centro_id',
             'type' => 'Hidden',
         ));
         
         
          $this->add(array(
             'name' => 'tipo',
             'type' => 'Hidden',
         ));
          
         $this->add(array(
             'name' => 'titulo',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Nombre',
             ),
             'attributes' => array(
                 'placeholder' => 'Ingrese nombre',
                 'class' => 'form-control',
             ),
         ));

         $this->add(array(
             'name' => 'enlace',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Enlace',
             ),
             'attributes' => array(
                 'placeholder' => 'Ingrese enlace',
                 'class' => 'form-control',
             ),
         ));
         
         $this->add(array(
             'name' => 'lenguaje',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Lenguaje',
             ),
             'attributes' => array(
                 'placeholder' => 'Ingrese lenguaje',
                 'class' => 'form-control',
             ),
         ));
         
         $this->add(array(
             'name' => 'descripcion',
             'type' => 'TextArea',
             'options' => array(
                 'label' => 'Descripcion',
             ),
             'attributes' => array(
                 'placeholder' => 'Ingrese descripcion',
                 'class' => 'form-control',
             ),
         ));
         
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'class' =>'btn btn-lg btn-success',
                 'value' => 'Go',
                 'id' => 'submitbutton',
             ),
         ));
     }
 }