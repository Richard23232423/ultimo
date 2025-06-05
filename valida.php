<?php
session_start();    // al manejar sesiones, debemos incorporar el session_start al inicio
require_once "libs/conexion.php";
require_once "libs/funciones.php";

// verifica que se reciban los valores del formulario
if(isset($_POST['correo']) !=null && isset($_POST['pwd'])!= null){
    $email = $_POST['correo'];
    $pass =  $_POST['pwd'];
    echo $pass;

    $res = validaUsuario($email, $pass);
    
    // verifica si obtenemos resultados
    if(is_array($res)){
        foreach($res as $valores){
            // recupera los resultados y los asigna a las variables
            $nombre = $valores['nombre'];
            $id = $valores['id_usuario'];
            $rol = $valores['id_rol'];
            // agrega los datos en sesion
            $_SESSION['iduser'] = $id;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['idrol'] = $rol;
        }
        // al encontrar al usuario lo redirecciona al menu
        header("Location: menu.php");
    }
    // no se encontraron datos del usuario que coincidan
    else{
          // usuario y/o contraseña incorrectos
        header("Location: login.php?error=1");
    } 
    
}else{
    // si no se reciben los valores redirecciona al login
    header("Location: login.php?error=2");
}
?>