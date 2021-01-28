<?php 

include 'funcionSQL.php';
?>
<!DOCTYPE html>
	<html lang="es">
	<title>
Crear Usuario
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
 <h5> <b> Creacion de Usuario<b></h5>
</div>
<br>
<br>



<div class="row">

<div class="col-md-1">
</div>


<div class="col-md-4">


<form action="update.php" method="post">

    



        <br>
              <div class="form-group">
                <label for="pwd">Nombre</label>
                <input type="text" name="nombre"class="form-control" id="pwd" placeholder="Nombre" >
                </div> 
           <br>

              <div class="form-group">
              <label for="pwd">Apellido</label>
              <input type="text" class="form-control" id="pwd" placeholder="Apellido" name="apellido">
              </div>
            <br>
            

            
       
            <div class="form-group">
                <label for="pwd">DNI</label>
                <input type="text" class="form-control" id="pwd" placeholder="DNI" name="dni">
                </div> 
            <br>
            <div class="form-group">
                <label for="pwd">Nombre de Usuario</label>
                <input type="text" class="form-control" id="pwd" placeholder="Nombre de Usuario" name="nombre_usuario">
                </div> 
            <br>
       
       
            

               
  <div class="form-group">
                <label for="pwd">Clave</label>
                <input type="password" name="clave" placeholder="Clave" step="1">
                </div> 
            <br>
         
 
  

            <button type="submit" name="crearUsuario" class="btn btn-primary mb-2">Insertar</button>
  </div> 
           
           
      
   

      </form>


      </div>
      </div>






</body>
	</html>