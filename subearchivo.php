<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" dir="ltr">
  <head>
    <title>Subir Libros</title>
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
    <link rel="stylesheet" type="text/css" href="res/styles.css" media="screen, print" />
    <link rel="stylesheet" type="text/css" href="res/home.css" media="screen" />
    <!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="res/iebehavior.css" media="screen" /><![endif]-->
    <link rel="stylesheet" type="text/css" href="res/imcart.css" media="screen, print" />
    <link rel="stylesheet" type="text/css" href="res/handheld.css" media="handheld" />
    <link rel="alternate stylesheet" title="Alto contraste - Accesibilidad" type="text/css" href="res/accessibility.css" media="screen" />

  </head>
  <body>
    <div id="imSite">
      <!-- Imagen BeBooks -->
      <img src="res/top_sinicono.jpg" alt="" title="bebooks" border=0 />
      <!-- Imagen BeBooks -->

      <div id="imBody">
        <!-- Cuerpo Pagina -->

<?php
//Sube el archivo y muestra por pantalla el resultado
$nombre_archivo = $_FILES['fichero']['name'];
$tipo_archivo = $_FILES['fichero']['type'];
$tamano_archivo = $_FILES['fichero']['size'];

?>

<?php
//Sube el archivo al servidor desde el directorio temporal
//falta comprobar errores de subida aqui

$ruta = "libros_subidos/".$_FILES['fichero']['name'];

if (is_uploaded_file($_FILES['fichero']['tmp_name'])){
  copy($_FILES['fichero']['tmp_name'], $ruta); ?>
         <div style="font: bold 11px Arial;border:1px solid gray;width:200px;text-align:left;margin:0 auto;padding:12px;">
<?php
echo "<h3> Subiendo el Libro: </h3>".$nombre_archivo."<br />";
echo "Tipo de Archivo: ".$tipo_archivo."<br />";
echo "Tamaño: ".$tamano_archivo." Kbts"."<br />";
?>
        </div>
        <div style="height:40px; margin:0 auto;"></div>
         <div id="imFooter" style="text-align:center; background-color: #F99839; height:20px;">
           <a href="catalogo.html" class="enlace1">&laquo; &laquo; &nbsp; <?php $_SESSION['nombre']; ?>&nbsp;El Libro ha sido subido correctamente.</a>
         </div>
<?php
} else { ?>
     <div style="height:50px; margin:0 auto;padding:20px;"></div>
     <div id="imFooter" style="text-align:center; background-color: red; height:20px;">
           <a href="publi_libros.php" class="enlace1">&laquo; &laquo; &nbsp;Ocurrio algun error al subir el libro. Intente Nuevamente.</a>
     </div>
<?php
     exit;
}
?>
        <!-- Fin Cuerpo Pagina -->

      </div>
    </div>
  </body>
</html>