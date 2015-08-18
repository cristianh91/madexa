<?php
function getVerActivoCategoria($vals, $args) {
	extract($vals);
	extract($args);
	return "<a href=../../reclamos/activos/index.php?filtro=si&activo_codigo=&activo_nombre=&activo_direccion=&categoria_id={$record[$id]}&nro_registro=15&Buscar=Buscar title='ver Activos'><img src='" . PATH_gui . "/images/icons/address-book.png' alt='' /></a>";
}

function getVerCompCategoria($vals, $args) {
	extract($vals);
	extract($args);

	$do = DB_DataObject::factory('Public_activo');
	$do->activo_id=$record[$id];
	$do->find(true);
	return "<a href=../../reclamos/componentes/index.php?filtro=si&comp_codigo=&comp_nombre=&nro_registro=15&categoria_id={$do->categoria_id}&aceptar=Buscar title='ver Componente'><img src='" . PATH_gui . "/images/icons/address-book.png' alt='' /></a>";
    //return "<a href=../../reclamos/componentes/index.php?filtro=si&comp_codigo=&comp_nombre=&nro_registro=15&categoria_id={$do->categoria_id}&aceptar=Buscar title='ver Componente'><img src='" . PATH_gui . "/images/icons/address-book.png' alt='' /></a>";


}

function estadoTareaProyecto($vals, $args) {
	extract($vals);
	extract($args);
	//echo $record[$estado_id];
	$do = DB_DataObject::factory('Public_proyecto');
	$do->proyecto_id=$record[$proyecto_id];
	$do->find(true);
	if($record[$estado_id] == 'Sin iniciar')
		return "<a href=../../tareas/visualizar-tareas/iniciar.php?codigo={$record[$id]}&list={$record[$proyecto_id]}&tipo={$do->tipoproyecto_id} title='Iniciar tarea'><img src='" . PATH_gui . "/images/icons/control.png' alt='' /></a>";
		elseif($record[$estado_id] == 'Iniciada')
		return "<a href=../../tareas/visualizar-tareas/finalizar.php?codigo={$record[$id]}&list={$record[$proyecto_id]}&tipo={$do->tipoproyecto_id} title='Finalizar tarea'><img src='" . PATH_gui . "/images/icons/control-stop-square.png' alt='' /></a>";
		elseif($record[$estado_id] == 'Finalizada')
		return "<a href=../../tareas/visualizar-tareas/iniciar.php?codigo={$record[$id]}&list={$record[$proyecto_id]}&tipo={$do->tipoproyecto_id} title='Iniciar tarea'><img src='" . PATH_gui . "/images/icons/control.png' alt='' /></a>";
}


function subirArchivosProyecto($vals, $args) {
	extract($vals);
	extract($args);	$do = DB_DataObject::factory('Public_proyecto');
	$do->proyecto_id=$record[$proyecto_id];
	$do->find(true);
	return "<a href=../../tareas/visualizar-tareas/subir-archivos.php?codigo={$record[$id]}&list={$record[$proyecto_id]}&tipo={$do->tipoproyecto_id} title='Subir archivos'><img src='" . PATH_gui . "/images/icons/folder-open-document.png' alt='' /></a>";
}

function getEditarProyecto($vals, $args) {
	extract($vals);
	extract($args);
	$do = DB_DataObject::factory('Public_proyecto');
	$do->proyecto_id=$record[$proyecto_id];
	$do->find(true);

	return "<a href=../../tareas/visualizar-tareas/editar.php?codigo={$record[$id]}&list={$record[$proyecto_id]}&tipo={$do->tipoproyecto_id} title='Editar'><img src='" . PATH_gui . "/images/icons/pencil.png' alt='' /></a>";
}

function getEliminarProyecto($vals, $args) {
	extract($vals);
	extract($args);	$do = DB_DataObject::factory('Public_proyecto');
	$do->proyecto_id=$record[$proyecto_id];
	$do->find(true);
	return "<a href=../../tareas/visualizar-tareas/eliminar.php?codigo={$record[$id]}&list={$record[$proyecto_id]}&tipo={$do->tipoproyecto_id} title='Eliminar'><img src='" . PATH_gui . "/images/icons/cross-circle.png' alt='' /></a>";

}

function getPersonalProyecto($vals, $args) {
	extract($vals);
	extract($args);
	$do = DB_DataObject::factory('Public_proyecto');
	$do->proyecto_id=$record[$proyecto_id];
	$do->find(true);

	return "<a href=../../tareas/visualizar-tareas/tareas_trabajadores.php?codigo={$record[$id]}&list={$record[$proyecto_id]}&tipo={$do->tipoproyecto_id} title='Personal asignado'><img src='" . PATH_gui . "/images/icons/hard-hat.png' alt='' /></a>";
}

function getNombreProyecto ($vals, $args){

	extract($vals);
	extract($args);
	$do = DB_DataObject::factory('Public_proyecto');
	$do->proyecto_id=$record[$id];

		if ($do->find(true)){
		return $do->proyecto_titulo;
		}else
		return '-';

}

function getNewSize($w, $h, $lw, $lh) {
    //obtain an new size from start, max dimesions
    if($w > $lw) {
        $percent = ($lw * 100) / $w;
        $w = $lw;
        $h = $h * ($percent / 100);
    }
    if($h > $lh) {
        $percent = ($lh * 100) / $h;
        $h = $lh;
        $w = $w * ($percent / 100);
    }
    return array('w' => $w, 'h' => $h);
}

function getLogo() {
	$empresa=DB_DataObject::factory('Public_empresa');
	$empresa->find(true);
	$empresa->fetch();
	if (($empresa->empresa_logo!="") && (is_file(PATH_gui . "/images/".$empresa->empresa_logo))) {
		$tam = getimagesize(PATH_gui . "/images/".$empresa->empresa_logo);
		$tam = getNewSize($tam[0],$tam[1], 64,100);
		return "<img src='" . PATH_gui . "/images/".$empresa->empresa_logo."' alt='' width='".$tam["w"]."' height='".$tam["h"]."' />";
	}else{
		return "";
	}

}
function getEmpresaDatos() {
	$empresa=DB_DataObject::factory('Public_empresa');
	$empresa->find(true);
	$empresa->fetch();

	$result="<div>".$empresa->empresa_direccion."</div>";
	$result.="<div>".$empresa->empresa_telefono1."</div>";
	$result.="<div>".$empresa->empresa_mail."</div>";

	return $result;


}

function getLogoEmpresa($vals, $args) {
	extract($vals);
	extract($args);
	if (($record[$id]!="") && (is_file(PATH_gui . "/images/".$record[$id]))) {
	  $tam = getimagesize(PATH_gui . "/images/".$record[$id]);
	  $tam = getNewSize($tam[0],$tam[1], 120,120);
		return "<img src='" . PATH_gui . "/images/".$record[$id]."' alt='' width='".$tam["w"]."' height='".$tam["h"]."' />";
	}else{
		return "Sin Logo";
	}
}
function getCategoria($vals, $args) {
	extract($vals);
	extract($args);

	$do = DB_DataObject::factory('Public_componente');
	$do->comp_id=$record[$id];
	$do->find(true);

	$doa = DB_DataObject::factory('Public_activo');
	$doa->activo_id=$do->activo_id;
	$doa->find(true);

	$doc = DB_DataObject::factory('Public_categoria');
	$doc->categoria_id=$doa->categoria_id;
	$doc->find(true);
	return $doc->categoria_nombre;
}

