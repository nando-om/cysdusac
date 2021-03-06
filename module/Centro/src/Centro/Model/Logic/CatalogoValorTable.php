<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Centro\Model\Logic;

use Zend\Db\TableGateway\TableGateway;


class CatalogoValorTable{
    
    protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }
     
     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function get($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('catalogo_tipo_id' => $id));
         //$row = $rowset->current();
         if (!$rowset) {
             throw new \Exception("Registro no encontrado $id");
         }
         return $rowset;
     }
}