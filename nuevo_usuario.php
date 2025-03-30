<?php
session_start();
if(!isset($_SESSION["usuario"])){
	
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

<script type="text/javascript">
function comparar_contra() {
	var contra1 = document.getElementById('contrasena').value;
	var contra2 = document.getElementById('contrasena_vali').value;

	if (contra1 != contra2) {
		alert('Las contraseñas no coinciden');
	} 
}
</script>


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

	<span class="graytitle">Formulario de registro.</span>
	
	<ul class="pageitem">
		<li class="textbox">Complete el registro o ingrese si ya es usuario.</li>
	</ul>


	<ul class="pageitem">

  <img src="imagenes/usuario.png"/>
    <img src="imagenes/delete.png"/>
  
		<li class="textbox">


	<ul class="pageitem">
		<li class="textbox">Si no esta registrado complete la informacion solicitada.</li>
	</ul>
    
<div id="registro" style="clear:both;">


<div class="registro_caja">


<br>

<form action="registro.php" method="post">


		<ul class="pageitem">
		
			<li 
      class="smallfield"><span class="name">Usuario:</span>
      <input placeholder="Ingrese nombre de usuario" type="text" name="nickname" required/>
			</li>
			
			<li 
      class="smallfield"><span class="name">nombres</span>
      <input placeholder="Ingrese nombres" type="text" name="nombre" required />
			</li>
			
			<li 
      class="smallfield"><span class="name">Apellidos:</span>
      <input placeholder="Ingrese apellidos" type="text" name="apellido" required/>
			</li>
			
			<li 
      class="smallfield"><span class="name">Correo</span>
      <input placeholder="Ingrese correo" type="email" name="correo" required />
			</li>

			<li 
      class="smallfield"><span class="name">Clave</span>
      <input placeholder="Ingrese clave" type="password" name="contrasena" required />
			</li>
      
      <li 
      class="smallfield"><span class="name">Repita clave</span>
      <input placeholder="Repita su clave" type="password" name="contrasena_vali" required />
			</li>

      <li 
  	class="smallfield"><span class="name">Seleccione pais</span>
    	</li>
      
       
 		<li class="select">
		<select name="pais">
    <option name="pais" value="El Salvador">El Salvador</option>
    <option name="pais" value="Guatemala">Guatemala</option>
    <option name="pais" value="Honduras">Honduras</option>
    <option name="pais" value="Costa Rica">Costa Rica</option>
    <option name="pais" value="Nicaragua">Nicaragua</option>   
			</select>     
      <span class="arrow"></span>
      </li>


      <li 
      class="smallfield"><span class="name">Ciudad</span>
      <input placeholder="Ingrese ciudad" type="text" name="ciudad" required />
			</li>
       
 			
		</ul>



<br>
<p align="center"><input type="submit" name="registrar" value="Registrarse"   />
<br>

</form>

</div>


    </li>
		
	</ul>
	
   <br>
	

	<ul class="pageitem">

  <img src="imagenes/usuario.png"/>
  <img src="imagenes/acept.png"/>
  
		<li class="textbox">

  <ul class="pageitem">
		<li class="textbox">Si ya esta registrado ingrese usando el siguiente formulario.</li>
	</ul>


<div class="registro_caja">

<br>
<form action="ingreso.php" method="post">

		<ul class="pageitem">
			<li 
      class="smallfield"><span class="name">Usuario:</span>
      <input placeholder="Ingrese su nombre de usuario" type="text" name="nickname" required/>
			</li>
			<li 
      class="smallfield"><span class="name">Clave</span>
      <input placeholder="Ingrese clave" type="password" name="contrasena" required />
			</li>
		</ul>
		
<br>
<p align="center"><input type="submit" name="entrar" value="Entrar"/> </p>
<br>

</form>


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