function getVerProyecto($vals, $args) {
	extract($vals);
	extract($args);

	$do = DB_DataObject::factory('Public_tarea');
	$do->proyecto_id=$record[$id];
	$num=$do->find(true);
	return "<a href=ver.php?codigo={$record[$id]} title='Ver el item'><img src='" . PATH_gui . "/images/icons/navigation-090-white.png' alt='' /></a> (".$num.")";
}
function getVerComentario($vals, $args) {
	extract($vals);
	extract($args);

	$do = DB_DataObject::factory('Public_comentario');
	$do->trabajador_id=$record[$id];
	$num=$do->find(true);

	return "<a href=".((isset($persona))?'../comentarios/':'')."ver.php?codigo={$record[$id]} title='Ver el item'><img src='" . PATH_gui . "/images/icons/navigation-090-white.png' alt='' /></a> (".$num.")";
}
function getAgregarProyecto($vals, $args) {
	extract($vals);
	extract($args);
	return "<a href=../../tareas/visualizar-tareas/agregar.php?codigo_proyecto={$record[$id]} title='Ver el item'><img src='" . PATH_gui . "/images/icons/plus-circle.png' alt='' /></a>";
}
function getCheckTipoAcceso($vals, $args) {

    //Datos de lo elegido que viene por get
    $mod_codigo = $args['mod_codigo'];
    $rol_codigo = $args['rol_codigo'];
    $tipoacc_codigo = $args['tipoacc_codigo'];

    extract($vals);

    //Consulto la base a ver si ya fue elegido
    //DB_DataObject::debugLevel(5);
    $do = DB_DataObject::factory('Public_permiso');
    $do->rol_codigo = $rol_codigo;
    $do->tipoacc_codigo = $tipoacc_codigo;
    $do->mod_codigo = $mod_codigo;

    if ($do->find(true)) {
        //Muestro checkeado
        return " <input type='checkbox' name='tipoacceso[$do->tipoacc_codigo]' value='1' title='tipo_acceso' checked='checked'>";
    } else {
        return " <input type='checkbox' name='tipoacceso[$do->tipoacc_codigo]' value='0' title='tipo_acceso'>";
    }
}

function getNombreEmpresa($vals) {
    extract($vals);
    //extract($args);
    $do_usuario_empresa = DB_DataObject::factory('usuario_empresa');
    $do_usuario_empresa->usremp_usua_id = $record['usua_id'];
    if ($do_usuario_empresa->find(true)) {
        $do_empresas = DB_DataObject::factory('empresas');
        $do_empresas->emp_id = $do_usuario_empresa->usremp_emp_id;
        if ($do_empresas->find(true)) {
            return '<p>' . $do_empresas->emp_nombre . '</p>';
        }
    }
}

function getUsrRolNombreEmpresa($vals) {
    extract($vals);
	//extract($args);
    $do_usuario_empresa = DB_DataObject::factory('usuario_empresa');
    $do_usuario_empresa->usremp_usua_id = $record['usrrol_usua_id__key'];
    if ($do_usuario_empresa->find(true)) {
        $do_empresas = DB_DataObject::factory('empresas');
        $do_empresas->emp_id = $do_usuario_empresa->usremp_emp_id;
        if ($do_empresas->find(true)) {
            return '<p>' . $do_empresas->emp_nombre . '</p>';
        }
    }
}

/**
 * Obtiene la descripcion de un rol de un usuario
 *
 * @return string id de un usuario en un link para visualizar sus roles si posee acceso
 * @param array $vals registro de la grilla
 */
function getRolUsuario($vals, $args) {
    extract($vals);
    extract($args);
    //echo var_dump($record);
    if ($record['usua_id']) {
        $do_ur = DB_DataObject::factory('usuario_rol');
        $do_ur->usrrol_usua_id = $record['usua_id'];
        if (($do_ur->find(true) and ($do_ur->usrrol_usua_id))) {
            $do_r = DB_DataObject::factory('rol');
            $do_r->rol_id = $do_ur->usrrol_usua_id;
            if ($do_r->find(true))
                return '<p>' . $do_r->rol_nombre . '</p>';
        }
    }
    return false;
}

/**
 * Muestra el vinculo para ver las paginas del modulo
 * @param <array> $vals
 * @return <string>
 */
function verPaginasModulo($vals) {
    extract($vals);
    return '<a href="#" title="Modulo-Paginas" id="' . $record['mod_id'] . '"><p>[Ver paginas]</p></a>';
}

/**
 * Muestra el vinculo para ver tablas
 * @param <array> $vals
 */
function verTablas($vals) {
    extract($vals);
    return '<a href="#" title="Modulo-Tablas" id="' . $record['mod_id'] . '"><p>[Ver tablas]</p></a>';
}

function getNombreTipoAcceso($vals, $args) {
    extract($vals);
    extract($args);
    return $record['tipoacc_nombre'];
}

/**
 * Genera un link para modificar un registro de la tabla obtenida por GET
 *
 * @return string link al script para modificar el registro
 * @param array $vals registro de la grilla y un string con el campo de id del registro
 */
function getEditar($vals, $args) {
    extract($vals);
    extract($args);
    return "<a href=editar.php?codigo={$record[$id]} title='Modificar el item'><img src='" . PATH_gui . "/images/icons/pencil.png' alt='' /></a>";
}


function getEditarTarea($vals, $args) {
	extract($vals);
	extract($args);
	$do = DB_DataObject::factory('public_tarea');
	$do->tarea_id=$record[$id];
	$do->find(true);
	$usercode=$_SESSION['usuario']['codigo'];
	$obj = new Acceso();
	$admin=$obj->verificarAcceso($_SESSION['usuario']['permisos'], "Visualizar y cargar tareas", 'Acceso a Tareas', $_SESSION['usuario']['usuario']);

	if($do->usr_codigo==$usercode || $admin==1)
	  return "<a href=editar.php?codigo={$record[$id]} title='Modificar el item'><img src='" . PATH_gui . "/images/icons/pencil.png' alt='' /></a>";
  else {
    return "";
  }
}


function getImprimirTarea($vals, $args) {
	extract($vals);
	extract($args);
	$do = DB_DataObject::factory('public_tarea');
	$do->tarea_id=$record[$id];
	$do->find(true);

	$usercode = $_SESSION['usuario']['codigo'];
	$obj = new Acceso();
	$admin = $obj->verificarAcceso($_SESSION['usuario']['permisos'], "Visualizar y cargar tareas", 'Acceso a Tareas', $_SESSION['usuario']['usuario']);

	if ($do->usr_codigo==$usercode || $admin==1)
	  return "<a href='javascript:imprimirTarea();' title='Imprimir la Tarea'><img src='" . PATH_gui . "/images/icons/print.png' alt='' /></a>";
  else {
    return "";
  }
}


function getImprimir($vals, $args) {
  extract($vals);
  extract($args);
  return "<a href='javascript:imprimir({$record[$id]});' title='Imprimir'><img src='" . PATH_gui . "/images/icons/print.png' alt='' /></a>";
}


function getEditarCategoria($vals, $args) {
		print_r($vals);
	print_r($args);
	extract($vals);
	extract($args);
	//echo $record[$id];
	return "<a href=editar.php?codigo={$record[$id]} title='Modificar el item'><img src='" . PATH_gui . "/images/icons/pencil.png' alt='' /></a>";
}


function getVer($vals, $args) {
    extract($vals);
    extract($args);
    return "<a href=ver.php?codigo={$record[$id]} title='Ver el item'><img src='" . PATH_gui . "/images/icons/navigation-090-white.png' alt='' /></a>";
}

function estadoProyecto($vals, $args) {
    extract($vals);
    extract($args);
	//echo $record[$estado_id];
    if($record[$estado_id] == 'Sin iniciar')
        return "<a href=iniciar.php?codigo={$record[$id]} title='Iniciar proyecto'><img src='" . PATH_gui . "/images/icons/control.png' alt='' /></a>";
    elseif($record[$estado_id] == 'Iniciada')
        return "<a href=finalizar.php?codigo={$record[$id]} title='Finalizar proyecto'><img src='" . PATH_gui . "/images/icons/control-stop-square.png' alt='' /></a>";
    elseif($record[$estado_id] == 'Finalizada')
        return "<a href=iniciar.php?codigo={$record[$id]} title='Iniciar proyecto'><img src='" . PATH_gui . "/images/icons/control.png' alt='' /></a>";
}

