<?php /* Smarty version 2.6.25-dev, created on 2015-09-19 17:53:05
         compiled from menu.tpl */ ?>
<ul class="nav navbar-right top-nav">
    <li class="dropdown">
        <a href="../login/logout.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-info-circle"></i> Salir</a>
    </li>
    <li class="dropdown">
        <a href="../usuarios/index.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->_tpl_vars['datos']['nombre_apellido']; ?>
 </a>
    </li>
</ul>

<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="active">
            <a href="../login/home.php"><i class="fa fa-fw fa-dashboard"></i> Escritorio</a>
        </li>
        <li>
            <a href="../clientes/index.php"><i class="fa fa-fw fa-bar-chart-o"></i> Clientes</a>
        </li>
        <li>
        <li>
            <a href="../personas/index.php"><i class="fa fa-fw fa-bar-chart-o"></i> Personas</a>
        </li>
        <li>
            <a href="../disenos/index.php"><i class="fa fa-fw fa-edit"></i> Diseños</a>
        </li>
        <li>
            <a href="../matrices/index.php"><i class="fa fa-fw fa-wrench"></i> Matrices</a>
        </li>
        <li>
            <a href="../tipos_matrices/index.php"><i class="fa fa-fw fa-wrench"></i> Tipos de Matrices</a>
        </li>
        <li>
            <a href="../partes/index.php"><i class="fa fa-fw fa-wrench"></i> Partes</a>
        </li>
        <li>
            <a href="../tipo_partes/index.php"><i class="fa fa-fw fa-wrench"></i> Tipos de Partes</a>
        </li>
<!--        <li>
            <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Planos</a>
-->        </li>
        <li>
            <a href="../usuarios/index.php"><i class="fa fa-fw fa-table"></i> Usuarios</a>
        </li>
    </ul>
</div>