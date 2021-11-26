<!DOCTYPE html>
<html lang="es">
    <?php
session_start();
if ( !isset($_SESSION['login']) || empty($_SESSION['login']) ) {
    header("Location: ./login.html");
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Descripción">
    <meta name="author" content="Contenido">
    <title>Sistema</title>

    <link rel="stylesheet" href="./resources/bootstrap/css/bootstrap.min.css">
    <script src="./resources/jquery/jquery-1.11.3.min.js"></script>
    <script src="./resources/bootstrap/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href='./css/ModalHeaderColor.css'/>

    <link rel="stylesheet" href="./resources/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <script src="./js/index.js"></script>
</head>

<body>
    <div id="contenedorPrin" class="toggled">

        <!-- Modal de Confirmación -->
        <div class="modal fade" id="modalSalida" role="dialog">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" class="close" data-dismiss="modal">X</button>
                <h2 class="modal-title text-center">Confirmación</h2>
            </div>
            <div class="modal-body text-center">
                <h3>Desea salir del Sistema?</h3>
            </div>
            <div class="modal-footer">
               <a href="./php/logout.php" class="btn btn-default">Si</a>
               <a href="#" data-dismiss="modal" class="btn btn-default">No</a>
            </div>
        </div>
        </div>
        </div>


        <!-- Contenido -->
        <div id="contenedorConte">
            <div class="container-fluid">
                <div class="row encabezado">
                     <div class="col-xs-6 col-sm-6 enca1">
                         <a href="#botonMenu" class="btn btn-default btn-lg" id="botonMenu">
                         <i class="fa fa-bars"></i></a>
                     </div>

                     <div class="col-xs-6 col-sm-6 enca2">
                         <button type="button" class="btn btn-default btn-lg" id="botonUsuario"><?php echo $_SESSION['login'];?><i class="fa fa-user"></i></button>
                         <button type="button" class="btn btn-danger btn-lg" id="botonSalir">Salida<i class="fa fa-sign-out"></i></button>
                     </div>
                </div>

                <div class="row contenido">


<form class="form">

<div class="row">
      <div class="form-group col-xs-6">
      <button id="b_limpiar"  type="button" class="btn btn-primary">Limpiar</button>
      <button id="b_nuevo"    type="button" class="btn btn-primary">Nuevo</button>
      <button id="b_grabar"   type="button" class="btn btn-primary" disabled>Grabar</button>
      <button id="b_eliminar" type="button" class="btn btn-primary" disabled>Eliminar</button>
</div>
<div class="form-group col-xs-6 ui-widget">
      <label for="buscar">Buscar</label>
      <input id="buscar">
</div>
</div>

<div class="row">
<div class="form-group col-xs-4">
      <label for="idUsuario" class="control-label">ID</label>
      <input id="idUsuario" type="text" class="form-control" placeholder="00"disabled/>
</div>
<div class="form-group col-xs-8">
      <label for="nombre">Nombre</label>
      <input id="nombre" type="text" class="form-control" placeholder="Nombre" disabled/>
</div>
</div>

<div class="row">
<div class="form-group col-xs-7">
      <label for="apPaterno">Ap. Paterno</label>
      <input id="apPaterno" type="text" class="form-control" placeholder="Apellido Paterno"disabled/>
</div>
<div class="form-group col-xs-5">
      <label for="apMaterno">Ap. Materno</label>
      <input id="apMaterno" type="text" class="form-control" placeholder="Apellido Materno" disabled/>
</div>
</div>

<div class="row">
<div class="form-group col-xs-7">
      <label for="login">Login</label>
      <input id="login" type="text" class="form-control" placeholder="Login"disabled/>
</div>
<div class="form-group col-xs-5">
      <label for="password">Password</label>
      <input id="password" type="password" class="form-control" placeholder="Password"disabled/>
</div>
</div>

</form>


                </div>
            </div>
        </div>

    </div>
</body>
</html>