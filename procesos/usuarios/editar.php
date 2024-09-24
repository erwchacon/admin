<?php
require_once '../../clases/Usuario.php';
require_once '../../clases/Conexion.php';

$id = $_POST['id_usuario'];
$usu = $_POST['usuarioe'];
$nom = $_POST['nombree'];
$ape = $_POST['apellidoe'];
$cont = $_POST['contraseñae'];
$tipo = $_POST['tipoe'];
$datos = array($id,$usu,$nom,$ape,$cont,$tipo);
$obj = new Usuario();
echo $obj->edit($datos);
?>