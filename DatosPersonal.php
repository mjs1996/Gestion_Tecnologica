<?php 
include 'funcionSQL.php';

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
     <script text="text/javascript" src="js/jquery-3.2.1.slim.min.js"></script>
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

<div class="runaway space ">
<h5> <b> Datos del Prestatario<b></h5>
</div>
<br>
<br>
<br>





<div class="row">
<div class="col-md-1">
</div>
<div class="col-md-3">

<div class="form-group">
<p> Filtrar </p>
<input type="text" name="filtro"  id="myInput"  class="form-control" onkeyup="myFunction()">
                   
</div>
</div>



     
<div class="col-md-6">
<table class="table table-responsive "  id="myTable"   WIDTH=123 HEIGHT=250>
    <thead class="thead-dark">
        <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>DNI/Legajo</th>
        <th>Seleccionar<th>
        </tr>
<?php 
  $conexion=mysqli_connect("localhost","root","","gestion_tecnologica") or die("conexion fallida");


  $result= mysqli_query($conexion, "select id, nombre, apellido, dni from personal 
  order by id DESC") 
  or die("Problemas con la busqueda: " . mysqli_error($conexion));

while($row = mysqli_fetch_array($result)){
?>
 <tr>
 
          <td>  <input type="number" name="id" value="<?php echo  $row['id']; ?>" readonly> </td>
          <td>  <input type="text" name="nombre" value="<?php echo  $row['nombre']; ?>" readonly> </td>
          <td>  <input type="text" name="apellido" value="<?php echo  $row['apellido']; ?>" readonly> </td>
          
          <form action='DatosEquipo.php' method='POST'>
          <td>  <input type="number" id="dni" name="dni" value="<?php echo  $row['dni']; ?>" readonly> </td>
        
          <td>  <input type="submit" id="enviar" name="enviarDNI"value="SELECCIONAR"  class="btn btn-primary mb-2">
          </td>
          </form>
          </tr>

<?php
}


        ?>
    </thead>
    <tbody>

    </tbody>
</table>

</div>



</div>


<br>
<br>



</div>
<div class="row"> 
<div class="col-md-1">
</div>

<div class="col-md-4">


<form action="funcionSQL.php" method="POST">




						<div class="form-group">
								<label for="pwd">Nombre</label>
								<input type="text" class="form-control"  placeholder="Nombre" name="nombre">
								</div>
						<br>




											<div class="form-group">
													<label for="pwd">Apellido</label>
													<input type="text" class="form-control"  placeholder="Apellido" name="apellido">
													</div>
											<br>
</div>

<div class="col-md-4">

																<div class="form-group">
																		<label for="pwd">DNI</label>
																		<input type="number" class="form-control"  placeholder="DNI" name="DNI">
																		</div>
																<br>
            <button type="submit"name="insertarPersonal"value="RUN" class="btn btn-primary mb-2" > Insertar </button>

            </form>
					

  </div>
      </div>
      
      </div>


  

<script>
function myFunction() {
 

  var tabla = document.getElementById('myTable');
            var busqueda = document.getElementById('myInput').value.toLowerCase();
            var cellsOfRow="";
            var found=false;
            var compareWith="";
            for (var i = 1; i < tabla.rows.length; i++) {
                cellsOfRow = tabla.rows[i].getElementsByTagName('td');
                found = false;
                for (var j = 0; j < cellsOfRow.length && !found; j++) { 
                  compareWith = cellsOfRow[j].innerHTML.toLowerCase(); if (busqueda.length == 0 || (compareWith.indexOf(busqueda) > -1))
                    {
                        found = true;
                    }
                }
                if(found)
                {
                    tabla.rows[i].style.display = '';
                } else {
                    tabla.rows[i].style.display = 'none';
                }
            }

}
</script>


   
</body>
</html>
