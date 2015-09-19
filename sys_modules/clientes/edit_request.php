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
$do = DB_DataObject::factory('solicituddematriz');

$fb = DB_DataObject_FormBuilder::create($do);
$do->id_solicitud = $_GET['codigo'];
$do->find(true);

$frm = $fb->getForm($_SERVER['REQUEST_URI'],null,'frm');
$frm->setJsWarnings(FRM_WARNING_TOP, FRM_WARNING_BUTTON);
$frm->setRequiredNote(FRM_NOTA);
//$frm->addFormRule('encuentra_calle');
//$frm->addRule('calle_codigo', 'Codigo de calle puede tener hasta 10 caracteres.','maxlength', '10', 'client');
$error = '';
$paginaOriginante = 'requests.php?codigo='.$do->id_cliente;

if ($frm->validate()) {
	$post = $frm->exportValues();
    $disenio_fecha = $post['fecha']['Y'] . "-" . sprintf("%02d", $post['fecha']['m']). "-" . sprintf("%02d", $post['fecha']['d']);
    $post['fecha'] = $disenio_fecha;
	$do->setFrom($post);
	$id = $do->update();
	if ($id){
		$do->query('COMMIT');
		$error = 'Operaci&oacute;n exitosa</b></div>';
	}
	else {
		$do->query('ROLLBACK');
		$error = 'No se han actualizado los datos</b></div>';
	}
}


if ($error == '') {
  $body = '<script type="text/javascript">
            $(document).ready(function(){
              $("input[type=\'text\']:enabled:first").focus();
            });
           </script>'.
           $error.
           '<div id="contenido">'.$frm->toHtml().'</div>
           <a class="btn btn-default" href="javascript:if(document.frm.onsubmit()) document.frm.submit();" id="boton">Guardar</a>&nbsp;
           <a class="btn btn-default" href="'.$paginaOriginante.'" id="boton">Volver</a>';
}
else{
  $body = '<div id="contenido"><p><b>'.$error.'</b></p>
           <a class="btn btn-default" href="'.$paginaOriginante.'" id="boton">Volver</a></div>';
}

$errores = array();
$tpl = new tpl();
$tpl->assign('webTitulo', WEB_TITULO);
$tpl->assign('secTitulo', "Editar Solicitud de Matriz de Cliente");
$tpl->assign('datos', $_SESSION['usuario']['datos']);
$tpl->assign('tipo_pagina', "formularios");
$tpl->assign('form', $body);
$tpl->display('index.tpl');