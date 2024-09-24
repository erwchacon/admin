<?php
date_default_timezone_set("America/Lima");
class Gasto{
        public function save($datos)
        {
            $c = new Conexion();
            $conexion = $c->conectar();
            $evento = $c->test_input($datos[0]);
            $estadopago = $c->test_input($datos[1]);
            $importe = $c->test_input($datos[2]);
            $concepto = $c->test_input($datos[3]);
            $factura = $c->test_input($datos[4]);
            $descripcion = $c->test_input($datos[5]);
            $ruta = $c->test_input($datos[6]);
            $fecha = date('y-m-d');
			$sql = "INSERT INTO gastos (evento,importe,concepto,descripcion,no_factura,fecha,estadopago,archivo) 
            values((SELECT nombre FROM eventos WHERE id_evento = $evento),'$importe','$concepto','$descripcion','$factura','$fecha','$estadopago','$ruta')";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
        
        public function mostrar()
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "SELECT col.nombre,gas.* FROM colaboradores col INNER JOIN gastos GAS on col.id_colaborador=gas.solicitante WHERE gas.estado = 'pdte'";
			$result = mysqli_query($conexion,$sql);
            return $result; 
        }

        public function mostrar_porid($id)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "SELECT * FROM gastos where id_gasto = '$id'";
			$result = mysqli_query($conexion,$sql);
            $ver = mysqli_fetch_row($result);
            $datos = array(
               "id_gasto" =>html_entity_decode($ver[0]),
               "solicitante" =>html_entity_decode($ver[1]),
               "evento" =>html_entity_decode($ver[2]),
               "importe" =>html_entity_decode($ver[3]),
               "moneda" =>html_entity_decode($ver[4]),
               "concepto" =>html_entity_decode($ver[5]),
               "metodopago" =>html_entity_decode($ver[6]),
               "reembolso" =>html_entity_decode($ver[7]),
               "descripcion" =>html_entity_decode($ver[8]),
               "no_factura" =>html_entity_decode($ver[9]),
               "fecha" =>html_entity_decode($ver[10]),
               "estado" =>html_entity_decode($ver[11]),
               "archivo" =>html_entity_decode($ver[12])
             );
            return $datos;
        }

        public function consultar_gasto($f1,$f2)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
            $sql = "SELECT * FROM gastos WHERE fecha BETWEEN '$f1' AND '$f2'";
            $result= mysqli_query($conexion,$sql);

              return $result ;
        }

        public function marcar_gasto($id)
        {
            $c = new Conexion();
            $conexion = $c->conectar();
            $sql = "UPDATE gastos set estado = 'conf' where id_gasto = '$id'";
            $result = mysqli_query($conexion,$sql);
            return $result; 
        }

         public function rechazar_gasto($id,$rechazo)
        {
            $c = new Conexion();
            $conexion = $c->conectar();
            $sql = "UPDATE gastos SET estado = 'rech', motivorechazo = '$rechazo' 
                    WHERE id_gasto = '$id'";
            $result = mysqli_query($conexion,$sql);
            return $result; 
        }
            
    
}
