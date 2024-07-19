<?php 

include("./conexion.php");

$IDLibro = $_POST["idModif"];
$Titulo = $_POST["tituloModif"];
$Autor = $_POST["autorModif"];
$Genero = $_POST["generoModif"];
$precio = $_POST["precioModif"];
$Lanzamiento = $_POST["lanzamientoModif"];
$Editorial = $_POST["editorialModif"];


$respuesta_estado = "";
//$respuesta_estado = $respuesta_estado . "Respuesta del servidor al alta. Entradas recibidas en el requerimiento HTTP:";
$respuesta_estado = $respuesta_estado . "\nID de libro: " . $IDLibro;

try{

    /*$sql = "UPDATE libros SET (IDLibro,Titulo,Autor,Genero,precio,Lanzamiento,Editorial)";
    $sql = $sql . "values(:IDLibro,:Titulo,:Autor,:Genero,:precio,:Lanzamiento,:Editorial)";*/

    $sql="UPDATE libros SET IDLibro=:IDLibro,Titulo=:Titulo,Autor=:Autor,Genero=:Genero,Lanzamiento=:Lanzamiento,Editorial=:Editorial WHERE IDLibro=:IDLibro;";


    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(':IDLibro', $IDLibro);
    $stmt->bindParam(':Titulo', $Titulo);
    $stmt->bindParam(':Autor', $Autor);
    $stmt->bindParam(':Genero', $Genero);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':Lanzamiento', $Lanzamiento);
    $stmt->bindParam(':Editorial', $Editorial);

    $stmt->execute();

    if (empty($_FILES['PDFTapa']['name'])) {
		$respuesta_estado = $respuesta_estado . "<br />No hay PDF de tapa";		
	}
	else {
		$respuesta_estado=$respuesta_estado . "Trae tapa de IDLibro: " . $IDLibro;
		
		$PDFTapa = file_get_contents($_FILES['PDFTapa']['tmp_name']);	
		
		$sql="UPDATE libros SET PDFTapa=:PDFTapa WHERE IDLibro=:IDLibro;";

		try {
			$stmt = $dbh->prepare($sql);	
			$respuesta_estado = $respuesta_estado .  "\n<br />preparacion exitosa";
		} 
		catch (PDOException $e) {
			$respuesta_estado = $respuesta_estado . "\n<br />" . $e->getMessage();
		}



		try {
			$stmt->bindParam(':IDLibro', $IDLibro);
			$stmt->bindParam(':PDFTapa', $PDFTapa);
	
			$respuesta_estado = $respuesta_estado .  "\n<br /> bind exitosa";
		} catch (PDOException $e) {
			$respuesta_estado = $respuesta_estado . "\n<br />" . $e->getMessage();
		}



		try {
			$stmt->execute();	
			$respuesta_estado = $respuesta_estado .  "\n<br /> ejecucion exitosa";
		} catch (PDOException $e) {
			$respuesta_estado = $respuesta_estado . "\n<br />" . $e->getMessage();
		}
}

    echo $respuesta_estado;


}catch(PDOException $e){
    $respuesta_estado = $respuesta_estado . "\n" . $e -> getMessage();
    echo $respuesta_estado;
}
/*
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

*/
?>