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

$intro = "Planos de Diseño";
//
//DB_DataObject::debugLevel(1);
$do = DB_DataObject::factory('plano');
$do -> disenio_id_disenio = $_GET['codigo'];
$do -> orderBy('plano_fecha DESC');
$dg = new grillaHTML(20);
$dg->bind($do);

$dg->addColumn(new Structures_DataGrid_Column('ID', null, null, array('width' => '40px', 'align' => "center"), null, 'getNombre', array('id' => 'id_plano')));
$dg->addColumn(new Structures_DataGrid_Column('Fecha', null, null, array('align' => "left"), null, 'getFecha', array('id' => 'plano_fecha')));
$dg->addColumn(new Structures_DataGrid_Column('Archivo', null, null, array('align' => "left"), null, 'getNombrePlano', array('id' => 'plano_archivo')));
$dg->addColumn(new Structures_DataGrid_Column('Nombre Archivo', null, null, array('align' => "left"), null, 'getNombre', array('id' => 'plano_nombre_archivo')));
$dg->addColumn(new Structures_DataGrid_Column('Acciones', null, null, array('align' => "left"), null, 'getAccionesPlano', array('id' => 'id_plano')));

$agregar = "<a href='add_plan.php?codigo=".$_GET['codigo']."'>"
        . "[Agregar Plano]</a> "
        . "<a href='index.php'>[Volver]</a>";

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
$tpl->assign('secTitulo', "Planos para el Diseño");
$tpl->assign('datos', $_SESSION['usuario']['datos']);
$tpl->assign('tipo_pagina', "listados");
$tpl->assign('salida', '<div><p>' . $salida . '</p><br />' . $agregar . '</div>');
$tpl->display('index.tpl');