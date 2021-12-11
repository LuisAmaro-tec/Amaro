<?php       
    $host = 'localhost';
    $dbname = 'webl18100148';
    $username = ' root';
    $password = '1234';
    
    $usuario = $_POST['usuario'];
    $pass = $_POST['contrasena'];   
    
    $con = mysqli_connect($host,$username,$pass,$dbname);
    $cmm = "select * from usuarios where usuario = '$usuario' and contraseña = '$pass'";
    $resultado = mysqli_query($con,$cmm);
    $filas = mysqli_num_rows($resultado);
    if($filas > 0){
        header("Location:Formulario Responsivo.html");
    } else{
        header("Location:index.html");
        echo "Credenciales inexistentes en la BD";
    }
    mysqli_close($con)
?>