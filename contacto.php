<?php
session_start();
if(!isset($_SESSION["usuario"])){
require_once('Connections/tienda.php'); 
     mysql_select_db($database) or die ("No se encuentra la base de datos especificada");
if (isset($_POST['log'])){
$nickname=$_POST['log'];
$contrasena=$_POST['pwd'];
$valido=true;
 $consulta2="SELECT * FROM usuario where nickname='$nickname' AND contrasena='$contrasena'";
         $result=mysql_query($consulta2) or die (mysql_error());
         $filasn= mysql_num_rows($result);
         if ($filasn<=0 || isset($_GET['nologin']) ){
             
             $valido=false;
         }else{
        $rowsresult=mysql_fetch_array($result);          
        $_SESSION['idusuario']= $rowsresult['idusuario'];
             $valido=true;
             //guardamos en sesion el carnet del usuario ya que ese es el identificados en la base de datos
             $_SESSION["usuario"]=$nickname;
             header("location:contacto.php?login=true");
				echo '<script type=\"text/javascript\">alert(\"Gracias Por Registrarse\");</script>';

         }
}

	}else{
		$_SESSION["usuario"];
		
		}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="index,follow" name="robots" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link href="pics/homescreen.gif" rel="apple-touch-icon" />

<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />


<link href="css/estilo.css" rel="stylesheet" media="screen" type="text/css" />
<script src="javascript/functions.js" type="text/javascript"></script>

<link rel="stylesheet" href="css/slide.css" type="text/css" media="screen" />

<script src="jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>  
<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<!-- Sliding effect -->
<script src="js/slide.js" type="text/javascript"></script>

<title>MontsFloristeria</title>

<link href="pics/startup.png" rel="apple-touch-startup-image" />


<meta content="iPod,iPhone,Webkit,iWebkit,Website,Create,mobile,Tutorial,free" name="Keywords" />
<meta content="A little iWebKit history lesson" name="description" />
</head>

<body>

<div id="topbar">
	<div id="leftnav">
		<a href="index.html"><img alt="home" src="images/home.png" /></a></div>
	<div id="title">MontseFloristeria</div>
</div>


<div id="tributton">
	<div class="links">
		<a href="index.html">Home</a><a href="changelog.html">Changelog</a><a id="pressed">About</a></div>
</div>

<div id="content">

	<span class="graytitle">Formulario de contacto.</span>
	<ul class="pageitem">
		<li class="textbox">Envianos tus comentarios.</li>
	</ul>	
	

	<ul class="pageitem">

  <img src="imagenes/contacto.gif"/>

  
		<li class="textbox">
    
<div id="contacto" style="clear:both;">
<form name="formulario" id="formulario" method="post" action="envio.php">


		<ul class="pageitem">
      
      <li 
      class="smallfield"><span class="name">Nombre:</span>
      <input placeholder="Se requiere su nombre" type="text" name="nombre" id="nombre" required/>
			</li>
			
			<li 
      class="smallfield"><span class="name">Correo</span>
      <input placeholder="Se requiere su correo" type="text" name="correo" id="correo" required />
			</li>
			
			<li 
      class="smallfield"><span class="name">Sitio web:</span>
      <input placeholder="Agregue sitio web si lo prefiere" type="text" name="sitio" id="sitio" required/>
			</li>


      <li class="textbox">
      <span class="header">Mensaje</span><textarea name="mensaje" id="mensaje" rows="4"></textarea>
      </li>

      
      </ul>
      
      <br>
      <p align="center"><input type="submit" name="enviar" id="enviar" value="Enviar comentario"   />
      <br>


			</form>      <br>
</div>
</div>
    
    </li>
		
	</ul>
	
	<ul class="pageitem">	
		<li class="store"><a href="index.html"><span class="image" style="background-image: url('imagenes/inicio.png')"></span>
		<span class="name">Regresar a principal</span><span class="arrow"></span></a></li>		
  </ul>
    		
</div>

<div id="footer">
	<!-- Support iWebKit by sending us traffic; please keep this footer on your page, consider it a thank you for my work :-) -->
	<p>Copyright 2013 - MontseFloristeria</p>
	<a class="noeffect" href="www.spc.com">SPC especialistas en desarrollo de app para moviles</a>
      
</div>


</body>

</html>
