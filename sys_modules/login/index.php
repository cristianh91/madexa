<?php

	session_start();
    session_destroy();

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

    // Campos
    @$form->addElement('text', 'usuario', '', array('class' => 'form-control', 'placeholder' => 'Ingrese su usuario'));
    @$form->addElement('password', 'clave', '', array('class' => 'form-control', 'placeholder' => 'Ingrese su clave'));
    // Boton Entrar
    @$form->addElement('submit', 'B1', 'Entrar', array('class' => 'button'));
    $form->applyFilter('usuario', 'trim');
    // Defino los campos requeridos
    $form->addRule('usuario', 'Usuario requerido', 'required', null, 'client');
    $form->addRule('clave', 'Clave requerida', 'required', null, 'client');
    // Nota para los campos requeridos
    $form->setRequiredNote(FRM_NOTA);
    $form->setJsWarnings(FRM_WARNING_TOP, FRM_WARNING_BUTTON);


    // Validacion client-side, valido los campos
    if ( $form->validate() )
    {
            // Validacion server-side, valido los datos
           //DB_DataObject::debugLevel(5);
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];
            // Se deberia buscar una mejor manera de hacer esto
            $obj = DB_DataObject::factory('Usuario');
            $encontrado = $obj->validarUsuario($usuario,$clave);

            if($encontrado)
            {
                header('location:home.php');
                exit;
            }
            else
            {
                $errores[] = "Los datos no son correctos, verifique su usuario y contraseña";
            }
    }

    // Creo las variables para el template
    $tpl = new tpl();
    // Titulo de la web


    $tpl->assign('webTitulo', WEB_TITULO);

    // Titulo del sector
    $tpl->assign('secTitulo', 'Ingreso al Sistema');
    // Formulario
    $tpl->assign('form', $form->toHtml());

    $tpl->assign('nombre_apellido', "Usuario");

    $tpl->assign('errores', implode("<br/>",$errores));

    $tpl->display('login.tpl');
    exit;
?>
