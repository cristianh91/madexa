<?php
/**
 * Table Definition for matriz
 */
require_once 'DB/DataObject.php';

class DataObjects_Matriz extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'matriz';                          // table name
    public $id_matriz;                       // int(11)  not_null primary_key auto_increment
    public $codigo;                          // string(255)  not_null
    public $id_disenio;                      // int(11)  not_null multiple_key
    public $tipo_matriz_tipo_matriz_id;      // int(11)  not_null multiple_key

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Matriz',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
    public $fb_linkDisplayFields = array('codigo');
    public $fb_fieldLabels = array(
        'tipo' => 'Tipo: ',
        'codigo' => 'Codigo: ',
        'id_disenio' => 'Diseño Nombre: ',
        'tipo_matriz_tipo_matriz_id' => 'Tipo de Matriz: '
    );

}
