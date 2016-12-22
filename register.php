<?php
/**
 * Created by PhpStorm.
 * User: fjruiz
 * Date: 20/10/16
 * Time: 9:16
 */
require_once "Connection.php";
$db=Database::getInstance();
$connection=$db->getConnection();
$stmt = $connection->prepare("INSERT INTO Usuarios (User,Pasword) VALUES (?,?)");

$contra=$_POST["pass"];
$contra=password_hash($_POST["pass"],PASSWORD_BCRYPT,[10]);

$stmt->bind_param("ss",$_POST['usuario'],$contra);
$correcta=$stmt->execute();
if($correcta){
    echo "Consulta ejecutada correctamente!";
}else{
    echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
}
?>