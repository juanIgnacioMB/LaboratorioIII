<?php 
include("./conexion.php");

$IDLibro = $_POST["IDLibro"];

$respuesta_del_server = "";

try{
    $sql = "DELETE FROM libros WHERE IDLibro=:IDLibro";

    $stmt = $dbh->prepare($sql);

    $respuesta_del_server = $respuesta_del_server . "Prepacion exitosa";

    $stmt->bindParam(":IDLibro", $IDLibro);

    $respuesta_del_server = $respuesta_del_server . "\nBinding exitoso";

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    $respuesta_del_server = $respuesta_del_server . "\nEjecuciòn extosa";

    echo $respuesta_del_server;

}catch(PDOException $e){
    $respuesta_del_server = $respuesta_del_server . "\n" . $e -> getMessage();

    echo $respuesta_del_server;
}


?>