<?php
require 'header.php';

if(isset($_SESSION['usuario']))
{

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>


<div class="content-page">
	
    <!-- Start content -->
    <div class="content">
        
        <div class="container">
                
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder" style="padding-bottom: 10px;">
                                <h1 class="main-title float-left">Generar Venta</h1>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-4">
                            <label>Email Cliente</label>
                            <input id="email" name="email" class="form-control" placeholder="@" onblur="functions()"/>
                        </div>
                        <div class="col-4">
                            <label>Nombre Cliente</label>
                            <input readonly class="form-control" id="cliente" name="cliente" type="text"/>
                        </div>
                        <div class="col-4">
                            <label>Vendedor</label>
                            <input readonly class="form-control" id="vendedor" name="vendedor" type="text"/>
                        </div>
                    </div>
                    <div id="respuesta"> </div>
                    <div class="row">
                        <div class="col-4">
                            <label>Evento</label>
                            <select id="evento" name="evento" class="form-control">
                                <option value="A">Seleccione...</option>
                                <?php
                                    require_once '../clases/Evento.php';
                                    require_once '../clases/Conexion.php';
                                    $obj1 = new Evento();
                                    $evento = $obj1->mostrar();
                                    while($eve=mysqli_fetch_row($evento))
                                    {
                                ?>
                                <option value="<?php echo $eve[0] ?>" ><?php echo $eve[1] ?></option>
                                <?php
                                    }
                                ?>               
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Fecha compra</label>
                            <?php date_default_timezone_set("America/Lima"); $fecha = date("Y-m-d");?>
                            <input type="date" class="form-control"  id="fecha_compra" name="fecha_compra" value="<?= $fecha ?>">
                        </div>

                        <div class="col-4">
                            <label>Fecha inicio</label>
                            <?php date_default_timezone_set("America/Lima"); $fecha = date("Y-m-d");?>
                            <input type="date" class="form-control" value="<?= $fecha ?>" id="fecha_inicio" name="fecha_inicio">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label>Método de pago</label>
                            <select name="metodopago" id="metodopago" class="form-control">
                                <option value="A">Seleccione...</option>
                                <option value="Zelle">Zelle</option>
                                <option value="US_Payment">US Payment</option>
                                <option value="Transferencia_BBVA">Transferencia BBVA</option>
                                <option value="Stripe">Stripe</option>
                                <option value="Mercado_pago">Mercado pago</option>
                                <option value="Transferencia_BBVA_Terminal">Transferencia BBVA Terminal</option>
                                <option value="Macro_PR">Macro PR</option>
                            </select>
                        </div>

                        <div class="col-3">
                            <label for="tipopago">Tipo pago</label><br>
                            <select name="tipopago" id="tipopago" class="form-control" onchange="mostrarInput()">
                                <option value="completo">completo</option>
                                <option value="parcial">parcial</option>
                            </select>
                        </div>
                        <div class="col-2" id="inputOpcion" style="display:none;">
                            <label for="pagoparcial">Monto parcial</label>
                            <input type="number" id="pagoparcial" name="pagoparcial" class="form-control">
                        </div>
                        <div class="col-3">
                            <label for="consignacion">Cargar recibo</label><br>
                            <input name="archivo" id="archivo" type="file">
                        </div>
                    </div>

                    <hr>
                    <form id="frmventa">
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Producto</label>
                            <select id="txtproducto" name="txtproducto" class="form-control">
                                <option value="A">Seleccione...</option>
                                <?php
                                    require_once '../clases/Producto.php';
                                    require_once '../clases/Conexion.php';
                                    $obj1 = new Producto();
                                    $producto = $obj1->mostrar();
                                    while($pro=mysqli_fetch_row($producto))
                                    {
                                ?>
                                <option value="<?php echo $pro[0] ?>" ><?php echo $pro[1] ?></option>
                                <?php
                                    }

                                ?>               
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>Moneda</label>
                            <select name="moneda" id="moneda" class="form-control">
                                <option value="">Seleccione...</option>
                                <option value="US">Dolar</option>
                                <option value="MX">Peso Mexicano</option>
                                <option value="AR">Peso Argentino</option>
                                <!--<option value="Peso Colombiano">Peso Colombiano</option>-->
                            </select>
                        </div>

                        <div class="col-lg-2">
                            <label>Precio $</label>
                            <input readonly class="form-control" id="txtprecio" name="txtprecio" type="number"/>
                        </div>
                        <div class="col-lg-1" hidden>
                            <label>US$</label>
                            <input readonly  class="form-control" id="txtpreciodl" name="txtpreciodl" type="number"/>
                        </div>
                        <div class="col-lg-1">
                            <label>Cantidad</label>
                            <input value="1" class="form-control" id="txtcantidad" name="txtcantidad" type="number"/>
                        </div>
                        <div class="col-lg-2">
                           <label style="opacity: 0%;">.</label>
                            <input type="button" Value="Agregar" id="btnagregar" name="btnagregar" class="form-control btn btn-registrar" />
                        </div>
                    </div>
                    </form>
                    <div class="row">
                        <div  class="col-lg-12">
                            <div id="tabla_temporal">
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                        </div>
                        <div class="col-4">
                            <span class="btn btn-danger" id="btncancelar">Cancelar</span>
                            <span class="btn btn-success" id="btnguardar">Guardar Venta</span>
                        </div>
                    </div>



        </div>
        <!-- END container-fluid -->

    </div>
    <!-- END content -->

</div>
<!-- END content-page -->



<?php
require 'footer.php';
}
else {
	header("location:../index.php");  
}

