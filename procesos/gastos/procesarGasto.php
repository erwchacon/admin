<?php
session_start();
require_once "../../clases/Conexion.php";

if(isset($_FILES['archivo'])){
   $solicitante = $_POST['solicitante'];
   $evento = $_POST['evento'];
   $importe = $_POST['importe'];
   $moneda = $_POST['moneda'];
   $concepto = $_POST['concepto'];
   $metodopago = $_POST['metodopago'];
   $reembolso = $_POST['reembolso'];
   $descripcion = $_POST['descripcion'];
   $factura = $_POST['factura'];
   $fecha = $_POST['fecha'];
   $carpeta_padre = "../../assets/images/uploads/";
   $nombre_carpeta = date('Ym');
   $carpeta = $carpeta_padre . "/" . $nombre_carpeta. "/";
   $rutacarpeta_padre = "../assets/images/uploads/";
   $rutacarpeta = $rutacarpeta_padre . $nombre_carpeta . "/";

   if (!file_exists($carpeta)) {
      mkdir($carpeta, 0777, true);
   }

   //$ruta = '../../assets/images/uploads/'.$nombre_carpeta.'/';
   $nombre_archivo = $_FILES['archivo']['name'];
   $ruta_archivo = $carpeta . $nombre_archivo;
   $ruta_descarga = $rutacarpeta . $nombre_archivo;
   //chmod('images/'.$nombre_archivo, 0777);
   move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta_archivo);

   $c = new Conexion();
   $conexion = $c->conectar();
   $sql = "INSERT INTO gastos (solicitante,evento,importe,moneda,concepto,metodopago,reembolso,descripcion,no_factura,fecha,archivo) 
   values('$solicitante','$evento','$importe','$moneda','$concepto','$metodopago','$reembolso','$descripcion','$factura','$fecha','pdte','$ruta_descarga')";
   $result = mysqli_query($conexion,$sql);

   //header("location:../../vistas/genera_gasto.php");
   header("Location: ../../vistas/genera_gasto.php?success=1");
   
}else{
   echo '<script type="text/JavaScript"> 
      alert("No se pudo registrar");
   </script>'
   ;
}

echo '<script type="text/JavaScript"> 
      alert("Gasto Registrado Correctamente");
      table.ajax.reload();
   </script>'
   ;

?>