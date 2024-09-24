<?php
require 'header.php';

if(isset($_SESSION['usuario']))
{



?>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-azul">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white"><span class="fa fa-file"></span> Ventas Pendientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding-bottom: 0px !important;">
                <form id="fgenerarecibo">
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6"><h5>Detalle de la Venta
                                    <label id="txtidcontr"></label></h5>
                                </div>
                            </div>
                        </div>

                        <div class="card-body" style="padding-bottom: 0px !important;">
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
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1" style="font-weight: bold;">Abono</span>
                                                </div>
                                                <input id="abono" name="abono" type="text" class="form-control"  aria-describedby="basic-addon1" placeholder="$">
                                            </div>                                          
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <label for="consignacion" class="input-group-text" style="width: 100%"><input name="archivo" id="archivo" type="file">
                                                    </label>
                                                </div>
                                            </div>   
                                        </div>
                                    </div>
                                    <div class="row" hidden>
                                        <div class="col-lg-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Id</span>
                                                </div>
                                                <input id="id" name="id" type="text" class="form-control"  aria-describedby="basic-addon1">
                                            </div>                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="bordde">
                                    <div id="tablaaa"></div>
                                    <div class="col-12" style="display: flex; justify-content: right;">
                                        <table class="center">
                                            <tr>
                                                <td>
                                                    <h5 style="text-align:right;">TOTAL $
                                                    <label  id="txttotal" name="txttotal"></label>
                                                    </h5>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="transform: translateY(-40%);">
                                                <h5 style="text-align:right; color: red;">DEUDA $
                                                    <label  id="deuda" name="deuda"></label>
                                                </h5>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnactualizar" class="btn btn-danger" data-dismiss="modal" onclick="guardarAbono()">Actualizar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
    
    
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder" style="padding-bottom: 10px;">
                        <h1 class="main-title float-left">Ventas con Pago Pendiente</h1>
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
                    $result = $obj->mostrar_pdtes();
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
                                <td>Total</td>
                                <td>Deuda</td>
                                <td style="width:15px">Act</td>
                                <td style="width:15px">Conf</td>
                                <td style="width:15px">Elim</td>
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
                        		<td>$<?php echo $fila[14] ?></td>
                                <td>$<?php echo $fila[14]-$fila[10] ?></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-registrar" data-toggle="modal" data-target="#exampleModal" onclick="functions('<?php echo $fila[1] ?>')">
                                        <span class="fa fa-pencil-square-o" role="button" data-toggle="tooltip" data-placement="top" title="Actualizar"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-success"  onclick="marcar('<?php echo $fila[1] ?>')">
                                        <span class="fa fa-check-circle" role="button" data-toggle="tooltip" data-placement="top" title="Confirmar Venta"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-danger"  onclick="eliminar('<?php echo $fila[1] ?>')">
                                        <span class="fa fa-times-circle" role="button" data-toggle="tooltip" data-placement="top" title="Eliminar Venta"></span>
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
	header("location:../index.php");  
}

?>


<script>
    
    function functions(id){
      agregadatosventa(id);
      mostrardetalle(id)
    }
    
    function mostrardetalle(id){
        $.ajax({
        type:"POST",
        data:"id_venta=" + id,
        url:"../procesos/ventas/mostrar_porid_pdte.php",
        success:function(r){
            var dato=JSON.parse(r);
            $('#id').val(dato['id_venta']);
            $('#txtcliente').val(dato['cliente']);
            $('#txttotal').html(dato['total']);
            $('#deuda').html(dato['deuda']);
            $('#vendedor').val(dato['vendedor']);
            $('#metodopago').val(dato['metodopago']);
            $('#txtfecha').val(dato['fecha_compra']);
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

    /**console.log();
    $('#btnactualizar').click(function(){
        var id = $('#id').val();
        var abono = $('#abono').val();
        var archivo = $('#archivo').prop('files')[0];

        if (!archivo) {
            alertify.error("Debe subir una imagen del recibo del abono");
            return;
        }

        var datos = new FormData();
        datos.append("id", id);
        datos.append("abono", abono);
        datos.append("archivo", archivo);

        $.ajax({
            url: '../procesos/ventas/guardar_abono.php',
            data: datos,
            type: 'POST',
            contentType: false,
            processData: false,
        }).done(function(msg) {
            alertify.success("Venta actualizada!");
            setTimeout(function(){
                location.reload();
            }, 1500);
        });
    });**/

    function guardarAbono()
    {
        var id = $('#exampleModal input[name="id"]').val();
        var abono = $('#exampleModal input[name="abono"]').val();
        var archivo = $('#archivo').prop('files')[0];

        if (!archivo) {
            alertify.error("Debe subir una imagen del recibo del abono");
            return;
        }
 
        var datos = new FormData();
        datos.append('id', id);
        datos.append('abono', abono);
        datos.append("archivo", archivo);

        //alert('Enviando datos con el objeto FormData!\r\rInformación antes de enviar a Ajax:\r\rId:' + id + '\rAbono: ' + abono);

        $.ajax({
            type:"POST",
            url : "../procesos/ventas/guardar_abono.php",
            data : datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json'
        }).done(function(msg) {
            alertify.success("Venta actualizada!");
            setTimeout(function(){
                location.reload();
            }, 1500);
        });
    }

    function marcar(id)
    {
                    alertify.confirm('Venta', '¿Esta seguro que desea completar el pago de esta venta?', function()
                {
                        $.ajax({
                                type:"POST",
                                url : "../procesos/ventas/marcar_pdte.php",
                                data : "id_venta="+id
                            }).done(function(msg) {
                                alertify.success("Venta completada!");
                                location.reload();
                            });
                }
                , function(){
                
                });
    }

    function eliminar(id)
    {
                    alertify.confirm('Venta', '¿Esta seguro que desea eliminar esta venta?', function()
                {
                        $.ajax({
                                type:"POST",
                                url : "../procesos/ventas/eliminar_pdte.php",
                                data : "id_venta="+id
                            }).done(function(msg) {
                                alertify.success("Venta Eliminada!");
                                location.reload();
                            });
                }
                , function(){
                
                });
    }


  
</script>


