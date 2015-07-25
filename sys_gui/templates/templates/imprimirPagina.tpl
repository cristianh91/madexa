<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>
<head>
   <meta http-equiv="X-UA-Compatible" content="IE=8" />
   <title>{$webTitulo}</title>

    <link rel="stylesheet" href="{$path_gui}/yui/build/reset-fonts-grids/reset-fonts-grids.css" type="text/css">
    <link rel="stylesheet" href="{$path_gui}/css/estilos.css" type="text/css">

   <link type="text/css" rel="stylesheet" media="screen" href="{$path_gui}/css/ddsmoothmenu.css" />
   <link type="text/css" rel="stylesheet" media="screen" href="{$path_gui}/css/ddsmoothmenu-v.css" />
   
    <script type="text/JavaScript">
        baseurl = "{$baseurl}";
    </script>
   
   <script type="text/JavaScript" src="{$path_gui}/js/jquery-1.3.2.min.js"></script>
   <script type="text/JavaScript" src="{$path_gui}/js/ddsmoothmenu.js"></script>
   <script type="text/JavaScript" src="{$path_gui}/js/jquery.curvycorners.min.js"></script>

{literal}
  <script type="text/javascript">
  function CloseWin(){
  	window.opener = top ;
  	window.close();
  }
  
  function imprimir() {
    if (window.print) window.print()
    else alert("Disculpe, su navegador no soporta esta opción.");
  }
  </script>
{/literal}
{include file="js.tpl"}
</head>

<body class="yui-skin-sam">
  <div id="bd" role="main">
    <div class="yui-g">
      <div id="opcionesImprimir"><a href="javascript:imprimir()">Imprimir</a> | <a href="javascript:CloseWin()">Cerrar</a></div>
      <h2>{$secTitulo}</h2>
      <div align="center">
        {$body}
      </div>
    </div>
  </div>
</body>

</html>