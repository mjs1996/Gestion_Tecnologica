<?php 

include 'funcionSQL.php';
?>
<!DOCTYPE html>
	<html lang="es">
	<title>
	Listado del equipo entregado
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





<center> <h5> <b>EQUIPO NUEVO ENTREGADO<b></h5></center>


<div class="row">

<div class="col-md-3">

Filtrar

<input  id="myInput" onkeyup="myFunction()" type=text>
</div>



<div class="col-md-12">


<br>
<div class="runaway ">
</div>


</div>
<div class="table table-responsive">
<table  id="myTable" class="table table-bordered table table-responsive "   WIDTH=300 HEIGHT=400 >
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Tecnico</th>
            <th>Equipamiento</th>
            <th>S/N</th>
            <th>Departamento</th>
            <th>Nº Proyecto</th>
            <th>Hora de entrega</th>
            <th>Fecha de entrega</th>
            <th>Detalle del equipo</th>
            <th>Actualizar</th>
            <th> Eliminar</th>
            <th> PDF</th>



        </tr>
 
 
    <?php
        $conexion=mysqli_connect("localhost","root","","gestion_tecnologica") or die("conexion fallida");

      $sql=mysqli_query($conexion, "select  e.id as id, e.tipo as tipo, 
         e.detalle as detalle, e.serie as serie, e.num_proyecto as num_p, e.departamento as departamento, 
         e.fecha_entrega as fecha_entrega,
         e.hora_entrega as hora_entrega, u.nombre_usuario as tecnico
         from equipo_nuevo e inner join usuario u on u.id=e.id_usuario 
         ORDER BY e.id DESC ")    or die("error ".mysqli_error($conexion));
        $count=0;


        while($reg=mysqli_fetch_array($sql)){
         ?>
<form action="DatosPDF.php" method="post">
           <tr>
           <td>  <input style="width:40px;"  type="text" name="id" value="<?php echo $reg['id'];  ?>"  readonly> </td>

           <td>  <input style="width:100px;"  type="text" name="tecnico" value="<?php echo $reg['tecnico'];  ?>"  readonly> </td>
           <td>  <input style="width:150px;"  type="text" name="equipamiento" value="<?php  echo $reg['tipo']; ?>" > </td>
           <td>   <input style="width:200px;" type="text"name="s_n" value="<?php echo $reg['serie']; ?>"  > </td>
           <td>  <input style="width:120px;"  type="text" name="departamento" value="<?php echo $reg['departamento']; ?>"  > </td>
           <td><input style="width:100px;"  type="text" name="n_proyecto" value="<?php echo $reg['num_p']; ?>"></td>
           <td><input type="time"                  name="hora_entrega" value=<?php echo $reg['hora_entrega'];?> max="23:59:00" min="00:00:00" step="1"></td>
           <td><input type="date"                  name="fecha_entrega" value="<?php echo $reg['fecha_entrega'];?>" max="" min="" step="1" ></td>
           <td>  
      
           <div class = "form-group">
           <textarea  class="form-control"  id="exampleFormControlTextarea3" name="detalle" style="width:300px;
  height: 100px;"> <?php echo $reg['detalle'];?></textarea>
         </div> 

</td>
           <td> <input   type="submit" name="actualizar2" value="Actualizar"  class="btn btn-primary mb-2"> </td>
           <td> <input   type="submit" name="eliminar2" value="Eliminar"  class="btn btn-primary mb-2"> </td>
           <td> <input   type="submit" name="pdf" value="PDF"  class="btn btn-primary mb-2"> </td>

           </tr>
  </form>

        <?php 
      
    }
        ?>
    </thead>
</table>

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
                for (var j = 0; j < cellsOfRow.length && !found; j++) { compareWith = cellsOfRow[j].innerHTML.toLowerCase(); if (busqueda.length == 0 || (compareWith.indexOf(busqueda) > -1))
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