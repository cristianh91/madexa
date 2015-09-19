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
$cliente_id = $_GET['codigo'];
$paginaOriginante = 'plans.php?codigo='.$cliente_id;

$do = DB_DataObject::factory('plano');
$do->disenio_id_disenio= $_GET['codigo'];
$do->find(true);

//Reseteo para que no muestre
$do->plano_fecha = null;
$do->plano_numero = null;
$do->plano_version = 1;
$do->plano_nombre_archivo = null;


$fb = DB_DataObject_FormBuilder::create($do);
$frm = $fb->getForm($_SERVER['REQUEST_URI'],'multipart-data','frm');
$frm->setJsWarnings(FRM_WARNING_TOP, FRM_WARNING_BUTTON);
$frm->setRequiredNote(FRM_NOTA);
//$frm->addFormRule('encuentra_calle');
//$frm->addRule('calle_codigo', 'Codigo de calle puede tener hasta 10 caracteres.','maxlength', '10', 'client');
$error = '';

if($frm->validate()) {

  $do = DB_DataObject::factory('plano');
  $post = $frm->exportValues();
  $disenio_fecha = $post['plano_fecha']['Y'] . "-" . sprintf("%02d", $post['plano_fecha']['m']). "-" . sprintf("%02d", $post['plano_fecha']['d']);
  $post['plano_fecha'] = $disenio_fecha;
  $post['plano_archivo'] = $_FILES['plano_archivo']['name'];
  //Subo el archivo

  if($do->plano_archivo!="" && $_FILES['plano_archivo']['name']!=""){
    unlink("../../docs/".$do->plano_archivo);
	$post['plano_archivo']="";
  }

  if (is_uploaded_file($_FILES['plano_archivo']['tmp_name'])) {
    $imagen = $_FILES['plano_archivo']['name'];
    $imagen1 = explode(".", $imagen);
    $imagen2 = rand(0, 9) . rand(100, 9999) . rand(100, 9999) . "." . $imagen1[1];
    if(!move_uploaded_file($_FILES['plano_archivo']['tmp_name'], "../../docs/" . $imagen2)){
        $error = 'No se pudo subir el plano, el tamaño maximo es de 2 MB.';
    }
    $post['plano_archivo'] = $imagen2;
  }

  $do->setFrom($post);
  $do->query('BEGIN');
  $id = $do->insert();

  if ($id){
    $do->query('COMMIT');
    $error = 'Operaci&oacute;n exitosa</b></div>';
  }
  else {
    $do->query('ROLLBACK');
    $error.= 'Error en la generaci&oacute;n de los datos</b></div>';
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
$tpl->assign('secTitulo', "Alta de plano para Diseño");
$tpl->assign('datos', $_SESSION['usuario']['datos']);
$tpl->assign('tipo_pagina', "formularios");
$tpl->assign('form', $body);
$tpl->display('index.tpl');
