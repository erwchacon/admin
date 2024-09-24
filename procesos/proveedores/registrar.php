<?php
require_once '../../clases/Proveedor.php';
require_once '../../clases/Conexion.php';
$nombre = $_POST['txtnombre'];
$direccion = $_POST['txtdireccion'];
$telefono = $_POST['txttelefono'];
$email = $_POST['txtemail'];
$servicio = $_POST['servicio'];
$datos = array($nombre,$direccion,$telefono,$email,$servicio);
$obj = new Proveedor();
echo $obj->save($datos);
?>