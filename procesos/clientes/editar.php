<?php
require_once '../../clases/Cliente.php';
require_once '../../clases/Conexion.php';
$id = $_POST['id_cliente'];
$nombre = $_POST['txtnombree'];
$telefono = $_POST['txttelefonoe'];
$email = $_POST['txtemaile'];
$pais = $_POST['paise'];
$ciudad = $_POST['ciudade'];
$dia_cumpleanos = $_POST['dia_cumpleanose'];
$mes_cumpleanos = $_POST['mes_cumpleanose'];
$datos = array($id,$nombre,$telefono,$email,$pais,$ciudad,$dia_cumpleanos,$mes_cumpleanos);
$obj = new Cliente();
echo $obj->edit($datos);
?>