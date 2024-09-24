<?php
// Conectar a la base de datos
require_once '../../clases/Conexion.php';
$c = new Conexion();
$conexion = $c->conectar();

$email = $_POST["email"];

$sql = "SELECT nombre FROM clientes WHERE email = '$email'";
$result= mysqli_query($conexion,$sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo $row["nombre"];
} else {
  echo "Cliente no encontrado!";
}

$conexion->close();
?>
