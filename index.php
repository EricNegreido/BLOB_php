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

  $db = new Connect();
  mysqli_set_charset($db->connection(), "utf8");
  
  $result = mysqli_query($db->connection(),"SELECT img FROM datos_usuarios WHERE nombre='antonio'");

  while($row = mysqli_fetch_array($result)){
    $dir_img = $row["img"];
  }
?>

<div>
  <img src="..\img\<?php echo $dir_img; ?>" alt="archivo">
</div>
</body>
</html>