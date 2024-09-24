<?php
    require "../../clases/Reporte.php";
    require "../../clases/Conexion.php";
    $obj = new Reporte();
    $vendedor = $_GET['vendedor'];
    $result = $obj->mostrar_clientes_vendedor($vendedor);

    if (!$result)
    {
        die("error");
    }
    else{
        $arreglo["data"] = []; 
        while($data = mysqli_fetch_assoc($result))
        {
            $arreglo["data"][] = $data;
        }
        echo json_encode($arreglo, JSON_UNESCAPED_UNICODE);
    }
?>