<?php
/**
 * Table Definition for disenio
 */
require_once 'DB/DataObject.php';

class DataObjects_Disenio extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'disenio';                         // table name
    public $id_disenio;                      // int(11)  not_null primary_key
    public $disenio_fecha;                   // date(10)  binary
    public $disenio_nombre;                  // string(255)  not_null
    public $disenio_version;                 // string(255)  not_null
    public $id_solicitud;                    // int(11)  not_null multiple_key

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Disenio',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
