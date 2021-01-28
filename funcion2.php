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


function camposCompletos(){

	if(!empty($_POST['tecnico']) && !empty($_POST['equipamiento']) && !empty($_POST['s_n'] )
	&& !empty($_POST['departamento'])  && !empty($_POST['n_proyecto'] )
	&& !empty($_POST['hora_entrega']) && !empty($_POST['fecha_entrega']  ) && !empty($_POST['detalle'])){
		return true;
	}
	else{
		return false;
	}


}


if(isset($_POST['insertar'])){
$query="select id from usuario where nombre_usuario='$_SESSION[usuario]'";
$sql="select id from usuario where  nombre_usuario='$_POST[tecnico]'";
$seleccion=mysqli_query($conexion, $sql) or die("error ".mysqli_error($conexion));
$seleccion2=mysqli_query($conexion,$query) or die("error ".mysqli_error($conexion));

if($reg=mysqli_fetch_array($seleccion)){ 
$reg2=mysqli_fetch_array($seleccion2);
$id_usuario=$reg['id'];
$id_usuario_carga=$reg2['id'];
if(camposCompletos()){

 $sql2="insert into equipo_nuevo(id_usuario,tipo,detalle,serie,fecha_entrega,hora_entrega,num_proyecto,departamento,id_usuario_carga) 
 values('$id_usuario','$_POST[equipamiento]','$_POST[detalle]', '$_POST[s_n]','$_POST[fecha_entrega]',
 '$_POST[hora_entrega]', '$_POST[n_proyecto]','$_POST[departamento]', '$id_usuario_carga')";

mysqli_query($conexion,$sql2) or die("error ".mysqli_error($conexion));

?> <div class="alert alert-primary" role="alert">
Insercion correcta

</div>
<?php
header( "refresh:1;url=listarEquipamiento.php" ); 

	}

	else{

		?> <div class="alert alert-danger" role="alert">
Debe completar todos los campos!!
</div>

<?php
	header( "refresh:1;url=agregarEquipamiento.php" ); 

	}
}
else{
		?> <div class="alert alert-danger" role="alert">
Datos mal cargados/faltantes!
</div>
<?php
header( "refresh:1;url=agregarEquipamiento.php" ); 

}



}



?>