function estadoTarea($vals, $args) {
    extract($vals);
    extract($args);
	//echo $record[$estado_id];
    if($record[$estado_id] == 'Sin iniciar')
        return "<a href=iniciar.php?codigo={$record[$id]} title='Iniciar tarea'><img src='" . PATH_gui . "/images/icons/control.png' alt='' /></a>";
    elseif($record[$estado_id] == 'Iniciada')
        return "<a href=finalizar.php?codigo={$record[$id]} title='Finalizar tarea'><img src='" . PATH_gui . "/images/icons/control-stop-square.png' alt='' /></a>";
    elseif($record[$estado_id] == 'Finalizada')
        return "<a href=iniciar.php?codigo={$record[$id]} title='Iniciar tarea'><img src='" . PATH_gui . "/images/icons/control.png' alt='' /></a>";
}

function estadoTareaTarea($vals, $args) {
	extract($vals);
	extract($args);
		$do = DB_DataObject::factory('public_tarea');
	$do->tarea_id=$record[$id];
	$do->find(true);
	$usercode=$_SESSION['usuario']['codigo'];

	$obj = new Acceso();
	$admin=$obj->verificarAcceso($_SESSION['usuario']['permisos'], "Visualizar y cargar tareas", 'Aceeso a Tareas', $_SESSION['usuario']['usuario']);

	if($do->usr_codigo==$usercode || $do->tarea_asignado_a==$usercode || $admin==1){
	if($record[$estado_id] == 'Sin iniciar')
		return "<a href=iniciar.php?codigo={$record[$id]} title='Iniciar tarea'><img src='" . PATH_gui . "/images/icons/control.png' alt='' /></a>";
		elseif($record[$estado_id] == 'Iniciada')
		return "<a href=finalizar.php?codigo={$record[$id]} title='Finalizar tarea'><img src='" . PATH_gui . "/images/icons/control-stop-square.png' alt='' /></a>";
		elseif($record[$estado_id] == 'Finalizada')
		return "<a href=iniciar.php?codigo={$record[$id]} title='Iniciar tarea'><img src='" . PATH_gui . "/images/icons/control.png' alt='' /></a>";
	}
}
function finalizarTarea($vals, $args) {
    extract($vals);
    extract($args);
    return "<a href=finalizar.php?codigo={$record[$id]} title='Iniciar tarea'><img src='" . PATH_gui . "/images/icons/control-stop-square.png' alt='' /></a>";
}

function suspenderTarea($vals, $args) {
    extract($vals);
    extract($args);
    return "<a href=suspender.php?codigo={$record[$id]} title='Pausar tarea'><img src='" . PATH_gui . "/images/icons/control-pause.png' alt='' /></a>";
}


function getVerTarea($vals, $args) {
	extract($vals);
	extract($args);

	return "<a href=ver.php?codigo={$record[$id]} title='Ver el item'><img src='" . PATH_gui . "/images/icons/navigation-090-white.png' alt='' /></a>";
}

function getVerTarea2($vals, $args) {
	extract($vals);
	extract($args);

	return "<a href=../../tareas/visualizar-tareas/ver.php?codigo={$record[$id]} title='Ver el item'><img src='" . PATH_gui . "/images/icons/navigation-090-white.png' alt='' /></a>";
}


function subirArchivos($vals, $args) {
    extract($vals);
    extract($args);

    $do = DB_DataObject::factory('public_tarea');
    $do->tarea_id=$record[$id];
    $do->find(true);
    $usercode=$_SESSION['usuario']['codigo'];

  	$obj = new Acceso();
	$admin=$obj->verificarAcceso($_SESSION['usuario']['permisos'], "Visualizar y cargar tareas", 'Aceeso a Tareas', $_SESSION['usuario']['usuario']);

	if ($do->usr_codigo==$usercode || $do->tarea_asignado_a==$usercode || $admin==1)
    	return "<a href=subir-archivos.php?codigo={$record[$id]} title='Subir archivos'><img src='" . PATH_gui . "/images/icons/folder-open-document.png' alt='' /></a>";
}

function getPersonal($vals, $args) {
    extract($vals);
    extract($args);
    return "<a href=tareas_trabajadores.php?codigo={$record[$id]} title='Personal asignado'><img src='" . PATH_gui . "/images/icons/hard-hat.png' alt='' /></a>";
}

function getProyecto ($vals, $arg){

}

/**
 * Genera un link para eliminar un registro de la tabla obtenida por GET
 *
 * @return string link al script para eliminar el registro
 * @param array $vals registro de la grilla y un string con el campo de id del registro
 */
function getEliminar($vals, $args) {
    extract($vals);
    extract($args);
    return "<a href=eliminar.php?codigo={$record[$id]} title='Eliminar el item'>[E]</a>";
}

function getAcciones($vals, $args) {
    extract($vals);
    extract($args);
    return "<a href=edit.php?codigo={$record[$id]} title='Editar el item'>[E]</a> | <a href=delete.php?codigo={$record[$id]} title='Borrar el item'>[B]</a>";
}

function getEliminarTarea($vals, $args) {
	extract($vals);
	extract($args);
	$do = DB_DataObject::factory('public_tarea');
	$do->tarea_id=$record[$id];
	$do->find(true);
	$usercode=$_SESSION['usuario']['codigo'];
	$obj = new Acceso();
	$admin=$obj->verificarAcceso($_SESSION['usuario']['permisos'], "Visualizar y cargar tareas", 'Aceeso a Tareas', $_SESSION['usuario']['usuario']);

	if($do->usr_codigo==$usercode || $admin==1)
	return "<a href=eliminar.php?codigo={$record[$id]} title='Eliminar el item'><img src='" . PATH_gui . "/images/icons/cross-circle.png' alt='' /></a>";
}

function getEliminarArchivo($vals, $args) {
    extract($vals);
    extract($args);


    return "<a href=eliminar_archivo.php?codigo={$record[$archivo_id]}&tarea_id={$args['tarea_id']} title='Eliminar el item'><img src='" . PATH_gui . "/images/icons/cross-circle.png' alt='' /></a>";
}

/**
 * Genera un link para eliminar un registro de la tabla obtenida por GET
 *
 * @return string link al script para eliminar el registro
 * @param array $vals registro de la grilla y un string con el campo de id del registro
 */
function getEliminarRol($vals, $args) {
    extract($vals);
    extract($args);
    $do_rol = DB_DataObject::factory('public_rol');
    $do_rol -> rol_codigo = $record[$id];
    $do_rol -> rol_baja = true;
    if($do_rol -> find(true))
    	$rta = "";
    else
    	$rta = "<a href=eliminar.php?codigo={$record[$id]} title='Eliminar el item'><img src='".PATH_gui."/images/icons/cross-circle.png' alt='' /></a>";
    return $rta;
}

/**
 * Genera un link para eliminar un registro de la tabla obtenida por GET
 *
 * @return string link al script para eliminar el registro
 * @param array $vals registro de la grilla y un string con el campo de id del registro
 */
function getEliminarAplicacion($vals, $args) {
    extract($vals);
    extract($args);
    $do_app = DB_DataObject::factory('public_aplicacion');
    $do_app -> app_codigo = $record[$id];
    $do_app -> app_baja = true;
    if($do_app -> find(true))
    	$rta = "";
    else
    	$rta = "<a href=eliminar.php?codigo={$record[$id]} title='Eliminar el item'><img src='".PATH_gui."/images/icons/cross-circle.png' alt='' /></a>";
    return $rta;
}

/**
 * Genera un link para eliminar un registro de la tabla obtenida por GET
 *
 * @return string link al script para eliminar el registro
 * @param array $vals registro de la grilla y un string con el campo de id del registro
 */
function getEliminarModulo($vals, $args) {
    extract($vals);
    extract($args);
    $do_modulo = DB_DataObject::factory('public_modulo');
    $do_modulo -> mod_codigo = $record[$id];
    $do_modulo -> mod_baja = true;
    if($do_modulo -> find(true))
    	$rta = "";
    else
    	$rta = "<a href=eliminar.php?codigo={$record[$id]} title='Eliminar el item'><img src='".PATH_gui."/images/icons/cross-circle.png' alt='' /></a>";
    return $rta;
}

/**
 * Genera un link para eliminar un registro de la tabla obtenida por GET
 *
 * @return string link al script para eliminar el registro
 * @param array $vals registro de la grilla y un string con el campo de id del registro
 */
