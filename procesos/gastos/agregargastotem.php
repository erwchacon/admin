<?php
  session_start();
  require_once '../../clases/Conexion.php';
  $c = new Conexion();
  $conexion = $c->conectar();
  $importe=$_POST['importe'];
  $concepto=$_POST['concepto'];
  $factura = $_POST['factura'];
  if(!empty($importe) and !empty($concepto) and is_numeric($importe))
  {
    if(isset($_SESSION['tablacomprastemp']))
    {    
      $articulo = 
      $importe."||".
      $concepto."||".
      $factura."||";
      //variable de session-

      $_SESSION['tablacomprastemp'][]=$articulo;
      echo "1";   
      }
    //}
  }

  else
  {
      echo "camposventa";
  }


?>