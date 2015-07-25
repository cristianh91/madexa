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


    //############## Formulario POST para el ingreso al sistema
    $form = new HTML_QuickForm('login','post',$_SERVER['REQUEST_URI']);
    // Titulo
    @$form->addElement('html', '<br /><p>'. $_SESSION['no_autorizado'].'</p><br />');
  

    // Creo las variables para el template
    $tpl = new tpl();
    // Titulo de la web
   $tpl->assign('webTitulo', WEB_TITULO);
    // Titulo del sector
    $tpl->assign('secTitulo', 'No tiene permisos');
    // Formulario
    $tpl->assign('body', $form->toHtml());

    $tpl->assign('nombre_apellido', "Usuario");

    $tpl->assign('errores', implode("<br/>",$errores));

    $tpl->display('login.tpl');
    exit;
?>
