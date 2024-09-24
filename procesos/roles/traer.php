<?php
require_once '../../clases/Rol.php';
require_once '../../clases/Conexion.php';
$id = $_GET['id_rol'];
$obj = new Rol();
echo json_encode($obj->traer($id));
?>