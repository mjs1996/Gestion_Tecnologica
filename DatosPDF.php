

<!DOCTYPE html>
	<html lang="es">
	<title>
Envio
	</title>
<head>
	   <meta charset="UTF-8">
	   <link rel="stylesheet" href="css/bootstrap.css">
	   <link rel="stylesheet" href="css/bootstrap-theme.css">
     <link rel="stylesheet" href="js/bootstrap.bundle.min.js">
     <link rel="stylesheet" href="js/bootstrap.bundle.js">
	   <link rel="stylesheet" href="estilos.css">
	   <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
	   <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
		 <link href="signin.css" rel="stylesheet">
		 <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"> 
     <link rel="stylesheet" href="fonta/css/all.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
		 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
         <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet"> 

</head>

<body>
<script text="text/javascript" src="js/jquery-3.2.1.slim.min.js"></script>
<script text="text/javascript" src="js/popper.min.js"></script>
<script text="text/javascript" src="js/bootstrap.min.js"></script>




<?php 
if(isset($_POST['pdf'])){
    session_start();

?>


<div class="statica">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
  <div class="espacio_nav">

<div class="dropdown ">

<button class="btn btn-dark " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fas fa-home"> </i>   <?php 
  
  if(isset($_SESSION['usuario'])){
    echo $_SESSION['usuario'];
  }
  else{
    echo"usuario";
  }
  ?>
  
  </button>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
    <form action='DatosPersonal.php' method='POST'> 
    <button class="dropdown-item" type="submit" name="cerrar_sesion"> Cerrar sesion </button>

</form>

</div>
</div>
</div>
<?php 
 if(isset($_POST['cerrar_sesion'])){
   session_destroy();
   header('location:index.php');
 }
 ?>







<div class="espacio_nav">
<div class="dropdown ">
  <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fas fa-book"></i> Prestamos
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <a class="dropdown-item" href="DatosPersonal.php">Ingresar Prestamo</a>

<a class="dropdown-item" href="listarPrestamo.php">Lista de Prestamos </a>
  </div>
</div>
</div>



<div class="espacio_nav">
<div class="dropdown ">
  <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fas fa-tools"></i> Actividades
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Agregar Actividad</a>
    <a class="dropdown-item" href="#">Lista de Actividades</a>
    <a class="dropdown-item" href="crearUsuario.php">Crear Usuarios</a>

  </div>
</div>

</div>
  
<div class="espacio_nav">
  <div class="dropdown ">
  <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fas fa-laptop"></i> Equipamiento 
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <a class="dropdown-item" href="agregarEquipamiento.php">Agregar Equipamiento</a>
    <a class="dropdown-item" href="listarEquipamiento.php">Lista de Equipamientos</a>
  </div>
</div>
</div>
</ul>
</nav>


</div>



<br>
<br>
<br>
<br>
<div class="runaway space">
 <h5> <b> Datos que seran presentados en  el PDF<b></h5>
</div>
<br>
<br>



<div class="row">

<div class="col-md-1">
</div>


<div class="col-md-4">


<form action="pdf.php" method="post">

            <br>
              <div class="form-group">
                <label for="pwd">Equipamiento</label>
                <input type="text" class="form-control" value="<?php echo $_POST['equipamiento'] ?>" id="pwd" placeholder="Equipamiento" name="equipamiento">
                </div> 
           <br>

              <div class="form-group">
              <label for="pwd">S/N</label>
              <input type="text" class="form-control" id="pwd" value="<?php echo $_POST['s_n'] ?>"placeholder="S/N" name="s_n">
              </div>
            <br>
            

            
       
            <div class="form-group">
                <label for="pwd">Departamento</label>
                <input type="text" class="form-control" id="pwd" placeholder="Departamento" value="<?php echo $_POST['departamento'] ?>"name="departamento">
                </div> 
            <br>
            <div class="form-group">
                <label for="pwd">Nº de Proyecto</label>
                <input type="text" class="form-control" id="pwd" placeholder="Nº Proyecto" value="<?php echo $_POST['n_proyecto'] ?>"name="n_proyecto">
                </div> 
            <br>
       
       
            
           
</div>
  <div class="col-md-4">
               
         
            <div class="form-group">
  <label for="exampleFormControlTextarea3">Detalle</label>
  <textarea class="form-control" id="exampleFormControlTextarea3" name="detalle"rows="7"><?php echo $_POST['detalle'] ?></textarea>
</div>
  

                 
  
  <br>
  

            <input type="submit" value="Enviar"name="insertar"class="btn btn-primary mb-2">
  </div> 
           
           
      
   

      </form>


      </div>
      </div>






</body>
	</html>




<?php

}
$conexion=mysqli_connect("localhost","root","","gestion_tecnologica") or die("conexion fallida");


function camposCompletos(){

	if(!empty($_POST['equipamiento']) && !empty($_POST['s_n'] )
	&& !empty($_POST['departamento'])  && !empty($_POST['n_proyecto'] )
    && !empty($_POST['hora_entrega']) && !empty($_POST['fecha_entrega']  ) 
    && !empty($_POST['detalle'])){
		return true;
	}
	else{
		return false;
	}


}




if(isset($_POST['actualizar2'])){

if(camposCompletos()){




$query=mysqli_query($conexion,"update equipo_nuevo 
set tipo='$_POST[equipamiento]',
detalle='$_POST[detalle]',
serie='$_POST[s_n]',
fecha_entrega='$_POST[fecha_entrega]',
hora_entrega='$_POST[hora_entrega]',
num_proyecto='$_POST[n_proyecto]',
departamento='$_POST[departamento]'
where id='$_POST[id]'") or die("error".mysqli_error($conexion));
?> <div class="alert alert-primary" role="alert">
Actualizacion Correcta
</div>
<?php
header( "refresh:1;url=listarEquipamiento.php" ); 

}else{


	?> <div class="alert alert-danger" role="alert">
	Datos mal cargados/faltantes!!
	</div>
	<?php
	header( "refresh:1;url=listarEquipamiento.php" ); 
	
}


}


if(isset($_POST['eliminar2'])){
    session_start();
	if($_SESSION['usuario']=='administrador'){
	$delete=mysqli_query($conexion,"delete from equipo_nuevo where id='$_POST[id]'")or die("error".mysqli_error($conexion));

	?> <div class="alert alert-primary" role="alert">
Eliminacion Correcta
</div>
<?php
	header( "refresh:1;url=listarEquipamiento.php" ); 
	}
	else{
		?>
		<div class="btn btn-danger" role="alert">No tiene suficientes privilegios para realizar esta accion!! </div>
		<?php
  header( "refresh:1;url=listarEquipamiento.php" ); 

	}
}


?>

