?>

<script>
    
    function quitarp(index){
	$.ajax({
		type:"POST",
		data:"ind="+index,
		url:"../procesos/ventas/quitarproducto.php",
		success:function(r)
		{
			$('#tabla_temporal').load('tabla_temporal.php'); 
			alertify.success("Se quito el producto");
		}
	   });
    }
    
$(document).ready(function(){
   $('#tabla_temporal').load('tabla_temporal.php'); 
    


     $('#txtproducto').change(function (){
         if($('#txtproducto').val() != "A")
            {
                 $.ajax({
                     type:"POST",
                     data:"idproducto=" + $('#txtproducto').val(),
                     url:"../procesos/ventas/llenarproductos.php",
                     success:function(r){
                         if(r=="A"){
                            $('#txtprecio').val('');
                            $('#txtpreciodl').val('');
                        }else if($('#moneda').val() == "US") 
                            {
                                var data =JSON.parse(r);
                                $('#txtprecio').val(data['precio_venta_dl']);
                        }else if($('#moneda').val() == "MX") 
                            {
                                var data =JSON.parse(r);
                                $('#txtprecio').val(data['precio_venta_mx']);
                        }else if($('#moneda').val() == "AR") 
                            {
                                var data =JSON.parse(r);
                                $('#txtprecio').val(data['precio_venta_ar']);
                        }
                        var data =JSON.parse(r);
                        $('#txtpreciodl').val(data['precio_venta_dl']);
                    }
                });            
            }
        else{
                            $('#txtprecio').val('');
                            $('#txtpreciodl').val('');
            }

    });

    $('#moneda').change(function (){
         if($('#moneda').val() != "A")
            {
                 $.ajax({
                     type:"POST",
                     data:"idproducto=" + $('#txtproducto').val(),
                     url:"../procesos/ventas/llenarproductos.php",
                     success:function(r){
                         if(r=="A"){
                            $('#txtprecio').val('');
                        }else if($('#moneda').val() == "US") 
                            {
                                var data =JSON.parse(r);
                                $('#txtprecio').val(data['precio_venta_dl']);
                                //$('#txtstock').val(data['stock']);
                        }else if($('#moneda').val() == "MX") 
                            {
                                var data =JSON.parse(r);
                                $('#txtprecio').val(data['precio_venta_mx']);
                        }else if($('#moneda').val() == "AR") 
                            {
                                var data =JSON.parse(r);
                                $('#txtprecio').val(data['precio_venta_ar']);
                        }
                    }
                });            
            }
        else{
                            $('#txtprecio').val('');
                            //$('#txtstock').val('');
            }

    });
    
    $('#btnagregar').click(function(){
        //var select = document.getElementById("moneda");
        //select.disabled = true;
        datos = $('#frmventa').serialize();
        vacios = validarFormVacio('frmventa');
        if(vacios <= 0 ){
            $.ajax({
               url:'../procesos/ventas/agregarproductotem.php',
               data : datos,
               type : 'POST',
                success:function(r)
                {
                    if(r=="camposventa")
                        {
                            alertify.error("Complete los datos para aregar producto");
                        }
                    else if(r==1)
                        {
                            $('#txtprecio').val('');
                            $('#txtstock').val('');
                            $('#txtproducto').val('A');
                            $('#tabla_temporal').load('tabla_temporal.php');
                        }
                    else if(r=="s")
                        {
                            
                            alertify.error("La cantidad es mayor al stock.");
                        }
                    else if(r=="n")
                        {
                            
                            alertify.error("Ingrese una cantidad valida");
                        }
                    else if(r==0)
                        {
                            alert(r);
                        }
                    else{
                        alert(r);
                    }
                    
                }
            });
        }
        else
            {
                alertify.error("Complete los datos para aregar producto");
            }

        //Funcion para inhabilitar el campo #moneda al agregar un producto
        var mySelect = document.getElementById("moneda");
        const selectedOption = mySelect.options[mySelect.selectedIndex];
        for (let i = 0; i < mySelect.options.length; i++) {
            if (mySelect.options[i] !== selectedOption) {
                mySelect.options[i].disabled = true;
            }
        }

    });
    
    $('#btncancelar').click(function(){
        alertify.confirm('Venta','¿Desea cancelar la venta?', function(){
       $.ajax({
          url:'../procesos/ventas/vaciartemp.php',
           success:function(r)
           {
               $('#tabla_temporal').load('tabla_temporal.php');
                            $('#txtprecio').val('');
                            $('#txtstock').val('');
                            $('#txtproducto').val('A');
                            $('#vendedor').val('');
                            $('#email').val('');
                            $('#cliente').val('');
                            $('#evento').val('');
                            $('#metodopago').val('');
                            $('#moneda').val('');
           }
       });             
            Swal.fire('Se ha cancelado la venta');
                            $('#txtprecio').val('');
                            $('#txtstock').val('');
                            $('#txtproducto').val('A');
                            $('#vendedor').val('');
                            $('#email').val('');
                            $('#cliente').val('');
                            $('#evento').val('');
                            $('#metodopago').val('');      
        }, function(){
            Swal.fire('Continúe con la venta la venta...');
        });
    });
    
    $('#btnguardar').click(function(){
        var ven = $('#vendedor').val();
        var ema = $('#email').val();
        var nom = $('#cliente').val();
        var eve = $('#evento').val();
        var fecc = $('#fecha_compra').val();
        var feci = $('#fecha_inicio').val();
        var prod = $('#txtproducto').val();
        var met = $('#metodopago').val();
        var tipo = $('#tipopago').val();
        var par = $('#pagoparcial').val();
        var mon = $('#moneda').val();
        var total = $('#txttotal').html();
        var total_us = $('#txttotaldl').html();

        var archivo = $('#archivo').prop('files')[0];

        if (!archivo) {
            alertify.error("Debe subir una imagen del recibo de la venta");
            return;
        }

        var datos = new FormData();
        datos.append("txttotal", total);
        datos.append("txttotaldl", total_us);
        datos.append("cliente", nom);
        datos.append("tipopago", tipo);
        datos.append("vendedor", ven);
        datos.append("txtproducto", prod);
        datos.append("email", ema);
        datos.append("evento", eve);
        datos.append("metodopago", met);
        datos.append("fecha_inicio", feci);
        datos.append("moneda", mon);
        datos.append("fecha_compra", fecc);
        datos.append("pagoparcial", par);
        datos.append("archivo", archivo);

        $.ajax({
            url: '../procesos/ventas/guardar_venta.php',
            data: datos,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function(r) {
                var input = document.getElementById("inputOpcion");
                if (r == "camposventa") {
                    alertify.error("Complete los datos para guardar la venta");
                } else if (r == "ok") {
                    input.style.display = "none";
                    $('#tabla_temporal').load('tabla_temporal.php');
                    alertify.success("Venta guardada correctamente");
                    $('#txtprecio').val('');
                    $('#txtpreciodl').val('');
                    $('#txtproducto').val('A');
                    $('#cliente').val('');
                    $('#tipopago').val('completo');
                    $('#vendedor').val('');
                    $('#email').val('');
                    $('#evento').val('A');
                    $('#metodopago').val('A');
                    $('#fecha_inicio').val('');
                    $('#fecha_compra').val('');
                    $('#moneda').val('');
                    $('#pagoparcial').val('');
                    $('#archivo').val('');
                } else if (r == "v") {
                    alertify.error("Complete los datos para guardar la venta");
                } else if (r == "tablav") {
                    alertify.error("Esta venta no tiene productos");
                } else if (r == 0) {
                    alert(r);
                } else {
                    alert(r);
                }
            }
        });
    });
    
    
});

