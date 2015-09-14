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
    public $disenio_id_disenio;              // int(11)  not_null multiple_key
    public $plano_archivo;                   // string(255)  not_null
    public $plano_nombre_archivo;            // string(255)  not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Plano',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE

    public $fb_linkDisplayFields = array('plano_numero');
    public $fb_fieldLabels = array(
        'plano_fecha' => 'Fecha: ',
        'plano_numero' => 'Numero: ',
        'plnao_version' => 'Versión: ',
        'diseno_id_diseno' => 'Diseño: ',
        'plano_archivo' => 'Archivo: ',
        'plano_nombre_archivo' => 'Titulo: '
    );


     function preGenerateForm(&$fb) {
        $this->fb_formHeaderText = "Plano";
        //DB_DataObject::debugLevel(1);
	 	$sol = DB_DataObject::factory('disenio');
//        $cli = DB_DataObject::factory('plano');
//        $sol->joinAdd($cli);
        $sol->find();
        $solicitudes = array();
	 	while ($sol->fetch()) {
	 		$solicitudes[$sol->id_disenio] = "Diseño: ".$sol->id_disenio." - ".$sol->disenio_nombre;
	 	}

        $this->fb_preDefElements['disenio_id_disenio'] = HTML_QuickForm::createElement('select', 'disenio_id_disenio', 'Diseño: ', $solicitudes);
        $this->fb_preDefElements['plano_archivo'] = HTML_QuickForm::createElement('file', 'plano_archivo', 'Archivo (Maximo 2MB): ');


    }


}
