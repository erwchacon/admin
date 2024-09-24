<?php
require_once '../../clases/Colaborador.php';
require_once '../../clases/Conexion.php';
$id = $_POST['id'];
$obj = new Colaborador();
echo $obj->delete($id);
?>