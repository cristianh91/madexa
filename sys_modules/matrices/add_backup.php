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

  $do_parte = DB_DataObject::factory('parte');
  $do_parte -> orderBy('nombre');
  $partes_array = $do_parte -> get_partes(); //llamo a la funcion definida en el dataObjets

  /* FORMULARIO INGRESAR UNA MATRIZ */  
  $frm = new HTML_QuickForm('form','get',$_SERVER['REQUEST_URI'],'');
  //$frm->addElement('header', null, 'Informaci&oacuten del Vencimiento',array('align'=>'center'));
  $frm->addElement('text', 'codigo', 'Codigo: ', array('id' => 'codigo','size' => 35, 'maxlength' => 255));
  $frm->addElement('text', 'tipo', 'Tipo: ', array('id' => 'tipo','size' => 35, 'maxlength' => 255));
  $frm->addElement('text', 'fecha', 'Fecha: ', array('id' => 'fecha','size' => 35, 'maxlength' => 255, 'readonly' => 'readonly'));
    $frm->addElement('html',
            '<link rel="stylesheet" type="text/css" media="all" href="../' . DIR_JS . '/jquery.datepick/redmond.datepick.css" />
            <style type="text/css">
                .datepick-popup select {
                                        font-size: 100%;
                                        margin: 0px 0px 0px 0;  /*VER RUTAS*/
                                        padding: 0;
                                        }
            </style>
            <script type="text/javascript" src="../../sys_gui/js/jquery.datepick/jquery.datepick.js"></script>
            <script type="text/javascript" src="../' . DIR_JS . '/jquery.datepick/jquery.datepick-es-AR.js"></script>
            
        <script type="text/javascript">
            var min;
            var max;
            $("#fecha").datepick({onSelect: customRange});
                    
            function customRange(dates) {
                    if (this.id == "fecha") {
                        $("#fecha").datepick();
                    }      
            }
        </script>');
    
    //<img style="vertical-align:middle;" src="../img/spirit20_icons/calendar.png" />
    $frm->addElement('select','parteSolidaId', 'Parte Solida:', $partes_array, array('id' => 'id_parte', 'style' => 'width: 22.5em; text-transform: capitalize;'));
    $frm->addElement('select','parteHuecaId', 'Parte Hueca:', $partes_array, array('id' => 'id_parte', 'style' => 'width: 22.5em; text-transform: capitalize;'));
    $frm->addElement('select','respaldoId', 'Respaldo:', $partes_array, array('id' => 'id_parte', 'style' => 'width: 22.5em; text-transform: capitalize;'));
      
  //Aceptar/Cancelar
    $botones = array();
    $botones[] = $frm->createElement('submit','aceptar', ' Guardar ');
    $botones[] = $frm->createElement('button',  'cancelar',' Cancelar ', array('onclick' => "javascript:window.location.href='index.php'"));
    $frm -> addGroup($botones);

  
    //GENERO LAS REGLAS CORRESPONDIENTES PARA LOS CAMPOS REQUERIDOS NO ESTEN VACIOS
    $frm->addRule('codigo', 'Campo Obligatorio', 'required');
    $frm->addRule('tipo', 'Campo Obligatorio', 'required');
    $frm->setJsWarnings(FRM_WARNING_TOP, FRM_WARNING_BUTTON);
    $frm->setRequiredNote(FRM_NOTA);
            
    $aceptar = $_GET['aceptar'];
  
  if ($aceptar == ' Guardar '){
        
    //validacion del formulario
    
                if($frm->validate()){
                    $do_matriz= DB_DataObject::factory('matriz');
                    $do_matriz->query('BEGIN');
                    $do_matriz->id_matriz = $id;
                    //$do_matriz->vto_fecha = fechaISO($_GET['fecha'],'/');
                    $do_matriz->codigo = $_GET['codigo'];
                    $do_matriz->tipo = $_GET['tipo'];                    
                    
                    if ($_GET['parteSolidaId'] != 0 ){
                        $do_matriz->id_parte_hueca= $_GET['parteSolidaId'];
                    }
                	if ($_GET['parteHuecaId'] != 0 ){
                        $do_matriz->id_parte_solida= $_GET['parteHuecaId'];
                    }
                	if ($_GET['respaldoId'] != 0 ){
                        $do_matriz->id_parte_respaldo= $_GET['respaldoId'];
                    }
                    $do_matriz->alta = 1;

                    $id_matriz = $do_matriz->insert();
                    $error=0;
                    if($id_matriz){
                    //si todo se genero correctamente entonces hago el commit
                        $do_matriz->query('COMMIT');
                        $error = '<font color="#008800"><strong>El vencimiento se agreg&oacute exitosamente!!</strong></font>';  
                                      
                    }else{
                        // En caso que falle la carga del archivo deshago la transaccion del vencimiento
                        $do_matriz->query('ROLLBACK');
                        $error = '<font color="#AA0000"><strong>No se pudo realizar la carga de este vencimiento</strong></font>'; 
                    }
                                                     
                        //header('location:index.php');
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
           <!--<a href="javascript:if(document.frm.onsubmit()) document.frm.submit();" id="boton">[Guardar]</a>&nbsp;
           <a href="'.$paginaOriginante.'" id="boton">[Volver]</a>-->';
}
else{
  $body = '<div id="contenido"><p><b>'.$error.'</b></p>
           <!--<a href="'.$paginaOriginante.'" id="boton">[Volver]</a>--></div>';
}

$errores = array();
$tpl = new tpl();
$tpl->assign('webTitulo', WEB_TITULO);
$tpl->assign('secTitulo', "Alta Matriz");
$tpl->assign('datos', $_SESSION['usuario']['datos']);
$tpl->assign('tipo_pagina', "formularios");
$tpl->assign('form', $body);
$tpl->display('index.tpl');