<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Gasto.php';
$id = $_POST['id'];
$rechazo = $_POST['rechazo'];
$obj = new Gasto();
echo $obj->rechazar_gasto($id,$rechazo);
?>