function getEliminarFamilia($vals, $args) {
    extract($vals);
    extract($args);
    $do_modulo = DB_DataObject::factory('public_familia');
    $do_modulo -> fam_id = $record[$id];
    $do_modulo -> fam_baja = true;
    if($do_modulo -> find(true))
    	$rta = "";
    else
    	$rta = "<a href=eliminar.php?codigo={$record[$id]} title='Eliminar el item'><img src='".PATH_gui."/images/icons/cross-circle.png' alt='' /></a>";
    return $rta;
}

/**
 * Genera un link para eliminar un registro de la tabla obtenida por GET
 *
 * @return string link al script para eliminar el registro
 * @param array $vals registro de la grilla y un string con el campo de id del registro
 */
function getEliminarSector($vals, $args) {
    extract($vals);
    extract($args);
    $do = DB_DataObject::factory('public_sector');
    $do -> sec_codigo = $record[$id];
    $do -> sec_baja = true;
    if($do -> find(true))
    	$rta = "";
    else
    	$rta = "<a href=eliminar.php?codigo={$record[$id]} title='Eliminar el item'><img src='".PATH_gui."/images/icons/cross-circle.png' alt='' /></a>";
    return $rta;
}

/**
 * Genera un link para eliminar un registro de la tabla obtenida por GET
 *
 * @return string link al script para eliminar el registro
 * @param array $vals registro de la grilla y un string con el campo de id del registro
 */
function getEliminarSede($vals, $args) {
    extract($vals);
    extract($args);
    $do = DB_DataObject::factory('public_sede');
    $do -> sede_id = $record[$id];
    $do -> sede_baja = true;
    if($do -> find(true))
    	$rta = "";
    else
    	$rta = "<a href=eliminar.php?codigo={$record[$id]} title='Eliminar el item'><img src='".PATH_gui."/images/icons/cross-circle.png' alt='' /></a>";
    return $rta;
}

/**
 * Genera un link para eliminar un registro de la tabla obtenida por GET
 *
 * @return string link al script para eliminar el registro
 * @param array $vals registro de la grilla y un string con el campo de id del registro
 */
function getEliminarEstado($vals, $args) {
    extract($vals);
    extract($args);
    $do = DB_DataObject::factory('public_estado');
    $do -> estado_id = $record[$id];
    $do -> estado_baja = true;
    if($do -> find(true))
    	$rta = "";
    else
    	$rta = "<a href=eliminar.php?codigo={$record[$id]} title='Eliminar el item'><img src='".PATH_gui."/images/icons/cross-circle.png' alt='' /></a>";
    return $rta;
}

/**
 * Genera un link para eliminar un registro de la tabla obtenida por GET
 *
 * @return string link al script para eliminar el registro
 * @param array $vals registro de la grilla y un string con el campo de id del registro
 */
function getEliminarColor($vals, $args) {
    extract($vals);
    extract($args);
    $do = DB_DataObject::factory('public_color');
    $do -> color_id = $record[$id];
    $do -> color_baja = true;
    if($do -> find(true))
    	$rta = "";
    else
    	$rta = "<a href=eliminar.php?codigo={$record[$id]} title='Eliminar el item'><img src='".PATH_gui."/images/icons/cross-circle.png' alt='' /></a>";
    return $rta;
}

/**
 * Genera un link para eliminar un registro de la tabla obtenida por GET
 *
 * @return string link al script para eliminar el registro
 * @param array $vals registro de la grilla y un string con el campo de id del registro
 */
function getEliminarMoneda($vals, $args) {
    extract($vals);
    extract($args);
    $do = DB_DataObject::factory('public_moneda');
    $do -> mon_id = $record[$id];
    $do -> mon_baja = true;
    if($do -> find(true))
    	$rta = "";
    else
    	$rta = "<a href=eliminar.php?codigo={$record[$id]} title='Eliminar el item'><img src='".PATH_gui."/images/icons/cross-circle.png' alt='' /></a>";
    return $rta;
}

/**
 * Genera un link para eliminar un registro de la tabla obtenida por GET
 *
 * @return string link al script para eliminar el registro
 * @param array $vals registro de la grilla y un string con el campo de id del registro
 */
function getEliminarProvincia($vals, $args) {
    extract($vals);
    extract($args);
    $do = DB_DataObject::factory('public_provincia');
    $do -> prov_id = $record[$id];
    $do -> prov_baja = true;
    if($do -> find(true))
    	$rta = "";
    else
    	$rta = "<a href=eliminar.php?codigo={$record[$id]} title='Eliminar el item'><img src='".PATH_gui."/images/icons/cross-circle.png' alt='' /></a>";
    return $rta;
}

/**
 * Genera un link para eliminar un registro de la tabla obtenida por GET
 *
 * @return string link al script para eliminar el registro
 * @param array $vals registro de la grilla y un string con el campo de id del registro
 */
function getEliminarEmpresa($vals, $args) {
    extract($vals);
    extract($args);
    $do = DB_DataObject::factory('public_empresa');
    $do -> emp_codigo = $record[$id];
    $do -> emp_baja = true;
    if($do -> find(true))
    	$rta = "";
    else
    	$rta = "<a href=eliminar.php?codigo={$record[$id]} title='Eliminar el item'><img src='".PATH_gui."/images/icons/cross-circle.png' alt='' /></a>";
    return $rta;
}

/**
 * Genera un link para eliminar un registro de la tabla obtenida por GET
 *
 * @return string link al script para eliminar el registro
 * @param array $vals registro de la grilla y un string con el campo de id del registro
 */
function getEliminarLocalidad($vals, $args) {
    extract($vals);
    extract($args);
    $do = DB_DataObject::factory('public_localidad');
    $do -> loc_id = $record[$id];
    $do -> loc_baja = true;
    if($do -> find(true))
    	$rta = "";
    else
    	$rta = "<a href=eliminar.php?codigo={$record[$id]} title='Eliminar el item'><img src='".PATH_gui."/images/icons/cross-circle.png' alt='' /></a>";
    return $rta;
}

/**
 * Genera un link para eliminar un registro de la tabla obtenida por GET
 *
 * @return string link al script para eliminar el registro
 * @param array $vals registro de la grilla y un string con el campo de id del registro
 */
function getEliminarDeposito($vals, $args) {
    extract($vals);
    extract($args);
    $do = DB_DataObject::factory('public_deposito');
    $do -> depo_id = $record[$id];
    $do -> depo_baja = true;
    if($do -> find(true))
    	$rta = "";
    else
    	$rta = "<a href=eliminar.php?codigo={$record[$id]} title='Eliminar el item'><img src='".PATH_gui."/images/icons/cross-circle.png' alt='' /></a>";
    return $rta;
}

function getEliminarPersonal($vals, $args) {
    extract($vals);
    extract($args);
    $do = DB_DataObject::factory('public_trabajador');
    $do -> trabajador_id = $record[$id];
    $do -> trabajador_baja = true;
    if($do -> find(true))
    	$rta = "";
    else
    	$rta = "<a href=eliminar.php?codigo={$record[$id]} title='Eliminar el item'><img src='".PATH_gui."/images/icons/cross-circle.png' alt='' /></a>";
    return $rta;
}


/**
 * Genera un link para eliminar un registro de la tabla obtenida por GET
 *
 * @return string link al script para eliminar el registro
 * @param array $vals registro de la grilla y un string con el campo de id del registro
 */
function getEliminarIva($vals, $args) {
    extract($vals);
    extract($args);
    $do = DB_DataObject::factory('public_iva');
    $do -> iva_id = $record[$id];
    $do -> iva_baja = true;
    if($do -> find(true))
    	$rta = "";
    else
    	$rta = "<a href=eliminar.php?codigo={$record[$id]} title='Eliminar el item'><img src='".PATH_gui."/images/icons/cross-circle.png' alt='' /></a>";
    return $rta;
}

/**
 * Genera un link para eliminar un registro de la tabla obtenida por GET
 *
 * @return string link al script para eliminar el registro
 * @param array $vals registro de la grilla y un string con el campo de id del registro
 */
