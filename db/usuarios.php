<?php

function usuarioLogin($email, $password){

    global $pdo;
    global $salt;

    $password = md5($password.$salt);

    try{
        $sql = 'SELECT * FROM tb_usuario WHERE email = :email AND password = :password';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(':email', $email);
        $ps->bindValue(':password', $password);
        $ps->execute();
    }catch(PDOException $e){
        die("No se ha podido extraer información de la base de datos:". $e->getMessage());
    }

    $usuario = $ps->fetch(PDO::FETCH_ASSOC);

    return $usuario;
}
