<?php
require 'header.php';

//if(isset($_SESSION['usuario']))
if($_SESSION['admin'] == 1)
{



?>



<!-- Modal Detalle -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-azul">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white"><span class="fa fa-file"></span> Detalle de Venta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="fgenerarecibo">
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6"><h5>Detalle de Venta
                                    <label id="txtidcontr"></label></h5>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1" style="font-weight: bold;">Cliente</span>
                                                </div>
                                                <input id="txtcliente" name="txtcliente" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1" style="font-weight: bold;">Fecha</span>
                                                </div>
                                                <input id="txtfecha" name="txtfecha" type="text" class="form-control"  aria-describedby="basic-addon1" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1" style="font-weight: bold;">Vendedor</span>
                                                </div>
                                                <input id="vendedor" name="vendedor" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1" style="font-weight: bold;">Metodo Pago</span>
                                                </div>
                                                <input id="metodopago" name="metodopago" type="text" class="form-control"  aria-describedby="basic-addon1" readonly>
                                            </div>                                          
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend" hidden>
                                                    <span class="input-group-text" id="basic-addon1r">ID Venta</span>
                                                </div>
                                                <input id="idventa" name="idventa" type="text" class="form-control"  aria-describedby="basic-addon1r" hidden>
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="text-align:right;">
                                            <button type="button" class="btn btn-sm" style="border-color: #C9D2D9;" onclick="descargarImagen()">Descargar Recibo</button>
                                        </div>
                                    </div>
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend" hidden>
                                            <span class="input-group-text" id="basic-addon1r">Ruta</span>
                                        </div>
                                        <input id="rutaArchivo" name="rutaArchivo" type="text" class="form-control"  aria-describedby="basic-addon1r" hidden>
                                    </div>
                                </div>
                                <div class="bordde">
                                    <div id="tablaaa"></div>
                                    <div class="col-12">
                                        <h6 style="text-align:right; color: #444;">Valor compra: $
                                        <label  class="float-right" id="totalcompra" name="totalcompra"></label></h6>
                                    </div>
                                    <br>
                                    <div class="col-12"><h4 style="text-align:right; color: #444;">Pago $
                                        <label  id="txttotal" name="txttotal"></label></h4>
                                    </div>
                                    <!--<div class="col-12"><h5 style="text-align:right; color:red;">Pago $
                                        <label  id="resulresta" name="resulresta"></label></h5>
                                    </div>-->
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- fin Modal Detalle -->


<!-- Modal Rechazo -->
<div class="modal fade" id="rechazoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelr" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-azul">
                <h5 class="modal-title" id="exampleModalLabelr" style="color:white"><span class="fa fa-file"></span> Rechazar Venta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frechazo">
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6"><h5>Detalle de Venta
                                    <label id="txtidcontrr"></label></h5>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1r" style="font-weight: bold;">Cliente</span>
                                                </div>
                                                <input id="txtclienter" name="txtclienter" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1r" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1r" style="font-weight: bold;">Fecha</span>
                                                </div>
                                                <input id="txtfechar" name="txtfechar" type="text" class="form-control"  aria-describedby="basic-addon1r" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1r" style="font-weight: bold;">Vendedor</span>
                                                </div>
                                                <input id="vendedorr" name="vendedorr" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1r" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1r" style="font-weight: bold;">ID Venta</span>
                                                </div>
                                                <input id="idr" name="idr" type="text" class="form-control"  aria-describedby="basic-addon1r" readonly>
                                            </div>                                          
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1r" style="font-weight: bold;">Motivo Rechazo</span>
                                                </div>
                                                <textarea id="motivorechazo" name="motivorechazo" class="form-control"  aria-describedby="basic-addon1r"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bordde">
                                    <div id="tablaar"></div>
                                    <div class="col-lg-12"><h4 style="text-align:right">PAGO $
                                        <label  id="txttotalr" name="txttotalr"></label></h4>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="rechazar()">Rechazar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Rechazo -->
    
    
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder" style="padding-bottom: 10px;">
                        <h1 class="main-title float-left">Confirmar Ventas</h1>
                        <div class="clearfix">
                        
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
            <!-- Button trigger modal -->         
                <?php
                    require_once '../clases/Conexion.php';
                    require_once '../clases/Venta.php';
                    $obj = new Venta();
                    $result = $obj->mostrar();
                ?>
                                                                                            
                <div class="col-lg-12">
                    <table id="dtventas" class="table table-bordered table-hover table-condensed">
                        <thead style="font-weight: bold;">
                            <tr>
                                <td>ID</td>
                                <td>Cliente</td>
                                <td>Vendedor</td>
                                <td>Fecha</td>
                                <td>Mon</td>
                                <td>Pago</td>
                                <td>Tipo</td>
                                <td style="width:15px">Ver</td>
                                <td style="width:15px">Conf</td>
                                <td style="width:15px">Rech</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($fila=mysqli_fetch_row($result))
                               {
                            ?>
                            <tr>
                        		<td><?php echo $fila[1] ?></td>
                        		<td><?php echo $fila[4] ?></td>
                        		<td><?php echo $fila[0] ?></td>
                        		<td><?php echo $fila[6] ?></td>
                        		<td><?php echo $fila[13] ?></td>
                                <td><?php echo $fila[10] ?></td>
                                <td><?php echo $fila[9] ?></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-registrar" data-toggle="modal" data-target="#exampleModal" onclick="functions('<?php echo $fila[1] ?>')">
                                        <span class="fa fa-credit-card" role="button" data-toggle="tooltip" data-placement="top" title="Detalle"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-success"  onclick="marcar('<?php echo $fila[1] ?>')">
                                        <span class="fa fa-check-circle" role="button" data-toggle="tooltip" data-placement="top" title="Marcar Venta"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#rechazoModal" onclick="functions2('<?php echo $fila[1] ?>')">
                                        <span class="fa fa-times-circle" role="button" data-toggle="tooltip" data-placement="top" title="Rechazar Venta"></span>
                                    </a>
                                </td>
	                        </tr>
    	                    <?php 
                                } 
                            ?>
                        </tbody>
                    </table>
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
    exit('<div class="content-page"><div class="content"><div class="container-fluid"><div class="row"><div class="col-12"><div class="col-6"></div><div class="col-6"><h1>Lo sentimos, solamente el administrador puede ver esta sección<br><br><i class="fa fa-hand-paper-o fa-4x"></i></h1></div></div></div></div></div></div>');
    //header("location:../index.php");  
}

