<?php 
session_start();
?>
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

$conexion=mysqli_connect("localhost","root","","gestion_tecnologica") or die("conexion fallida");






function getDNIpersonal($conexion){
	$busqueda=mysqli_query($conexion,"select dni from personal where dni='$_REQUEST[DNI]'");

	if($reg=mysqli_fetch_array($busqueda)){
		return true;
	}
	else{ 
		return false;
	}
}







function getIdPersonal($conexion){
  $query=mysqli_query($conexion, "select id from personal where dni='$_REQUEST[DNIfiltro]'") 
  or die("error de busqueda".mysqli_error($conexion));


  if($reg=mysqli_fetch_array($query)){
	  return $reg['id'];
  }
  else{
	  return -1;
  }

}







function CamposCargados(){
if(	!empty($_REQUEST['Tipo']) and !empty($_REQUEST['numEquipo']) and !empty($_REQUEST['Lugar']) and !empty($_REQUEST['materia']) and !empty($_REQUEST['hora_retiro'])and 
	!empty($_REQUEST['desde_hora']) and !empty($_REQUEST['hasta_hora']) and !empty($_REQUEST['fecha_retiro']) and !empty($_REQUEST['estado'])
	and !empty($_REQUEST['DNIfiltro'])){
return true;
	}
	else{
		return false;
	}
	
}










//Insertar personal en la B.D



if(isset($_SESSION['usuario'])){

if(isset($_POST['insertarPersonal'])){

if(getDNIpersonal($conexion)){
	?>
	<div class="btn btn-danger" role="alert">Esta persona ya existe!! </div>
	<?php
	  header( "refresh:1;url=DatosPersonal.php" ); 
}

elseif(!empty($_REQUEST['nombre']) and !empty($_REQUEST['apellido']) and !empty($_REQUEST['DNI'])   ){
mysqli_query($conexion, "insert into personal(nombre,apellido,dni) values ('$_REQUEST[nombre]','$_REQUEST[apellido]', $_REQUEST[DNI])")
or die("error de insercion".mysqli_error($conexion));

?>

		<div class="alert alert-primary"role="alert">Insercion correcta!! </div>
		<?php
  header( "refresh:1;url=DatosPersonal.php" ); 
  mysqli_close($conexion);
}
else {
	?>
	<div class="btn btn-danger" role="alert">No se han cargado todos los campos!! </div>
	<?php
	  header( "refresh:1;url=DatosPersonal.php" ); 

}
}








//Insertar Datos del Equipo Prestado
if(isset($_POST['insertarEquipo'])){

	if(CamposCargados()){
		$idPersonal=getIdPersonal($conexion);
		if($idPersonal>-1){

			mysqli_query($conexion, "insert into equipo(tipo,numero, lugar,materia_curso,hora_retiro,
			desde_hora,hasta_hora,fecha_retiro,estado,id_personal,id_usuario) values ('$_REQUEST[Tipo]',
			'$_REQUEST[numEquipo]', '$_REQUEST[Lugar]','$_REQUEST[materia]','$_REQUEST[hora_retiro]',
			'$_REQUEST[desde_hora]','$_REQUEST[hasta_hora]','$_REQUEST[fecha_retiro]', 
			'$_REQUEST[estado]','$idPersonal','$_SESSION[id]')")  or die("error de insercion ".mysqli_error($conexion));
			
			?><div class="alert alert-primary" role="alert">
 Insercion correcta !!
</div>

<?php 
header( "refresh:1;url=listarPrestamo.php" ); 

		}
		else{
			
  ?><div class="alert alert-danger" role="alert">
  DNI mal cargado o inexistente </div> <?php 
header( "refresh:1;url=DatosPersonal.php" ); 

  
		}
	
	}
	else{

		?><div class="alert alert-danger" role="alert">
 No se han cargado todos los campos  </div> <?php 
		header( "refresh:1;url=DatosEquipo.php" ); 

	}

}







}
else{

  ?><div class="alert alert-danger" role="alert">
No ha iniciado sesion</div> <?php 
}



?>
