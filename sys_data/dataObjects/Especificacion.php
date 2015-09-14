<?php
/**
 * Table Definition for especificacion
 */
require_once 'DB/DataObject.php';

class DataObjects_Especificacion extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'especificacion';                  // table name
    public $id_especificacion;               // int(10)  not_null primary_key unsigned auto_increment
    public $calidad;                         // string(255)  
    public $forma;                           // string(255)  
    public $medida;                          // int(11)  not_null
    public $tipo_componente;                 // string(255)  not_null
    public $tipo_parte;                      // string(8)  not_null enum
    public $id_parte;                        // int(11)  not_null multiple_key

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Especificacion',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
