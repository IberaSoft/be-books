<?php
//Chequea el Captcha
include("../captcha/imkeys.php");
for ($i=0; $i<5; $i++)
  if ($oCharList[substr($_POST["Itm_8_00_cpf"],$i,1)] != substr($_POST["Itm_8_00_cpv"], $i,1))
    die("Error: Javascript debe estar activado! (2)");

include "../res/imemail.inc.php";

//Formulario de Datos
$txtData = "";
$htmData = "";
$txtData .= "Nombre: " . $_POST["Itm_8_00_1"] . "\r\n";
$htmData .= "<tr><td width=\"25%\"><b>Nombre:</b></td><td>" . $_POST["Itm_8_00_1"] . "</td></tr>";
$txtData .= "EMail: " . $_POST["Itm_8_00_2"] . "\r\n";
$htmData .= "<tr><td width=\"25%\" bgcolor=\"#EEEEEE\"><b>EMail:</b></td><td bgcolor=\"#EEEEEE\">" . $_POST["Itm_8_00_2"] . "</td></tr>";
$txtData .= "Comentarios: " . $_POST["Itm_8_00_3"] . "\r\n";
$htmData .= "<tr><td width=\"25%\"><b>Comentarios:</b></td><td>" . $_POST["Itm_8_00_3"] . "</td></tr>";

// Plantillas
$htmHead = "<table width=\"90%\" border=\"0\" bgcolor=\"#FFFFFF\" cellpadding=\"4\" style=\"font: 11px Tahoma; color: #000000; border: 1px solid #BBBBBB;\">";
$htmFoot = "</table>";

//Envia el EMail al propietario
$txtMsg = "";
$htmMsg = $htmHead . "<tr><td></td></tr>" . $htmFoot;
$oEmail = new imEMail(($imForceSender ? $_POST["Itm_8_00_2"] : "bebooks@contacto.com"),"bebooks@contacto.com","Contacto Usuarios","iso-8859-1");
$oEmail->setText($txtMsg . "\r\n\r\n" . $txtData);
$oEmail->setHTML("<html><body bgcolor=\"#063A69\"><center>" . $htmMsg . "<br>" . $htmHead . $htmData . $htmFoot . "</center></body></html>");
$oEmail->send();

//Envia el EMail al usuario
$txtMsg = "Muchas Gracias por ponerse en contacto con BEBOOKS. \r\nNuestros representantes se pondran en contacto con Ud. a la brevedad. ";
$htmMsg = $htmHead . "<tr><td>Muchas Gracias por ponerse en contacto con BEBOOKS. <br>Nuestros representantes se pondran en contacto con Ud. a la brevedad. </td></tr>" . $htmFoot;
$oEmail = new imEMail("bebooks@contacto.com",$_POST["Itm_8_00_2"],"Recibido Comentarios BEBOOKS","iso-8859-1");
$oEmail->setText($txtMsg);
$oEmail->setHTML("<html><body bgcolor=\"#063A69\"><center>" . $htmMsg . "</center></body></html>");
$oEmail->send();
@header("Location: ../conf_email.php");
?>
