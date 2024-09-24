<?php
require_once '../../clases/Colaborador.php';
require_once '../../clases/Conexion.php';

if(isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
    $nombre_temporal = $_FILES['archivo']['tmp_name'];
    $nombre_archivo = $_FILES['archivo']['name'];
    $carpeta_padre = "../../assets/images/contratos/";
    $carpeta = $carpeta_padre;

    if (!is_dir($carpeta) || !file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
    }
    
    $ruta_archivo = $carpeta . $nombre_archivo;
    move_uploaded_file($nombre_temporal, $ruta_archivo);

} else {
    $ruta_archivo = '';
}

$nombre = $_POST['txtnombre'];
$telefono = $_POST['txttelefono'];
$email = $_POST['txtemail'];
$documento = $_POST['documento'];
$cuenta = $_POST['cuenta'];
$banco = $_POST['banco'];
$contrato = $_POST['contrato'];
$rol = $_POST['rol'];

$datos = array($nombre,$telefono,$email,$documento,$cuenta,$banco,$contrato,$rol,$ruta_archivo);
$obj = new Colaborador();
echo $obj->save($datos);
?>