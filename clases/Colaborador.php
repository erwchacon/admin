<?php
class Colaborador{
    public function save($datos)
    {
        $c = new Conexion();
		$conexion = $c->conectar();
		$nombre = $c->test_input($datos[0]);
        $telefono = $c->test_input($datos[1]);
        $email = $c->test_input($datos[2]);
        $documento = $c->test_input($datos[3]);
        $cuenta = $c->test_input($datos[4]);
        $banco = $c->test_input($datos[5]);
        $contrato = $c->test_input($datos[6]);
        $rol = $c->test_input($datos[7]);
        $ruta_archivo = $c->test_input($datos[8]);
		$sql = "INSERT INTO colaboradores(nombre,telefono,email,documento,cuenta,banco,contrato,archivo,rol,estado) values('$nombre','$telefono','$email','$documento','$cuenta','$banco','$contrato','$ruta_archivo','$rol','activo')";
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
        $documento = $c->test_input($datos[4]);
        $cuenta = $c->test_input($datos[5]);
        $banco = $c->test_input($datos[6]);
        $contrato = $c->test_input($datos[7]);
        $rol = $c->test_input($datos[8]);
		$sql = "update colaboradores set nombre = '$nombre', telefono = '$telefono', email = '$email', documento = '$documento', cuenta = '$cuenta', banco = '$banco', contrato = '$contrato', rol = '$rol' where id_colaborador=$id";
		$result = mysqli_query($conexion,$sql);
        return $result;
    }
    public function delete($id)
    {
        $c = new Conexion();
		$conexion = $c->conectar();
		$sql = "UPDATE colaboradores SET estado = 'inactivo' WHERE id_colaborador=$id";
		$result = mysqli_query($conexion,$sql);
        return $result;
    }
    public function mostrar()
        {
            $c = new Conexion();
    		$conexion = $c->conectar();
    		$sql = "SELECT * from colaboradores where estado = 'activo'";
    		$result = mysqli_query($conexion,$sql);
            return $result; 
        }
    public function traer($id)
    {
        $c = new Conexion();
		$conexion = $c->conectar();
		$sql = "select * from colaboradores where id_colaborador=$id";
		$result = mysqli_query($conexion,$sql);
        $ver = mysqli_fetch_row($result);
        $datos = array(
           "id_colaborador" =>html_entity_decode($ver[0]),
           "nombre" =>html_entity_decode($ver[1]),
           "telefono" =>html_entity_decode($ver[2]),
           "email" =>html_entity_decode($ver[3]),
           "documento" =>html_entity_decode($ver[4]),
           "cuenta" =>html_entity_decode($ver[5]),
           "banco" =>html_entity_decode($ver[6]),
           "contrato" =>html_entity_decode($ver[7]),
           "rol" =>html_entity_decode($ver[9])
         );
        return $datos;
    }
    public function mostrar_vendedores()
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "select * from colaboradores where rol = '2' and estado = 'activo'";
        $result = mysqli_query($conexion,$sql);
        return $result; 
    }
}
