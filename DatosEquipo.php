<?php

include 'funcionSQL.php';
$conexion=mysqli_connect("localhost","root","","gestion_tecnologica") or die("conexion fallida");



?>
<!DOCTYPE html>
	<html lang="es">
	<title>
	Agregar Prestamos
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
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>    
     
<script text="text/javascript" src="js/popper.min.js"></script>
<script text="text/javascript" src="js/bootstrap.min.js"></script>



</head>

<body>






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
    <a class="dropdown-item" href="">Agregar Actividad</a>
    <a class="dropdown-item" href="">Lista de Actividades</a>
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
<h5> <b> Datos del Equipo <b></h5>
</div>
<br>
<br>








  




<div class="row">

<div class="col-md-1">
</div>


<div class="col-md-4">


<form action="funcionSQL.php" method="post">
              <div class="form-group">
                <label for="pwd">Tipo de Equipamiento</label>
                <input type="text" class="form-control" id="pwd" placeholder="Equipamiento" name="Tipo">
                </div>
            <br>

            <div class="form-group">
                <label for="pwd">Nº Equipo</label>
                <input type="text" class="form-control" id="pwd" placeholder="Nº Equipo" name="numEquipo">
                </div>
            <br>

            <div class="form-group">
                <label for="pwd">Lugar</label>
                <input type="text" class="form-control" id="pwd" placeholder="Lugar" name="Lugar">
                </div>
            <br>

            <div class="form-group">
                <label for="pwd">Materia/Curso</label>
                <input type="text" class="form-control" id="pwd" placeholder="Materia/Curso" name="materia">
                </div>
            <br>

						<div class="form-group">
													<label for="pwd">Hora de retiro</label>
													<input type="time" name="hora_retiro" value="00:00:00" max="23:59:00" min="00:00:00" step="1">
													</div>
											<br>

											<div class="form-group">
													<label for="pwd">Desde hora</label>
													<input type="time" name="desde_hora" value="00:00:00" max="23:59:00" min="00:00:00" step="1">
													</div>
											<br>



</div>
  <div class="col-md-4">

      
  <div class="form-group">
                <label for="pwd">DNI/Legajo</label>
                <input type="number" name="DNIfiltro" id="resultado"  placeholder="DNI/Legajo" class="form-control" 
                value="<?php echo $_REQUEST['dni']; ?>">
                <br>
      <br>
</div>
            <div class="form-group">
            <label for="pwd">Hasta hora</label>
            <input type="time" name="hasta_hora" value="00:00:00" max="23:59:00" min="00:00:00" step="1">
            </div>
            <br>
            <div class="form-group">
                <label for="pwd">Fecha de retiro</label>
                <input type="date" name="fecha_retiro" min="<?php echo date("Y-m-d");?>" max="" value="<?php echo date("Y-m-d");?>" class="form-control" required>
                </div>



            <br>
            <div class="form-group">
    <label for="exampleFormControlSelect1">Estado</label>
     <select class="form-control" name="estado" id="exampleFormControlSelect1">
      <option class="red">Prestado</option>

    </select>
    <br>    
  </div>
  <br>





      



      
<div class="form-group">
       
                
                <button type="submit" name="insertarEquipo" class="btn btn-primary mb-2">Insertar</button>

                </form>

      
<?php 
if(isset($_POST['insertarEquipo'])){
guardarPrestamo($conexion);
}
?>

      </div>
      
      
      </div>







</body>
	</html>
