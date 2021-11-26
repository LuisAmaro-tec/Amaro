<?php

$vLogin   = $_GET['parLog'];
$vPassword= $_GET['parPas'];

session_start();
$_SESSION['login']=$vLogin;

?>
