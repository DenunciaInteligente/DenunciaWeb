<?php
include_once "../CapaDatos/login.php";

$user  		= $_POST["user"];
$clave		= $_POST["clave"];
$tarea 		= $_POST["tarea"];

$login = new Validar();

switch ($tarea) 
{

    case "login":
    	echo $login -> login_usuarios($user,$clave);

        break;

}
?>