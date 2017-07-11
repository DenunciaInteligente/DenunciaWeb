<?php 
include_once "../CapaDatos/conecta.php";

/*$target_path = "../../../sistemas/sistema_denuncias_final/assets/img/";
$target_path = $target_path . basename( $_FILES['img_file']['name']); 
if(move_uploaded_file($_FILES['img_file']['tmp_name'], $target_path)) { echo "El archivo ". basename( $_FILES['img_file']['name']). " ha sido subido";
} else{
echo "Ha ocurrido un error, trate de nuevo!";
print_r(error_get_last());
}*/

$event_title = $_POST['title_txt'];
$event_description = $_POST['description_txt'];
$img = $_FILES['img_file'];

$file_name = strtolower($event_title);
echo $file_name = str_replace(" ", "_", $img["name"]);
  // $upload_dir = '/public_html/img';
  $upload_dir = '../../../sistemas/sistema_denuncias_final/assets/img/';

  // Obtiene el formato de la imagen.
  $file_format = $img['type'];
  $file_format = str_replace("image/", "", $file_format);
  $file_format = trim($file_format);

  // Valida que se suba correctamente la imagen.
  if(move_uploaded_file($img['tmp_name'], $upload_dir . "/" . $file_name . "." . $file_format)){
    echo $sql = "insert into imagenes (nombre_imagen) values ('".$file_name."')";
    //INSERT INTO `database_denuncias`.`imagenes` (`id_imagen`, `nombre_imagen`) VALUES (NULL, '')
    if(mysqli_query($conx, $sql))
    {
    	echo "subido exitosamente";
    }
  } else {
    echo "Error al subir imagen:\n";
    print_r(error_get_last());
  }



?>