<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Venta.php';
$id = $_POST['id'];
$rechazo = $_POST['rechazo'];
//$datos = array($id,$rechazo);
$obj = new Venta();
$obj2 = new Venta();
echo $obj->rechazar_venta($id,$rechazo);
echo $obj2->sendmail($id);
?>