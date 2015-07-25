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

//$obj = new Acceso();
//if($obj->verificarAcceso($_SESSION['usuario']['permisos'], 'Home', 'Ver', $_SESSION['usuario']['usuario']) == 0){
//  header("location:".PATH_APP."/".DIR_MOD."/login/sin_permisos.php");
//}
//
//$usercode = $_SESSION['usuario']['codigo'];
//CheckTareasFrecuencia($usercode);
//
//$intro = "Ultimas tareas asignadas";
//
////DB_DataObject::debugLevel(5);
//$do = DB_DataObject::factory('public_tarea');
//  $do_p = DB_DataObject::factory('public_proyecto');
//  //$do_p->tipoproyecto_id = 1;
//$do->joinAdd($do_p,'LEFT');
//$do->orderBy('tarea.tarea_id DESC');
////$do->limit(10);
//
//$do->whereAdd("(tarea.usr_codigo=".$usercode." OR tarea.tarea_asignado_a=".$usercode.") AND (proyecto.tipoproyecto_id=1 OR proyecto.tipoproyecto_id IS NULL)");
//
//$dg = new grillaHTML(20);
//$dg->bind($do);
//
//$titulo = '<div><p>Tareas: </p></div>';
//$dg->addColumn(new Structures_DataGrid_Column('ID', null, null, array('width' => '40px', 'align' => "center"), null, 'getNombre', array('id' => 'tarea_id')));
//$dg->addColumn(new Structures_DataGrid_Column('Creada', null, null, array('width' => '60px', 'align' => "center"), null, 'getFecha', array('id' => 'tarea_fecha_creacion')));
//$dg->addColumn(new Structures_DataGrid_Column('Inicio', null, null, array('width' => '60px', 'align' => "left"), null, 'getFecha', array('id' => 'tarea_fecha_inicio')));
//$dg->addColumn(new Structures_DataGrid_Column('Fin', null, null, array('width' => '60px', 'align' => "left"), null, 'getFecha', array('id' => 'tarea_fecha_fin')));
//$dg->addColumn(new Structures_DataGrid_Column('Estado', 'estado_id', null, array('width' => '90px', 'align' => "left"), null, null, null));
//$dg->addColumn(new Structures_DataGrid_Column('Creado por', 'usr_codigo', null, array('width' => '90px', 'align' => "left"), null, null, null));
//$dg->addColumn(new Structures_DataGrid_Column('Asignado a', 'tarea_asignado_a', null, array('width' => '90px', 'align' => "left"), null, null, null));
//$dg->addColumn(new Structures_DataGrid_Column('Proyecto', 'proyecto_id', null, array('align' => "left")));
//$dg->addColumn(new Structures_DataGrid_Column('Titulo', null, null, array('align' => "left"), null, 'getNombre', array('id' => 'tarea_titulo')));
//$dg->addColumn(new Structures_DataGrid_Column('Activo', null, null, array('width' => '20px', 'align' => "center"), null, 'getBaja', array('id' => 'tarea_baja')));
//
//$agregar = '';
//$dg->setRendererOption('onMove', 'updateGrid', true);
//
//if ($dg->getRecordCount() > 0) {
//  $salida = $dg->getOutput();
//  $dg->setRenderer('Pager');
//  $salida.=$dg->getOutput();
//  $dg->setRendererOption('onMove', 'updateGrid', true);
//}
//else {
//  $salida = 'No hay datos para mostrar';
//}

$salida = "";
$agregar = "";

$errores = array();
$tpl = new tpl();
$tpl->assign('webTitulo', WEB_TITULO);
$tpl->assign('secTitulo', "Ultimas tareas asignadas");
//$tpl->assign('menu', "menu.tpl");
$tpl->assign('errores', implode(":",$errores));
$tpl->assign('body', '<div><p>' . $salida . '</p><br />' . $agregar . '</div>');
$tpl->display('index.tpl');



//function CheckTareasFrecuencia($usercode) {
//  $do = DB_DataObject::factory('public_tarea');
//
//  $doF = DB_DataObject::factory('public_frecuencia');
//  $do->joinAdd($doF, 'LEFT');
//
//  $do->whereAdd("usr_codigo=".$usercode." OR tarea_asignado_a=".$usercode);
//  $do->find();
//  while ($do->fetch()) {
//    if (($do->frecuencia_periodo > 0) && ($do->estado_id==3)) {
//      //La tarea tiene frecuencia y est� finalizada. Verificar fecha:
//      $fechaFin = new DateTime($do->tarea_fecha_fin);
//      $reiniciar = $fechaFin->add(new DateInterval('P'.$do->frecuencia_periodo.'D'));
//
//      if ($reiniciar <= new DateTime("now")) {
//        $doT = DB_DataObject::factory('public_tarea');
//        $doT->get($do->tarea_id);
//        $doT->estado_id = 1;
//        $doT->update();
//      }
//    }
//  }
//}
?>