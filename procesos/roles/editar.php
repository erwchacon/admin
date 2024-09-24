<?php
require_once '../../clases/Rol.php';
require_once '../../clases/Conexion.php';

$rol = $_POST['rol'];
$id = $_POST['id_rol'];
$datos = array($id,$rol);
$obj = new Rol();
echo $obj->edit($datos);
?>