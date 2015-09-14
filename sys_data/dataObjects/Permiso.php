<?php
/**
 * Table Definition for permiso
 */
require_once 'DB/DataObject.php';

class DataObjects_Permiso extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'permiso';                         // table name
    public $id_permiso;                      // int(10)  not_null primary_key auto_increment
    public $permiso_tipo;                    // string(255)  not_null
    public $id_rol;                          // int(11)  not_null multiple_key

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Permiso',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
