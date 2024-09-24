<?php
require_once '../../clases/Evento.php';
require_once '../../clases/Conexion.php';
$nombre = $_POST['txtnombre'];
$ciudad = $_POST['ciudad'];
$lugar = $_POST['lugar'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$ubicacion = $_POST['ubicacion'];
$datos = array($nombre,$ciudad,$lugar,$fecha,$hora,$ubicacion);
$obj = new Evento();
echo $obj->save($datos);
?>