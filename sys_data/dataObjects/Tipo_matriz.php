<?php
/**
 * Table Definition for tipo_matriz
 */
require_once 'DB/DataObject.php';

class DataObjects_Tipo_matriz extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'tipo_matriz';                     // table name
    public $tipo_matriz_id;                  // int(11)  not_null primary_key auto_increment
    public $tipo_matriz_nombre;              // string(255)  not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Tipo_matriz',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE

    public $fb_linkDisplayFields = array('tipo_matriz_nombre');
    public $fb_fieldLabels = array(
        'tipo_matriz_nombre' => 'Nombre: '
    );
     function preGenerateForm(&$fb) {
        $this->fb_formHeaderText = "Tipo de Matriz";
     }
}
