<?php 

include 'funcionSQL.php';
?>
<!DOCTYPE html>
	<html lang="es">
	<title>
	Principal
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
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

	   <link rel="stylesheet" href="fonta/css/all.css">
		 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript" src="dist/jquery.tabledit.js"></script>
<script type="text/javascript" src="custom_table_edit.js"></script>
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>

</head>

<body >
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

</nav>
<br>
<br>

</div>

<br>
<br>
<br>
<br>
<div class="runaway ">
<center> <h5> <b>EQUIPO PRESTADO<b></h5></center>
</div>

<br>
<br>
</div>
<div class="row">
<div class="col-md-3">
Filtrar
<input type="text"  placeholder="" id="myInput" onkeyup="myFunction()">
</div>
<div >
<table  id="myTable" class="table table-bordered table table-responsive " WIDTH=350 HEIGHT=400 >
    <thead class="thead-dark" >
    
        <tr>

            <th>ID</th>
		        <th>DNI Prestatario</th>
            <th>Nombre Prestatario</th>
            <th>Apellido Prestatario</th>

            <th>Entregado por</th>
            <th>Equipamiento</th>
            <th>Nº Equipo</th>
            <th>Lugar </th>
            <th>Materia/Curso</th>
            <th>Hora de retiro</th>
            <th>Desde hora</th>
            <th>Hasta Hora</th>
            <th>Fecha de retiro</th>
            <th>Estado</th>
            <th >Fecha de devolucion</th>
            <th>Hora de devolucion</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
            


        </tr>
        <?php






  
  $conexion=mysqli_connect("localhost","root","","gestion_tecnologica") or die("conexion fallida");
        $registro=mysqli_query($conexion, "select p.id as idPersonal, p.nombre as nombre_p,
         p.apellido as apellido_p, 
        p.dni as dni, e.id as id,
        e.tipo as tipo, e.lugar as lugar, e.id_personal as idPersonal2, e.numero as numero,e.materia_curso as mc, 
        e.hora_retiro as hret, e.desde_hora as dr, e.hasta_hora as hr, e.fecha_retiro as fr, e.estado as estado, e.fecha_devolucion,
        e.hora_devolucion,
     
        u.id as idUsuario,  u.nombre as nombre from personal
         p inner join equipo e on e.id_personal=p.id inner join usuario u on u.id=e.id_usuario 
         order by id DESC
        ") or die("error ".mysqli_error($conexion));
         while($row=mysqli_fetch_array($registro)){
            ?>
                  <tr>
          <form id="formulario" method="POST" action="update.php"> 
    
          <td><input style="width:50px;" id="id" type="text" name="id" value="<?php echo  $row['id'];  ?>"  readonly class="form-control"> </td>
          <td><input style="width:100px; " id="dni"   type="number" name="dni" value="<?php echo  $row['dni'];  ?>" readonly class="form-control">  </td>
          <td><input style="width:100px; "   id="nombre_p"   type="text" name="nombre_p" value="<?php echo  $row['nombre_p'];  ?>" readonly class="form-control"> </td>
          <td><input style="width:100px; "   id="apellido_p"   type="text" name="apellido_p" value="<?php echo  $row['apellido_p'];  ?>" readonly class="form-control"> </td>

          <td><input style="width:100px; "   id="nombre"   type="text" name="nombre" value="<?php echo  $row['nombre'];  ?>" readonly class="form-control"> </td>
          <td><input style="width:100px; " id="tipo"  type="text" name="tipo" value="<?php echo  $row['tipo'];  ?>" readonly  class="form-control"> </td>
          <td><input style="width:50px; " id="numero"type="number" name="numero" value="<?php echo  $row['numero'];  ?>" readonly  class="form-control"> </td>
          <td ><input style="width:150px; " id="lugar"type="text" name="lugar" value="<?php echo  $row['lugar'];  ?>" readonly  class="form-control"> </td>
          <td ><input style="width:200px; " id="materia_curso"type="text" name="mc" value="<?php echo  $row['mc'];  ?>"  readonly class="form-control"> </td>
          <td ><input type="time"  id="hret"name="hora_retiro" value=<?php echo $row['hret'];?> max="23:59:00" min="00:00:00" step="1" readonly class="form-control">
          <td ><input type="time" id="dr"name="desde_hora" value=<?php echo $row['dr'];?> max="23:59:00" min="00:00:00" step="1" readonly class="form-control">
          <td ><input type="time" id="hr"name="hasta_hora" value=<?php echo $row['hr'];?> max="23:59:00" min="00:00:00" step="1" readonly class="form-control">
          <td ><input type="date" id="fr"name="fechaRetiro"  max="" value="<?php echo $row['fr'];?>" class="form-control" readonly>
         



<td>

<div class="form-group">
  

<select class="form-control" style="width:120px; "  name="estado" id="exampleFormControlSelect1">

<?php
if($row['estado']=='Devuelto'){ 
?>
  <option value="Devuelto" selected>Devuelto</option>
  <option value="Prestado" >Prestado</option>


<?php
}
else{
?>

  <option value="Prestado" selected>Prestado</option>
  <option value="Devuelto" >Devuelto</option>

<?php }?>

</select>
</div>

</td>



          <td contenteditable='true'><input type="date" name="fecha_devolucion" id="fecha_devolucion"   value="<?php echo $row['fecha_devolucion'];?>" class="form-control" ></td>
          <td contenteditable='true'><input type="time" name="hora_devolucion" id="hora_devolucion" value="<?php echo $row['hora_devolucion'];?>" max="23:59:00" min="00:00:00" step="1" > </td>
          <td><input type="submit" id="enviar"  name="actualizar" value="Actualizar"  class="btn btn-primary"></td>
          <td><input type="submit" id="enviarEliminar"  name="Eliminar" value="Eliminar"  class="btn btn-danger"></td>

  </form> 
    
            </tr>
<?php }?> 
          
          </thead>
 
</table>
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
