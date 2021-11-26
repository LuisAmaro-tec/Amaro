<?php

$hostname='localhost';
$database='webl18100148';
$username='root';
$password='1234';

try {
      $con = new PDO("mysql:host=$hostname;dbname=$database",$username,$password);
} catch(PDOException $e) {
      echo "Error de conexion a la base de datos";
      echo $e->getMessage();
      exit();
}

$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

?>
