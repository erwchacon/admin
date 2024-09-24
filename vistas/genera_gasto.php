<?php
require 'header.php';

if(isset($_SESSION['usuario']))
//if($_SESSION['admin'] == 1)
{

?>

<div class="content-page">
	
    <!-- Start content -->
    <div class="content">
        
        <div class="container">
                
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder" style="padding-bottom: 10px;">
                                <h1 class="main-title float-left">Nuevo Gasto</h1>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                
                <!-- Form gasto -->
                <form action="../procesos/gastos/procesarGasto.php" id="frmgasto" method="POST" enctype="multipart/form-data">
                    <div class="row">
                    	<div class="col-4">
                            <label>Quien solicita</label>
                            <select id="solicitante" name="solicitante" class="form-control">
                                <option>Seleccione...</option>
                                <?php
                                    require_once '../clases/Colaborador.php';
                                    require_once '../clases/Conexion.php';
                                    $obj1 = new Colaborador();
                                    $colaborador = $obj1->mostrar();
                                    while($col=mysqli_fetch_row($colaborador))
                                    {
                                ?>
                                <option value="<?php echo $col[0] ?>" ><?php echo $col[1] ?></option>
                                <?php
                                    }
                                ?>               
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Fecha gasto</label>
                            <?php date_default_timezone_set("America/Lima"); $fecha = date("Y-m-d");?>
                            <input type="date" class="form-control" id="fecha" name="fecha" value="<?= $fecha ?>">
                        </div>
                        <div class="col-4">
                            <label>Evento</label>
                            <select id="evento" name="evento" class="form-control">
                                <option>Seleccione...</option>
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
                    </div>
                    <!-- end row -->

                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <label>Monto $</label>
                            <input type="number" id="importe" name="importe" class="form-control" placeholder="$" />
                        </div>
                        <div class="col-4">
                            <label>Moneda</label><br>
                                <select name="moneda" id="moneda" class="form-control">
                                <option value="A">Seleccione...</option>
                                <option value="US">Dolar</option>
                                <option value="MX">Peso Mexicano</option>
                                <option value="AR">Peso Argentino</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label>No. de Factura</label>
                            <input id="factura" name="factura" type="text" class="form-control" placeholder="#" />
                        </div>
                    </div>
                    <!-- end row -->

                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <label>Concepto</label>
                            <input type="text" id="concepto" name="concepto" class="form-control"/>
                        </div>
                        <div class="col-4">
                            <label>Medio de pago</label>
                            <select name="metodopago" id="metodopago" class="form-control">
                                <option value="">Seleccione...</option>
                                <option value="efectivo">Efectivo</option>
                                <option value="amexvictoria">Amex Victoria</option>
                                <option value="tbbva">Transferencia BBVA</option>
                                <option value="tdchase">Tarjeta crédito Chase</option>
                                <option value="tdyoel">Tarjeta crédito Yoel</option>
                            </select>
                        </div>
	                    <div class="col-4">
	                        <label>Reembolso?</label><br>
	                        <input type="radio" id="no" name="reembolso" value="no" checked/>
	                        <label for="no">No</label>
	                        <input type="radio" id="si" name="reembolso" value="si"/>
	                        <label for="si">Si</label>
	                    </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <label>Descripción</label>
                            <textarea id="descripcion" name="descripcion" type="text" class="form-control" style="resize: vertical;" /></textarea>
                        </div>
                        <div class="col-6">
                            <label for="consignacion">Cargar recibo</label><br>
                            <input name="archivo" id="archivo" type="file">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                            <div class="col-4">
                            </div>
                            <div class="col-4">
                            </div>
                            <div class="col-4">
                                <span class="btn btn-danger" id="btncancelar">Cancelar</span>
                                <!--<span class="btn btn-success" id="btnregistrar" type="submit" name="subir">Guardar Gasto</span>-->
                                <input class="btn btn-success" type="submit" value="Guardar Gasto">
                            </div>
                        </div>
                    </div>
                </form>
                    



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
    //exit('<div class="content-page"><div class="content"><div class="container-fluid"><div class="row"><div class="col-12"><div class="col-6"></div><div class="col-6"><h1>Lo sentimos, solamente el administrador puede ver esta sección<br><br><i class="fa fa-hand-paper-o fa-4x"></i></h1></div></div></div></div></div></div>');
    header("location:../index.php");  
}

?>

<script>

    const urlParams = new URLSearchParams(window.location.search);
    const successParam = urlParams.get('success');

    if (successParam === '1') {
        alertify.success('El gasto se insertó correctamente');
    }

</script>
