<?php 
include('./conexion.php');

$sql = "SELECT * FROM generos";
    $stmt = $dbh->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    $opciones = [];

    while($fila = $stmt->fetch()){
        $objOpciones = new stdClass();
        $objOpciones->Genero = $fila['Genero']; // tiene que ser el campo como esta en la base de datos

        array_push($opciones, $objOpciones);
    }

    $objFinal = new stdClass();
    $objFinal->Genero = $opciones;

    $salidaJSON = json_encode($objFinal);

    echo $salidaJSON;

?>