function getEliminarUsuario($vals, $args) {
    extract($vals);
    extract($args);
    $do = DB_DataObject::factory('public_usuario');
    $do -> usr_codigo = $record[$id];
    $do -> usr_baja = true;
    if($do -> find(true))
    	$rta = "";
    else
        if($do->usr_codigo != 1)
            $rta = "<a href=eliminar.php?codigo={$record[$id]} title='Eliminar el item'><img src='".PATH_gui."/images/icons/cross-circle.png' alt='' /></a>";
        else
            $rta = "";

    return $rta;
}

/**
 * Genera un link para eliminar una app de un modulo seleccionado
 *
 * @return string link al script para eliminar el registro
 * @param array $vals registro de la grilla y un string con el campo de id del registro
 */
/*function getEliminarModuloApp($vals, $args) {
    extract($vals);
    extract($args);
    return "<a href=../modulos_aplicaciones/eliminar.php?id_app={$record[$id]}&id_modulo{$args['id_modulo']} title='Elimina la aplicacion de un modulo particular'><img src='".PATH_gui."/images/icons/cross-circle.png' alt='' /></a>";
}*/

function getBaja($vals, $args) {
    extract($vals);
    extract($args);

    if ($record[$args['id']] == 't') {
        return "<img src='" . PATH_gui . "/images/icons/status-busy.png' alt='' />";
    } else {
        return "<img src='" . PATH_gui . "/images/icons/status.png' alt='' />";
    }
}

/**
 * Genera un link para eliminar un usuario de un rol
 *
 * @return string link al script para eliminar el registro
 * @param array $vals registro de la grilla y un string con el campo de id del registro
 */
function getEliminarRolUsuario($vals, $args) {
    extract($vals);
    extract($args);
    return "<a href='../roles_usuarios/eliminar.php?rol={$args['rol_codigo']}&usuario={$record[$usr_codigo]}' title='Elimina el rol de un usuario particular'><img src='" . PATH_gui . "/images/icons/cross-circle.png' alt='' /></a>";
}

function getEliminarActivo($vals, $args) {
    extract($vals);
    extract($args);

    return "<a href='eliminar_activo_reclamo.php?reclamo_id={$record[$reclamo_id]}' title='Elimina el activo del reclamo'><img src='" . PATH_gui . "/images/icons/cross-circle.png' alt='' /></a>";
}

function getEliminarPersonalTarea($vals, $args) {
    extract($vals);
    extract($args);

    return "<a href='eliminar_personal.php?trabajador_id={$record[$trabajador_id]}' title='Elimina el personal de la tarea'><img src='" . PATH_gui . "/images/icons/cross-circle.png' alt='' /></a>";
}

function linkAppModulos($vals) {
    extract($vals);
    return "<a href='../modulos_aplicaciones/modulos_aplicaciones.php?codigo={$record['mod_codigo']}' title='Muestra las aplicaciones del modulo'><img src='" . PATH_gui . "/images/icons/application-table.png' alt='' /></a>";
}

function linkModulosApp($vals) {
    extract($vals);
    return "<a href='aplicaciones_modulos.php?codigo={$record['app_codigo']}' title='Muestra los modulos de la aplicacion'><img src='" . PATH_gui . "/images/icons/folder-open-table.png' alt='' /></a>";
}

function linkRolesUsuarios($vals) {
    extract($vals);
    return "<a href='../roles_usuarios/roles_usuarios.php?codigo={$record['rol_codigo']}' title='Muestra los usuarios del rol'><img src='" . PATH_gui . "/images/icons/user.png' alt='' /></a>";
}

function linkUsuariosRoles($vals, $args) {
    extract($vals);
    extract($args);
    return "<a href='../roles_usuarios/usuarios_roles.php?codigo={$record[$id]}' title='Muestra los roles del usuario'><img src='" . PATH_gui . "/images/icons/users.png' alt='' /></a>";
}

/**
 * Encuentra un rol en la base, no es usado en el alta, ese esta en /rules
 *
 *
 */
function encuentra_rol($fields) {
   	$do = DB_DataObject::factory('public_rol');
	$do -> rol_nombre = $fields['rol_nombre'];
	if ($do->find(true))
		{if($do -> rol_codigo != $fields['rol_codigo'])
			return array('rol_nombre' => 'El nombre ya existe');
		else
			return true;
		}
	else
	  {return true;}
}

function chequear_extension_docs() {
    //check if jpg
    if (stristr(strtolower($_FILES['archivo_nombre']['name']), '.doc') || stristr(strtolower($_FILES['archivo_nombre']['name']), '.docx')
                            || stristr(strtolower($_FILES['archivo_nombre']['name']), '.xls')  || stristr(strtolower($_FILES['archivo_nombre']['name']), '.xlsx')
                            || stristr(strtolower($_FILES['archivo_nombre']['name']), '.txt') || stristr(strtolower($_FILES['archivo_nombre']['name']), '.pdf'))
        return false;
    else
        return array('archivo_nombre' => 'Formato válido para los archivos es .doc, .docx, .xls, .xlsx, .txt');
}

function chequear_extension() {
    //check if jpg
    if (stristr(strtolower($_FILES['emp_logo_empresa']['name']), '.jpg') || stristr(strtolower($_FILES['emp_logo_empresa']['name']), '.jpeg'))
        return false;
    else
        return array('emp_logo_empresa' => 'Formato válido para la imagen es .jpg/.jpeg');
}

function encuentra_combinacion($fields) {

    if ($fields['tela_baja'] == 't') {
        $do = DB_DataObject::factory('public_combinacion');
        $do->tela_id = $fields['tela_id'];
        if ($do->find(true)) {
            return array('tela_nombre' => 'La tela está siendo usada en una combinación, debe borrar la combinacion primero.');
        } else {
            return true;
        }
    } else {
        return true;
    }
}

function encuentra_combinacion_avio($fields) {

    if ($fields['avio_baja'] == 't') {
        $do = DB_DataObject::factory('public_combinacion');
        $do->avio_id = $fields['avio_id'];
        if ($do->find(true)) {
            return array('avio_nombre' => 'El avio está siendo usada en una combinación, debe borrar la combinacion primero.');
        } else {
            return true;
        }
    } else {
        return true;
    }
}

/**
 * Encuentra una provincia en la base
 *
 *
 */
function encuentra_provincia($fields) {
    //busco que no se repita el nombre
	$do = DB_DataObject::factory('public_provincia');
	$do -> prov_nombre = $fields['prov_nombre'];
	if ($do->find(true))
		{if($do -> prov_id != $fields['prov_id'])
			return array('prov_nombre' => 'El nombre ya existe');
		else
			return true;
		}
	else
	  {return true;}
}

/**
 * Encuentra un sector en la base
 *
 *
 */
function encuentra_sector($fields) {
    //busco que no se repita el nombre
	$do = DB_DataObject::factory('public_sector');
	$do -> sec_nombre = $fields['sec_nombre'];
	if ($do->find(true))
		{if($do -> sec_codigo != $fields['sec_codigo'])
			return array('sec_nombre' => 'El nombre ya existe');
		else
			return true;
		}
	else
	  {return true;}
}

/**
 * Encuentra una aplicacion en la base
 *
 *
 */
function encuentra_aplicacion($fields) {
    $do = DB_DataObject::factory('public_aplicacion');
	$do -> app_nombre = $fields['app_nombre'];
	if ($do->find(true))
		{if($do -> app_codigo != $fields['app_codigo'])
			return array('app_nombre' => 'El nombre ya existe');
		else
			return true;
		}
	else
	  {return true;}
}

/**
 * Encuentra un acceso en la base
 *
 *
 */
function encuentra_acceso($fields) {
    $do = DB_DataObject::factory('public_tipo_acceso');
    $do->tipoacc_nombre = $fields['tipoacc_nombre'];
    $do->tipoacc_baja = 'false';
    if ($do->find(true)) {
        return array('tipoacc_nombre' => 'El nombre ya existe');
    } else {
        return true;
    }
}

/**
 * Encuentra un modulo en la base
 *
 *
 */
function encuentra_modulo($fields) {
    $do = DB_DataObject::factory('public_modulo');
	$do -> mod_nombre = $fields['mod_nombre'];
	if ($do->find(true))
		{if($do -> mod_codigo != $fields['mod_codigo'])
			return array('mod_nombre' => 'El nombre ya existe');
		else
			return true;
		}
	else
	  {return true;}
}

