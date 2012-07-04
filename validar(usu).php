<?php
session_start();

//traer datos del formulario
$usuario=$_POST['nombre'];
$pass=$_POST['clave'];

//conexion
require("datos(BD).php");

//crea la Consulta: pongo la orden en SQL
$consulta = "SELECT * FROM usuarios WHERE (('$usuario'=nombre) and ('$pass'=clave))";

//Ejecuto la consulta
$resultado = mysql_query($consulta) or die ("ERROR: en la consulta a la BD <br>");

$num = mysql_num_rows($resultado);
mysql_close($conexion);

if($num == 1){
  //encontrado 
  if (($usuario==admin) and ($pass==admin)){ 
    $_SESSION['nombre']=$_POST['nombre'];
    $_SESSION['permiso'] = true;
    header ("Location:p_ctrl.php");
    }
  else {
    $_SESSION['nombre']=$_POST['nombre'];
    header ("Location:catalogo.html");
  }        
} else {
  //no encontrado  
  header ("Location:error_lg.php");
}

?>
