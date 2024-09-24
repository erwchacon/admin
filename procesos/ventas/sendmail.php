<?php
session_start();
require_once "../../clases/Conexion.php";
require_once "../../clases/Venta.php";

if(isset($_POST['id_venta'])){
	
	$id = $_POST['id_venta'];
	$objc = new Conexion();
	$ccn = $objc->conectar();

	$sql = "SELECT ven.id_venta,col.email,ven.motivorechazo FROM ventas ven INNER JOIN colaboradores col ON ven.vendedor=col.id_colaborador WHERE ven.id_venta = '$id'";
	$result = mysqli_query($ccn,$sql);
	$fila = mysqli_fetch_array($result);
	
	$id_venta = $fila[0];
	$email_to = $fila[1];
	$motivo_rechazo = $fila[2];
	$email_subject = "¡La venta #" . $id_venta . " ha sido rechazada!";

	// Aquí se deberían validar los datos ingresados por el usuario
	if(!isset($id) || !isset($email_to)) {

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


	// Ahora se envía el e-mail usando la función mail() de PHP
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: '.$email_from."\r\n".
	'Reply-To: '.$email_from."\r\n" .
	'X-Mailer: PHP/' . phpversion();

	@mail($email_to, $email_subject, $body, $headers);

	header("Location: gracias.html");
}
?>
