<?php
date_default_timezone_set("America/Lima");
class Venta{
    public function save($id_ven,$email,$nombre,$evento,$fecha_compra,$fecha_inicio,$metodopago,$tipopago,$pagoparcial,$moneda,$total,$total_us,$ruta_archivo)
    {
        $c = new Conexion();
		$conexion = $c->conectar();
		$cliente = $c->test_input($nombre);
        $imp = 0;

        switch ($metodopago) {
            case 'US_Payment':
                $imp = $total_us*0.04;
                break;
            case 'Stripe':
                $imp = $total_us*0.029;
                break;
            case 'Mercado_pago':
                $imp = $total_us*0.04;
                break;
            case 'Transferencia_BBVA_Terminal':
                $imp = $total_us*0.029;
                break;
            default:
                $imp = 0;
                break;
        }

        if($total_us < 849){
            $comision = (($total_us-$imp)*4.5)/100;
        }else if($total_us == 849){
            if($evento == 1 || $evento == 2){
                $comision = (($total_us-$imp)*10)/100;
            }else{
                $comision = (($total_us-$imp)*4.5)/100;
            }
        }else if($total_us > 849){
            if($evento == 1 || $evento == 2){
                $comision = (((($total_us-849)-$imp)*4.5)/100)+((849*10)/100);
            }else{
                $comision = (($total_us-$imp)*4.5)/100;
            }
        }
        $neto = $total_us-$imp-$comision;
        if($tipopago == 'completo'){
    		$sql = "INSERT INTO ventas (vendedor,email,cliente,evento,fecha_compra,fecha_inicio,metodopago,tipopago,pagoparcial,estado,moneda,total,total_us,imp_plataforma,comision,neto,archivo) 
            values('$id_ven','$email','$cliente','$evento','$fecha_compra','$fecha_inicio','$metodopago','$tipopago','$total','activo','$moneda','$total','$total_us','$imp','$comision','$neto','$ruta_archivo')";
    		$result = mysqli_query($conexion,$sql);
            return $result;
        }else{
            $sql = "INSERT INTO ventas (vendedor,email,cliente,evento,fecha_compra,fecha_inicio,metodopago,tipopago,pagoparcial,estado,moneda,total,total_us,imp_plataforma,comision,neto,archivo) 
            VALUES('$id_ven','$email','$cliente','$evento','$fecha_compra','$fecha_inicio','$metodopago','$tipopago','$pagoparcial','pdte','$moneda','$total','$total_us','$imp','$comision','$neto','$ruta_archivo')";
            $result = mysqli_query($conexion,$sql);
            return $result;
        }
    }


    public function save_detalle()
    {
        $c = new Conexion();
		$conexion = $c->conectar();
        $id = self::trae_venta();

        
        if(isset($_SESSION['tablacomprastemp']))
        {
        $datos = $_SESSION['tablacomprastemp'];
        $r=0;
        for($i=0;$i < count($datos);$i++)
        {
            $d = explode("||",$datos[$i]);
            $sql = "INSERT INTO detalle_ventas(id_ventas,id_productos,cantidad,precio,importe)
            VALUES('$id','$d[4]','$d[2]','$d[1]','$d[3]')";
            //$this->baja_stock($d[2],$d[4]);
            $r = $r + $result = mysqli_query($conexion,$sql);
            
        }   
        return $r;
        }
            else{
            return "not";
        }

    }

    public function trae_venta()
    {
        $c = new Conexion();
		$conexion = $c->conectar();
        $sql = "SELECT id_venta from ventas group by id_venta desc";
        $result= mysqli_query($conexion,$sql);
        $id=mysqli_fetch_row($result)[0];

          return $id ;
    }

    public function baja_stock($stock,$id)
    {
        $c = new Conexion();
		$conexion = $c->conectar();
        $sql = "CALL baja_stock('$stock','$id')";
        $result= mysqli_query($conexion,$sql);
        return $result;
        }
    
    public function mostrar()
    {
        $c = new Conexion();
		$conexion = $c->conectar();
		$sql = "SELECT col.nombre,ven.* FROM colaboradores col INNER JOIN ventas ven ON col.id_colaborador=ven.vendedor WHERE ven.estado = 'activo' OR ven.estado = 'pdte'";
		$result = mysqli_query($conexion,$sql);
        return $result;
    }

