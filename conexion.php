<?php
  class Connect{
    public static function connection(){
      // ESTA VARIABLES SE ALMACENAN EN UN ARCHIVO APARTE CONFIG
        $host = "localhost";
        $db = "CRUD_PDO";
        $user = "root";
        $pass = "";
        try {
          $connection = mysqli_connect($host, $user, $pass, $db);
          if (!$connection) {
              throw new Exception(mysqli_connect_error());
          }
          mysqli_set_charset($connection, "utf8");
          return $connection;
      } catch (Exception $e) {
          die("ERROR: " . $e->getMessage() . "\n");
      }
    }
  }
?>