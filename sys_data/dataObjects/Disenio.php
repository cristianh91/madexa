<?php
/**
 * Table Definition for disenio
 */
require_once 'DB/DataObject.php';

class DataObjects_Disenio extends DB_DataObject
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'disenio';                         // table name
    public $id_disenio;                      // int(11)  not_null primary_key
    public $disenio_fecha;                   // date(10)  binary
    public $disenio_nombre;                  // string(255)  not_null
    public $disenio_version;                 // string(255)  not_null
    public $id_solicitud;                    // int(11)  not_null multiple_key

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Disenio',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE

    public $fb_linkDisplayFields = array('disenio_nombre');
    public $fb_fieldLabels = array(
        'disenio_fecha' => 'Fecha: ',
        'disenio_nombre' => 'Nombre: ',
        'disenio_version' => 'Versión: ',
        'id_solicitud' => 'Solicitado por: '
    );


     function preGenerateForm(&$fb) {
        $this->fb_formHeaderText = "Diseño";
        //DB_DataObject::debugLevel(1);
	 	$sol = DB_DataObject::factory('solicituddematriz');
        $cli = DB_DataObject::factory('cliente');
        $sol->joinAdd($cli);
        $sol->find();
        $solicitudes = array();
	 	while ($sol->fetch()) {
	 		$solicitudes[$sol->id_solicitud] = "Solicitud: ".$sol->id_solicitud." - ".$sol->cliente_nombre;
	 	}

        $this->fb_preDefElements['id_solicitud'] = HTML_QuickForm::createElement('select', 'id_solicitud', 'Solicitado por: ', $solicitudes);
    }


}
