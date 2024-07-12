
<?php
sleep(3); 
$clave = $_POST['clave'];
echo "<h3>Clave sin encriptar = " .$clave."</h3>";
echo "<h3>Clave encriptada en md5(128 bits) : </h3>";
echo  "<h3>".md5($clave)."</h1>";

echo "<h3>Clave sin encriptar = " .$clave."</h3>";
echo "<h3>Clave encriptada en sha1(160 bits) : </h3>";
echo  "<h3>".sha1($clave)."</h3>";
?>