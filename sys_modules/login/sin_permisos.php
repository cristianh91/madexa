<?php

    // Configuraciones
    require_once('../../config/web.config');
    // Smarty
    require_once(PATH_CFG.'/smarty.config');
    // Configuraciones de la consulta de login
    require_once(PATH_CFG.'/data.config');
    // Paquetes PEAR utiles
    require_once('HTML/QuickForm.php');

    // Lista de errores
    $errores = array();
    $errores[] = "No tiene permisos para acceder a esta secci&oacute;n.";
    $errores[] = "<a  class='btn btn-default' href='index.php'>Login</a>";


    // Creo las variables para el template
    $tpl = new tpl();
    // Titulo de la web
   //$tpl->assign('webTitulo', WEB_TITULO);
    // Titulo del sector
    $tpl->assign('secTitulo', 'No tiene permisos');
    // Formulario
    $tpl->assign('nombre_apellido', "Usuario");

    $tpl->assign('errores', implode("<br/>",$errores));

    $tpl->display('sin_permisos.tpl');
    exit;
?>
