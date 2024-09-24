<?php
require_once 'Conexion.php';
$c = new Conexion();
$conexion = $c->conectar();

$email = $_POST['email'];
$vendedor = $_POST['vendedor'];
$jsonData = array();
$sql = ("SELECT col.nombre FROM colaboradores col INNER JOIN clientes cli ON col.id_colaborador=cli.vendedor WHERE cli.email='".$email."' ");
$result = mysqli_query($conexion, $sql);
//$ven = $result;
$totalCliente  = mysqli_num_rows($result);

  //Validamos que la consulta haya retornado información
  //if( $ven == $vendedor){
if( $totalCliente <= 0 ){
    $jsonData['success'] = 0;
    $jsonData['message'] = ' ';
} else{
    //Si hay datos entonces retornas algo
    $jsonData['success'] = 1;
    $jsonData['message'] = '<p style="color:red;">El vendedor es <strong>(' .$result.')<strong></p>';
  }

//Mostrando mi respuesta en formato Json
header('Content-type: application/json; charset=utf-8');
echo json_encode( $jsonData );
?>
