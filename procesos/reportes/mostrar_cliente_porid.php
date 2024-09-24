<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Reporte.php';
$obj = new Reporte();
$id = $_POST['id_cliente'];
echo json_encode($obj->mostrar_cliente_porid($id), JSON_UNESCAPED_UNICODE);
?>