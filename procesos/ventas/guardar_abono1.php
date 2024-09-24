<?php

require_once "../../clases/Conexion.php";
require_once "../../clases/Venta.php";

if(isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
    $nombre_temporal = $_FILES['archivo']['tmp_name'];
    $nombre_archivo = "abono_".$_FILES['archivo']['name'];
    $carpeta_padre = "../../assets/images/uploads/";
    $nombre_carpeta = date('Ym');
    $carpeta = $carpeta_padre . $nombre_carpeta . "/";

    if (!is_dir($carpeta) || !file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
    }
    
    $ruta_archivo = $carpeta . $nombre_archivo;
    move_uploaded_file($nombre_temporal, $ruta_archivo);

} else {
    $ruta_archivo = '';
}

$id = $_POST['id'];
$abono = $_POST['abono'];

$datos = array($id,$abono);
$obj = new Venta();
echo $obj->guardarAbono($datos);

?>
