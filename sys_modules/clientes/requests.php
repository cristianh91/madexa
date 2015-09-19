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

$intro = "Solicitudes del Cliente";
//
//DB_DataObject::debugLevel(1);
$do = DB_DataObject::factory('solicituddematriz');
$do -> id_cliente = $_GET['codigo'];
$do -> orderBy('fecha DESC');
$dg = new grillaHTML(20);
$dg->bind($do);

$dg->addColumn(new Structures_DataGrid_Column('ID', null, null, array('width' => '40px', 'align' => "center"), null, 'getNombre', array('id' => 'id_solicitud')));
$dg->addColumn(new Structures_DataGrid_Column('Fecha', null, null, array('align' => "left"), null, 'getFecha', array('id' => 'fecha')));
$dg->addColumn(new Structures_DataGrid_Column('Comentarios', null, null, array('align' => "left"), null, 'getNombre', array('id' => 'comentario')));
$dg->addColumn(new Structures_DataGrid_Column('Acciones', null, null, array('align' => "center"), null, 'getAccionesSolMatriz', array('id' => 'id_solicitud')));

$agregar = "<a  class='btn btn-default' href='add_request.php?codigo=".$_GET['codigo']."'>"
        . "Agregar Solicitud</a> "
        . "<a  class='btn btn-default' href='index.php'>Volver</a>";

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
$tpl->assign('secTitulo', "Solicitudes del Cliente");
$tpl->assign('datos', $_SESSION['usuario']['datos']);
$tpl->assign('tipo_pagina', "listados");
$tpl->assign('salida', '<div><p>' . $salida . '</p><br />' . $agregar . '</div>');
$tpl->display('index.tpl');