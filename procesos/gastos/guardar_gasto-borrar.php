<?php
session_start();
require_once "../../clases/Conexion.php";
require_once "../../clases/Gasto.php";
$evento = $_POST['evento'];
$estadopago = $_POST['estadopago'];
$importe = $_POST['importe'];
$concepto = $_POST['concepto'];
$factura = $_POST['factura'];
$descripcion = $_POST['descripcion'];
$ruta = "";

$datos = array($evento,$estadopago,$importe,$concepto,$factura,$descripcion,$ruta);
$obj = new Gasto();
echo $obj->save($datos);

?>