     public function mostrar_pdtes()
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "SELECT col.nombre,ven.* FROM colaboradores col INNER JOIN ventas ven ON col.id_colaborador=ven.vendedor WHERE ven.estado = 'pdte'";
        $result = mysqli_query($conexion,$sql);
        return $result; 
    }

    public function mostrar_rechazadas()
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "SELECT col.nombre,ven.* FROM colaboradores col INNER JOIN ventas ven ON col.id_colaborador=ven.vendedor WHERE ven.estado = 'rech'";
        $result = mysqli_query($conexion,$sql);
        return $result; 
    }

    public function mostrar_porid($id)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "SELECT id_venta,(SELECT col.nombre FROM colaboradores col INNER JOIN ventas ven ON ven.vendedor=col.id_colaborador WHERE ven.id_venta = '$id'),email,cliente,evento,fecha_compra,metodopago,pagoparcial,archivo FROM ventas WHERE id_venta = '$id'";
        $result = mysqli_query($conexion,$sql);
        $ver = mysqli_fetch_row($result);
        $datos = array(
           "id_venta" =>html_entity_decode($ver[0]),
           "vendedor" =>html_entity_decode($ver[1]),
           "email" =>html_entity_decode($ver[2]),
           "cliente" =>html_entity_decode($ver[3]),
           "evento" =>html_entity_decode($ver[4]),
           "fecha_compra" =>html_entity_decode($ver[5]),
           "metodopago" =>html_entity_decode($ver[6]),
           "total" =>html_entity_decode($ver[7]),
           "ruta_archivo" =>html_entity_decode($ver[8])
         );
        return $datos;
    } 

    public function mostrar_porid_pdte($id)
    {
        $c = new Conexion();
		$conexion = $c->conectar();
		$sql = "SELECT id_venta,(SELECT col.nombre FROM colaboradores col INNER JOIN ventas ven ON ven.vendedor=col.id_colaborador WHERE ven.id_venta = '$id'),email,cliente,evento,fecha_compra,metodopago,pagoparcial,total FROM ventas WHERE id_venta = '$id'";
		$result = mysqli_query($conexion,$sql);
        $ver = mysqli_fetch_row($result);
        $deuda = number_format((html_entity_decode($ver[8])-html_entity_decode($ver[7])),2);
        $datos = array(
           "id_venta" =>html_entity_decode($ver[0]),
           "vendedor" =>html_entity_decode($ver[1]),
           "email" =>html_entity_decode($ver[2]),
           "cliente" =>html_entity_decode($ver[3]),
           "evento" =>html_entity_decode($ver[4]),
           "fecha_compra" =>html_entity_decode($ver[5]),
           "metodopago" =>html_entity_decode($ver[6]),
           "pagoparcial" =>html_entity_decode($ver[7]),
           "total" =>html_entity_decode($ver[8]),
           "deuda" => $deuda
         );
        return $datos;
    } 

    public function traer_detalles($id)
    {
        $c = new Conexion();
		$conexion = $c->conectar();
		$sql = "SELECT de.cantidad,p.nombre,de.precio,de.importe FROM detalle_ventas AS de
        INNER JOIN productos AS p ON p.id_producto=de.id_productos WHERE de.id_ventas = $id";
		$result = mysqli_query($conexion,$sql);
        return $result; 
    }

    public function total_compra($id)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "SELECT ve.id_venta, SUM(de.importe) AS total_pago FROM detalle_ventas AS de INNER JOIN ventas AS ve ON ve.id_venta=de.id_ventas WHERE de.id_ventas = $id";
        $result = mysqli_query($conexion,$sql);
        $ver = mysqli_fetch_row($result);
        $datos = array(
           "id_venta" =>html_entity_decode($ver[0]),
           "total_pago" =>html_entity_decode($ver[1])
         );
        return $datos; 
    }

    public function marcar_venta($id)
    {
        $c = new Conexion();
		$conexion = $c->conectar();
		$sql = "UPDATE ventas SET estado = 'conf' WHERE id_venta = '$id'";
		$result = mysqli_query($conexion,$sql);
        return $result; 
    }

    public function marcar_venta_pdte($id)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "UPDATE ventas SET estado = 'activo' WHERE id_venta = '$id'";
        $result = mysqli_query($conexion,$sql);
        return $result; 
    }

    public function consultar_venta($f1,$f2)
    {
        $c = new Conexion();
		$conexion = $c->conectar();
        $sql = "SELECT id_venta,vendedor,cliente,email,fecha_compra,evento,metodopago,tipopago,moneda,total,comision,neto 
        FROM ventas WHERE fecha_compra BETWEEN '$f1' AND '$f2'";
        $result = mysqli_query($conexion,$sql);
        return $result;
    }

    public function rechazar_venta($id,$rechazo)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "UPDATE ventas SET estado = 'rech', motivorechazo = '$rechazo' 
                WHERE id_venta = '$id'";
        $result = mysqli_query($conexion,$sql);
        return $result; 
    }

    public function eliminar_venta_pdte($id)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "UPDATE ventas SET estado = 'inactivo' where id_venta = '$id'";
        $result = mysqli_query($conexion,$sql);
        return $result;  
    }

    public function save_suscripcion($email,$nombre,$fecha_inicio,$tipopago,$id_producto,$evento,$total,$id_ven)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        if($tipopago == 'completo'){
            $sql = "INSERT INTO suscripciones (email_cliente,nombre_cliente,fecha_inicio,producto,procedencia,costo,vendedor,estado)
            VALUES ('$email','$nombre','$fecha_inicio','$id_producto','$evento','$total',(SELECT nombre FROM colaboradores WHERE id_colaborador = $id_ven),'activo')";
            $result = mysqli_query($conexion,$sql);
            return $result;
        }
        if($tipopago == 'parcial'){
            $sql = "INSERT INTO suscripciones (email_cliente,nombre_cliente,fecha_inicio,producto,procedencia,costo,vendedor,estado)
            VALUES ('$email','$nombre','$fecha_inicio','$id_producto','$evento','$total',(SELECT nombre FROM colaboradores WHERE id_colaborador = $id_ven),'pdte')";
            $result = mysqli_query($conexion,$sql);
            return $result;
        }
    }
    public function guardarAbono($id,$abono)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "UPDATE ventas SET pagoparcial = (pagoparcial+'$abono') where id_venta = '$id'";
        $result = mysqli_query($conexion,$sql);
        return $result; 
    }

     public function rutaRecibo($id) {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "SELECT archivo FROM ventas WHERE id_ventas = '$id'";
        $result= mysqli_query($conexion,$sql);
        return $result;
    }

    public function mostrar_reporte()
        {
            $c = new Conexion();
            $conexion = $c->conectar();
            $sql = "SELECT ven.*, col.nombre as nombre_vendedor
            FROM ventas ven INNER JOIN colaboradores col ON ven.vendedor=col.id_colaborador";
            $result = mysqli_query($conexion,$sql);
            return $result; 
        }

    public function sendmail($id) 
    {
        $objc = new Conexion();
        $ccn = $objc->conectar();

        $sql = "SELECT ven.id_venta,col.email,ven.motivorechazo FROM ventas ven INNER JOIN colaboradores col ON ven.vendedor=col.id_colaborador WHERE ven.id_venta = '$id'";
        $result = mysqli_query($ccn,$sql);
        $fila = mysqli_fetch_array($result);
        
        $id_venta = $fila[0];
        $email_to = $fila[1];
        $motivo_rechazo = $fila[2];
        $email_subject = "¡La venta #" . $id_venta . " ha sido rechazada!";

        if(!isset($id_venta) || !isset($email_to) || !isset($motivo_rechazo)) {
            echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
            echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
            die();
        }

        $email_from = "Administrador SAAI";

        //MAIL BODY
        $body = "
        <html>
        <head>
        <title>¡La venta #" . $id_venta . " ha sido rechazada!</title>
        </head>
        <body style='background:#ffffff; padding:30px;'>
        <h2 style='color:#332700;'>El motivo del rechazo es el siguiente:</h2>";

        $body .= "
        <strong style='color:#332700;'>Motivo: </strong>
        <span style='color:#808080;'>" . $motivo_rechazo . "</span><br>";

        $body .= "
        <strong style='color:#332700;'>Ingrese a la plataforma <a href='#'>aqui</a> para revisar la venta rechazada.</strong><br><br>";

        $body .= "</body></html>";


        // Envío del e-mail usando la función mail() de PHP
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '.$email_from."\r\n".
        'Reply-To: '.$email_from."\r\n" .
        'X-Mailer: PHP/' . phpversion();

        @mail($email_to, $email_subject, $body, $headers);

    }
    
}
