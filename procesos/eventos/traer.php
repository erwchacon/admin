<?php
require_once '../../clases/Evento.php';
require_once '../../clases/Conexion.php';
$id = $_GET['id_evento'];
$obj = new Evento();
echo json_encode($obj->traer($id));
?>