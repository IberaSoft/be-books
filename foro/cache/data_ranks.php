<?php
if (!defined('IN_PHPBB')) exit;
$expired = (time() > 1280222738) ? true : false;
if ($expired) { return; }

$data =  unserialize('a:1:{s:7:"special";a:1:{i:1;a:2:{s:10:"rank_title";s:23:"Administrador del Sitio";s:10:"rank_image";s:0:"";}}}');

?>