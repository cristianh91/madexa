<?php
/**
 * Table Definition for solicituddematriz
 */
require_once 'DB/DataObject.php';

class DataObjects_Solicituddematriz extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'solicituddematriz';               // table name
    public $fecha;                           // date(10)  not_null binary
    public $comentario;                      // blob(65535)  blob
    public $id_solicitud;                    // int(11)  not_null primary_key auto_increment
    public $id_cliente;                      // int(11)  not_null multiple_key

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Solicituddematriz',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE

    public $fb_textFields = array('comentario');
    public $fb_linkDisplayFields = array('id_solicitud, fecha, id_cliente');


    public $fb_fieldLabels = array(
        'fecha' => 'Fecha: ',
        'comentario' => 'Comentario: ',
        'id_cliente' => 'Empresa: '
    );

    function preGenerateForm(&$fb) {
        $this->fb_formHeaderText = "Solicitud de Matriz";
    }

}
