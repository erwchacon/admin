
<?php
require_once 'Conexion.php';
$c = new Conexion();
$conexion = $c->conectar();

$email    = $_REQUEST['email'];
$jsonData = array();
$sql   = ("SELECT email FROM clientes WHERE email='".$email."' ");
$result  = mysqli_query($conexion, $sql);
$totalCliente  = mysqli_num_rows($result);

  //Validamos que la consulta haya retornado información
  if( $totalCliente <= 0 ){
    $jsonData['success'] = 0;
   // $jsonData['message'] = 'No existe el Email ' .$email;
    $jsonData['message'] = '';
} else{
    //Si hay datos entonces retornas algo
    $jsonData['success'] = 1;
    $jsonData['message'] = '<p style="color:red;">Ya existe un cliente con email <strong>(' .$email.')<strong></p>';
  }

//Mostrando mi respuesta en formato Json
header('Content-type: application/json; charset=utf-8');
echo json_encode( $jsonData );
?>