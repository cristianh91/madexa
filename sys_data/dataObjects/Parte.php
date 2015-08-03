<?php
/**
 * Table Definition for parte
 */
require_once 'DB/DataObject.php';

class DataObjects_Parte extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'parte';                           // table name
    public $id_parte;                        // int(11)  not_null primary_key
    public $nombre;                          // string(255)  
    public $tipo;                            // string(255)  
    public $id_matriz;                       // int(11)  not_null multiple_key

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Parte',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
