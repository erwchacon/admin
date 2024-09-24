<?php
class Producto{
            public function save($datos)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$nombre = $c->test_input($datos[0]);
            $pc = $c->test_input($datos[1]);
            $pvd = $c->test_input($datos[2]);
            $pvm = $c->test_input($datos[3]);
            $pva = $c->test_input($datos[4]);
            $proveedor = $c->test_input($datos[5]);
            $categoria = $c->test_input($datos[6]);
			$sql = "INSERT INTO productos(nombre,precio_compra,precio_venta_dl,precio_venta_mx,precio_venta_ar,id_proveedor,id_categoria,estado) values('$nombre','$pc','$pvd','$pvm','$pva','$proveedor','$categoria','activo')";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
                public function edit($datos)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
            $id = $datos[0];
			$nombre = $c->test_input($datos[1]);
            $pc = $c->test_input($datos[2]);
            $pvd = $c->test_input($datos[3]);
            $pvm = $c->test_input($datos[4]);
            $pva = $c->test_input($datos[5]);
            $proveedor = $c->test_input($datos[6]);
            $categoria = $c->test_input($datos[7]);
			$sql = "update productos set nombre = '$nombre', precio_compra = '$pc', 
            precio_venta_dl = '$pvd', precio_venta_mx = '$pvm', precio_venta_ar = '$pva', 
            id_proveedor = '$proveedor', id_categoria = '$categoria' where id_producto=$id";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
                public function delete($id)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "update productos set estado = 'inactivo' where id_producto=$id";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
    public function mostrar()
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "SELECT pro.id_producto,pro.nombre,pro.precio_compra,pro.precio_venta_dl,pro.precio_venta_mx,pro.precio_venta_ar,pr.nombre as id_proveedor,ca.nombre
            as id_categoria FROM categorias AS ca
            INNER JOIN productos AS pro ON pro.id_categoria=ca.id_categoria INNER JOIN proveedores AS pr ON pr.id_proveedor=pro.id_proveedor
            WHERE pro.estado = 'activo'";
			$result = mysqli_query($conexion,$sql);
            return $result; 
    }
    public function traer($id)
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "select * from productos where id_producto=$id";
			$result = mysqli_query($conexion,$sql);
            $ver = mysqli_fetch_row($result);
            $datos = array(
               "id_producto" =>html_entity_decode($ver[0]),
               "nombre" =>html_entity_decode($ver[1]),
               "precio_compra" =>html_entity_decode($ver[2]),
               "precio_venta_dl" =>html_entity_decode($ver[3]),
               "precio_venta_mx" =>html_entity_decode($ver[4]),
               "precio_venta_ar" =>html_entity_decode($ver[5]),
               "id_proveedor" =>html_entity_decode($ver[6]),
               "id_categoria" =>html_entity_decode($ver[7])
             );
            return $datos;
    }
    
    public function traer_datos_cb($id)
    {
        /**$url = 'https://openexchangerates.org/api/latest.json?app_id=e9a8cfdfbd984b1385e684bbeeb874a1&symbols=ARS,USD';
        //$url = 'https://v6.exchangerate-api.com/v6/f2e245336188d8b305e35692/latest/USD';
        $data = file_get_contents($url);
        $rates = json_decode($data, true)['rates'];
        //$rates = json_decode($data, true)['conversion_rates'];

        $ars_to_usd_rate = $rates['ARS'] / $rates['USD'];
        //echo "La tasa de cambio del dólar estadounidense al peso argentino es: " . $ars_to_usd_rate;**/

        $contenido = file_get_contents('https://dolarhoy.com/');
        if ($contenido !== false) {
            $patron = '/<div class="val">(.*?)<\/div>/';
            if (preg_match($patron, $contenido, $coincidencias)) {
                $datoEspecifico = $coincidencias[1];
            } else {
                //echo 'No se encontró el dato específico en el contenido obtenido de la página web.';
                $datoEspecifico = 0;
            }
        } else {
            //echo 'No se pudo obtener el contenido de la página web.';
            $datoEspecifico = 0;
        }

        $patron = "/\d+/";
        preg_match($patron, $datoEspecifico, $coincidencia);
        $trm_ar = $coincidencia[0];        

        $c = new Conexion();
		$conexion = $c->conectar();
        //$trm_ar = $ars_to_usd_rate;
		$sql = "select precio_venta_dl,precio_venta_mx,(precio_venta_dl*$trm_ar) as precio_venta_ar from productos where id_producto=$id";
		$result = mysqli_query($conexion,$sql);
        $ver = mysqli_fetch_row($result);
        $datos = array(
        "precio_venta_dl" =>html_entity_decode($ver[0]),
        "precio_venta_mx" =>html_entity_decode($ver[1]),
        "precio_venta_ar" =>ROUND(html_entity_decode($ver[2]),2)
        );
        return $datos;
    }

                public function stock($id,$stock)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "update productos set stock = stock + '$stock' where id_producto=$id";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
    
}
