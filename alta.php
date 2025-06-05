<?php
require_once "menu.php";
require_once "libs/conexion.php";
require_once "libs/funciones.php";

// valida que se tienen los valores requeridos
if(isset($_POST['iduser'])!=null && isset($_POST['nombre'])!=null && isset($_POST['appat'])!=null && isset($_POST['correo'])!=null && isset($_POST['pwd'])!=null && isset($_POST['idrol'])!=null){
    // almacena la información en la BD
    $res = registraUsuario($_POST['iduser'], $_POST['nombre'], $_POST['appat'], $_POST['apmat'], $_POST['correo'], $_POST['pwd'], $_POST['idrol']);
    if($res){
    ?>
    <div class="alert alert-success" role="alert">
        El usuario se registro satisfactoriamente
    </div>
    <?php }  
    else {
        ?>
         <div class="alert alert-danger" role="alert">
            Ocurrió un error al registrar al usuario
        </div>        
    <?php 
    } //del else
}
?>
<h2>Registro de usuarios</h2>
<form action ="" method="POST">    
<div class="container text-center">
  <div class="row">
    <div class="col">
      Id del usuario:
    </div>
    <div class="col">
      <input type="number" name="iduser" id="iduser" required>
    </div>    
  </div>
  <div class="row">
    <div class="col">
      Nombre del usuario:
    </div>
    <div class="col">
      <input type="text" name="nombre" id="nombre" required>
    </div>    
  </div>
  <div class="row">
    <div class="col">
      Apellido Paterno del usuario:
    </div>
    <div class="col">
      <input type="text" name="appat" id="appat" required>
    </div>    
  </div>
  <div class="row">
    <div class="col">
      Apellido Materno del usuario:
    </div>
    <div class="col">
      <input type="text" name="apmat" id="apmat">
    </div>    
  </div>
  <div class="row">
    <div class="col">
      Correo del usuario:
    </div>
    <div class="col">
      <input type="email" name="correo" id="correo" size="80" required>
    </div>    
  </div>
  <div class="row">
    <div class="col">
      Contraseña del usuario:
    </div>
    <div class="col">
      <input type="password" name="pwd" id="pwd" required>
    </div>    
  </div>
  <div class="row">
    <div class="col">
        Rol    </div>
    <div class="col">
      <select name="idrol" required>
        <option value="">Selecciona un rol</option>
        <?php
            $lista = listaRoles();
            if(is_array($lista)){
                foreach($lista as $valores){
                    echo "<option value=".$valores['id_rol'] .">".$valores['rol']."</option>";
                }
            }
        ?>
        </select>
    </div>    
  </div>
  <div class="row">
  <div class="col">
    <br>
<input type="reset" value="Cancelar">
<input type="submit" value="Guardar">
        </div>
        </div>
</div>
</form>