function functions(){
    nombreCliente();
    nombreColaborador();
}


function nombreCliente() {
  // Obtener el valor del campo de correo electrónico
  var email = document.getElementById("email").value;
  var vendedor = document.getElementById("vendedor").value;

  // Hacer una solicitud AJAX al archivo PHP para obtener el nombre del cliente
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Asignar el nombre del cliente al campo correspondiente
        document.getElementById("cliente").value = xhr.responseText;
      } else {
        console.log("Hubo un problema al obtener el nombre del cliente.");
      }
    }
  };
  xhr.open("POST", "../procesos/clientes/traerNombreCliente.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("email=" + email);
}


function nombreColaborador() {
  // Obtener el valor del campo de correo electrónico
  var email = document.getElementById("email").value;
  var vendedor = document.getElementById("vendedor").value;

  // Hacer una solicitud AJAX al archivo PHP para obtener el nombre del cliente
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Asignar el nombre del cliente al campo correspondiente
        document.getElementById("vendedor").value = xhr.responseText;
      } else {
        console.log("Hubo un problema al obtener el nombre del cliente.");
      }
    }
  };
  xhr.open("POST", "../procesos/colaboradores/traerNombreColaborador.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("email=" + email);
}

function mostrarInput() {
  var select = document.getElementById("tipopago");
  var input = document.getElementById("inputOpcion");

  if (select.value == "parcial") {
    input.style.display = "block";
  } else {
    input.style.display = "none";
  }
}


</script>


  
