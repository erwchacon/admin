<?php
require_once '../../clases/Rol.php';
require_once '../../clases/Conexion.php';
$id = $_POST['id'];
$obj = new Rol();
echo $obj->delete($id);
?>