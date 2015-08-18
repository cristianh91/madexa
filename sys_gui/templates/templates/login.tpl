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
        <link href="{$path_gui}/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{$path_gui}/css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="{$path_gui}/css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{$path_gui}/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                {include file="header.tpl"}
                </span>


            <div class="form-group">
                <br />
                <p>Introduzca su usuario y clave para ingresar al sistema de gestión.</p>
                {$form}
            </div>
            <span style="color:red; font-weight: bold;">
            {foreach from=$errores item=curr_id}
                 {$curr_id}<br />
            {/foreach}
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

