<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Cliente.php';

$obj = new Cliente();
$r=$_POST['idcliente'];
if($r=="A")
{
  echo "A";
}else {
  echo json_encode($obj->traer_datos_cli($r));
}

?>
