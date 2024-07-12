<!DOCTYPE html>
<head>
  <meta http-equiv="Content-Type" charset="utf-8" />
  <title>Respuesta encriptada</title>
  <style>
   
  </style>
</head>
<body>

<?php 
$clave = $_GET['palabra'];
echo "<h1>Clave sin encriptar = " .$clave."</h1>";
echo "<h1>Clave encriptada en md5(128 bits) : </h1>";
echo  "<h1>".md5($clave)."</h1>";
echo "<hr>";
echo "<h1>Clave sin encriptar = " .$clave."</h1>";
echo "<h1>Clave encriptada en sha1(160 bits) : </h1>";
echo  "<h1>".sha1($clave)."</h1>";
?>
    
</body>
