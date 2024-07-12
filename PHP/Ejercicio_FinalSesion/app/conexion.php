<?php
$dbname="libreria";
$host="localhost";
$user ="root";
$password = "";
$respuesta_estado = "";


try {

    $dsn = "mysql:host=$host;dbname=$dbname";
    $dbh = new PDO($dsn, $user,$password); /*Database Handle*/
    $respuesta_estado = "conexion exitosa";
    
    } catch (PDOException $e) {
    
    $respuesta_estado = $respuesta_estado . "\n" . $e->getMessage();
    $dbh = null;
    }

?>
