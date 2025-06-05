<!DOCTYPE html>
<html lang="es">
<head>
<title>Ejemplo Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<meta charset="utf-8">
</head>
<body>
	<h2>Inicio de sesión</h2>
	<br><br>
	<?php
		if(isset($_GET['error'])){
			$error = $_GET['error'];
		?>
		<div class="alert alert-danger" role="alert">
		<?php 
			if($error == 1)
				echo "USUARIO O CONTRASEÑA NO VÁLIDOS";			
			elseif($error == 2)			
				echo "DEBES INICIAR SESIÓN";			
			elseif($error == 3)
				echo "HAZ CERRADO SESIÓN";
		?>
		</div>
		<?php
		}
	?>

	<form method="POST" action="valida.php">
Correo electrónico: <input type="email" name="correo" id="correo" required>
<br><br>
Password: <input type="password" name="pwd" id="pwd" required>
<br><br>
<input type="submit" name="enviar" id="enviar" value="Iniciar sesión">
<input type="reset" name="limpiar" id="limpiar" value="Limpiar">
	</form>
</body>
</html>