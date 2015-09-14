<?php
/**
 * Table Definition for tipo_parte
 */
require_once 'DB/DataObject.php';

class DataObjects_Tipo_parte extends DB_DataObject
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'tipo_parte';                      // table name
    public $tipo_parte_id;                   // int(11)  not_null primary_key auto_increment
    public $tipo_parte_nombre;               // string(255)  not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Tipo_parte',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
    public $fb_linkDisplayFields = array('tipo_parte_nombre');
    public $fb_fieldLabels = array(
        'tipo_parte_nombre' => 'Nombre: '
    );

}