?>


<script>
    

    
    
    function functions(id){
      mostrardetalle(id);
      agregadatosventa(id);
      totalcompra(id);
      resta();
    }
    
    function mostrardetalle(id){
        $.ajax({
            type:"POST",
            data:"id_venta=" + id,
            url:"../procesos/ventas/mostrar_porid.php",
            success:function(r){
                var dato = JSON.parse(r);
                var valortotal = parseFloat(dato['total']);
                var formattedvalortotal = valortotal.toLocaleString('es-US');
                $('#txtcliente').val(dato['cliente']);
                $('#txttotal').html(formattedvalortotal);
                $('#vendedor').val(dato['vendedor']);
                $('#metodopago').val(dato['metodopago']);
                $('#txtfecha').val(dato['fecha_compra']);
                $('#idventa').val(dato['id_venta']);
                $('#rutaArchivo').val(dato['ruta_archivo']);
            }
        });
    }    

    function agregadatosventa(id){
            $.ajax({
            type:"POST",
            data:"id_venta=" + id,
            url:"../procesos/ventas/traer_detalles.php",
            success:function(r){
                $('#tablaaa').html(r);
            }
        });
    }

    function totalcompra(id) {
      $.ajax({
        type: "POST",
        data: "id_venta=" + id,
        url: "../procesos/ventas/total_compra.php",
        success: function(r) {
          var dato = JSON.parse(r);
          var totalPago = parseFloat(dato['total_pago']);
          var formattedTotalPago = totalPago.toLocaleString('es-US'); // Formatear número con separador de miles
          $('#totalcompra').html(formattedTotalPago);
        }
      });
    }

    /**function resta() {
        var vcompra = parseInt(document.getElementById("totalcompra").innerHTML);
        var pago = parseInt(document.getElementById("txttotal").innerHTML);
        var resulresta = vcompra - pago;
        document.getElementById("resulresta").innerHTML = resulresta;
    }**/

    function functions2(id){
      agregadatosventa2(id);
      mostrardetalle2(id);
    }
    
    function mostrardetalle2(id){
            $.ajax({
            type:"POST",
            data:"id_venta=" + id,
            url:"../procesos/ventas/mostrar_porid.php",
            success:function(r){
                var dato=JSON.parse(r);
                $('#txtclienter').val(dato['cliente']);
                $('#txttotalr').html(dato['total']);
                $('#vendedorr').val(dato['vendedor']);
                $('#idr').val(dato['id_venta']);
                $('#txtfechar').val(dato['fecha_compra']);
            }
        });
    }    

    function agregadatosventa2(id){
            $.ajax({
            type:"POST",
            data:"id_venta=" + id,
            url:"../procesos/ventas/traer_detalles.php",
            success:function(r){
                $('#tablaar').html(r);
            }
        });
    }

    function marcar(id)
    {
        alertify.confirm('Venta', '¿Esta seguro que desea confirmar esta venta?', function()
        {
            $.ajax({
                    type:"POST",
                    url : "../procesos/ventas/marcar.php",
                    data : "id_venta="+id
                }).done(function(msg) {
                    alertify.success("Venta Confirmada Correctamente!");
                    location.reload();
                });
        }, function(){
                
        });
    }

    /**function rechazar()
    {
        alertify.confirm('Venta', '¿Esta seguro que desea rechazar esta venta?', function()
        {
            var rechazo=$('#motivorechazo').val();
            $.ajax({
                    type:"POST",
                    url : "../procesos/ventas/rechazar.php",
                    data : "id_venta="+ id +'&rechazo='+ rechazo
                }).done(function(msg) {
                    alertify.success("Venta Rechazada!");
                    location.reload();
                });
        });
    }**/

    function rechazar()
    {
        alertify.confirm('Venta', '¿Esta seguro que desea rechazar esta venta?', function()
        {
            var id = $('#rechazoModal input[name="idr"]').val();
            var rechazo = $('#rechazoModal textarea[name="motivorechazo"]').val();

            if (!rechazo) {
                alertify.error("Debe ingresar un motivo de rechazo!");
                return;
            }

            var datos = new FormData();
            datos.append('id', id);
            datos.append('rechazo', rechazo);

            //alert('Enviando datos con el objeto FormData!\r\rInformación antes de enviar a Ajax:\r\rId:' + id + '\rRechazo: ' + rechazo);

            $.ajax({
                type:"POST",
                url : "../procesos/ventas/rechazar.php",
                data : datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json'
            }).done(function(msg) {
                alertify.success("Venta rechazada!");
                setTimeout(function(){
                    location.reload();
                }, 1500);
            });
        }, function(){
        
        });
    }

    /**function sendmail(){
            $.ajax({
            type:"POST",
            data:"vendedor=" + vendedor,
            url:"../procesos/ventas/sendmail.php",
            success:function(r){
                alertify.success("Notificación enviada!");
            }
        });
    }**/

    //const btnDescargarRecibo = document.querySelector('.btn-descargar-recibo');
    const btnDescargarRecibo = document.getElementById("descargarRecibo");

    btnDescargarRecibo.addEventListener('click', function() {
        const rutaArchivo = obtenerRutaArchivo();
        descargarArchivo(rutaArchivo);

    });

    function obtenerRutaArchivo() {
        const idVenta = document.getElementById("idventa").textContent;
        return $.ajax({
            url: "../procesos/ventas/ruta_recibo.php",
            type: "GET",
            data: { id: idVenta },
            dataType: 'json'
        })
            .then(response => response.archivo)
            .catch(error => {
            console.log(error);
            return ''; 
        });
    }

    function descargarArchivo(rutaArchivo) {
        const link = document.createElement('a');
        link.href = rutaArchivo;
        link.download = 'recibo_venta.jpg'; // nombre de archivo personalizado
        link.target = '_blank'; // Abre el enlace en una nueva pestaña
        link.click();
    }

    function descargarImagen() {
            var rutaArchivo = document.getElementById('rutaArchivo').value;
            var link = document.createElement('a');
            link.href = rutaArchivo;
            link.download = 'Recibo.jpg';
            link.click();
        }




  
</script>


