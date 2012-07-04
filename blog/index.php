<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" dir="ltr">
  <head>
    <!-- Contenido -->
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta http-equiv="Content-Language" content="es" />
    <meta http-equiv="Content-Type-Script" content="text/javascript" />
    <meta name="description" content="blog de bebooks" />
    <meta name="keywords" content="libro novelas publicar comprar" />
    <!-- RSS Feed -->
    <link rel="alternate" type="application/rss+xml" title="Noticias" href="http://www.bebooks.es/x5rssfeed.xml" />
    <!-- Otros -->
    <meta name="Author" content="IberaSoft" />
    <meta name="Generator" content="" />
    <meta http-equiv="ImageToolbar" content="False" />
    <meta name="MSSmartTagsPreventParsing" content="True" />
    <link rel="Shortcut Icon" href="favicon.ico" type="image/x-icon" />
    <!-- Resoluciones -->
    <script type="text/javascript" src="../res/x5engine.js"></script>
    <link rel="stylesheet" type="text/css" href="template.css" media="screen" />
    <title>BeBooks</title>
  </head>
  <body>
    <div id="imSite">
      <div id="imHeader">
        <div id="imBgBoxSearch">
          <div id="imSBox" style="text-align: left">

            <form action="" method="get">
              <fieldset>
                <div class="ImBlogBoxTitle">Búsqueda Blog</div>
                <input type="text" name="search" value="" />
                <input id="imSButton" type="submit" value="Buscar" />
                <a href="admin/index.php" style="text-decoration:none;text-align:right;">&nbsp; ::Admin:: </a>
                </fieldset>
            </form>

          </div>
        </div>
        <h1 onclick="document.location='../home.html'"></h1>
      </div>
      <div id="imBody">
        <div id="imContent">
          <div id="ImBlogMain">
<?php
   include "x5blog.inc.php";
   include "x5blog_data.php";
  $imBCD = @chdir($imDir);
   if($_GET['id'] != "")
      imBlogShowPost($_GET['id'],1);
   else if($_GET['category'] != "")
      imBlogShowCategory($_GET['category']);
   else if($_GET['month'] != "")
      imBlogShowMonth($_GET['month']);
   else if($_GET['search'] != "")
      imBlogShowSearch($_GET['search']);
   Else
      imBlogShowLast(10);
?>
          </div>
          <div id="ImBlogSideBar">
            <div id="imBgBoxLast">
              <div class="topBox">
              </div>
              <div class="contentBox">
                <div class="contentText">
                  <div class="ImBlogBoxTitle">Recientes
                  </div>
                  <a class="ImLink" href="?id=hc5">Taller para Escritores Novatos</a><br />
                  <a class="ImLink" href="?id=cc0">Maquinas Antiguas de Escribir</a><br />
                  <a class="ImLink" href="index.html">Todos los artículos</a><br />
                </div>
              </div>
              <div class="footerBox">
              </div>
            </div>
            <div id="imBgBoxCateg">
              <div class="topBox">
              </div>
              <div class="contentBox">
                <div class="contentText">
                  <div class="ImBlogBoxTitle">Lista de categorías
                  </div>
                  <a class="ImLink" href="?category=0">Curiosidades</a><br />
                  <a class="ImLink" href="?category=1">Eventos</a><br />
                </div>
              </div>
              <div class="footerBox">
              </div>
            </div>
            <div id="imBgBoxMonths">
              <div class="topBox">
              </div>
              <div class="contentBox">
                <div class="contentText">
                  <div class="ImBlogBoxTitle">Artículos del mes
                  </div>
                  <a class="ImLink" href="?month=200907">Jul 2009</a><br />
                </div>
              </div>
              <div class="footerBox">
              </div>
            </div>
            <div id="imBgBoxClouds">
              <div class="topBox">
              </div>
              <div class="contentBox">
                <div class="contentText">
                  <div class="ImBlogBoxTitle">Nubes
                  </div>
                  <a class="ImLink" href="?category=0" title="1 Artículo">
                    <span style="font-size: 100%">Curiosidades
                    </span></a>
                  <a class="ImLink" href="?category=1" title="1 Artículo">
                    <span style="font-size: 100%">Eventos
                    </span></a>
                </div>
              </div>
              <div class="footerBox">
              </div>
            </div>
          </div>
        </div>
        <div id="imFooter">
          <div id="ImBlogFooter" style="font:.6em arial";">&#169; Copyright 2009 | Juan Cruz | Dani | Rosa
          </div>
        </div>
      </div>
    </div>
  </body>
</html>