<?php
require_once '../../clases/Producto.php';
require_once '../../clases/Conexion.php';
$id = $_POST['id_producto'];
$nombre = $_POST['txtnombree'];
$txtprecioc = $_POST['txtprecioce'];
$txtpreciovd = $_POST['txtpreciovde'];
$txtpreciovm = $_POST['txtpreciovme'];
$txtpreciova = $_POST['txtpreciovae'];
$txtproveedor = $_POST['txtproveedore'];
$txtcategoria = $_POST['txtcategoriae'];
$datos = array($id,$nombre,$txtprecioc,$txtpreciovd,$txtpreciovm,$txtpreciova,$txtproveedor,$txtcategoria);
$obj = new Producto();
echo $obj->edit($datos);
?>