<?php
class Evento{
            public function save($datos)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$nombre = $c->test_input($datos[0]);
            $ciudad = $c->test_input($datos[1]);
            $lugar = $c->test_input($datos[2]);
            $fecha = $c->test_input($datos[3]);
            $hora = $c->test_input($datos[4]);
            $ubicacion = $c->test_input($datos[5]);
			$sql = "INSERT INTO eventos(nombre,ciudad,lugar,fecha,hora,ubicacion,estado) values('$nombre','$ciudad','$lugar','$fecha','$hora','$ubicacion','activo')";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
        public function edit($datos)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
            $id = $datos[0];
			$nombre = $c->test_input($datos[1]);
            $ciudad = $c->test_input($datos[2]);
            $lugar = $c->test_input($datos[3]);
            $fecha = $c->test_input($datos[4]);
            $hora = $c->test_input($datos[5]);
            $ubicacion = $c->test_input($datos[6]);
			$sql = "update eventos set nombre = '$nombre', ciudad = '$ciudad', lugar = '$lugar', fecha = '$fecha', hora = '$hora', ubicacion = '$ubicacion' where id_evento=$id";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
        public function delete($id)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "update eventos set estado = 'inactivo' where id_evento=$id";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
        public function mostrar()
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "select * from eventos where estado = 'activo'";
			$result = mysqli_query($conexion,$sql);
            return $result; 
        }
        public function traer($id)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "select * from eventos where id_evento=$id";
			$result = mysqli_query($conexion,$sql);
            $ver = mysqli_fetch_row($result);
            $datos = array(
               "id_evento" =>html_entity_decode($ver[0]),
               "nombre" =>html_entity_decode($ver[1]),
               "ciudad" =>html_entity_decode($ver[2]),
               "lugar" =>html_entity_decode($ver[3]),
               "fecha" =>html_entity_decode($ver[4]),
               "hora" =>html_entity_decode($ver[5]),
               "ubicacion" =>html_entity_decode($ver[6])
             );
            return $datos;
    }
}
