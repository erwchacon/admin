<?php
  session_start();
  require_once '../../clases/Conexion.php';
  $c = new Conexion();
  $conexion = $c->conectar();
  $producto=$_POST['txtproducto'];
  $precio=$_POST['txtprecio'];
  $preciodl=$_POST['txtpreciodl'];
  $cantidad = $_POST['txtcantidad'];
  $moneda = $_POST['moneda'];
  
  if(!empty($cantidad) and !empty($precio) and is_numeric($cantidad))
  {
    if($moneda == "US"){
      $consulta = "select nombre, precio_venta_dl, id_producto from productos where id_producto='$producto'";
    }else if($moneda == "MX"){
        $consulta = "select nombre, precio_venta_mx, id_producto from productos where id_producto='$producto'";
    }else if($moneda == "AR"){
        $consulta = "select nombre, precio_venta_ar, id_producto from productos where id_producto='$producto'";
    }
    $result = mysqli_query($conexion,$consulta);
    $tablap = $result->fetch_object();
    $total = 0;
    if(isset($_SESSION['tablacomprastemp']))
    {    
      foreach (@$_SESSION['tablacomprastemp'] as $key) {
        $d=explode("||",@$key);
        if($d[3] == $producto)
        {
          $total=$total+$d[2];
        }
      
      }     
    }
    /**if(($tablap->stock < ($cantidad + $total)))
    {
        echo "s";
    }
    else 
    {**/
    if($cantidad <=0)
    {
        echo "n";
    }
      else
      {
        $importe=$cantidad*$precio;
        $importedl=$cantidad*$preciodl;
        $articulo = $tablap->nombre."||".
        $precio."||".
        $cantidad."||".
        $importe."||".
        $preciodl."||".
        $importedl."||".
        $tablap->id_producto."||";
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