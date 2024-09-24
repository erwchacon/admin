<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Reporte.php';
$obj = new Reporte();
$id = $_POST['id_venta'];
echo json_encode($obj->mostrar_ventas_porid($id), JSON_UNESCAPED_UNICODE);
?>