<?php
require_once '../../clases/Colaborador.php';
require_once '../../clases/Conexion.php';
$id = $_GET['id_colaborador'];
$obj = new Colaborador();
echo json_encode($obj->traer($id));
?>