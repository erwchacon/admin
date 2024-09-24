<?php
// Conectar a la base de datos
require_once '../../clases/Conexion.php';
$c = new Conexion();
$conexion = $c->conectar();

$email = $_POST["email"];

$sql = "SELECT col.nombre as vendedor FROM colaboradores col INNER JOIN clientes cli ON col.id_colaborador=cli.vendedor WHERE cli.email = '$email'";
$result= mysqli_query($conexion,$sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo $row["vendedor"];
} else {
  echo "Vendedor no encontrado!";
}

$conexion->close();
?>
