<?php
class Cliente{
            public function save($datos)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
            $vendedor = $c->test_input($datos[0]);
			$nombre = $c->test_input($datos[1]);
            $telefono = $c->test_input($datos[2]);
            $email = $c->test_input($datos[3]);
            $pais = $c->test_input($datos[4]);
            $ciudad = $c->test_input($datos[5]);
            $dia_cumpleanos = $c->test_input($datos[6]);
            $mes_cumpleanos = $c->test_input($datos[7]);
			$sql = "INSERT INTO clientes(nombre,telefono,email,pais,ciudad,dia_cumpleanos,mes_cumpleanos,cumpleanos,vendedor,estado) values('$nombre','$telefono','$email','$pais','$ciudad','$dia_cumpleanos','$mes_cumpleanos',CONCAT('$dia_cumpleanos',' ', '$mes_cumpleanos'),'$vendedor','activo')";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
        public function edit($datos)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
            $id = $datos[0];
			$nombre = $c->test_input($datos[1]);
            $telefono = $c->test_input($datos[2]);
            $email = $c->test_input($datos[3]);
            $pais = $c->test_input($datos[4]);
            $ciudad = $c->test_input($datos[5]);
            $dia_cumpleanos = $c->test_input($datos[6]);
            $mes_cumpleanos = $c->test_input($datos[7]);
			$sql = "update clientes set nombre = '$nombre', telefono = '$telefono', email = '$email', pais = '$pais', ciudad = '$ciudad', dia_cumpleanos = '$dia_cumpleanos', mes_cumpleanos = '$mes_cumpleanos', cuampleanos = CONCAT('$dia_cumpleanos',' ', '$mes_cumpleanos') where id_cliente=$id";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
        public function delete($id)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "update clientes set estado = 'inactivo' where id_cliente=$id";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
        public function mostrar()
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "SELECT cli.*, col.nombre as nombre_vendedor
            FROM clientes cli INNER JOIN colaboradores col ON cli.vendedor=col.id_colaborador
            WHERE cli.estado = 'activo'";
			$result = mysqli_query($conexion,$sql);
            return $result; 
        }

        public function mostrar_reporte()
        {
            $c = new Conexion();
            $conexion = $c->conectar();
            $sql = "SELECT cli.*, col.nombre as nombre_vendedor
            FROM clientes cli INNER JOIN colaboradores col ON cli.vendedor=col.id_colaborador";
            $result = mysqli_query($conexion,$sql);
            return $result; 
        }
        
        public function traer($id)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "select * from clientes where id_cliente=$id";
			$result = mysqli_query($conexion,$sql);
            $ver = mysqli_fetch_row($result);
            $datos = array(
               "id_cliente" =>html_entity_decode($ver[0]),
               "nombre" =>html_entity_decode($ver[1]),
               "telefono" =>html_entity_decode($ver[2]),
               "email" =>html_entity_decode($ver[3]),
               "pais" =>html_entity_decode($ver[4]),
               "ciudad" =>html_entity_decode($ver[5]),
               "dia_cumpleanos" =>html_entity_decode($ver[6]),
               "mes_cumpleanos" =>html_entity_decode($ver[7]),
               "cumpleanos" =>html_entity_decode($ver[8])
             );
            return $datos;
    }

    public function traer_datos_cli($id)
    {
            $c = new Conexion();
            $conexion = $c->conectar();
            $sql = "select nombre from clientes where email=$id";
            $result = mysqli_query($conexion,$sql);
            $ver = mysqli_fetch_row($result);
            $datos = array(
            "nombre" =>html_entity_decode($ver[0])
            );
            return $datos;
    }

}

