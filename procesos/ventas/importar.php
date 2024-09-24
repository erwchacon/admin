<?php
//Importar la ruta del PHPExcel
require 'PHPexcel/Classes/PHPExcel.php';
require 'conexion.php';

$archivo = 'clientes.xlsx';

//Cargar la hoja de Excel
$excel = PHPExcel_IOFactory::load($archivo);

//Cargar la hoja de calculo que queremos
$excel -> setActiveSheetIndex(0);

//Obtener el numero de fila de nuestro archivo excel
$numerofila = $excel -> setActiveSheetIndex(0) -> getHighestRow();

for($i = 2; $i <= $numerofila; $i++){
    $nombre = $excel -> getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
    if($nombre==""){
        
    }else{
        $telefono = $excel -> getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
        $email = $excel -> getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
        $cumpleanos = $excel -> getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
        $estado = $excel -> getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
    }
    $consulta = "INSERT INTO clientes(nombre,telefono,email,cumpleanos,estado) 
                VALUE ('$nombre','$telefono','$email','$cumpleanos','$estado')";

    $resultado = $mysqli->query($consulta);
}

?>