<?php

class Bomberos
{

	public function traer_lista_denuncias()
	{
		include_once "../capa_datos/conecta.php";

		$sql 	= "select * from tipo_denuncias where id_perfil = 2";
		$rs 	= mysqli_query($conx, $sql);
		$option = "";
		while($datos = mysqli_fetch_array($rs))
		{
			$option .= "<option value='".$datos['id_tipo_denuncia']."'>".$datos['nom_tipo_denuncia']."</option>";
		} 
		return $option;
	}

	public function registro_post($id_tipo_denuncia, $fecha, $post)
	{
		include_once "../capa_datos/conecta.php";

		$resultado = "";
		$sql  	= "INSERT INTO posteos (id_tipo_denuncia, fecha,post) VALUES ($id_tipo_denuncia, '$fecha', '$post')";
		
		if(mysqli_query($conx, $sql))
		{
			$resultado = "si";
		}else{
			$resultado = "no";
		}

		return $resultado;
	}

	public function registro_personal($rut,$prinom,$segnom,$appat,$apmat,$direccion,$cargo,$fono,$fecnacim)
	{
		include_once "../CapaDatos/conecta.php";

		$resultado = "";
		$sql  	= "INSERT INTO `database_denuncias`.`personal_bomberos` (`id_per_bom`, `rut-bombero`, `prinom-bombero`, `segnom-bombero`, `appat-bombero`, `apmat-bombero`, `direc-bombero`, `cargo-bombero`, `fono-bombero`, `fecnacim-bombero`) VALUES (NULL, '$rut', '$prinom', '$segnom', '$appat', '$apmat', '$direccion', '$cargo', '$fono', '$fecnacim')";
		
		if(mysqli_query($conx, $sql))
		{
			$resultado = "si";
		}else{
			$resultado = "no";
		}

		return $resultado;

	}

	public function editar_personal($id,$rut,$prinom,$segnom,$appat,$apmat,$direccion,$cargo,$fono,$fecnacim)
	{
		include_once "../CapaDatos/conecta.php";
		//$fecha = date('Y-m-d');
		$resultado = "";
		//$sql = "UPDATE 'personal_bomberos' SET 'rut-bombero'=".$rut.", 'prinom-bombero'=".$prinom." where id_per_bom = ".$id);
		$sql ="UPDATE `personal_bomberos` SET `rut-bombero`='$rut',`prinom-bombero`='$primon',`segnom-bombero`='$segnom',`appat-bombero`='$appat',`apmat-bombero`='$apmat',`direc-bombero`='$direc',`cargo-bombero`='$cargo',`fono-bombero`='$fono',`fecnacim-bombero`='$fecnacim' WHERE `id_per_bom`= '$id'";

		if(mysqli_query($conx, $sql))
		{
			$resultado = "si";
		}else{
			$resultado = "no";
		}

		return $resultado;
	}

	public function eliminar_personal($id)
	{
		include_once "../CapaDatos/conecta.php";

		$resultado = "";
		$sql  	= "DELETE FROM personal_bomberos where id_per_bom = $id";
		
		if(mysqli_query($conx, $sql))
		{
			$resultado = "si";
		}else{
			$resultado = "no";
		}

		return $resultado;

	}


}




?>