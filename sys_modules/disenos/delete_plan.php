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

$codigo = $_GET['codigo'];
$do = DB_DataObject::factory('plano');
$do->id_plano = $codigo;
$do->fb_fieldsToRender = array('id_plano', 'plano_fecha', 'plano_numero', 'plano_version', 'plano_archivo_nombre');
if ($do->find(true)) {

	$fb = DB_DataObject_FormBuilder::create($do);
    $frm = $fb->getForm($_SERVER['REQUEST_URI'],null,'frm');
	$frm->setJsWarnings(FRM_WARNING_TOP, FRM_WARNING_BUTTON);
	$frm->setRequiredNote(FRM_NOTA);
	$frm->freeze();
}
else {
  $tpl = new tpl();
  $tpl->assign('body','<div id="contenido"><p><b>Error en la eliminaci&oacute;n</b></p></div>
                       <a href="index.php" id="boton">Volver</a>');
}


$error = '';
$paginaOriginante = 'plans.php?codigo='.$do->disenio_id_disenio;
if($frm->validate()) {
	$post = $frm->exportValues();
    $borrar = true;
	$do_act = DB_DataObject::factory('plano');
	$do_act->id_plano = $codigo;

    if ($borrar) {
		$do->setFrom($post);
		$do->query('START TRANSACTION;');

        if ($do->plano_archivo != "") {
            unlink("../../docs/" . $do->plano_archivo);
            //$post['plano_archivo'] = "";
        }


        $id = $do->delete();
		if ($id) {
			$do->query('COMMIT;');
			$error = 'Operaci&oacute;n exitosa</b></div>';
		}
		else {
			$do->query('ROLLBACK;');
			$error = 'Error en la eliminaci&oacute;n</b></div>';
		}
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
           <a href="javascript:if(document.frm.onsubmit()) document.frm.submit();" id="boton">[Guardar]</a>&nbsp;
           <a href="'.$paginaOriginante.'" id="boton">[Volver]</a>';
}
else{
  $body = '<div id="contenido"><p><b>'.$error.'</b></p>
           <a href="'.$paginaOriginante.'" id="boton">[Volver]</a></div>';
}

$errores = array();
$tpl = new tpl();
$tpl->assign('webTitulo', WEB_TITULO);
$tpl->assign('secTitulo', "Borrar Plano de Diseño");
$tpl->assign('datos', $_SESSION['usuario']['datos']);
$tpl->assign('tipo_pagina', "formularios");
$tpl->assign('form', $body);
$tpl->display('index.tpl');