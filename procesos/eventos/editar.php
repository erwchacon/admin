<?php
require_once '../../clases/Evento.php';
require_once '../../clases/Conexion.php';
$id = $_POST['id_evento'];
$nombre = $_POST['txtnombree'];
$cuidad = $_POST['cuidade'];
$lugar = $_POST['lugare'];
$fecha = $_POST['fechae'];
$hora = $_POST['horae'];
$ubicacion = $_POST['ubicacione'];
$datos = array($id,$nombre,$cuidad,$lugar,$fecha,$hora,$ubicacion);
$obj = new Evento();
echo $obj->edit($datos);
?>