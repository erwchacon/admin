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
                <h5 class="modal-title" id="exampleModalLabel" style="color:white"><span class="fa fa-file"></span> Detalle del Gasto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="fgenerarecibo">
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6"><h5>Detalle del Gasto
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
                                                    <span class="input-group-text" id="basic-addon1" style="font-weight: bold;">Solicitante</span>
                                                </div>
                                                <input id="solicitante" name="solicitante" type="text" class="form-control" aria-describedby="basic-addon1" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1" style="font-weight: bold;">Fecha</span>
                                                </div>
                                                <input id="fecha" name="fecha" type="text" class="form-control" aria-describedby="basic-addon1" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1" style="font-weight: bold;">Monto</span>
                                                </div>
                                                <input id="monto" name="monto" type="text" class="form-control" aria-describedby="basic-addon1" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1" style="font-weight: bold;">Moneda</span>
                                                </div>
                                                <input id="moneda" name="moneda" type="text" class="form-control" aria-describedby="basic-addon1" readonly>
                                            </div>                                          
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1" style="font-weight: bold;">Concepto</span>
                                                </div>
                                                <input id="concepto" name="concepto" type="text" class="form-control" aria-describedby="basic-addon1" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1r" style="font-weight: bold;">Evento</span>
                                                </div>
                                                <input id="evento" name="evento" type="text" class="form-control" aria-describedby="basic-addon1r" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1" style="font-weight: bold;">Método pago</span>
                                                </div>
                                                <input id="metodopago" name="metodopago" type="text" class="form-control" aria-describedby="basic-addon1" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1r" style="font-weight: bold;">Reembolso?</span>
                                                </div>
                                                <input id="reembolso" name="reembolso" type="text" class="form-control" aria-describedby="basic-addon1r" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1r" style="font-weight: bold;">Descripción</span>
                                        </div>
                                        <input id="descripcion" name="descripcion" type="text" class="form-control"  aria-describedby="basic-addon1r" readonly>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group input-group-sm mb-3" hidden>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1r">ID Gasto</span>
                                                </div>
                                                <input id="idgasto" name="idgasto" type="text" class="form-control" aria-describedby="basic-addon1r" hidden>
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
                <h5 class="modal-title" id="exampleModalLabelr" style="color:white"><span class="fa fa-file"></span> Rechazar Gasto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frechazo">
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6"><h5>Detalle del Gasto
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
                                                    <span class="input-group-text" id="basic-addon1" style="font-weight: bold;">Solicitante</span>
                                                </div>
                                                <input id="solicitanter" name="solicitanter" type="text" class="form-control" aria-describedby="basic-addon1" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1" style="font-weight: bold;">Fecha</span>
                                                </div>
                                                <input id="fechar" name="fechar" type="text" class="form-control" aria-describedby="basic-addon1" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1" style="font-weight: bold;">Monto</span>
                                                </div>
                                                <input id="montor" name="montor" type="text" class="form-control" aria-describedby="basic-addon1" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1" style="font-weight: bold;">Moneda</span>
                                                </div>
                                                <input id="monedar" name="monedar" type="text" class="form-control" aria-describedby="basic-addon1" readonly>
                                            </div>                                          
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1" style="font-weight: bold;">Concepto</span>
                                                </div>
                                                <input id="conceptor" name="conceptor" type="text" class="form-control" aria-describedby="basic-addon1" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1r" style="font-weight: bold;">ID Gasto</span>
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
                        <h1 class="main-title float-left">Confirmar Gastos</h1>
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
                    require_once '../clases/Gasto.php';
                    $obj = new Gasto();
                    $result = $obj->mostrar();
                ?>
                                                                                            
                <div class="col-lg-12">
                    <table id="dtventas" class="table table-bordered table-hover table-condensed">
                        <thead style="font-weight: bold;">
                            <tr>
                                <td>ID</td>
                                <td>Fecha</td>
                                <td>Solicitante</td>
                                <td>Monto</td>
                                <td>Mon</td>
                                <td>Concepto</td>
                                <td>Reembolso</td>
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
                        		<td><?php echo $fila[11] ?></td>
                        		<td><?php echo $fila[0] ?></td>
                        		<td><?php echo $fila[4] ?></td>
                        		<td><?php echo $fila[5] ?></td>
                                <td><?php echo $fila[6] ?></td>
                                <td><?php echo $fila[8] ?></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-registrar" data-toggle="modal" data-target="#exampleModal" onclick="mostrardetalle('<?php echo $fila[1] ?>')">
                                        <span class="fa fa-credit-card" role="button" data-toggle="tooltip" data-placement="top" title="Detalle"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-success"  onclick="marcar('<?php echo $fila[1] ?>')">
                                        <span class="fa fa-check-circle" role="button" data-toggle="tooltip" data-placement="top" title="Marcar Venta"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#rechazoModal" onclick="mostrardetalle2('<?php echo $fila[1] ?>')">
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
    
    function mostrardetalle(id){
            $.ajax({
            type:"POST",
            data:"id_gasto=" + id,
            url:"../procesos/gastos/mostrar_porid.php",
            success:function(r){
                var dato = JSON.parse(r);
                //var valortotal = parseFloat(dato['total']);
                //var formattedvalortotal = valortotal.toLocaleString('es-US');
                $('#solicitante').val(dato['solicitante']);
                $('#fecha').val(dato['fecha']);
                $('#monto').val(dato['importe']);
                $('#moneda').val(dato['moneda']);
                $('#concepto').val(dato['concepto']);
                $('#evento').val(dato['evento']);
                $('#idgasto').val(dato['id_gasto']);
                $('#rutaArchivo').val(dato['archivo']);
                $('#metodopago').val(dato['metodopago']);
                $('#reembolso').val(dato['reembolso']);
                $('#descripcion').val(dato['descripcion']);
                $('#no_factura').val(dato['no_factura']);
                //$('#total').html(formattedvalortotal);
            }
        });
    }

    
    function mostrardetalle2(id){
            $.ajax({
            type:"POST",
            data:"id_gasto=" + id,
            url:"../procesos/gastos/mostrar_porid.php",
            success:function(r){
                var dato=JSON.parse(r);
                $('#solicitanter').val(dato['solicitante']);
                $('#fechar').val(dato['fecha']);
                $('#montor').val(dato['importe']);
                $('#monedar').val(dato['moneda']);
                $('#conceptor').val(dato['concepto']);
                $('#idr').val(dato['id_gasto']);
            }
        });
    }    

    function marcar(id)
    {
        alertify.confirm('Gasto', '¿Esta seguro que desea confirmar este gasto?', function()
        {
            $.ajax({
                    type:"POST",
                    url : "../procesos/gastos/marcar.php",
                    data : "id_gasto="+id
                }).done(function(msg) {
                    alertify.success("Gasto Confirmado Correctamente!");
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
        alertify.confirm('Gasto', '¿Esta seguro que desea rechazar este gasto?', function()
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

            alert('Enviando datos con el objeto FormData!\r\rInformación antes de enviar a Ajax:\r\rId:' + id + '\rRechazo: ' + rechazo);

            $.ajax({
                type:"POST",
                url : "../procesos/gastos/rechazar.php",
                data : datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json'
            }).done(function(msg) {
                alertify.success("Gasto rechazado!");
                setTimeout(function(){
                    location.reload();
                }, 1500);
            });
        }, function(){
        
        });
    }

    // Función para descargar el recibo del gasto
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


