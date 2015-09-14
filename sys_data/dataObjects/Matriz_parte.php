<?php
/**
 * Table Definition for matriz_parte
 */
require_once 'DB/DataObject.php';

class DataObjects_Matriz_parte extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'matriz_parte';                    // table name
    public $parte_id_parte;                  // int(11)  not_null primary_key
    public $matriz_id_matriz;                // int(11)  not_null primary_key multiple_key
    public $parte_parte_id;                  // int(11)  not_null primary_key multiple_key

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Matriz_parte',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
