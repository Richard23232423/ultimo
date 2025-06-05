<?php
require_once "menu.php";
require_once "libs/conexion.php";
require_once "libs/funciones.php";

?>
<h2>Consulta de usuarios</h2>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Correo</th>
      <th scope="col">Tipo de rol</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $lista = listaUsuarios();
        // recuperamos los elementos de la consulta
        if(is_array($lista)){
            foreach($lista as $usuario){
                $id = $usuario['id_usuario'];
                $nombre = $usuario['nombre'];
                $email = $usuario['correo'];
                $rol = $usuario['rol'];                
            ?>
        <tr>
        <th scope="row"><?php echo $id; ?></th>
        <td><?php echo $nombre; ?></td>
        <td><?php echo $email; ?></td>
        <td><?php echo $rol; ?></td>
        </tr>
        <?php 
            }   // del foreach
        }//del if
        else
            echo "<tr><td colspan=4>No se encontraron datos</td></tr>";
    ?>
  </tbody>
</table>