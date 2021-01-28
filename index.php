<?php
 include 'loginSQL.php';
 ?>
<!DOCTYPE html>
	<html lang="es">
	<title>
		Login
	</title>
<head>
	 <meta charset="UTF-8">
	   <link rel="stylesheet" href="css/bootstrap.css">
	   <link rel="stylesheet" href="css/bootstrap-theme.css">
	   <link rel="stylesheet" href="estilos.css">
	   <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
	     <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
		 <link href="signin.css" rel="stylesheet">
		 <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
		 <link rel="stylesheet" href="/css/fontawesome.min.css">
		 <script defer="" src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
		   <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>

<body>
	<center>
	<div class="jumbotron ">
		<div class=" Monserrat black">
<h1 class="white animate__animated animate__bounceIn"> Sistema Gestión Tecnológica</h1>
</div>
</div>
</center>

<div class="row espacio_margen  animate__animated animate__bounceIn">
<div class="col-sm-4"></div>

<div class="col-sm-4 cuerpo_color">

  <script src="js/bootstrap.js"></script>



<form class="text-center border border-light p-5" method="post"action="index.php">

<p class="h4 mb-4">Inicio de sesión</p>

<input type="text" id="defaultLoginFormEmail" name="user"class="form-control mb-4" placeholder="Usuario">






<input type="password" id="defaultLoginFormPassword" name="pass" class="form-control mb-4" placeholder="Contraseña">



<button  class="btn btn-info btn-block my-4" name='login' type="submit">Ingresar</button>


</form>

<?php 
if(isset($_POST['login'])){
validacion();
}
?>

</div>
</div>

</body>
	</html>
