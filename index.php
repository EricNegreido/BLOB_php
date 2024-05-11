<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<!-- enctype=epecifica el tipo de archivo vamos a tratar -->
<form action="datos.php" method="POST" enctype="multipart/form-data">
  <label for="archivo"> Imagen:</label>   
  <input type="file" name="archivo" size="20">
  <input type="submit" value="submit">
</form>

<?php 
  require("conexion.php");

  $tipo_archivo ="";
  $id_archivo="";
  $contenido_archivo="";
  $nombre_archivo="";

  $db = new Connect();
  mysqli_set_charset($db->connection(), "utf8");
  
  $result = mysqli_query($db->connection(),"SELECT * FROM datos_extras");

  while($row = mysqli_fetch_array($result)){
    $id_archivo= $row["id"];
    $nombre_archivo= $row["nombre"];
    $contenido_archivo=$row["contenido"];
    $tipo_archivo=$row["tipo"];
    echo "id: " . $id_archivo . "<br>";
    echo "Nombre: " . $nombre_archivo . "<br>";
    echo "Tipo: " . $tipo_archivo . "<br>";
    echo "<img src='data:$tipo_archivo; base64," . base64_encode($contenido_archivo) . "'>" . "<br>";
  }

  ?>

</body>
</html>