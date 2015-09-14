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
    public $parte_id;                        // int(11)  not_null primary_key auto_increment
    public $parte_nombre;                    // string(255)
    public $parte_calidad;                   // string(255)
    public $parte_forma;                     // string(255)
    public $parte_medida;                    // real(12)  not_null
    public $tipo_parte_tipo_parte_id;        // int(11)  not_null multiple_key

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Parte',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
   public $fb_linkDisplayFields = array('parte_nombre');
    public $fb_fieldLabels = array(
        'parte_nombre' => 'Nombre: ',
        'parte_calidad' => 'Calidad: ',
        'parte_forma' => 'Forma: ',
        'parte_medida' => 'Medida: ',
        'tipo_parte_tipo_parte_id' => 'Tipo de Parte: '
    );

}
