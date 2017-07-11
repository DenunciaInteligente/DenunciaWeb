<?php
include_once "../CapaDatos/bomberos.php";

$rut  		= $_POST["rut"];
$prinom		= $_POST["prinom"];
$segnom 	= $_POST["segnom"];
$appat 		= $_POST["appat"];
$apmat 		= $_POST["apmat"];
$direccion 	= $_POST["direccion"];
$cargo 		= $_POST["cargo"];
$fono 		= $_POST["fono"];
$fecnacim 	= $_POST["fecnacim"];
$tarea 		= $_POST["tarea"];
$id 		= $_POST["id"];

 
$bomberos = new Bomberos();

switch ($tarea) {

    case "agregar":
    	echo $bomberos -> registro_personal($rut,$prinom,$segnom,$appat,$apmat,$direccion,$cargo,$fono,$fecnacim);

        break;

    case "editar":

    	echo $bomberos -> editar_personal($id,$rut,$prinom,$segnom,$appat,$apmat,$direccion,$cargo,$fono,$fecnacim);

        break;

    case "eliminar":

    	echo $bomberos -> eliminar_personal($id);

        break;

    
}
?>