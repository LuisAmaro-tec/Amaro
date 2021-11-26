<?php
include "conectar.php";

try {
       $queryStr="select * from formulario_artista";
       $query=$con->prepare($queryStr);
       $query->execute();

        while ($row = $query->fetch()) {
            echo $row['id_Cantante'].'-'.
                 $row['nombre_cantante'].'-'.
                 $row['apellido_cantante'].'-'.
                 $row['nombre_discografia'].'-'.
                 $row['direccion_disco'].'-'.
                 $row['telefono_disco'].'-'.
                 $row['nombre_album'].'-'.
                 $row['num_canciones'].'-'.
                 $row['duracion_album'].'-'.
                 $row['categoria_musica'].'-'.
                 $row['id_cred_usuarios'].'<br>';
        }
        $query->closeCursor();

} catch(PDOException $e) {
        echo "Error de consulta a la base de datos";
        echo $e->getMessage();
}
?>
