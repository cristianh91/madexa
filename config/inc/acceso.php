<?php

require_once(PATH_INC . '/pear.inc');

Class Acceso {

    public function findPermiso($permisos, $tipoacceso) {

        if ($permisos == $tipoacceso) {
            return 1;
        } else {
            return 0;
        }
    }

    public function verificarAcceso($permisos, $pagina, $tipoacceso, $usuario) {
        //Guardo de que pagina viene
        unset ($_SESSION['no_autorizado']);
        $_SESSION['no_autorizado'] = strtoupper($pagina) . ' (Permisos requeridos: "' . $tipoacceso . '")';
        
        $no_acceso = array();

        foreach ($permisos as $key => $perm) {
            foreach ($perm as $key_a => $perm_a) {
                if(is_array($perm_a)){
                    foreach($perm_a as $key_aa => $perm_aa){
                        if (strtolower($key_a) == strtolower($pagina)) {
                            $no_acceso[] = self::findPermiso($perm_aa, $tipoacceso);
                        }
                    }
                }
            }
        }

        foreach($no_acceso as $val){
            if($val == 1)
                return 1;
        }

        //return 1;

//        return 0;
//        var_dump($no_acceso);
//        exit;
//
//        if (array_search(1, $no_acceso))
//            return 1;
//        else {
//            return 0;
//        }
    }

}
?>