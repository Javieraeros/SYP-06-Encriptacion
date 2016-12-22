<?php
/**
 * Created by PhpStorm.
 * User: fjruiz
 * Date: 20/10/16
 * Time: 9:16
 */

//TODO comprobar que el usuario no existe y ponerlo más bonito

require_once "Connection.php";
if(isset($_POST["usuario"]) and isset($_POST["pass"]) and $_POST["pass"]==$_POST["pass2"]){
    $db=Database::getInstance();
    $connection=$db->getConnection();
    $stmt = $connection->prepare("INSERT INTO Usuarios (User,Pasword) VALUES (?,?)");
    $contra=$_POST["pass"];
    $contra=password_hash($_POST["pass"],PASSWORD_BCRYPT,[10]);

    $stmt->bind_param("ss",$_POST['usuario'],$contra);
    $correcta=$stmt->execute();
    if($correcta){
        echo "Ha sido registrado correctamente!";
    }else{
        echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
    }
}else{
    echo "El nombre debe ser correcto, y las contraseñas deben coincidir";
}
