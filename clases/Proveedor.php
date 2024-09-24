<?php
class Proveedor{
            public function save($datos)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$nombre = $c->test_input($datos[0]);
            $direccion = $c->test_input($datos[1]);
            $telefono = $c->test_input($datos[2]);
            $email = $c->test_input($datos[3]);
            $servicio = $c->test_input($datos[4]);
			$sql = "INSERT INTO proveedores(nombre,direccion,telefono,email,servicio,estado) values('$nombre','$direccion','$telefono','$email','$servicio','activo')";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
                public function edit($datos)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
            $id = $datos[0];
			$nombre = $c->test_input($datos[1]);
            $direccion = $c->test_input($datos[2]);
            $telefono = $c->test_input($datos[3]);
            $email = $c->test_input($datos[4]);
            $servicio = $c->test_input($datos[5]);
			$sql = "update proveedores set nombre = '$nombre', direccion = '$direccion',telefono = '$telefono', email = '$email', servicio = '$servicio' where id_proveedor=$id";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
                public function delete($id)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "update proveedores set estado = 'inactivo' where id_proveedor=$id";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
    public function mostrar()
    {
        $c = new Conexion();
		$conexion = $c->conectar();
		$sql = "SELECT id_proveedor,nombre,direccion,telefono,email,servicio from proveedores where estado = 'activo'";
		$result = mysqli_query($conexion,$sql);
        return $result; 
    }
    public function traer($id)
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "select * from proveedores where id_proveedor=$id";
			$result = mysqli_query($conexion,$sql);
            $ver = mysqli_fetch_row($result);
            $datos = array(
               "id_proveedor" =>html_entity_decode($ver[0]),
               "nombre" =>html_entity_decode($ver[1]),
               "direccion" =>html_entity_decode($ver[2]),
               "telefono" =>html_entity_decode($ver[3]),
               "email" =>html_entity_decode($ver[4]),
               "servicio" =>html_entity_decode($ver[5])
             );
            return $datos;
    }
}
