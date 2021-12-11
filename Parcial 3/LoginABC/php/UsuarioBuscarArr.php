<?php
$TerminoBusqueda=$_GET['term'];
// $TerminoBusqueda='G';
$distaDatos = array();

$hostname = 'localhost';
$database = 'webl18100148';
$username = 'root';
$password = '1234';

// Regresa un array de strings para el Autocomplete

try {
    $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id_cantante,nombre_cantante,apellido_cantante FROM formulario_artista
                            WHERE nombre_cantante LIKE '%".$TerminoBusqueda."%' ORDER BY nombre_cantante ASC");
    $stmt->execute();

    while($row = $stmt->fetch()) {
    $listaDatos[] =  $row['id_cantante'].' '.$row['nombre_cantante'].' '.$row['apellido_cantante'];
    }
} catch(PDOException $e) {
    $listaDatos[] =  $e->getMessage();
}

echo json_encode($listaDatos);
?>