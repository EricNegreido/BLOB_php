<?php
//Recibimos datos de imagen con la variable superglobal $_FILES
//files es un array
$nombre_archivo = $_FILES["archivo"]["name"];
$tipo_archivo = $_FILES["archivo"]["type"];
$tamaño_archivo = $_FILES["archivo"]["size"];

$carpeta_destino = $_SERVER["DOCUMENT_ROOT"] . "\img\\";

echo $carpeta_destino;
//movemos imagen de dir temporal al seleccionado en el servidor
move_uploaded_file($_FILES["archivo"]["tmp_name"],$carpeta_destino.$nombre_archivo);

require("conexion.php");

$db = new Connect();
mysqli_set_charset($db->connection(), "utf8");

$archivo = fopen($carpeta_destino . $nombre_archivo, "r");

$contenido = fread($archivo, $tamaño_archivo);

$contenido = addslashes($contenido);

mysqli_query($db->connection(),"INSERT INTO datos_extras (id, nombre, tipo, contenido) VALUES (0, '$nombre_archivo', '$tipo_archivo', '$contenido')");

if(mysqli_affected_rows($db->connection())){
  echo "Se ha insertado el registro";
}else{
  echo "hubo un error";
}

header("Location:index.php");

?>