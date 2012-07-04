<?php
//conexion
require("datos(BD).php");
//crea la Consulta: pongo la orden en SQL
$_pagi_sql = "SELECT * FROM ventas";
//cantidad de filas por pantalla
$_pagi_cuantos=9;
//Incluimos el paginador
require("paginator.inc.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=windows-1250">
    <meta name="generator" content="PSPad editor, www.pspad.com">
    <title>Mostrar Ventas </title>
    <!-- Resoluciones -->
    <link rel="stylesheet" type="text/css" href="res/home.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="res/styles.css" media="screen, print" />
    <link rel="stylesheet" type="text/css" href="res/template.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="res/print.css" media="print" />
    <!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="res/iebehavior.css" media="screen" /><![endif]-->
    <link rel="stylesheet" type="text/css" href="css/pc_cajaderecha.css"/>
    <link rel="stylesheet" type="text/css" href="css/tabcontent.css"/>
    <link rel="Shortcut Icon" href="favicon.ico" type="image/x-icon" />
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
            <ul>	               <li>
              <a href="mostrar(usu).php" title="">Usuarios</a></li>	<li>
              <a href="mostrar(libros).php" title="">Libros</a></li><li>
              <a href="mostrar(autores).php" title="">Autores</a></li><li>
              <a href="mostrar(ventas).php" title="">Ordenes</a></li>	<li>                             </li>
            </ul>
            <!-- Boton Desconectarse -->
            <div style="width:96%;">
              <a href="catalogo.html" style="text-decoration: none; float:right;">
                <img src="assets/images/desconectar.jpg" alt="" title="Desconectarse" border=0 /></a>&nbsp;
            </div>
            <!-- Fin Boton Desconectarse -->
          </div>
          <!-- Fin Menu -->
        </div>
        <div id="imContent">
          <div ><h2>Bienvenido</h2>
          </div>
          <!-- Cuerpo Pagina -->
          <div>
            <ul class="menuH">
              <li class="menureg_vent">COD.</li>
              <li class="menureg_vent">ISBN</li>
              <li class="menureg_vent">TITULO</li>
              <li class="menureg_vent">F.VENTA</li>
              <li class="menureg_vent">PCIO.</li>
              <li class="menureg_vent">NOM.USU</li>
              <li class="menureg_vent">APE.USU</li>
              <li class="menureg_vent">TEL.</li>
              <li class="menureg_vent">EMAIL</li>
            </ul>
          </div>
          <div style="clear:both;">
<?php
//Mira fila a fila y pone el resultado
while ($fila = mysql_fetch_array($_pagi_result)){
$consulta_usu = "SELECT * FROM usuarios WHERE (dni_usu = $fila[dni_usu])";
  $resultado = mysql_query($consulta_usu) or die ("ERROR: consultando usuarios<br />");
  $fila_usuario = mysql_fetch_array($resultado);

$consulta_libro = "SELECT * FROM libros WHERE (isbn = $fila[isbn])";
  $resultado = mysql_query($consulta_libro) or die ("ERROR: consultando libros<br />");
  $fila_libro = mysql_fetch_array($resultado);

                          ?>
            <div >
              <div class="reg_v">
                <?php echo $fila['cod_venta'];?>
              </div>
              <div class="reg_v">
                <?php echo $fila_libro['isbn'];?>
              </div>
              <div class="reg_v">
                <?php echo $fila_libro['titulo'];?>
              </div>
              <div class="reg_v">
                <?php echo $fila['fech_venta'];?>
              </div>
              <div class="reg_v">
                <?php echo $fila_libro['precio'];?>
              </div>
              <div class="reg_v">
                <?php echo $fila_usuario['nombre'];?>
              </div>
              <div class="reg_v">
                <?php echo $fila_usuario['apellido'];?>
              </div>
              <div class="reg_v">
                <?php echo $fila_usuario['telefono'];?>
              </div>
              <div class="reg_v">
                <?php echo $fila_usuario['email'];?>
              </div>

              <div style="clear:both;">
              </div>
            </div>
            <?php } ?>
<?php
//Cierro la Base de Datos
mysql_close($conexion);
                          ?>
            <!--botones atras y siguiente-->
            <div style="width:100% ;height:40px;text-align: center; font: bold 1.4em Arial;">
              <?php echo $_pagi_navegacion;?>
            </div>
            <!-- Fin Cuerpo Pagina -->
          </div>
          <!-- Copiright -->
          <div id="imFooter" style="text-align:center;">&#169; Copyright 2009 | Juan Cruz | Dani | Rosa
          </div>
          <!-- Fin Copiright -->
        </div>
      </div>
  </body>