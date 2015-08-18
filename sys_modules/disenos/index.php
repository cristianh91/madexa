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

$intro = "Diseños";
//
//DB_DataObject::debugLevel(1);
$do = DB_DataObject::factory('disenio');
$do_sol = DB_DataObject::factory('solicituddematriz');
$do_cli = DB_DataObject::factory('cliente');
$do_sol->joinAdd($do_cli);
$do->joinAdd($do_sol);

$dg = new grillaHTML(20);
$dg->bind($do);

$dg->addColumn(new Structures_DataGrid_Column('ID', null, null, array('width' => '40px', 'align' => "center"), null, 'getNombre', array('id' => 'id_disenio')));
$dg->addColumn(new Structures_DataGrid_Column('Fecha', null, null, array('width' => '60px', 'align' => "center"), null, 'getFecha', array('id' => 'disenio_fecha')));
$dg->addColumn(new Structures_DataGrid_Column('Diseño', null, null, array('align' => "left"), null, 'getNombre', array('id' => 'disenio_nombre')));
$dg->addColumn(new Structures_DataGrid_Column('Versión', null, null, array('align' => "left"), null, 'getNombre', array('id' => 'disenio_version')));
$dg->addColumn(new Structures_DataGrid_Column('Solicitud', null, null, array('align' => "left"), null, 'getNombre', array('id' => 'cliente_nombre')));
$dg->addColumn(new Structures_DataGrid_Column('Acciones', null, null, array('align' => "left"), null, 'getAcciones', array('id' => 'id_disenio')));

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
$tpl->assign('secTitulo', "Diseños");
$tpl->assign('datos', $_SESSION['usuario']['datos']);
$tpl->assign('tipo_pagina', "listados");
$tpl->assign('salida', '<div><p>' . $salida . '</p><br />' . $agregar . '</div>');
$tpl->display('index.tpl');