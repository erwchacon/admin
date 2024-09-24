<?php
session_start();
require_once "../../clases/Conexion.php";
require_once "../../clases/Venta.php";

if(isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
    $nombre_temporal = $_FILES['archivo']['tmp_name'];
    $nombre_archivo = $_FILES['archivo']['name'];
    $carpeta_padre = "../../assets/images/uploads/";
    $nombre_carpeta = date('Ym');
    $carpeta = $carpeta_padre . $nombre_carpeta . "/";
    $rutacarpeta_padre = "../assets/images/uploads/";
    $rutacarpeta = $rutacarpeta_padre . $nombre_carpeta . "/";
    $ruta_descarga = $rutacarpeta . $nombre_archivo;

    if (!is_dir($carpeta) || !file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
    }
    
    $ruta_archivo = $carpeta . $nombre_archivo;
    move_uploaded_file($nombre_temporal, $ruta_archivo);

} else {
    $ruta_archivo = '';
}

$objc = new Conexion();
$obj = new Venta();
$ccn = $objc->conectar();

$vendedor = $_POST['vendedor'];
$email = $_POST['email'];
$nombre = mysqli_real_escape_string($ccn,$_POST['cliente']);
$evento = $_POST['evento'];
$fecha_compra = $_POST['fecha_compra'];
$fecha_inicio = $_POST['fecha_inicio'];
$id_producto = $_POST['txtproducto'];
$metodopago = $_POST['metodopago'];
$tipopago = $_POST['tipopago'];
$pagoparcial = $_POST['pagoparcial'];
$moneda = $_POST['moneda'];
$total = $_POST['txttotal'];
$total_us = $_POST['txttotaldl'];

$sql = "SELECT id_colaborador FROM colaboradores WHERE nombre = '$vendedor'";
$result = mysqli_query($ccn,$sql);
$fila = mysqli_fetch_array($result);
$id_ven = $fila[0];

if(empty($nombre))
{
  echo "v";

}
else {
    if(isset($_SESSION['tablacomprastemp']))
    {
        

    if(count(@$_SESSION['tablacomprastemp']) == 0)
    {
        echo "tablav";
    }
        else {
        //echo $datoscontrato;
        try{

            $obj->save($id_ven,$email,$nombre,$evento,$fecha_compra,$fecha_inicio,$metodopago,$tipopago,$pagoparcial,$moneda,$total,$total_us,$ruta_descarga);
            $obj->save_suscripcion($email,$nombre,$fecha_inicio,$tipopago,$id_producto,$evento,$total,$id_ven);
            $obj->save_detalle();
            echo "ok";
            unset($_SESSION['tablacomprastemp']);
        }
        catch(Exception $ex){
            echo $ex;
        }
      }
    }
    else
    {
        echo "tablav";
    }

}


?>
