<?php
/**
 * Table Definition for plano
 */
require_once 'DB/DataObject.php';

class DataObjects_Plano extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'plano';                           // table name
    public $id_plano;                        // int(10)  not_null primary_key unsigned auto_increment
    public $plano_fecha;                     // date(10)  not_null binary
    public $plano_numero;                    // int(11)  not_null
    public $plano_version;                   // int(11)  not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Plano',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
