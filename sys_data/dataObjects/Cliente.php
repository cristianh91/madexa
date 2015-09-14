<?php
/**
 * Table Definition for cliente
 */
require_once 'DB/DataObject.php';

class DataObjects_Cliente extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'cliente';                         // table name
    public $id_cliente;                      // int(11)  not_null primary_key auto_increment
    public $cliente_numero;                  // int(11)  not_null
    public $cliente_nombre;                  // string(255)  not_null
    public $cliente_cuit;                    // int(11)  not_null
    public $persona_id_persona;              // int(11)  not_null multiple_key

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Cliente',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE

    public $fb_linkDisplayFields = array('cliente_nombre');
    public $fb_fieldLabels = array(
        'cliente_numero' => 'Numero: ',
        'cliente_nombre' => 'Nombre: ',
        'cliente_cuit' => 'CUIT: ',
        'persona_id_persona' => 'Persona: '
    );
     function preGenerateForm(&$fb) {
        $this->fb_formHeaderText = "Cliente";
        //DB_DataObject::debugLevel(1);
	 	$sol = DB_DataObject::factory('persona');
//        $cli = DB_DataObject::factory('cliente');
//        $sol->joinAdd($cli);
        $sol->find();
        $solicitudes = array();
	 	while ($sol->fetch()) {
	 		$solicitudes[$sol->id_persona] = "ID: ".$sol->id_persona." - ".$sol->nombre." ".$sol->apellido;
	 	}

        $this->fb_preDefElements['persona_id_persona'] = HTML_QuickForm::createElement('select', 'persona_id_persona', 'Persona: ', $solicitudes);
    }


}
