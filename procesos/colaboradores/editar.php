<?php
require_once '../../clases/Colaborador.php';
require_once '../../clases/Conexion.php';
$id = $_POST['id_colaborador'];
$nombre = $_POST['txtnombree'];
$telefono = $_POST['txttelefonoe'];
$email = $_POST['txtemaile'];
$documento = $_POST['documentoe'];
$cuenta = $_POST['cuentae'];
$banco = $_POST['bancoe'];
$contrato = $_POST['contratoe'];
$rol = $_POST['role'];
$datos = array($id,$nombre,$telefono,$email,$documento,$cuenta,$banco,$contrato,$rol);
$obj = new Colaborador();
echo $obj->edit($datos);
?>