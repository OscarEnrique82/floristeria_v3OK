<?php
session_start();
if (!isset($_SESSION["usuario"])){
    header("location:nuevo_usuario.php?nologin=false");
    
}
$_SESSION["usuario"];
if(isset($_SESSION['carrito'])){
	$compras=$_SESSION['carrito'];

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

	<span class="graytitle">Resumen de la compra.</span>
	
 	<ul class="pageitem">
		<li class="textbox">Este es el resumen de su compra, verifique su pedido e ingrese sus datos.</li>
	</ul>	

	<ul class="pageitem">

  <img src="imagenes/dinero.png"/>

   	
		<li class="textbox">
		
   	<br>

<form method="post" action="final.php">

<table width="75%"  height="90%" border="1" align="center" id="tablacarrito">


			<li 
      class="smallfield"><span class="name">Usuario:</span>
      <input placeholder="Ingrese nombre para factura" type="text" size="40" name="nombre" id="nombre"required/>
			</li>
						
			<li 
      class="smallfield"><span class="name">Correo</span>
      <input placeholder="Ingrese su correo de paypal" type="email" size="40" name="email" id="email" required />
			</li>


 <br>

<tr align="center" style="background-color:#008fbe; color:#fff">
    <td width="30%" height="28" >Producto</td>
    <td width="20%" >Precio</td>
    <td width="30%" >Cantidad</td>
    <td width="20%" >Total</td>
  </tr>
  
  
  <?php
  if(isset($_SESSION['carrito'])){
	  $total=0;

for($i=0;$i<=count($compras)-1;$i++){
	
	if($compras[$i]!=NULL){
	
  ?>
  <tr align="center">
    <td><?php echo $compras[$i]['nombre']; ?></td>
    <td><?php echo $compras[$i]['precio']; ?></td>
    <td><?php echo $compras[$i]['cantidad'];?></td>
    <td>
	<?php echo $compras[$i]['cantidad'] * $compras[$i]['precio'];?>
    </td>
  </tr>
  <?php
  $total= $total+($compras[$i]['cantidad'] * $compras[$i]['precio']);
}
  }
  }
  
  ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><p>Total a Pagar:</p> </td>
    <td align="center">
    <p><?php if(isset($_SESSION['carrito'])){ echo "$ ".$total." Dolares ";}?></p>
    </td>
  </tr>
  
  <tr align="center">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"></td>
    <td><input type="submit" name="button" id="button" value="Enviar pedido a PayPal"></td>
  </tr>
  
  </table>
    
  </form>




    </li>

	
	<br>
  		
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
