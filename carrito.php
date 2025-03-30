<?php
session_start();
//manejamos en sesion el nombre del usuario que se ha logeado
require_once('Connections/tienda.php'); 

if(!isset($_SESSION["usuario"])){

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
             header("location:carrito.php?login=true");
				echo '<script type=\"text/javascript\">alert(\"Gracias Por Registrarse\");</script>';

         }
}

	}else{
		$_SESSION["usuario"];
		
		}


if ( isset($_SESSION['carrito']) || isset($_POST['nombre'])){
			
	if(isset ($_SESSION['carrito'])){
		$compras=$_SESSION['carrito'];
		if(isset($_POST['nombre'])){
		$nombre=$_POST['nombre'];
		$precio=$_POST['precio'];
		$cantidad=$_POST['cantidad'];
		$duplicado=-1;
			for($i=0;$i<=count($compras)-1;$i++){
				if($nombre==$compras[$i]['nombre']){
					$duplicado=$i;

				}
			}

if($duplicado != -1){
	$cantidad_nueva = $compras[$duplicado]['cantidad'] + $cantidad;
		$compras[$duplicado]=array("nombre"=>$nombre,"precio"=>$precio,"cantidad"=>$cantidad_nueva);
}else {
		$compras[]=array("nombre"=>$nombre,"precio"=>$precio,"cantidad"=>$cantidad);
}
				}
}else {
	$nombre=$_POST['nombre'];
	$precio=$_POST['precio'];
	$cantidad=$_POST['cantidad'];
	$compras[]=array("nombre"=>$nombre,"precio"=>$precio,"cantidad"=>$cantidad);
}
if(isset($_POST['cantidadactualizada'])){
	$id=$_POST['id'];
	$contador_cant=$_POST['cantidadactualizada'];
	if($contador_cant<1){
		$compras[$id]=NULL;
	}else{
		$compras[$id]['cantidad']=$contador_cant;
		}
}
if(isset($_POST['id2'])){
	$id=$_POST['id2'];
	$compras[$id]=NULL;

}
$_SESSION['carrito']=$compras;

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

	<span class="graytitle">Carrito de compras.</span>
	
 	<ul class="pageitem">
		<li class="textbox">Muestra las compras que has enviado a tu carrito.</li>
	</ul>	

	<ul class="pageitem">

  <img src="imagenes/carrito.png"/>

  
		<li class="textbox">
		
		
<p style=" text-align:center; margin-bottom:10px; clear:both;"><br /><a href="javascript:history.back(1)">Regresar a comprar</a>   
<br><b></b>
		
    
<table width="90%"  height="90%" border="0" align="center" id="tablacarrito">
  
  <tr align="center" style="background-color:#008fbe; color:#fff">
    <td width="40%">Producto</td>
    <td width="20%">Precio</td>
    <td width="20%">Cantidad</td>
    <td width="20%">Total</td>
  </tr>
  <?php
  if(isset($_SESSION['carrito'])){
	  $total=0;

for($i=0;$i<=count($compras)-1;$i++){
	
	if($compras[$i]!=NULL){

	
  ?>
  <tr>
    <td required align="left"><?php echo $compras[$i]['nombre']; ?></td>
    <td align="center"><?php echo $compras[$i]['precio']; ?></td>
    
  <td align="center">
      <form name="form1" method="post" action="">
      <input type="hidden" name="id" id="id" value="<?php echo $i;?>" >
      <input type="text" name="cantidadactualizada" value="<?php echo $compras[$i]['cantidad'];?>"  size="2" required>
      <span id="toolTipBox" width="200"></span>
        <input type="image" name="actualizar" id="actualizar" src="imagenes/actualizar.gif" onmouseover="toolTip('Actualizar este pedido',this)">
      </form>
  </td>
  
  <td align="center">
	<form method="post" action=""><?php echo $compras[$i]['cantidad'] * $compras[$i]['precio'];?>
    <span id="toolTipBox" width="200"></span>
       <input type="image" name="imageField" id="imageField" src="imagenes/eliminar.gif" onmouseover="toolTip('Eliminar este pedido',this)">
       <input name="id2" type="hidden" id="id2" value="<?php echo $i;?>"> 
  </form>
  
  </td>
  </tr>
  
  <?php
  $total= $total+($compras[$i]['cantidad'] * $compras[$i]['precio']);
}
  }
  }else{
    echo "<center><br>No hay productos en el carrito</center><br>";
  }
  ?>


  <tr align="center">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><p>&nbsp;</p><p>Total a pagar:</p></td>    
    <td><p>&nbsp;</p>
    <p><?php if(isset($_SESSION['carrito'])){ echo "$ ".$total." Dolares ";}?></p>
    </td>
    
  </tr>
  
  <tr align="center">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    
    <td>
    
    <form name="form2" method="post" action="resumenc_compra.php">
    
        <input type="submit" name="button" id="button" value="Enviar Pedido"> 
    </form>
  
          <br> 
    </td>
    
  </tr>
  
  </table>


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
