<?php
sleep(3);

$obj = new stdclass;
$obj->id = $_POST['id'];

$obj->login = $_POST['login'];
$obj->apellido = $_POST['apellido'];
$obj->nombres = $_POST['nombres'];
$obj->fecha = $_POST['fecha'];

$jsonProvedor = json_encode($obj);

echo $jsonProvedor;


?>