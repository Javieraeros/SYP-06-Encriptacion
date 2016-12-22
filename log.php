<?php
/**
 * Created by PhpStorm.
 * User: fjruiz
 * Date: 22/12/16
 * Time: 11:00
 */
require_once "Connection.php";
$db=Database::getInstance();
$connection=$db->getConnection();
$sql = "Select User,Pasword from Usuarios where User='".$_POST["usuario"]."';";
$result=$connection->query($sql);
if($result->num_rows > 0){
    $row=$result->fetch_assoc();
    if(password_verify($_POST["pass"],$row["Pasword"])){
        echo "Contraseña correcta";
    }else{
        echo "Contraseña incorrecta";
    }
}


