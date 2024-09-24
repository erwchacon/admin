<?php
require_once '../../clases/Producto.php';
require_once '../../clases/Conexion.php';
$nombre = $_POST['txtnombre'];
$txtprecioc = $_POST['txtprecioc'];
$txtpreciovd = $_POST['txtpreciovd'];
$txtpreciovm = $_POST['txtpreciovm'];
$txtpreciova = $_POST['txtpreciova'];
$txtproveedor = $_POST['txtproveedor'];
$txtcategoria = $_POST['txtcategoria'];
$datos = array($nombre,$txtprecioc,$txtpreciovd,$txtpreciovm,$txtpreciova,$txtproveedor,$txtcategoria);
$obj = new Producto();
echo $obj->save($datos);
?>