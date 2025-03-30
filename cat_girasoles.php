<?php require_once('Connections/tienda.php'); ?>
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
             header("location:cat_procesadores.php?login=true");
				echo '<script type=\"text/javascript\">alert(\"Gracias Por Registrarse\");</script>';

         }
}

	}else{
		$_SESSION["usuario"];
		
		}
		
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_listado = 9;
$pageNum_listado = 0;
if (isset($_GET['pageNum_listado'])) {
  $pageNum_listado = $_GET['pageNum_listado'];
}
$startRow_listado = $pageNum_listado * $maxRows_listado;

mysql_select_db($database, $tienda);
$query_listado = "SELECT * FROM productos WHERE id_cat=1";
$query_limit_listado = sprintf("%s LIMIT %d, %d", $query_listado, $startRow_listado, $maxRows_listado);
$listado = mysql_query($query_limit_listado, $tienda) or die(mysql_error());
$row_listado = mysql_fetch_assoc($listado);

if (isset($_GET['totalRows_listado'])) {
  $totalRows_listado = $_GET['totalRows_listado'];
} else {
  $all_listado = mysql_query($query_listado);
  $totalRows_listado = mysql_num_rows($all_listado);
}
$totalPages_listado = ceil($totalRows_listado/$maxRows_listado)-1;

$queryString_listado = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_listado") == false && 
        stristr($param, "totalRows_listado") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_listado = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_listado = sprintf("&totalRows_listado=%d%s", $totalRows_listado, $queryString_listado);
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


	<span class="graytitle">Girasoles.</span>

   <ul class="pageitem">
		<li class="textbox">Selecciona el arreglo de girasoles que deseas comprar dando clic en carrito.</li>
	</ul>


	<ul class="pageitem">

  <img src="imagenes/categorias.png"/>
  
	<li class="textbox">
	
  <br>

    
  <table width="60%"  height="90%" border="1" align="center" id="tablagirasoles">
  
  <tr align="center" style="background-color:#008fbe; color:#fff">
    <td width="40%">Arreglo</td>
    <td width="60%">Detalle</td>
  </tr>
    
 	<?php 
	$contador=0;
	
	do { 
	if ($contador==0){
		?>
    
    <tr>
        <?php
        }
		$contador++;
		?>


    <td>
    
      <a href="detalles.php?id_producto=<?php echo $row_listado['id_producto']; ?>"><img src="imagenes/productos/<?php echo $row_listado['imagen']; ?>" width="200" height="200"></a>            
    
    </td>
    
    <td>
    
            <h3><?php echo $row_listado['nombre']; ?></h3>
            <p>$<?php echo $row_listado['precio']; ?><br>
            </p>
            
            <form name="form1" method="post" action="carrito.php">
              <input type="image" name="imageField" id="imageField" src="imagenes/comprar.gif">
              <input name="nombre" type="hidden" id="nombre" value="<?php echo $row_listado['nombre']; ?>">
              <input name="precio" type="hidden" id="precio" value="<?php echo $row_listado['precio']; ?>">
              <input name="cantidad" type="hidden" id="cantidad" value="1">
            </form>
              
    </td>
    
   <?                                   
			if ($contador==3){
				$contador=0;
	 ?>
    
   
  </tr>
   
    <?
		}
		?>
			      
    <?php } while ($row_listado = mysql_fetch_assoc($listado)); ?>
  
  
  </table>
  
    <br>
  
  <table width="255" border="2"  align="center" >
    <tr>
      <td><?php if ($pageNum_listado > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_listado=%d%s", $currentPage, 0, $queryString_listado); ?>">Primero</a>
          <?php } // Show if not first page ?></td>
      <td> <?php if ($pageNum_listado > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_listado=%d%s", $currentPage, max(0, $pageNum_listado - 1), $queryString_listado); ?>">Anterior</a>
          <?php } // Show if not first page ?></td>
      <td><?php if ($pageNum_listado < $totalPages_listado) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_listado=%d%s", $currentPage, min($totalPages_listado, $pageNum_listado + 1), $queryString_listado); ?>">Siguiente</a>
          <?php } // Show if not last page ?></td>
      <td><?php if ($pageNum_listado < $totalPages_listado) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_listado=%d%s", $currentPage, $totalPages_listado, $queryString_listado); ?>">&Uacute;ltimo</a>
          <?php } // Show if not last page ?></td>
    </tr>
  </table>
  
  
    <br>
    
  <li>
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
