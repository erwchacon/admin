<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Gasto.php';
$obj = new Gasto();
$id = $_POST['id_gasto'];
echo json_encode($obj->mostrar_porid($id), JSON_UNESCAPED_UNICODE);
?>