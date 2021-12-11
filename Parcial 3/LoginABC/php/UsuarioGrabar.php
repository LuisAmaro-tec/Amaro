<?php
$vId        = $_POST['idu'];
$vNombre    = $_POST['nom'];
$vApellido = $_POST['app'];
$vDirDisco = $_POST['ddd'];
$vTelDisco     = $_POST['tdd'];
$vNombreAlbum  = $_POST['nda'];
$vNumeroCanciones  = $_POST['ndc'];
$vDuracionAlbum  = $_POST['dda'];
$vCategoriaMusica  = $_POST['cdm'];
$vTipo      = $_POST['tip'];

$hostname = 'localhost';
$database = 'webl18100148';
$username = 'root';
$password = '1234';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
} catch(PDOException $e) {
    $row['resultado']  = '1';
    $row['informacion']= 'Error DB';
    $row['mensaje']    = 'Exeption';
    $row['detalle']    = $e->getMessage();
}


try {
    if ($vTipo==1) {
        $query = "INSERT INTO formulario_artista
                  SET nombre_cantante = ?, apellido_cantante = ?, nombre_discografia  = ?, direccion_discografia = ?, direccion_disco =?, telefono_disco =?, nombre_album =?, num_canciones =?, duracion_album =?, categoria_musica =?";

        $stmt = $dbh->prepare($query);
        $stmt->bindParam(1, $vNombre);
        $stmt->bindParam(2, $vApellido);
        $stmt->bindParam(3, $vDirDisco);
        $stmt->bindParam(4, $vTelDisco);
        $stmt->bindParam(5, $vNombreAlbum);
        $stmt->bindParam(6, $vNumeroCanciones);
        $stmt->bindParam(7, $vDuracionAlbum);
        $stmt->bindParam(8, $vCategoriaMusica);
    } else {
        $query = "UPDATE formulario_artista
                  SET nombre_cantante = ?, apellido_cantante = ?, nombre_discografia  = ?, direccion_discografia = ?, direccion_disco =?, telefono_disco =?, nombre_album =?, num_canciones =?, duracion_album =?, categoria_musica =?
                  WHERE id_cantante = ?";

        $stmt = $dbh->prepare($query);
        $stmt->bindParam(1, $vNombre);
        $stmt->bindParam(2, $vApellido);
        $stmt->bindParam(3, $vDirDisco);
        $stmt->bindParam(4, $vTelDisco);
        $stmt->bindParam(5, $vNombreAlbum);
        $stmt->bindParam(6, $vNumeroCanciones);
        $stmt->bindParam(7, $vDuracionAlbum);
        $stmt->bindParam(8, $vCategoriaMusica);
        $stmt->bindParam(9, $vId);
        // $stmt->bindParam(6, $vTipo);
    }

   if ($stmt->execute()) {

        if ($vTipo==1) {
            $stmt = $dbh->prepare("select LAST_INSERT_ID() as consecutivo");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $row['resultado']  = '0';
            $row['informacion']= 'Exito';
            $row['mensaje']    = "Registro Insertado exitosamente";
            $row['detalle']    = $result['consecutivo'];
        } else {
            $row['resultado']  = '0';
            $row['informacion']= $vNombre." ".$vApellido;;
            $row['mensaje']    = "Registro Modificado exitosamente";
            $row['detalle']    = $vId;
       }
   } else {
        $row['resultado']  = '2';
        $row['informacion']= 'Error DB';
        $row['mensaje']    = 'Error Ejecucion de sentencia sql';
        $row['detalle']    = 'Error al hacer sentecia de insercion';
   }

} catch(PDOException $exception) {
    $row['resultado']  = '3';
    $row['informacion']= 'Error DB';
    $row['mensaje']    = 'Error de Exepcion';
    $row['detalle']    =  $exception->getMessage();
}


$encoded_row = array_map('utf8_encode',$row);
echo json_encode($encoded_row);
?>
