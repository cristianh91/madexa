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
    public $id_persona;                      // int(11)  not_null primary_key auto_increment
    public $nombre;                          // string(255)  not_null
    public $apellido;                        // string(255)  not_null
    public $dni;                             // int(11)  not_null
    public $mail;                            // string(255)  
    public $telefono;                        // int(11)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Persona',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE

    public $fb_linkDisplayFields = array('apellido', 'nombre');
    public $fb_fieldLabels = array(
        'dni' => 'DNI: ',
        'mail' => 'Mail: ',
        'telefono' => 'Telefono: ',
        'nombre' => 'Nombre: ',
        'apellido' => 'Apellido: ',
        'id_cliente' => 'Clientes: '
    );

//    function preGenerateForm(&$fb) {
//        $this->fb_formHeaderText = "Persona";
//        DB_DataObject::debugLevel(1);
//	 	$per = DB_DataObject::factory('persona');
//        $cli = DB_DataObject::factory('cliente');
//        $per->joinAdd($cli);
//        $per->find();
//        $clientes = array();
//	 	while ($per->fetch()) {
//	 		$clientes[$per->id_cliente] = "Empresa: ".$per->cliente_nombre;
//	 	}
//
//        $this->fb_preDefElements['id_cliente'] = HTML_QuickForm::createElement('select', 'id_cliente', 'Empresa: ', $clientes);
//    }

}