/**
 * Encuentra una moneda en la base
 *
 *
 */
function encuentra_moneda_codigo($fields) {
	//busco que no se repita el codigo
    $do = DB_DataObject::factory('public_moneda');
	$do -> mon_codigo = $fields['mon_codigo'];
	if ($do->find(true))
		{if($do -> mon_id != $fields['mon_id'])
			return array('mon_codigo' => 'El codigo ya existe');
		else
			return true;
		}
	else
	  {return true;}
}

/**
 * Encuentra una frecuencia
 *
 *
 */

function encuentra_frecuencia($fields) {
    $do = DB_DataObject::factory('public_frecuencia');
	$do -> frecuencia_nombre = $fields['frecuencia_nombre'];
	if ($do->find(true))
		{if($do -> frecuencia_codigo != $fields['frecuencia_codigo'])
			return array('frecuencia_nombre' => 'El nombre ya existe');
		else
			return true;
		}
	else
	  {return true;}
}




/**
 * Encuentra una moneda en la base
 *
 *
 */
function encuentra_moneda_nombre($fields) {
	//busco que no se repita el nombre
	$do = DB_DataObject::factory('public_moneda');
	$do -> mon_nombre = $fields['mon_nombre'];
	if ($do->find(true))
		{if($do -> mon_id != $fields['mon_id'])
			return array('mon_nombre' => 'El nombre ya existe');
		else
			return true;
		}
	else
	  {return true;}
}

/**
 * Encuentra un color en la base
 *
 *
 */
function encuentra_color_codigo($fields) {
	//busco que no se repita el codigo
    $do = DB_DataObject::factory('public_color');
	$do -> color_codigo = $fields['color_codigo'];
	if ($do->find(true))
		{if($do -> color_id != $fields['color_id'])
			return array('color_codigo' => 'El codigo ya existe');
		else
			return true;
		}
	else
	  {return true;}
}

/**
 * Encuentra un color en la base
 *
 *
 */
function encuentra_color_nombre($fields) {
	//busco que no se repita el nombre
	$do = DB_DataObject::factory('public_color');
	$do -> color_nombre = $fields['color_nombre'];
	if ($do->find(true))
		{if($do -> color_id != $fields['color_id'])
			return array('color_nombre' => 'El nombre ya existe');
		else
			return true;
		}
	else
	  {return true;}
}

/**
 * Encuentra una sede en la base
 *
 *
 */
function encuentra_sede_codigo($fields) {
	//busco que no se repita el codigo
    $do = DB_DataObject::factory('public_sede');
	$do -> sede_codigo = $fields['sede_codigo'];
	if ($do->find(true))
		{if($do -> sede_id != $fields['sede_id'])
			return array('sede_codigo' => 'El codigo ya existe');
		else
			return true;
		}
	else
	  {return true;}
}

/**
 * Encuentra una sede en la base
 *
 *
 */
function encuentra_sede_nombre($fields) {
	//busco que no se repita el nombre
	$do = DB_DataObject::factory('public_sede');
	$do -> sede_nombre = $fields['sede_nombre'];
	if ($do->find(true))
		{if($do -> sede_id != $fields['sede_id'])
			return array('sede_nombre' => 'El nombre ya existe');
		else
			return true;
		}
	else
	  {return true;}
}

/**
 * Encuentra una familia en la base
 *
 *
 */
function encuentra_familia_codigo($fields) {
	//busco que no se repita el codigo
    $do = DB_DataObject::factory('public_familia');
	$do -> fam_codigo = $fields['fam_codigo'];
	if ($do->find(true))
		{if($do -> fam_id != $fields['fam_id'])
			return array('fam_codigo' => 'El codigo ya existe');
		else
			return true;
		}
	else
	  {return true;}
}

/**
 * Encuentra una familia en la base
 *
 *
 */
function encuentra_familia_nombre($fields) {
	//busco que no se repita el nombre
	$do = DB_DataObject::factory('public_familia');
	$do -> fam_nombre = $fields['fam_nombre'];
	if ($do->find(true))
		{if($do -> fam_id != $fields['fam_id'])
			return array('fam_nombre' => 'El nombre ya existe');
		else
			return true;
		}
	else
	  {return true;}
}

/**
 * Encuentra un estado en la base
 *
 *
 */
function encuentra_estado_codigo($fields) {
	//busco que no se repita el codigo
    $do = DB_DataObject::factory('public_estado');
	$do -> estado_codigo = $fields['estado_codigo'];
	if ($do->find(true))
		{if($do -> estado_id != $fields['estado_id'])
			return array('estado_codigo' => 'El codigo ya existe');
		else
			return true;
		}
	else
	  {return true;}
}

/**
 * Encuentra un estado en la base
 *
 *
 */
function encuentra_estado_nombre($fields) {
	//busco que no se repita el nombre
	$do = DB_DataObject::factory('public_estado');
	$do -> estado_nombre = $fields['estado_nombre'];
	if ($do->find(true))
		{if($do -> estado_id != $fields['estado_id'])
			return array('estado_nombre' => 'El nombre ya existe');
		else
			return true;
		}
	else
	  {return true;}
}

/**
 * Encuentra una iva en la base
 *
 *
 */
function encuentra_iva_codigo($fields) {
	//busco que no se repita el codigo
    $do = DB_DataObject::factory('public_iva');
	$do -> iva_codigo = $fields['iva_codigo'];
	if ($do->find(true))
		{if($do -> iva_id != $fields['iva_id'])
			return array('iva_codigo' => 'El codigo ya existe');
		else
			return true;
		}
	else
	  {return true;}
}

/**
 * Encuentra una iva en la base
 *
 *
 */
function encuentra_iva_nombre($fields) {
	//busco que no se repita el nombre
	$do = DB_DataObject::factory('public_iva');
	$do -> iva_nombre = $fields['iva_nombre'];
	if ($do->find(true))
		{if($do -> iva_id != $fields['iva_id'])
			return array('iva_nombre' => 'El nombre ya existe');
		else
			return true;
		}
	else
	  {return true;}
}

/**
 * Encuentra una empresa en la base
 *
 *
 */
function encuentra_empresa_nombre($fields) {
	//busco que no se repita el nombre
	$do = DB_DataObject::factory('public_empresa');
	$do -> emp_nombre = $fields['emp_nombre'];
	if ($do->find(true))
		{if($do -> emp_codigo != $fields['emp_codigo'])
			return array('emp_nombre' => 'El nombre ya existe');
		else
			return true;
		}
	else
	  {return true;}
}

/**
 * Encuentra una localidad en la base
 *
 *
 */
function encuentra_localidad($fields) {
	//busco que no se repita el nombre
	$do = DB_DataObject::factory('public_localidad');
	$do->localidad_nombre = $fields['localidad_nombre'];
	if ($do->find(true))
		{if($do->localidad_id != $fields['localidad_id'])
			return array('localidad_nombre' => 'El nombre ya existe');
		else
			return true;
		}
	else
	  {return true;}
}

/**
 * Encuentra un deposito en la base
 *
 *
 */
function encuentra_deposito_codigo($fields) {
	//busco que no se repita el codigo
    $do = DB_DataObject::factory('public_deposito');
	$do -> depo_codigo = $fields['depo_codigo'];
	if ($do->find(true))
		{if($do -> depo_id != $fields['depo_id'])
			return array('depo_codigo' => 'El codigo ya existe');
		else
			return true;
		}
	else
	  {return true;}
}

/**
 * Encuentra un deposito en la base
 *
 *
 */
function encuentra_deposito_nombre($fields) {
	//busco que no se repita el nombre
	$do = DB_DataObject::factory('public_deposito');
	$do -> depo_nombre = $fields['depo_nombre'];
	if ($do->find(true))
		{if($do -> depo_id != $fields['depo_id'])
			return array('depo_nombre' => 'El nombre ya existe');
		else
			return true;
		}
	else
	  {return true;}
}

/**
 * Encuentra un usuario en la base
 *
 *
 */
