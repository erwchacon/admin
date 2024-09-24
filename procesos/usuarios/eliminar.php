<?php
require_once '../../clases/Usuario.php';
require_once '../../clases/Conexion.php';
$id = $_POST['id_usuario'];
$obj = new Usuario();
echo $obj->delete($id);
?>