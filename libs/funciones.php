<?php
function validaUsuario($correo, $pass){
    global $conn;
    /* ? identifica un parametro dentro de la consulta */
    $sql = "select id_usuario, id_rol, concat(ap_paterno, ' ', ap_materno, ' ', nombre) as nombre from usuarios where correo=? and contraseña=?";
    $stmt = $conn->prepare($sql);
    /* la consulta recibe 2 parametros correo y contraseña, por tanto se envian en el mismo orden */
    $stmt->execute([$correo, $pass]);   

    if ($stmt->rowCount() > 0) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function listaUsuarios(){
    global $conn;
    $sql = "select u.id_usuario, r.rol, concat(u.ap_paterno, ' ', u.ap_materno, ' ', u.nombre) as nombre, u.correo from usuarios u, roles r where r.id_rol=u.id_rol order by r.rol, 3";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);   // no recibe parametros

    if ($stmt->rowCount() > 0) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function buscaInfoUsuario($iduser){
    global $conn;
    $sql = "select * from usuarios where id_usuario =?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$iduser]);   // no recibe parametros

    if ($stmt->rowCount() > 0) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function listaRoles(){
    global $conn;
    $sql = "select id_rol, rol from roles order by rol";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);   // no recibe parametros

    if ($stmt->rowCount() > 0) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function registraUsuario($idusuario, $nombre, $ap_pat, $ap_mat, $email, $pass, $idrol){
    try{
        global $conn;
       
        $sql = "insert into usuarios (id_usuario, nombre, ap_paterno, ap_materno, correo, contraseña, id_rol) values(?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$idusuario, $nombre, $ap_pat, $ap_mat, $email, $pass, $idrol]);   // no recibe parametros
        return true;
    }catch(PDOException $e){
        echo "";
    }
    return false;
}
function actualizaUsuario($idusuario, $nombre, $ap_pat, $ap_mat, $email, $pass, $idrol){
    try{
        global $conn;
       
        $sql = "update usuarios set nombre = ?, ap_paterno=?,ap_materno=?,correo=?,contraseña=?, id_rol=? where id_usuario=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nombre, $ap_pat, $ap_mat, $email, $pass, $idrol, $idusuario]);   // no recibe parametros
        return true;
    }catch(PDOException $e){
        echo "";
    }
    return false;
}

function borrarUsuario($idusuario){
    try{
        global $conn;
       
        $sql = "delete from usuarios where id_usuario=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$idusuario]);   // no recibe parametros
        return true;
    }catch(PDOException $e){
        echo "";
    }
    return false;
}
?>