function encuentra_usuario($fields) {
    $do = DB_DataObject::factory('public_usuario');
	$do -> usr_nombre_apellido = $fields['usr_nombre_apellido'];
	if ($do->find(true))
		{if($do -> usr_codigo != $fields['usr_codigo'])
			return array('usr_usuario' => 'El usuario ya existe');
		else
			return true;
		}
	else
	  {return true;}
}

/**
 * Devuelve el nombre de la app
 * @param <array> $vals
 * @param <array> $args
 * @return <string>
 */
function getNombreApp($vals, $args) {
    extract($vals);
    extract($args);
    if ($record['app_nombre'])
        return $record['app_nombre'];
    else
        return '<p>' . $record[$id] . '</p>';
}

/**
 * Devuelve el nombre de la acceso
 * @param <array> $vals
 * @param <array> $args
 * @return <string>
 */
function getNombreAcceso($vals, $args) {
    extract($vals);
    extract($args);
    if ($record['tipoacc_nombre'])
        return $record['tipoacc_nombre'];
    else
        return '<p>' . $record[$id] . '</p>';
}

/**
 * Devuelve el nombre del rol
 * @param <array> $vals
 * @param <array> $args
 * @return <string>
 */
function getNombreRol($vals, $args) {
    extract($vals);
    extract($args);
    if ($record['rol_nombre'])
        return $record['rol_nombre'];
    else
        return '<p>' . $record[$id] . '</p>';
}

function getMail($vals, $args) {
    extract($vals);
    extract($args);

    if ($record[$args['id']])
        return '<a href="mailto:'.$record[$id].'" title="'.$record[$id].'">' . $record[$id] . '</a>';
}

function getNombre($vals, $args) {
    extract($vals);
    extract($args);

    if ($record[$args['id']])
        return $record[$args['id']];
    else
        return '<p>' . $record[$id] . '</p>';
}

function getNombreArchivo($vals, $args) {
    extract($vals);
    extract($args);

    if ($record[$args['id']]){

        if(stristr(strtolower($record[$args['id']]),'.pdf')) {
                return '<a href="'. PATH_gui . '/uploads/'.$record[$args['id']].'" title="Ver item"><img src="' . PATH_gui . '/images/icons/document-pdf.png" alt="" /></a>';
        }
        elseif(stristr(strtolower($record[$args['id']]),'.doc')) {
                return '<a href="'. PATH_gui . '/uploads/'.$record[$args['id']].'" title="Ver item"><img src="' . PATH_gui . '/images/icons/document-office.png" alt="" /></a>';
        }
        elseif(stristr(strtolower($record[$args['id']]),'.docx')) {
                return '<a href="'. PATH_gui . '/uploads/'.$record[$args['id']].'" title="Ver item"><img src="' . PATH_gui . '/images/icons/document-office.png" alt="" /></a>';
        }
        elseif(stristr(strtolower($record[$args['id']]),'.xls')) {
                return '<a href="'. PATH_gui . '/uploads/'.$record[$args['id']].'" title="Ver item"><img src="' . PATH_gui . '/images/icons/document-office.png" alt="" /></a>';
        }
        elseif(stristr(strtolower($record[$args['id']]),'.xlsx')) {
                return '<a href="'. PATH_gui . '/uploads/'.$record[$args['id']].'" title="Ver item"><img src="' . PATH_gui . '/images/icons/document-office.png" alt="" /></a>';
        }
        elseif(stristr(strtolower($record[$args['id']]),'.txt')) {
                return '<a href="'. PATH_gui . '/uploads/'.$record[$args['id']].'" title="Ver item"><img src="' . PATH_gui . '/images/icons/document-text.png" alt="" /></a>';
        }
        elseif ((stristr(strtolower($record[$args['id']]),'.jpg')) || (stristr(strtolower($record[$args['id']]),'.png'))) {
                return '<a href="'. PATH_gui . '/uploads/'.$record[$args['id']].'" title="Ver item" name="lightbox"><img src="' . PATH_gui . '/images/icons/document-image.png" alt="" /></a>';
        }
        else {
                return '<a href="'. PATH_gui . '/uploads/'.$record[$args['id']].'" title="Ver item"><img src="' . PATH_gui . '/images/icons/document-text.png" alt="" /></a>';
        }
     }

}

function getNombreCompr($vals, $args) {
    extract($vals);
    extract($args);

    $nombre = explode(',',$record[$id]);
     return $nombre[2];
}

/**
 * Devuelve el nombre del modulo
 * @param <array> $vals
 * @param <array> $args
 * @return <string>
 */
function getNombreModulo($vals, $args) {
    extract($vals);
    extract($args);
    if ($record[$id]) {
        $do_app = DB_DataObject::factory('public_aplicacion');
        $do_app->app_codigo = $record[$id];
        if ($do_app->find(true))
            $id_modulo = $do_app->mod_codigo;
        $do_modulo = DB_DataObject::factory('public_modulo');
        $do_modulo->mod_codigo = $id_modulo;
        if ($do_modulo->find(true))
            return $do_modulo->mod_nombre;
    }
}

/**
 * Obtiene el id de un usuario y un link para visualizar los roles del mismo
 *
 * @return string id de un usuario en un link para visualizar sus roles si posee acceso
 * @param array $vals registro de la grilla, Id de rol y si tiene acceso
 */
function getNombreUsuario($vals, $args) {
    if ($record['usr_usuario'])
        return $record['usr_usuario'];
    else
        return '<p>' . $record[$id] . '</p>';
}

/**
 * Crea link para asignar un rol a un usuario
 *
 *
 */
function asignarRolUsuario($vals, $args) {
    extract($vals);
    extract($args);
    if ($record[$id_usuario]) {
        $do = DB_DataObject::factory('public_usuario_rol');
        $do->usr_codigo = $record[$id_usuario];
        $do->rol_codigo = $args['id_rol'];
        if ($do->find(true)) {
            $rta = 'Rol asignado correctamente';
        } else {
            $rta = '<a title="Asigna rol a usuario" href="../roles_usuarios/agregar_rol_usuario.php?usr_codigo=' . $record[$id_usuario] . '&rol_codigo=' . $args['id_rol'] . '">Asignar rol</a>';
        }
    }
    return $rta;
}

function asignarTareaUsuario($vals, $args) {
    extract($vals);
    extract($args);
    if ($record[$trabajador_id]) {
        $do = DB_DataObject::factory('public_tareas_trabajadores');
        $do->trabajador_id = $record[$trabajador_id];
        $do->tarea_id = $args['tarea_id'];
        if ($do->find(true)) {
            $rta = 'Usuario asignado correctamente';
        } else {
            $rta = '<a title="Asigna tarea a usuario" href="asignar_tarea_personal.php?trabajador_id=' . $record[$trabajador_id] . '&tarea_id=' . $args['tarea_id'] . '">Asignar tarea</a>';
        }
    }
    return $rta;
}

/**
 * Crea link para asignar una app a un modulo
 *
 *
 */
function asignarModuloApp($vals, $args) {
    extract($vals);
    extract($args);
    if ($record[$id_app]) {
        $do = DB_DataObject::factory('public_aplicacion'); //deberia buscar q no tenga modulo
        $do->app_codigo = $record[$id_app];
        $do->whereAdd('mod_codigo is null');
        if ($do->find(true)) {
            $rta = '<a title="Asigna rol a usuario" href="../modulos_aplicaciones/agregar_mod_app.php?app_codigo=' . $record[$id_app] . '&mod_codigo=' . $args['id_modulo'] . '">Asignar modulo</a>';
        } else {
            $rta = 'Aplicacion ya asignada';
        }
    }
    return $rta;
}

/**
 * Genera un link para modificar un registro de la tabla obtenida por GET
 *
 * @return string link al script para modificar el registro
 * @param array $vals registro de la grilla y un string con el campo de id del registro
 */
function agregarModApp($vals, $args) {
    extract($vals);
    extract($args);
    return "<a href=aplicaciones_modulos.php?codigo={$record[$id]} title='Agregar un modulo a la aplicacion'>[Agregar]</a>";
}

/**
 * Muestra el nombre del material en el alta de tela
 *
 */
