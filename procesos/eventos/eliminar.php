<?php
require_once '../../clases/Evento.php';
require_once '../../clases/Conexion.php';
$id = $_POST['id'];
$obj = new Evento();
echo $obj->delete($id);
?>