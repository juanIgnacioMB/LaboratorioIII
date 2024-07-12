<?php
include('./manejoSesion.php');
session_destroy();
header('location:./formularioLogin.html');
?>