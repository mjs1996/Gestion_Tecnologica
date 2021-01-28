<!DOCTYPE html>
	<html lang="es">
	
<head>
	 <meta charset="UTF-8">
	   <link rel="stylesheet" href="css/bootstrap.css">
	   <link rel="stylesheet" href="css/bootstrap-theme.css">
	   <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
	     <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
</head>
</html>
<?php 


include 'funcionSQL.php';

$conexion=mysqli_connect("localhost","root","","gestion_tecnologica") or die("conexion fallida");




function validarCampos($v1, $v2, $v3, $v4, $v5){


if(!empty($v1) and !empty($v2) and! empty($v3) and !empty($v4) and !empty($v5)){

return true;

}
else{
return false;

}

}







if(isset($_POST['actualizar'])){
    if(!empty($_POST['fecha_devolucion']) and !empty($_POST['hora_devolucion']) ){

$query=mysqli_query($conexion,"update equipo 
set estado='$_POST[estado]',
fecha_devolucion='$_POST[fecha_devolucion]', 
hora_devolucion='$_POST[hora_devolucion]' 
where id='$_POST[id]'") or 
die("error de actualizacion".mysqli_error($conexion));
?>

<div class="alert alert-primary" role="alert">
Actualizacion correcta</div>

<?php
  header( "refresh:1;url=listarPrestamo.php" ); 

}
else{
    ?>
    <div class="alert alert-danger" role="alert">
Datos mal cargados!!
</div>
<?php
  header( "refresh:1;url=listarPrestamo.php" ); 


}
}



if(isset($_POST['Eliminar'])){

	if($_SESSION['usuario']=="administrador"){
	mysqli_query($conexion, "delete from equipo where id='$_POST[id]' ") or die("error ".mysqli_error($conexion));

?>
<div class="alert alert-primary" role="alert">
Eliminacion correcta!!</div>

<?php
	
  header( "refresh:1;url=listarPrestamo.php" ); 
	}
	else{
		?>
		<div class="btn btn-danger" role="alert">No tiene suficientes privilegios para realizar esta accion!! </div>
		<?php
  header( "refresh:1;url=listarPrestamo.php" ); 

	}

}




if(isset($_POST['crearUsuario'])){

	if($_SESSION['usuario']=="administrador"){

if(validarCampos($_POST['nombre'],$_POST['apellido'],$_POST['nombre_usuario'],$_POST['clave'],$_POST['dni'])){
	$query=mysqli_query($conexion,"insert into usuario(nombre, apellido, nombre_usuario,clave,dni)
	values('$_POST[nombre]','$_POST[apellido]','$_POST[nombre_usuario]','$_POST[clave]','$_POST[dni]')") or die("error".mysqli_error($conexion));


?>
	<div class="alert alert-primary" role="alert">
Insercion correcta </div>

<?php
  header( "refresh:1;url=crearUsuario.php" ); 

}
else{

	?>
	<div class="btn btn-danger" role="alert"> Debe completar todos los campos!! </div>
	<?php
header( "refresh:1;url=crearUsuario.php" ); 
}
}

else{
	?>
	<div class="btn btn-danger" role="alert">No tiene suficientes privilegios para realizar esta accion!! </div>
	<?php
header( "refresh:1;url=crearUsuario.php" ); 
}



}




?>