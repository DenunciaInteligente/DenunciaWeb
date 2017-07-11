<?php

class Validar
{

	public function login_usuarios($user, $clave)
	{
		include_once "CapaDatos/conecta.php";
		$info 	= "";

		$sql 	= "select count(*) as contar from login where usuario = '$user'";
		$rs 	= mysqli_query($conx, $sql);
		$datos 	= mysqli_fetch_array($rs);
		return $contar = $datos["contar"];

		if($contar == 1 )
		{
			$sql 	= "select * from login where usuario = '$user'";
			$rs 	= mysqli_query($conx, $sql);
			$datos 	= mysqli_fetch_array($rs);
			if($datos["contraseña"] == $clave)
			{
				header("Location:home.php");
			}else{

			}

		}

	}
}




?>