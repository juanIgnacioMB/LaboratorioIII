<?php 
include('./conexion.php');

$IDLibro = $_POST["IDLibro"];
$Titulo = $_POST["tituloModif"];
$Autor = $_POST["autorModif"];
$Genero = $_POST["generoModif"];
$precio = $_POST["precioModif"];
$Lanzamiento = $_POST["lanzamientoModif"];
$Editorial = $_POST["editorialModif"];
//$PDFTapa = $_POST["tapaModif"];

$Respuesta_Del_Server = "";

try {
    $sql = "UPDATE libros SET Titulo = :Titulo, Autor = :Autor, Genero = :Genero, precio = :Precio, Lanzamiento = :Lanzamiento, Editorial = :Editorial WHERE IDLibro = :IDLibro;";

    $stmt = $dbh->prepare($sql);
    $Respuesta_Del_Server = $Respuesta_Del_Server . "\nPreparación exitosa!";
    
    $stmt->bindParam(':IDLibro', $IDLibro);
    $stmt->bindParam(':Titulo', $Titulo);
    $stmt->bindParam(':Autor', $Autor);
    $stmt->bindParam(':Genero', $Genero);
    $stmt->bindParam(':Precio', $precio); // Asegúrate que el nombre del parámetro coincida
    $stmt->bindParam(':Lanzamiento', $Lanzamiento);
    $stmt->bindParam(':Editorial', $Editorial);
    // $stmt->bindParam(':PDFTapa', $PDFTapa);

    $Respuesta_Del_Server = $Respuesta_Del_Server . "\nBinding realizado con éxito";

    $stmt->execute(); 

    if (!isset($_FILES['PDFTapa'])) {
        $Respuesta_Del_Server = $Respuesta_Del_Server . "\nNo se inicializó global \$_FILES";
    } else {
        if (empty($_FILES['PDFTapa']['name'])) {
            $Respuesta_Del_Server = $Respuesta_Del_Server . "\nNo ha sido seleccionado ningun file para enviar!";
        } else {
            $Respuesta_Del_Server = $Respuesta_Del_Server . "\nTrae documentoPdf asociado a codArt: " . $IDLibro;
            $contenidoPdf = file_get_contents($_FILES['documentoPdf']['tmp_name']);
            $sql = "UPDATE libros SET documentoPdf = :contenidoPdf WHERE IDLibro = :IDLibro;";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':contenidoPdf', $contenidoPdf);
            $stmt->bindParam(':IDLibro', $IDLibro);
            $stmt->execute();
        }
    }
} catch(PDOException $e) {
    $Respuesta_Del_Server = $Respuesta_Del_Server . "\n" . $e->getMessage();
    echo $Respuesta_Del_Server;
}

echo $Respuesta_Del_Server;
?>