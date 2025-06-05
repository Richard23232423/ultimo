<?php
require_once "menu.php";
require_once "libs/conexion.php";
require_once "libs/funciones.php";

?>
<h2>Eliminar usuario</h2>
<?php
// si no se recibe el id del usuario a modificar, se muestra la lista
if(!isset($_POST['iduser'])){
?>
<form action ="" method="POST" name="f1" id="f1">    
<div class="container text-center">
  <div class="row">
    <div class="col">Selecciona un usuario:
    </div>
  </div>
  <div class="row">
    <div class="col">
        <select name="iduser" id="iduser" required>
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
  <br>
  <input type="reset" value="Cancelar">
  <input type="submit" value="Eliminar">
</div>
</form>
<?php
}
// se recibio el id del usuario a modificar, entonces mostramos los datos
else {
  $id = $_POST['iduser'];
  // se recomienda implementar la confirmación antes del borrado
  $res = borrarUsuario($id);
  if($res){
  ?>
  <div class="alert alert-success" role="alert">
      El usuario se elimino satisfactoriamente
  </div>
  <?php }  
  else {
      ?>
       <div class="alert alert-danger" role="alert">
          Ocurrió un error al eliminar al usuario
      </div>        
  <?php 
  } //del else


}
?>