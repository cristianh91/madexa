<?php
/**
 * Table Definition for solicituddematriz
 */
require_once 'DB/DataObject.php';

class DataObjects_Solicituddematriz extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'solicituddematriz';               // table name
    public $fecha;                           // date(10)  not_null binary
    public $comentario;                      // string(255)  
    public $id_solicitud;                    // int(11)  not_null primary_key
    public $id_cliente;                      // int(11)  not_null multiple_key

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Solicituddematriz',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
