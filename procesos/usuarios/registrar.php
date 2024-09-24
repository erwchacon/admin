<?php
require_once '../../clases/Usuario.php';
require_once '../../clases/Conexion.php';
$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$contraseña = $_POST['contraseña'];
$tipo = $_POST['tipo'];
$datos = array($usuario,$nombre,$apellido,$contraseña,$tipo);
$obj = new Usuario();
echo $obj->save($datos);
?>