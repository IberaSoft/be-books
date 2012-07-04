<?php
session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" dir="ltr">
  <head>
    <title>Publica tus Libros</title>
    <!-- Contenido -->
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta http-equiv="Content-Language" content="es" />
    <meta http-equiv="last-modified" content="23/07/2009 20:58:21" />
    <meta http-equiv="Content-Type-Script" content="text/javascript" />
    <meta name="description" content="Un lugar donde podras publicar, vender y enterarte de novedades del mundo del libro..." />
    <meta name="keywords" content="libro novelas publicar comprar" />
    <!-- Posicionamiento -->
    <meta http-equiv="Expires" content="0" />
    <meta name="Resource-Type" content="document" />
    <meta name="Distribution" content="global" />
    <meta name="Robots" content="index, follow" />
    <meta name="Revisit-After" content="21 days" />
    <meta name="Rating" content="general" />
    <!-- RSS Feed -->
    <link rel="alternate" type="application/rss+xml" title="Noticias" href="http://www.bebooks.es/x5rssfeed.xml" />
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
    <link rel="stylesheet" type="text/css" href="res/imcart.css" media="screen, print" />
    <!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="res/iebehavior.css" media="screen" /><![endif]-->
    <link rel="stylesheet" type="text/css" href="res/p003.css" media="screen, print" />
    <script type="text/javascript" src="res/x5cart.js"></script>
    <link rel="stylesheet" type="text/css" href="res/handheld.css" media="handheld" />
    <link rel="alternate stylesheet" title="Alto contraste - Accesibilidad" type="text/css" href="res/accessibility.css" media="screen" />
  </head>
  <body>
    <div id="imSite">
      <!--Buscar-->
      <div id="imHeader">	 	<h1>BeBooks</h1>
        <div style="left: 737px; top: 82px; width: 224px; height: 21px; ">
          <form id="imSearch_01" action="imsearch.php" method="get" style="white-space: nowrap">
            <fieldset>
              <input type="text" name="search" value="" style="width: 145px; font: 11px Tahoma; color: #000000; background: #FFFFFF url('res/imsearch.gif') no-repeat 3px; padding: 3px 3px 3px 21px; border: 1px solid #000000; vertical-align: middle" />
              <span style="font: 11px Tahoma; color: #000000; background-color: #C0C0C0; padding: 3px 6px 3px 6px; border: 1px solid #000000; vertical-align: middle; cursor: pointer; " onclick="imGetLayer('imSearch_01').submit();" >Buscar
              </span>
              </fieldset>
          </form>
        </div>
        <div id="imMEObj_20" style="left: 898px; top: 34px; width: 22px; height: 32px;" onclick="imOpenLocation('javascript:window.external.AddFavorite(\'http://bebooks.es\',\'BeBooks\');')" >
        </div>
        <div id="imMEObj_30" style="left: 937px; top: 36px; width: 19px; height: 31px;" onclick="imOpenLocation('x5rssfeed.xml')" >
        </div>
      </div>
      <!--Fin Buscar-->
      <div class="imInvisible">
        <hr />
        <a href="#imGoToCont" title="Saltar el men� principal">Ir al Contenido</a>
      </div>
      <div id="imBody">
        <div >
          <!-- Menu -->
          <a name="imGoToMenu"></a>
          <p class="imInvisible">Men� Principal:
          </p>
          <div id="imMnMn">
            <ul>	<li>
              <a href="home.html" title="">Principal</a></li><li>
              <a href="publi_libros.html" title="">Publicar</a></li><li>
              <a href="nosotros.html" title="">Nosotros</a></li>	<li>
              <a href="contacto.html" title="">Contacto</a></li>	<li>
              <a href="foro/index.php" title="">Foros</a></li>	<li>
              <a href="blog/index.php" title="">Blog</a></li><li>
              <a href="catalogo.html" title="">Catalogo</a></li>
            </ul>
          </div>
          <!-- Fin Menu-->
        </div>
        <hr class="imInvisible" />
        <a name="imGoToCont"></a>
        <div id="imContent">
          <!-- Cuerpo Pagina -->
          <h2>Publica tus Libros</h2>
          <div id="imPage">
            <div style="padding: 0; text-align: left; margin: 20px 0 0 20px;font: bold 13px Arial; color: #000000;">
                <?php echo "Bienvenido/a ".$_SESSION['nombre']; ?>
            </div>

            <div>
               <div style="font: bold 11px Arial;border:1px solid gray;width:249px;text-align:left;margin:0 auto;padding:12px;">
               <span class="ff2 fc0 fs10 fb ">Fija el Precio</span><br /><br />
                 <input type="text" name="imTxtDat"  />
               </div>
            </div>
            <div style="height:10px; margin:0 auto;"></div>
            <div>
               <div style="font: bold 11px Arial;border:1px solid gray;width:249px;text-align:left;margin:0 auto;padding:12px;">
               <span class="ff2 fc0 fs10 fb ">Sube tu archivo</span><br /><br />
               <form  method="POST" action="subearchivo.php" enctype="multipart/form-data">
                 <input type="file" name="fichero" /><br />
                 <input type="submit" name="submit" value="Vende!!" />
               </form>
               </div>
            </div>

          </div>
          <!-- Fin Cuerpo Pagina -->
          <p id="imFooterSiteMap">
            <a href="home.html" title="ir a inicio">Principal</a> |
            <a href="catalogo.html" title="ir a catalogo">Catalogo</a> |
            <a href="foros.html" title="ir a foros">Foros</a> |
            <a href="nosotros.html" title="ir a nosotros">Nosotros</a> |
            <a href="contacto.html" title="ir a contacto">Contacto</a> |
            <a href="legales.html" title="preguntas frecuentes">F.A.Q.</a> |
            <a href="imsitemap.html" title="Mapa general del sitio">Mapa del Sitio</a>
          </p>
        </div>
        <!-- Copiright -->
        <div id="imFooter" style="text-align:center;">&#169; Copyright 2009 | Juan Cruz | Dani | Rosa </div>
        <!-- Fin Copiright -->
      </div>
    </div>
    <div class="imInvisible">
      <hr />
      <a href="#imGoToCont" title="Leer esta p�gina de nuevo">Regresar al contenido</a> |
      <a href="#imGoToMenu" title="Leer este sitio de nuevo">Regresar al men� principal</a>
    </div>
    <div id="imShowBoxBG" style="display: none;" onclick="imShowBoxHide()">
    </div>
    <div id="imShowBoxContainer" style="display: none;" onclick="imShowBoxHide()">
      <div id="imShowBox" style="height: 200px; width: 200px;">
      </div>
    </div>
    <div id="imBGSound">
    </div>
    <div id="imToolTip">
       <script type="text/javascript">var imt = new IMTip;</script>
    </div>
  </body>
</html>