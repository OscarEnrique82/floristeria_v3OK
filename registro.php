<?php
require("class.phpmailer.php");
session_start();
require_once('Connections/tienda.php'); 
     mysql_select_db($database) or die ("No se encuentra la base de datos especificada");
        
$nickname = $_POST['nickname'];
$nombre= $_POST['nombre'];
$apellido= $_POST['apellido'];
$correo= $_POST['correo'];
$contrasena= $_POST['contrasena'];
$pais = $_POST['pais'];
$ciudad = $_POST['ciudad'];
$fecha= $fecha = date("1").", "." ".date("j")." ".date("F")." ".date("Y");



$consulta="INSERT INTO `usuario` (`idusuario` , `nickname` , `nombre` , `apellido` , `pais` , `ciudad` , `contrasena` , `fechaingreso`)
VALUES ( NULL ,  '$nickname',  '$nombre',  '$apellido',  '$pais',  '$ciudad',  '$contrasena',  '$fecha') ";
mysql_query($consulta) or die(mysql_error());

$valido=true;
 $consulta2="SELECT idusuario, nickname, contrasena FROM usuario where nickname='$nickname' AND contrasena='$contrasena'";
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
             header("location:resumenc_compra.php?login=true");
				echo '<script type=\"text/javascript\">alert(\"Gracias Por Registrarse\");</script>';

         }
$saludo = "Muchas Gracias por registrarse en nuestra tienda";
$correo_empresa = "montsefloristeria@gmail.com";
$empresa = "MontseFloristeria";
$asunto = "Gracias Por Registrarse";
$mail = new PHPMailer();
$mail->Host = "localhost";

$mail->From = $correo_empresa;
$mail->FromName = $empresa;
$mail->Subject = $asunto;
$mail->AddAddress($correo,"Bienvenido ".$nombre);
$mail->Body = $saludo;
$mail->AltBody = "Registro Almacenado con Exitoso";
$mail->Send();

 //header("location:carrito.php");

?>