function getNombreMaterial($id) {
    $do_material = DB_DataObject::factory('public_material');
    $do_material->mat_id = $id;
    if ($do_material->find(true))
        return($do_material->mat_nombre);
}

/**
 * Muestra el nombre de la temporada en el alta de tela
 *
 */
function getNombreTemporada($id) {
    $do_temporada = DB_DataObject::factory('public_temporada');
    $do_temporada->tempo_id = $id;
    if ($do_temporada->find(true))
        return($do_temporada->tempo_nombre);
}

/**
 * Muestra el nombre del color en el alta de tela
 *
 */
function getNombreColor($id) {
    $do_color = DB_DataObject::factory('public_color');
    $do_color->color_id = $id;
    if ($do_color->find(true))
        return($do_color->color_nombre);
}

function formatoFechaSimple($fecha = null) {
    if (($fecha==null) || ($fecha==''))
        return null;
    else {
        //Armo los meses
        $fechaInicial = explode("/", $fecha);
        $dia = $fechaInicial[0];
        $mes = $fechaInicial[1];
        $ano = $fechaInicial[2];
        $fecha = $ano . "-" . $mes . "-" . $dia;
        return $fecha;
   }
}

function getFechaSimple($fecha = null) {
    if($fecha != null){
        //Armo los meses
        $fechaInicial = explode("-", $fecha);
        $dia = $fechaInicial[2];
        $mes = $fechaInicial[1];
        $ano = $fechaInicial[0];
        $fecha = $dia . "/" . $mes . "/" . $ano;
        return $fecha;
    }
    else{
        return '';
    }
}

	/**
	 * Convierte la fecha en formato dd/mm/aaaa
	 *
	 * @param unknown_type $fecha
	 * @return unknown
	 */
function getFecha($vals, $args) {

        extract($vals);
        extract($args);

                if($record[$id] != null){
                    $fechaInicial = explode("-", $record[$id]);
                    $dia = $fechaInicial[2];
                    $mes = $fechaInicial[1];
                    $ano = $fechaInicial[0];
                    $fecha = $dia . "/" . $mes . "/" . $ano;
                    return $fecha;
                }
	}


function encuentra_unidad_medida($fields) {
	$do = DB_DataObject::factory('public_unidad_medida');
	$do->unimed_nombre = $fields['unimed_nombre'];
	if ($do->find(true)) {
	 if($do->unimed_id != $fields['unimed_id'])
			return array('unimed_nombre' => 'El nombre ya existe');
		else {
			return true;
		}
	}
	else {
	  return true;
  }
}


function encuentra_dato_precodificado($fields) {
	$do = DB_DataObject::factory('public_dato_precodificado');
	$do->datoprecod_descripcion = $fields['datoprecod_descripcion'];
	if ($do->find(true)) {
	 if($do->datoprecod_id != $fields['datoprecod_id'])
			return array('datoprecod_descripcion' => 'El nombre ya existe');
		else {
			return true;
		}
	}
	else {
	  return true;
  }
}


function getImporte($vals, $args) {
    extract($vals);
    extract($args);
    return '$ '.number_format($record[$valor],2);
}


function getSaldo($vals, $args) {
    extract($vals);
    extract($args);
    return '$ '.number_format($record[$total1] - $record[$total2], 2);
}


function FechaDesdeArray($fecha) {
  if (strlen($fecha['m'])==1) $fecha['m'] = '0'.$fecha['m'];
  if (strlen($fecha['d'])==1) $fecha['d'] = '0'.$fecha['d'];
  return $fecha['Y'].'-'.$fecha['m'].'-'.$fecha['d'];
}


function getTareasProyecto($vals, $args) {
  extract($vals);
  extract($args);
	$do = DB_DataObject::factory('Public_tarea');
	$do->proyecto_id = $record[$id];
	return $do->find();
}

function getSiNo($vals, $args) {
  extract($vals);
  extract($args);
  if ($record[$id]=='t') return "Si";
	else return "No";
}

function getTareasRelizadas($vals, $args) {
  extract($vals);
  extract($args);
	$do = DB_DataObject::factory('Public_tarea');
	$do->proyecto_id = $record[$id];
	$do->estado_id = 3;
	return $do->find();
}

function getPeriodoMedicion($vals, $args) {
  extract($vals);
  extract($args);
	return $record[$mes].' '.$record[$ano];
}

function getInfoCuenta($vals, $args) {
$cadena='';
extract($vals);
 extract($args);
 $do = DB_DataObject::factory('public_dependencia_cuenta_edenor');
 	$do->whereAdd("dep_id=".$record[$id]);
 //$do->dep_id = $record[$id];
 $do->orderBy('dep_cuenta_edenor');

   if ($do->find()) {
            while ($do->fetch()) {
				if (!empty($cadena)) $cadena=$cadena.'/';
                $cadena .= $do->dep_cuenta_edenor;
            }
    }

  return $cadena;
}

function getInfoMedidor($vals, $args) {
  $cadena='';
  extract($vals);
  extract($args);
  $do = DB_DataObject::factory('public_dependencia_medidor');
  $do->whereAdd("dep_id=".$record[$id]);
  $do->orderBy('depmedidor_numero');
  $do->find();

  while ($do->fetch()) {
    if (!empty($cadena)) $cadena=$cadena.'/';
    $cadena .= $do->depmedidor_numero;
  }
  return $cadena;
}

function getInfoCuentaUltima($vals, $args) {
  extract($vals);
  extract($args);

  $dce = DB_DataObject::factory('public_dependencia_cuenta_edenor');
  $cuentas = $dce->getItems($record[$id]);

  if (count($cuentas)==0) $cuenta = '';
  else $cuenta = $cuentas[count($cuentas)-1];

  return $cuenta;
}

function getInfoMedidorUltimo($vals, $args) {
  extract($vals);
  extract($args);

  $dce = DB_DataObject::factory('public_dependencia_medidor');
  $items = $dce->getItems($record[$id]);

  if (count($items)==0) $nro = '';
  else $nro = $items[count($items)-1];

  return $nro;
}

function encuentra_calle($fields) {
	$do = DB_DataObject::factory('public_calle');
	$do->whereAdd("calle_nombre ILIKE '".$fields['calle_nombre']."'");
	if ($do->find(true)) {
	 if($do->calle_id != $fields['calle_id'])
			return array('calle_nombre' => 'El nombre ya existe');
		else {
			return true;
		}
	}
	else {
    return true;
  }
}


function encuentra_tipo_nota($fields) {
	$do = DB_DataObject::factory('public_tipo_nota');
	$do->tiponota_descripcion = $fields['tiponota_descripcion'];
	if ($do->find(true)) {
    if($do->tiponota_id != $fields['tiponota_id'])
			return array('tiponota_descripcion' => 'El tipo de nota ya existe');
		else {
			return true;
		}
	}
	else {
    return true;
  }
}


function buscarValorPromedio($dep_id, $datoprecod_id, $fecha, $cantValores) {
  $do = DB_DataObject::factory('public_factura');
    $do_fct = DB_DataObject::factory('public_factura_configuracion_tarifa');
      $do_ct = DB_DataObject::factory('public_configuracion_tarifa');
        $do_dp = DB_DataObject::factory('public_dato_precodificado');
          $do_um = DB_DataObject::factory('public_unidad_medida');
        $do_dp->joinAdd($do_um);
      $do_ct->joinAdd($do_dp);
      $do_ct->datoprecod_id = $datoprecod_id;
    $do_fct->joinAdd($do_ct);
    $do_fct->factconftar_excluir_promedio = false;
  $do->joinAdd($do_fct);

  $do->dep_id = $dep_id;
  $do->whereAdd("fact_fecha < '".$fecha."'");
  $do->orderBy('factura.fact_fecha DESC, factura.fact_id DESC');
  $do->find();

  $suma = 0;
  $cant = 0;
  while ($do->fetch()) {
    if ($do->factconftar_valor > 0) {
      $suma += $do->factconftar_valor;
      $cant++;

      if ($cant >= $cantValores){
        break;
      }
    }
  }

  if ($cant==0) return 0;
  else return $suma/$cant;
}
?>