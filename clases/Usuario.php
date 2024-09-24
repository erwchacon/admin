<?php
class Usuario{
    
	public function login($datos)
	{
		$c = new Conexion();
		$conexion = $c->conectar();
		$password = mysqli_real_escape_string($conexion,sha1(md5($datos[1])));
		$usuario = mysqli_real_escape_string($conexion,$datos[0]);
		$sql = "select * from usuarios where usuario='$usuario' and clave='$password'";
		$result = mysqli_query($conexion,$sql);
		$filas=mysqli_fetch_array($result);
		$_SESSION['admin'] = $filas['admin'];
		//$user = $filas['admin'];
		$user = $_SESSION['admin'];

		if(mysqli_num_rows($result) > 0)
		{
            $_SESSION['usuario'] = $datos[0];
            $_SESSION['datos'] = $result->fetch_object();

            if($user==1){ //administrador
				return 1;
			}else if($user==0){ //usuario
				return 2;
			}
			else {
				return 0;
			}
		}
	}
    public function cambiarpass($passwords)
    {
        $c = new Conexion();
		$conexion = $c->conectar();
		$password = mysqli_real_escape_string($conexion,sha1(md5($passwords)));
        $usuario = $_SESSION['datos']->usuario;
		$sql = "UPDATE usuarios SET clave = '$password' where usuario='$usuario'";
		$result = mysqli_query($conexion,$sql);
        return $result;
    }
    public function save($datos)
    {
        $c = new Conexion();
		$conexion = $c->conectar();
		$usuario = $c->test_input($datos[0]);
		$nombre = $c->test_input($datos[1]);
		$apellido = $c->test_input($datos[2]);
		$contraseña = $c->test_input($datos[3]);
		$tipo = $c->test_input($datos[4]);
		$nombre_completo = CONCAT($nombre,' ',$apellido);
		$clave = sha1(md5($contraseña));
		$sql = "INSERT INTO usuarios(usuario,nombre,apellido,nombre_completo,clave,admin,estado) values('$usuario','$nombre','$apellido','$nombre_completo','$clave','$tipo','activo')";
		$result = mysqli_query($conexion,$sql);
        return $result;
    }
    public function mostrar()
    {
        $c = new Conexion();
		$conexion = $c->conectar();
		$sql = "SELECT id_usuario,usuario,nombre_completo,admin FROM usuarios WHERE estado = 'activo'";
		$result = mysqli_query($conexion,$sql);
        return $result; 
    }
    public function traer($id)
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "SELECT * FROM usuarios WHERE id_usuario=$id";
			$result = mysqli_query($conexion,$sql);
            $ver = mysqli_fetch_row($result);
            return html_entity_decode($ver[1]); 
    }
    public function edit($datos)
    {
        $c = new Conexion();
		$conexion = $c->conectar();
		$id = $c->test_input($datos[0]);
		$usuario = $c->test_input($datos[1]);
		$nombre = $c->test_input($datos[2]);
		$apellido = $c->test_input($datos[3]);
		$contraseña = $c->test_input($datos[4]);
		$tipo = $c->test_input($datos[5]);
		$nombre_completo = CONCAT($nombre,' ',$apellido);
		$clave = sha1(md5($contraseña));
		
		$sql = "UPDATE usuarios SET usuario = '$usuario', nombre = '$nombre', apellido = '$apellido', nombre_completo = '$nombre_completo', clave = '$clave' WHERE id_usuario=$id";
		$result = mysqli_query($conexion,$sql);
        return $result;
    }
    public function delete($id)
    {
        $c = new Conexion();
		$conexion = $c->conectar();
		$sql = "update usuarios set estado = 'inactivo' where id_usuario=$id";
		$result = mysqli_query($conexion,$sql);
        return $result;
    }

}


?>