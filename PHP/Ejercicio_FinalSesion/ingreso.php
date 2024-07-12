<?php
session_start(); 
include('libreria.php');
include('conexion.php');

$usuario=$_POST['usuario'];
$contraseña=$_POST['contra'];


if (!isset($_SESSION['iden'])) {


	if (!autenticacion($usuario,$contraseña)) { 
		header('Location: ./formularioLogin.html');
		exit();
	}

	$_SESSION['iden'] = session_create_id();
	$_SESSION['usuario']=$usuario;	

	try {
		$dsn = "mysql:host=$host;dbname=$dbname";
		$dbh = new PDO($dsn, $user);
	} 
	catch (PDOException $e) {
		$e->getMessage();
	}

	$sql="SELECT * FROM usuarios WHERE Usuario=:user";

	$stmt = $dbh->prepare($sql);

	$stmt->setFetchMode(PDO::FETCH_ASSOC);

	$stmt->bindParam(':user', $usuario);

	$stmt->execute();

	$fila = $stmt->fetch();

	$contadorSes = $fila['Contador'];

	$contadorSes = $contadorSes +1; 
	$_SESSION['Contador'] = $contadorSes;


$sql="UPDATE usuarios set Contador=:contSesiones WHERE Usuario=:user;";

$stmt = $dbh->prepare($sql);

$stmt->bindParam(':user', $usuario);
$stmt->bindParam(':contSesiones', $contadorSes);

try {
	$stmt->execute();	
} catch (PDOException $e) {
	$e->getMessage();
}

}


infoDeSesion();
?>


<button id="btnIngresarApp" style="background-color: #902bf5; font-size: 20px; color: orange; padding: 10px 10px; border-radius: 5px; cursor: pointer;">Ingresar</button>
<button id="btnDestruirSesion" style="background-color: #902bf5; font-size: 20px; color: orange;  padding: 10px 10px; border-radius: 5px; cursor: pointer;">Destruir Sesión</button>

<script>
document.getElementById("btnIngresarApp").onclick=function(){
	location.href="./app";
}

document.getElementById("btnDestruirSesion").onclick=function(){
	location.href="./destructor.php";
}
</script>