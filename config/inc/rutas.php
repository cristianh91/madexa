<?php

function rutas()
{
    $ruta_mod = str_replace("_", " ", str_replace(".php", "", (str_replace(PATH_APP, '', $_SERVER['REQUEST_URI']))));
    $ruta_aux = str_replace("-", " ",$ruta_mod);

    if(strpos($ruta_aux, "?") !== false){
        $ruta_libre = substr_replace($ruta_aux, '', strpos($ruta_aux, "?"));
        $ruta_exp = explode('/', $ruta_libre);
    }
    else{
        $ruta_exp = explode('/', $ruta_aux);
    }


    foreach ($ruta_exp as $k => $ru) {
        if ($ru == '')
            unset($ruta_exp[$k]);
        if($ru == 'index')
            unset($ruta_exp[$k]);

        if($ru == 'swtextil')
            unset($ruta_exp[$k]);

    }

    $ruta_temp = strtoupper(implode(' : ', $ruta_exp));
    $ruta_temp2 = str_replace("SWCONTROLTAREAS : SYS MODULES : ", '', $ruta_temp);
    $ruta = str_replace("PARAMETROS : ", '', $ruta_temp2);
    return $ruta;
}

?>
