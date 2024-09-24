<?php
// Configuración de la conexión a la base de datos
require "../../clases/Conexion.php";

$servername = "nombre_servidor";
$username = "nombre_usuario";
$password = "contraseña";
$dbname = "nombre_base_de_datos";

// Ruta de almacenamiento temporal del archivo Excel
$targetDir = "../assets/import-temp/";
$targetFile = $targetDir . basename($_FILES["file"]["name"]);

// Comprobar si se ha enviado un archivo
if(isset($_FILES["file"]) && $_FILES["file"]["error"] == 0){
  // Mover el archivo al directorio de destino
  if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)){
    // Cargar la biblioteca PhpSpreadsheet
    require 'vendor/autoload.php';

    // Crear un objeto de lectura del archivo Excel
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet = $reader->load($targetFile);

    // Seleccionar la hoja de trabajo
    $sheet = $spreadsheet->getActiveSheet();

    // Obtener la cantidad de filas y columnas en el archivo
    $highestRow = $sheet->getHighestRow();
    $highestColumn = $sheet->getHighestColumn();

    // Conectar a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Error de conexión: " . $conn->connect_error);
    }

    // Iterar a través de las filas del archivo Excel
    for($row = 2; $row <= $highestRow; $row++){
      // Obtener los valores de cada columna en la fila actual
      $column1 = $sheet->getCellByColumnAndRow(1, $row)->getValue();
      $column2 = $sheet->getCellByColumnAndRow(2, $row)->getValue();
      // ...

      // Realizar la inserción en la base de datos
      $sql = "INSERT INTO nombre_tabla (columna1, columna2) VALUES ('$column1', '$column2')";
      if($conn->query($sql) === FALSE){
        echo "Error al insertar datos en la fila " . $row;
      }
    }

    // Cerrar la conexión a la base de datos
    $conn->close();

    // Eliminar el archivo Excel temporal
    unlink($targetFile);

    echo "Importación exitosa";
  }
  else{
    echo "Error al mover el archivo";
  }
}
else{
  echo "No se ha seleccionado ningún archivo o ha ocurrido un error en la carga";
}
?>