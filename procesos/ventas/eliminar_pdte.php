<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Venta.php';
$obj = new Venta();
$id = $_POST['id_venta'];
echo $obj->eliminar_venta_pdte($id);
?>