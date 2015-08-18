<?php /* Smarty version 2.6.16, created on 2015-08-17 19:45:01
         compiled from sin_permisos.tpl */ ?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Madexa - Sistema de gestión</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo $this->_tpl_vars['path_gui']; ?>
/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo $this->_tpl_vars['path_gui']; ?>
/css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?php echo $this->_tpl_vars['path_gui']; ?>
/css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo $this->_tpl_vars['path_gui']; ?>
/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body style="background-color: white">

        <div id="wrapper">

            <!-- Navigation -->

                <!-- Brand and toggle get grouped for better mobile display -->
                <span class="navbar navbar-inverse navbar-fixed-top">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </span>


            <div class="form-group">
                <br />
                <h3>Acceso</h3>
            </div>
            <span style="color:red; font-weight: bold;">
            <?php $_from = $this->_tpl_vars['errores']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curr_id']):
?>
                 <?php echo $this->_tpl_vars['curr_id']; ?>
<br />
            <?php endforeach; endif; unset($_from); ?>
            </span>
                <!-- /.container-fluid -->


            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="js/plugins/morris/raphael.min.js"></script>
        <script src="js/plugins/morris/morris.min.js"></script>
        <script src="js/plugins/morris/morris-data.js"></script>

    </body>

</html>
