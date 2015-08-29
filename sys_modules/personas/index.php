<?php
require_once('../../config/web.config');
//require_once(AUTHFILE);
require_once(PATH_CFG . '/smarty.config');
require_once(PATH_CFG . '/data.config');
require_once(PATH_INC . '/pear.inc');
require_once(PATH_INC . '/grilla.php');
require_once(PATH_INC . '/comun.php');
require_once('home.config');
require_once(PATH_INC . '/pear.inc');

if(!isset($_SESSION['usuario']['datos']))
    header("location:".PATH_APP."/".DIR_MOD."/login/sin_permisos.php");

$intro = "Personas";
//
//DB_DataObject::debugLevel(1);
$do = DB_DataObject::factory('persona');
$dg = new grillaHTML(20);
$dg->bind($do);

$dg->addColumn(new Structures_DataGrid_Column('ID', null, null, array('width' => '40px', 'align' => "center"), null, 'getNombre', array('id' => 'id_persona')));
$dg->addColumn(new Structures_DataGrid_Column('Nombre', null, null, array('align' => "left"), null, 'getNombre', array('id' => 'nombre')));
$dg->addColumn(new Structures_DataGrid_Column('Apellido', null, null, array('align' => "left"), null, 'getNombre', array('id' => 'apellido')));
$dg->addColumn(new Structures_DataGrid_Column('CUIT', null, null, array('align' => "left"), null, 'getNombre', array('id' => 'dni')));
$dg->addColumn(new Structures_DataGrid_Column('Mail', null, null, array('align' => "left"), null, 'getNombre', array('id' => 'mail')));
$dg->addColumn(new Structures_DataGrid_Column('Telefono', null, null, array('align' => "left"), null, 'getNombre', array('id' => 'telefono')));
$dg->addColumn(new Structures_DataGrid_Column('Acciones', null, null, array('align' => "left"), null, 'getAcciones', array('id' => 'id_persona')));

$agregar = '<a href="add.php">[Agregar]</a>';
$dg->setRendererOption('onMove', 'updateGrid', true);

if ($dg->getRecordCount() > 0) {
  $salida = $dg->getOutput();
  $dg->setRenderer('Pager');
  $salida.=$dg->getOutput();
  $dg->setRendererOption('onMove', 'updateGrid', true);
}
else {
  $salida = 'No hay datos para mostrar';
}

$errores = array();
$tpl = new tpl();
$tpl->assign('webTitulo', WEB_TITULO);
$tpl->assign('secTitulo', "Personas");
$tpl->assign('datos', $_SESSION['usuario']['datos']);
$tpl->assign('tipo_pagina', "listados");
$tpl->assign('salida', '<div><p>' . $salida . '</p><br />' . $agregar . '</div>');
$tpl->display('index.tpl');