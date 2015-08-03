<?php
/**
 * Table Definition for rol
 */
require_once 'DB/DataObject.php';

class DataObjects_Rol extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'rol';                             // table name
    public $id_rol;                          // int(11)  not_null primary_key
    public $nombre_rol;                      // string(255)  not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Rol',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
