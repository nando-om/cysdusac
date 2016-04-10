<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Centro\Model\Data;


class DetalleCentro
{
     public $id;
     public $mision;
     public $vision;
     public $descripcion;
     public $centro_id;
     

     public function exchangeArray($data)
     {
         $this->id     = (!empty($data['id'])) ? $data['id'] : null;
         $this->mision  = (!empty($data['mision'])) ? $data['mision'] : null;
         $this->vision  = (!empty($data['vision'])) ? $data['vision'] : null;
         $this->descripcion  = (!empty($data['descripcion'])) ? $data['descripcion'] : null;
         $this->centro_id  = (!empty($data['centro_id'])) ? $data['centro_id'] : null;
     }
 }