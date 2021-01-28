<?php
session_start();

function validacion(){
  $conexion=mysqli_connect("localhost","root","","gestion_tecnologica") or die("conexion fallida");
  $registro=mysqli_query($conexion, "select id, nombre_usuario, clave from usuario where nombre_usuario = '$_REQUEST[user]' and 
clave='$_REQUEST[pass]' ") or die("problema en el logeo".mysqli_error($conexion));
if($reg=mysqli_fetch_array($registro)){
  $_SESSION['usuario']=$reg['nombre_usuario'];
  $_SESSION['id']=$reg['id'];
  header('location:listarPrestamo.php');  
}
else {
?><div class="alert alert-danger" role="alert">
Datos mal cargados/inexistentes</div> <?php 
  }
}

?>
