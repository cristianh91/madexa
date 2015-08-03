<?php
/**
 * Table Definition for persona
 */
require_once 'DB/DataObject.php';

class DataObjects_Persona extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'persona';                         // table name
    public $id_persona;                      // int(11)  not_null primary_key
    public $nombre;                          // string(255)  not_null
    public $apellido;                        // string(255)  not_null
    public $dni;                             // int(11)  not_null
    public $mail;                            // string(255)  
    public $telefono;                        // int(11)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Persona',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
