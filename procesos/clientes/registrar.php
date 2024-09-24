<?php
require_once '../../clases/Cliente.php';
require_once '../../clases/Conexion.php';
$vendedor = $_POST['vendedor'];
$nombre = $_POST['txtnombre'];
$telefono = $_POST['txttelefono'];
$email = $_POST['txtemail'];
$pais = $_POST['pais'];
$ciudad = $_POST['ciudad'];
$dia_cumpleanos = $_POST['dia_cumpleanos'];
$mes_cumpleanos = $_POST['mes_cumpleanos'];
$datos = array($vendedor,$nombre,$telefono,$email,$pais,$ciudad,$dia_cumpleanos,$mes_cumpleanos);
$obj = new Cliente();
echo $obj->save($datos);
?>