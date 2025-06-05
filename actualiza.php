<?php
require_once "menu.php";
require_once "libs/conexion.php";
require_once "libs/funciones.php";
?>
<script>
function refresca(){
  document.getElementById("f1").submit();
}
</script>
<?php
// valida que se tienen los valores requeridos
if(isset($_POST['iduser'])!=null && isset($_POST['nombre'])!=null && isset($_POST['appat'])!=null && isset($_POST['correo'])!=null && isset($_POST['pwd'])!=null && isset($_POST['idrol'])!=null){
    // almacena la información en la BD
    $res = actualizaUsuario($_POST['iduser'], $_POST['nombre'], $_POST['appat'], $_POST['apmat'], $_POST['correo'], $_POST['pwd'], $_POST['idrol']);
    if($res){
    ?>
    <div class="alert alert-success" role="alert">
        El usuario se actualizó satisfactoriamente
    </div>
    <?php }  
    else {
        ?>
         <div class="alert alert-danger" role="alert">
            Ocurrió un error al actualizar el usuario
        </div>        
    <?php 
    } //del else
}
?>
<h2>Actualiza usuarios</h2>
<?php
// si no se recibe el id del usuario a modificar, se muestra la lista
if(!isset($_POST['iduser']) || isset($_POST['nombre'])){
?>
<form action ="" method="POST" name="f1" id="f1">    
<div class="container text-center">
  <div class="row">
    <div class="col">Selecciona un usuario:
    </div>
  </div>
  <div class="row">
    <div class="col">
        <select name="iduser" id="iduser" onchange="refresca()" required>
            <option value="">Elige un usuario</option>      
        <?php
        $lista = listaUsuarios();
        if(is_array($lista)){
            foreach($lista as $valores){
                echo "<option value=".$valores['id_usuario'] .">".$valores['nombre']."</option>";
            }
        }
    ?>
        
        </select>
    </div>
  </div>
</div>
</form>
<?php
}
// se recibio el id del usuario a modificar, entonces mostramos los datos
else {
    $id_user = $_POST['iduser'];
    $datosUsuario = buscaInfoUsuario($id_user);
    $nombre = "";
    $ap_pat = "";
    $ap_mat = "";
    $correo = "";
    $pass = "";
    $idrol = "";
    if(is_array($datosUsuario)){
        foreach($datosUsuario as $datos){
            // recupera los campos de la consulta SQL
            $nombre = $datos['nombre'];
            $ap_pat = $datos['ap_paterno'];
            $ap_mat = $datos['ap_materno'];
            $correo = $datos['correo'];
            $pass = $datos['contraseña'];
            $idrol = $datos['id_rol'];
        }
    }
?>    
<form action ="" method="POST" name="f2" id="f2">    
<div class="container text-center">
  <div class="row">
    <div class="col">
      Id del usuario:
    </div>
    <div class="col">
    <!-- el id del usuario no se puede modificar es la llave primaria -->
      <input type="number" name="iduser" id="iduser" required readonly value=<?php echo $id_user; ?> >
    </div>    
  </div>
  <div class="row">
    <div class="col">
      Nombre del usuario:
    </div>
    <div class="col">
      <input type="text" name="nombre" id="nombre" required value='<?php echo $nombre; ?>'>
    </div>    
  </div>
  <div class="row">
    <div class="col">
      Apellido Paterno del usuario:
    </div>
    <div class="col">
      <input type="text" name="appat" id="appat" required value='<?php echo $ap_pat; ?>'>
    </div>    
  </div>
  <div class="row">
    <div class="col">
      Apellido Materno del usuario:
    </div>
    <div class="col">
      <input type="text" name="apmat" id="apmat" value='<?php echo $ap_mat; ?>'>
    </div>    
  </div>
  <div class="row">
    <div class="col">
      Correo del usuario:
    </div>
    <div class="col">
      <input type="email" name="correo" id="correo" size="80" required value='<?php echo $correo; ?>'>
    </div>    
  </div>
  <div class="row">
    <div class="col">
      Contraseña del usuario:
    </div>
    <div class="col">
      <input type="password" name="pwd" id="pwd" required value='<?php echo $pass; ?>'>
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
                    // verifica si el idrol del usuario es el elemento de la lista para marcarlo como seleccionado
                    $sel = ($idrol == $valores['id_rol']) ? " selected " : " ";
                    echo "<option value='".$valores['id_rol'] ."' ". $sel .">".$valores['rol']."</option>";
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

<?php
}
?>