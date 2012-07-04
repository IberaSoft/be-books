<?php
  session_start();
  if ($_SESSION["permiso"] == false){
  echo "UD NO SE HA LOGUEADO!!!!";
  echo "<a href='home.html'>Volver a Principal</a>";
  exit;
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" dir="ltr">
  <head>
    <title>Panel de Control</title>
    <!-- Contenido -->
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta http-equiv="Content-Language" content="es" />
    <meta http-equiv="last-modified" content="23/07/2009 20:58:21" />
    <meta http-equiv="Content-Type-Script" content="text/javascript" />
    <meta name="description" content="panel de control" />
    <meta name="keywords" content="" />
    <!-- Posicionamiento -->
    <meta http-equiv="Expires" content="0" />
    <meta name="Resource-Type" content="document" />
    <meta name="Distribution" content="global" />
    <meta name="Robots" content="index, follow" />
    <meta name="Revisit-After" content="21 days" />
    <meta name="Rating" content="general" />

    <!-- Otros -->
    <meta name="Author" content="IberaSoft" />
    <meta name="Generator" content="PSPad editor, www.pspad.com" />
    <meta http-equiv="ImageToolbar" content="False" />
    <meta name="MSSmartTagsPreventParsing" content="True" />
    <link rel="Shortcut Icon" href="favicon.ico" type="image/x-icon" />
    <!-- Mapa del Sitio -->
    <link rel="sitemap" href="sitemap.xml" title="Mapa general del sitio" />
    <!-- Resoluciones -->
    <script type="text/javascript" src="res/x5engine.js"></script>
    <link rel="stylesheet" type="text/css" href="res/styles.css" media="screen, print" />
    <link rel="stylesheet" type="text/css" href="res/template.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="res/print.css" media="print" />
    <!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="res/iebehavior.css" media="screen" /><![endif]-->
    <script type="text/javascript" src="res/x5cart.js"></script>
    <link rel="stylesheet" type="text/css" href="res/handheld.css" media="handheld" />
    <link rel="alternate stylesheet" title="Alto contraste - Accesibilidad" type="text/css" href="res/accessibility.css" media="screen" />
  </head>
  <body>
    <div id="imSite">
      <!--Buscar-->
      <div id="imHeader">	<h1>BeBooks</h1>
        <div style="left: 737px; top: 82px; width: 224px; height: 21px; ">
          <form id="imSearch_01" action="imsearch.php" method="get" style="white-space: nowrap">
            <fieldset>
              <input type="text" name="search" value="" style="width: 145px; font: 11px Tahoma; color: #000000; background: #FFFFFF url('res/imsearch.gif') no-repeat 3px; padding: 3px 3px 3px 21px; border: 1px solid #000000; vertical-align: middle" />
              <span style="font: 11px Tahoma; color: #000000; background-color: #C0C0C0; padding: 3px 6px 3px 6px; border: 1px solid #000000; vertical-align: middle; cursor: pointer; " onclick="imGetLayer('imSearch_01').submit();" >Buscar
              </span>
            </fieldset>
          </form>
        </div>
        <!-- Imagen BeBooks -->
      <img src="res/top_sinicono.jpg" alt="" title="bebooks" border=0 />
      <!-- Imagen BeBooks -->
      </div>
      <!--Fin Buscar-->

      <div id="imBody" >
        <div >
          <!-- Menu -->
          <div id="imMnMn">
            <ul>
              <li>
              <a href="mostrar(usu).php" title="">Usuarios</a></li>	<li>
              <a href="mostrar(libros).php" title="">Libros</a></li><li>
              <a href="mostrar(autores).php" title="">Autores</a></li><li>
              <a href="mostrar(ventas).php" title="">Ordenes</a></li>	<li>
              </li>
            </ul>
            <!-- Boton Desconectarse -->
          <div style="width:96%;">
              <a href="catalogo.html" style="text-decoration: none; float:right;"><img src="assets/images/desconectar.jpg" alt="" title="Desconectarse" border=0 /></a>&nbsp;
          </div>
          <!-- Fin Boton Desconectarse -->
          </div>
          <!-- Fin Menu -->
        </div>

        <div id="imContent">
        <div ><h2>Bienvenido al Panel de Control</h2></div>
            <!-- Cuerpo Pagina -->
            <div id="imPage" style="margin:0 auto;padding:0px 0px 0px 360px;">
              <img src="assets/images/fondo_pc.jpg" alt="" title="" border=0 />
            </div>
            <!-- Fin Cuerpo Pagina -->

        </div>
        <!-- Copiright -->
        <div id="imFooter" style="text-align:center;">&#169; Copyright 2009 | Juan Cruz | Dani | Rosa </div>
        <!-- Fin Copiright -->
      </div>
    </div>

  </body>
</html>