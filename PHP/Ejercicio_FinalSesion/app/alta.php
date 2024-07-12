<?php 
include("./conexion.php");

$IDLibro = $_POST["idAlta"];
$Titulo = $_POST["tituloAlta"];
$Autor = $_POST["autorAlta"];
$Genero = $_POST["generoAlta"];
$precio = $_POST["precioAlta"];
$Lanzamiento = $_POST["lanzamientoAlta"];
$Editorial = $_POST["editorialAlta"];

$respuesta_estado = "";
$respuesta_estado = $respuesta_estado . "Respuesta del servidor al alta. Entradas recibidas en el requerimiento HTTP:";
$respuesta_estado = $respuesta_estado . "\nID de libro: " . $IDLibro;

try{
    $sql = "INSERT INTO libros (IDLibro,Titulo,Autor,Genero,precio,Lanzamiento,Editorial)";
    $sql = $sql . "values(:IDLibro,:Titulo,:Autor,:Genero,:precio,:Lanzamiento,:Editorial)";


    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(':IDLibro', $IDLibro);
    $stmt->bindParam(':Titulo', $Titulo);
    $stmt->bindParam(':Autor', $Autor);
    $stmt->bindParam(':Genero', $Genero);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':Lanzamiento', $Lanzamiento);
    $stmt->bindParam(':Editorial', $Editorial);


    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    echo $respuesta_estado;


}catch(PDOException $e){
    $respuesta_estado = $respuesta_estado . "\n" . $e -> getMessage();
    echo $respuesta_estado;
}

?>