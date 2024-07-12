<?php 
include('./conexion.php');

$IDLibro = $_POST["IDLibro"];
$respuesta_del_server = "";

try{
   $sql="SELECT PDFTapa FROM libros WHERE IDLibro = '$IDLibro'";

   $stmt = $dbh->prepare($sql);

   $stmt->setFetchMode(PDO::FETCH_ASSOC);
   $stmt->execute();

   While($fila = $stmt->fetch()) {

    $objPDF = new stdClass();
    $objPDF->documentoPDF=$fila['PDFTapa'];

    $objPDF->documentoPDF=base64_encode($fila['PDFTapa']);

    $salidaJson = json_encode($objPDF,JSON_INVALID_UTF8_SUBSTITUTE);

    echo $salidaJson;
}

}catch(PDOException $e){
    $respuesta_del_server = $respuesta_del_server . "\n" . $e -> getMessage();

    echo $respuesta_del_server;
}


?>