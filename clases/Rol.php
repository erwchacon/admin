<?php
class Rol{
    public function save($rol)
    {
        $c = new Conexion();
		$conexion = $c->conectar();
		$rol = $c->test_input($rol);
		$sql = "INSERT INTO roles(rol,estado) values('$rol','activo')";
		$result = mysqli_query($conexion,$sql);
        return $result;
    }
    public function edit($datos)
    {
        $c = new Conexion();
		$conexion = $c->conectar();
		$nombre = $c->test_input($datos[1]);
		$sql = "update roles set rol = '$rol' where id_rol=$datos[0]";
		$result = mysqli_query($conexion,$sql);
        return $result;
    }
    public function delete($id)
    {
        $c = new Conexion();
		$conexion = $c->conectar();
		$sql = "update roles set estado = 'inactivo' where id_rol=$id";
		$result = mysqli_query($conexion,$sql);
        return $result;
    }
    public function mostrar()
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "select * from roles where estado = 'activo'";
			$result = mysqli_query($conexion,$sql);
            return $result; 
    }
    public function traer($id)
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "select * from roles where id_rol=$id";
			$result = mysqli_query($conexion,$sql);
            $ver = mysqli_fetch_row($result);
            return html_entity_decode($ver[1]); 
    }
    
    public function mostrar_cb()
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "select * from roles";
			$result = mysqli_query($conexion,$sql);
            return $result;         
    }
    
}


?>