<?php
$Termino = $_GET['term'];

//$Termino = 'G';

$dbHost     = "localhost";
$dbName     = "webl18100148";
$dbUsername = "root";
$dbPassword = "1234";
$listaDatos = array();

// Regresa un array de objetos para el Autocomplete

$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
if ($db->connect_error) {
    $data['label'] = $row['Err'];
    $data['value'] = $db->connect_error;
    array_push($listaDatos, $data);
} else {

    $query = $db->query("SELECT * FROM formulario_artista WHERE nombre_cantante LIKE '%".$Termino."%' ORDER BY nombre_cantante ASC");
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){

        $datosreg['id_cantante'] = $row['id_cantante'];
        $datosreg['apellido_cantante'] = $row['apellido_cantante'];
        $datosreg['nombre_discografia'] = $row['nombre_discografia'];
        $datosreg['direccion_disco']     = $row['direccion_disco'];
        $datosreg['telefono_disco']  = $row['telefono_disco'];
        $datosreg['nombre_album'] = $row['nombre_album'];
        $datosreg['num_canciones'] = $row['num_canciones'];
        $datosreg['duracion_album']     = $row['duracion_album'];
        $datosreg['categoria_musica']  = $row['categoria_musica'];

        $data['label'] = $row['nombre_cantante'];
        $data['value'] = $datosreg;
        array_push($listaDatos, $data);
        }
    }
}

echo json_encode($listaDatos);
?>