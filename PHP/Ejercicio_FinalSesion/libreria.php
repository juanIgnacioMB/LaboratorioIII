<?php
function autenticacion($usu,$contra) {
	
	$usuario = $usu;
	$contraseña = $contra;	
	$salida = "";

	include("./conexion.php");

	try {
		$dsn = "mysql:host=$host;dbname=$dbname";
		$dbh = new PDO($dsn, $user);
	} catch (PDOException $e) {
		$e->getMessage();
	}

	$sql="SELECT * FROM usuarios WHERE Usuario=:user";

	$stmt = $dbh->prepare($sql);

	$stmt->bindParam(':user', $usuario);

	$stmt->execute();

	$fila = $stmt->fetch();

	if (($fila['Usuario']==$usuario)&&($fila['Usuario']<>"")) {
		$salida = $salida . "Usuario correcto\n";
		if ($fila['Contraseña']==$contraseña) {
			$ok=true;
		}
		else {
			$ok=false;
			$salida = $salida . "Contraseña incorrecta\n";
		}
	}

	else {
		$salida = $salida . "Usuario NO existente\n";	
	}

	$salida = $salida . "FIN\n";

	return $ok;
}	


function infoDeSesion() {
	
	echo "<h1 style='font-size: 36px; font-family: arial;'>Datos de Sesión</h1>";

	echo "<div style='border-style:solid;border-width:thin;padding:20px; height: 300px; font-family: arial'>";	
	echo "<h1 style='font-family: arial'>Información de Sesión</h1>";
	echo "<h2 style='font-family: arial'> Identificativo de sesión: " . $_SESSION['iden'] . "</h2>";
	echo "<h2 style='font-family: arial'> Login de usuario: " . $_SESSION['usuario'] . "</h2>";
	echo "<h2 style='font-family: arial'> Contador de sesión: " . $_SESSION['Contador'] . "</h2>";

	echo "</div>";
}


?>


