<?php
/**
 * Table Definition for usuario
 */
require_once 'DB/DataObject.php';

class DataObjects_Usuario extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'usuario';                         // table name
    public $id_usuario;                      // int(11)  not_null primary_key auto_increment
    public $nombre_de_usuario;               // string(255)  not_null
    public $contrasenia;                     // string(255)  
    public $id_persona;                      // int(11)  not_null multiple_key
    public $rol_id_rol;                      // int(11)  not_null multiple_key

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Usuario',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE

    public $fb_linkDisplayFields = array('nombre_de_usuario');
    public $fb_fieldLabels = array(
        'nombre_de_usuario' => 'Usuario: ',
        'contrasenia' => 'Clave: ',
        'id_persona' => 'Persona: ',
        'rol_id_rol' => 'Rol: '
    );
     function preGenerateForm(&$fb) {
        $this->fb_formHeaderText = "Usuario";
        //DB_DataObject::debugLevel(1);
	 	$sol = DB_DataObject::factory('persona');
//        $cli = DB_DataObject::factory('cliente');
//        $sol->joinAdd($cli);
        $sol->find();
        $solicitudes = array();
	 	while ($sol->fetch()) {
	 		$solicitudes[$sol->id_persona] = "ID: ".$sol->id_persona." - ".$sol->nombre." ".$sol->apellido;
	 	}

        $this->fb_preDefElements['id_persona'] = HTML_QuickForm::createElement('select', 'id_persona', 'Persona: ', $solicitudes);
    }


        public function validarUsuario($usuario = null, $password = null) {
        //DB_DataObject::debugLevel(1);
        $this->nombre_de_usuario = $usuario;
        $this->contrasenia = md5($password);
        $do_persona = DB_DataObject::factory('Persona');
        $this->joinAdd($do_persona);
        $do_rol = DB_DataObject::factory('Rol');
        $this->joinAdd($do_rol);
        $users = array();
        $this->orderBy('id_usuario');
        if ($this->find()) {
            while ($this->fetch()) {
                $users['id_usuario'] = $this->id_usuario;
                $users['nombre_de_usuario'] = $this->nombre_de_usuario;
                $users['nombre_apellido'] = $this->nombre." ".$this->apellido;
                $users['mail'] = $this->mail;
                $users['rol'] = $this->nombre_rol;
            }
        }

        if (count($users)> 0) {
            session_start();
            session_set_cookie_params(5000);
            $sess_usuarios = $this->armarPermisos($users);
            $_SESSION['usuario']['permisos']= $sess_usuarios['usuario'];
            $_SESSION['usuario']['datos'] = $users;

            return true;
        } else {
            return false;
        }
    }

    public function armarPermisos($users = null) {
        $usuarios = array();


        foreach ($users as $key => $user) {
            //chequear si es modulo o aplicacion lo que esta cargando
//            $usuarios['usuario']['permisos'][$user->mod_nombre][$user->tipoacc_nombre] = $user->tipoacc_nombre;
//            //$usuarios['usuario']['permisos'][$user->mod_nombre][$user->app_nombre][$user->tipoacc_nombre] = $user->tipoacc_nombre;
//            if ($user->app_nombre != '')
//                $usuarios['usuario']['permisos'][$user->mod_nombre][$user->app_nombre][$user->tipoacc_nombre] = $user->tipoacc_nombre;
//            else
//                $usuarios['usuario']['permisos'][$user->mod_nombre][$user->mod_nombre][$user->tipoacc_nombre] = $user->tipoacc_nombre;
        }
        //Fecha de acceso
        $usuarios['usuario']['fecha_acceso'] = date("Y-m-d H:i:s");
        $usuarios['usuario']['minutos_control'] = 10;
        //print_r($usuarios);
        //exit();
        return $usuarios;
    }


}
