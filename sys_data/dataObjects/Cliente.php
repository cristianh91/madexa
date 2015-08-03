<?php
/**
 * Table Definition for cliente
 */
require_once 'DB/DataObject.php';

class DataObjects_Cliente extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'cliente';                         // table name
    public $id_cliente;                      // int(11)  not_null primary_key
    public $cliente_numero;                  // int(11)  not_null
    public $cliente_nombre;                  // string(255)  not_null
    public $cliente_cuit;                    // int(11)  not_null
    public $persona_id_persona;              // int(11)  not_null multiple_key

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Cliente',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
