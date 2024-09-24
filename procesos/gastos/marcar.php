<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Gasto.php';
$obj = new Gasto();
$id = $_POST['id_gasto'];
echo $obj->marcar_gasto($id);
?>