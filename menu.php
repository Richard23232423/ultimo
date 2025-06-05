<?php 
session_start();

if(isset($_SESSION['nombre'])){

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Menu de opciones</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<meta charset="utf-8">

    </head>
    <body>

     
        
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">Bienvenido(a): 
            <?php echo $_SESSION['nombre']; ?></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Inicio</a></li>
      <li><a href="listado.php">Consulta</a></li>
      <li><a href="alta.php">Registro</a></li>
      <li><a href="actualiza.php">Actualización</a></li>
      <li><a href="borrado.php">Baja</a></li>
      <li><a href="logout.php">Salir</a></li>
    </ul>
  </div>
</nav>     
    </body>
</html>


<?php
}else
    header("Location: login.php?error=2");
?>