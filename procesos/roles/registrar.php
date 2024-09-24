<?php
require_once '../../clases/Rol.php';
require_once '../../clases/Conexion.php';
$rol = $_POST['rol'];
$obj = new Rol();
echo $obj->save($rol);
?>