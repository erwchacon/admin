<?php
date_default_timezone_set("America/Lima");
class Reporte{
    
    public function ventas_dia(){
            $c = new Conexion();
			$conexion = $c->conectar();
            $fecha = date('y-m-d');
            $sql = "SELECT COUNT(*) FROM ventas where fecha_compra='$fecha'";
            $result= mysqli_query($conexion,$sql);
            $re=mysqli_fetch_row($result)[0];

              return $re ;
    }
    public function dinero_dia(){
            $c = new Conexion();
			$conexion = $c->conectar();
            $fecha = date('y-m-d');
            $sql = "SELECT SUM(pagoparcial) FROM ventas where fecha_compra='$fecha'";
            $result= mysqli_query($conexion,$sql);
            $re=mysqli_fetch_row($result)[0];

            return $re ;
    }
    public function egresos_dia(){
            $c = new Conexion();
            $conexion = $c->conectar();
            $fecha = date('y-m-d');
            $sql = "SELECT SUM(importe) FROM gastos where fecha='$fecha'";
            $result= mysqli_query($conexion,$sql);
            $re=mysqli_fetch_row($result)[0];

            return $re ;
    }
    public function eventos_pdtes(){
            $c = new Conexion();
            $conexion = $c->conectar();
            $fecha = date('y-m-d');
            $sql = "SELECT COUNT(*) FROM eventos where fecha>'$fecha'";
            $result= mysqli_query($conexion,$sql);
            $re=mysqli_fetch_row($result)[0];

            return $re ;
    }
    public function ventas_rechazadas(){
            $c = new Conexion();
            $conexion = $c->conectar();
            $fecha = date('y-m-d');
            $sql = "SELECT COUNT(*) FROM ventas where estado='rech'";
            $result= mysqli_query($conexion,$sql);
            $re=mysqli_fetch_row($result)[0];

            return $re ;
    }
    public function stock_0(){
            $c = new Conexion();
			$conexion = $c->conectar();
            $fecha = date('y-m-d');
            $sql = "SELECT count(id_producto) FROM productos where stock < 10";
            $result= mysqli_query($conexion,$sql);
            $re=mysqli_fetch_row($result)[0];

            return $re ;
    }
    public function productos_dia(){
            $c = new Conexion();
			$conexion = $c->conectar();
            $fecha = date('y-m-d');
            $sql = "SELECT SUM(de.cantidad) FROM detalle_ventas AS de
            INNER JOIN ventas AS ve ON ve.id_venta=de.id_ventas
            WHERE ve.fecha_compra = '$fecha'";
            $result= mysqli_query($conexion,$sql);
            $re=mysqli_fetch_row($result)[0];

            return $re ;
    }
    
    public function productos_0(){
            $c = new Conexion();
			$conexion = $c->conectar();
            $fecha = date('y-m-d');
            $sql = "SELECT id_producto,nombre,stock from productos where stock < 10 order by stock asc";
            $result= mysqli_query($conexion,$sql);
            return $result ;
    }
    public function productos_01(){
            $c = new Conexion();
			$conexion = $c->conectar();
            $fecha = date('y-m-d');
            $sql = "SELECT pro.id_producto,pro.nombre,pro.precio_compra,pro.precio_venta,pro.stock,pr.nombre as id_proveedor,ca.nombre
            as id_categoria FROM categorias AS ca
            INNER JOIN productos AS pro ON pro.id_categoria=ca.id_categoria INNER JOIN proveedores AS pr ON pr.id_proveedor=pro.id_proveedor where stock < 10 order by stock asc";
            $result= mysqli_query($conexion,$sql);
            return $result ;
    }
    public function clientes_total(){
            $c = new Conexion();
            $conexion = $c->conectar();
            $sql = "SELECT COUNT(*) FROM clientes where estado='activo'";
            $result= mysqli_query($conexion,$sql);
            $re=mysqli_fetch_row($result)[0];

              return $re ;
    }

    public function consultar_ventas_vendedor($colaborador)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "SELECT ve.cliente,cli.email,cli.telefono,ve.fecha_compra,ve.evento,ve.tipopago,ve.moneda,ve.total,ve.comision,pr.nombre,ve.id_venta,cli.id_cliente
        FROM ventas AS ve 
        INNER JOIN detalle_ventas AS de ON ve.id_venta = de.id_ventas
        INNER JOIN productos AS pr ON de.id_productos = pr.id_producto
        INNER JOIN clientes AS cli ON ve.email = cli.email
        WHERE ve.vendedor = '$colaborador'
        GROUP BY ve.id_venta";
        $result= mysqli_query($conexion,$sql);

        return $result ;
    }

    public function consultar_clientes()
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "SELECT * FROM clientes WHERE estado = 'activo'";
        $result= mysqli_query($conexion,$sql);

        return $result ;
    }

    public function mostrar_cliente_porid($id)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "SELECT id_cliente,nombre,telefono,email,pais,ciudad,cumpleanos FROM clientes WHERE id_cliente = '$id'";
        $result = mysqli_query($conexion,$sql);
        $ver = mysqli_fetch_row($result);
        $datos = array(
           "id_cliente" =>html_entity_decode($ver[0]),
           "nombrecli" =>html_entity_decode($ver[1]),
           "telefonocli" =>html_entity_decode($ver[2]),
           "emailcli" =>html_entity_decode($ver[3]),
           "paiscli" =>html_entity_decode($ver[4]),
           "ciudadcli" =>html_entity_decode($ver[5]),
           "cumpleanoscli" =>html_entity_decode($ver[6])
         );
        return $datos;
    }

    public function mostrar_ventas_porid($id)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "SELECT id_venta,vendedor,cliente,evento,fecha,metodopago,tipopago,estado,comision,total FROM ventas WHERE id_venta = '$id'";
        $result = mysqli_query($conexion,$sql);
        $ver = mysqli_fetch_row($result);
        $datos = array(
           "id_venta" =>html_entity_decode($ver[0]),
           "vendedorven" =>html_entity_decode($ver[1]),
           "clienteven" =>html_entity_decode($ver[2]),
           "eventoven" =>html_entity_decode($ver[3]),
           "fechaven" =>html_entity_decode($ver[4]),
           "metodopagoven" =>html_entity_decode($ver[5]),
           "tipopagoven" =>html_entity_decode($ver[6]),
           "estadoven" =>html_entity_decode($ver[7]),
           "comisionven" =>html_entity_decode($ver[8]),
           "totalven" =>html_entity_decode($ver[8]),
         );
        return $datos;
    }
}

?>