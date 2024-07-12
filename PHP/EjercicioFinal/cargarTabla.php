<?php 
include('./conexion.php');

$orden = $_POST["orden"];
$filtroID = $_POST["filtroID"];
$filTitu = $_POST["filTitu"];
$filAuto = $_POST["filAuto"];
$filGene = $_POST["filGene"];
$filPrecio = $_POST["filPrecio"];
$filLanza = $_POST["filLanza"];
$filEdi = $_POST["filEdi"];

try{


    $sql = "SELECT * FROM libros WHERE ";
    $sql=$sql . "IDLibro LIKE CONCAT('%',:IDLibro,'%') AND ";//ojo con espacios antes y despues del and
    $sql=$sql . "Titulo LIKE CONCAT('%',:Titulo,'%') AND ";
    $sql=$sql . "Autor LIKE CONCAT('%',:Autor,'%') AND ";
    $sql=$sql . "Genero LIKE CONCAT('%',:Genero,'%') AND ";
    $sql=$sql . "precio LIKE CONCAT('%',:precio,'%') AND ";
    $sql=$sql . "Lanzamiento LIKE CONCAT('%',:Lanzamiento,'%') AND ";
    $sql=$sql . "Editorial LIKE CONCAT('%',:Editorial,'%')";
    $sql=$sql . " ORDER BY $orden";


    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(':IDLibro', $filtroID);
    $stmt->bindParam(':Titulo', $filTitu);
    $stmt->bindParam(':Autor', $filAuto);
    $stmt->bindParam(':Genero', $filGene);
    $stmt->bindParam(':precio', $filPrecio);
    $stmt->bindParam(':Lanzamiento', $filLanza);
    $stmt->bindParam(':Editorial', $filEdi);



    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();


    
}catch(PDOException $e){
    $respuesta_estado = $respuesta_estado . "\n" . $e -> getMessage();
}
$libros=[];
    
While($fila = $stmt->fetch()) {

    $objLibro = new stdClass();
    $objLibro->IDLibro=$fila['IDLibro'];
    $objLibro->Titulo=$fila['Titulo'];
    $objLibro->Autor=$fila['Autor'];
    $objLibro->Genero=$fila['Genero'];
    $objLibro->precio=$fila['precio'];
    $objLibro->Lanzamiento=$fila['Lanzamiento'];
    $objLibro->Editorial=$fila['Editorial'];
    array_push($libros,$objLibro);
}



$objLibros = new stdClass();
$objLibros->libros=$libros;
$objLibros->cuenta=count($libros);

$salidaJson = json_encode($objLibros);

$dbh = null;

echo $salidaJson;


?>