<?php
/**
 * Table Definition for usuario
 */
require_once 'DB/DataObject.php';

class DataObjects_Usuario extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'usuario';                         // table name
    public $id_usuario;                      // int(11)  not_null primary_key
    public $nombre_de_usuario;               // string(255)  not_null
    public $contrasenia;                     // string(255)  not_null
    public $id_persona;                      // int(11)  not_null multiple_key

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Usuario',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
