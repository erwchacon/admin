<!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>SAAI Admin</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.png">

        <!-- Bootstrap CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />


        <link rel="stylesheet" type="text/css" href="../assets/plugins/alertifyjs/css/alertify.css">
        
        <link rel="stylesheet" type="text/css" href="../assets/plugins/alertifyjs/css/themes/default.css">
        
        <!-- Font Awesome CSS -->
        <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        
        <!-- Custom CSS -->
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />

        
        <!-- BEGIN CSS for this page -->
        <link rel="stylesheet" type="text/css" href="../assets/dataTables.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="../assets/responsive.dataTables.min.css">
        <!-- END CSS for this page -->

        <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>


</head>

<body>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-azul">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white"><span class="fa fa-file"></span> Detalle de Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="fgenerarecibo">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                        <div class="col-lg-6"><h5>Detalle de Cliente <label id="txtidcontr"></label></h5></div>
                        
                        </div>
                    </div>

                    <div class="card-body">

                        <form>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Nombre</span>
                                        </div>
                                        <input id="nombrecli" name="nombrecli" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Teléfono</span>
                                        </div>
                                        <input id="telefonocli" name="telefonocli" type="number" class="form-control"  aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Email</span>
                                        </div>
                                        <input id="emailcli" name="emailcli" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">País</span>
                                        </div>
                                            <input id="paiscli" name="paiscli" type="text" class="form-control"  aria-describedby="basic-addon1">
                                    </div>                                          
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Ciudad</span>
                                        </div>
                                        <input id="ciudadcli" name="ciudadcli" type="text" class="form-control"  aria-describedby="basic-addon1">
                                    </div>                                          
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Cumpleaños</span>
                                        </div>
                                        <input id="cumpleanoscli" name="cumpleanoscli" type="text" class="form-control"  aria-describedby="basic-addon1">
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal cliente -->

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-azul">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white"><span class="fa fa-file"></span> Detalle Venta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="fgenerarecibo">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                        <div class="col-lg-6"><h5>Detalle Venta <label id="txtidcontr"></label></h5></div>
                        
                        </div>
                    </div>

                    <div class="card-body">

                        <form>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Cliente</span>
                                        </div>
                                        <input id="clienteven" name="clienteven" type="text" class="form-control"  aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Evento</span>
                                        </div>
                                        <input id="eventoven" name="eventoven" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Fecha</span>
                                        </div>
                                            <input id="fechaven" name="fechaven" type="text" class="form-control"  aria-describedby="basic-addon1">
                                    </div>                                          
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Metodo Pago</span>
                                        </div>
                                        <input id="metodopagoven" name="metodopagoven" type="text" class="form-control"  aria-describedby="basic-addon1">
                                    </div>                                          
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Estado</span>
                                        </div>
                                        <input id="estadoven" name="estadoven" type="text" class="form-control"  aria-describedby="basic-addon1">
                                    </div>                                          
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Comisión</span>
                                        </div>
                                        <input id="comisionven" name="comisionven" type="text" class="form-control"  aria-describedby="basic-addon1">
                                    </div>                                          
                                </div>
                            </div>
                        </div>
                        <div class="bordde">
                            <div id="tablaaa"></div>
                            <div class="col-lg-12"><h4 style="text-align:right">TOTAL $.
                                <label  id="totalven" name="totalven"></label></h4>
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
<!-- Modal venta -->

<div id="main">

<div>
    
    <!-- Start content -->
    <div class="content">
        
        <div class="container-fluid">
            <!-- end row -->
            <form action="reporte_ventas_vendedor.php" method="post" style="padding: 10px;">
                <div class="row">
                    <div class="col-4">
                        <div class="breadcrumb-holder">
                            <h4 class="main-title float-left">Reporte Ventas por Vendedor</h4>
                            <div class="clearfix">
                                                    
                            </div>
                        </div>
                    </div>
                    <div class="col-4" style="padding-top: 10px;">
                        <select id="vendedor" name="vendedor" class="form-control">
                            <option>Seleccione...</option>
                                <?php
                                    require_once '../clases/Colaborador.php';
                                    require_once '../clases/Conexion.php';
                                    $obj1 = new Colaborador();
                                    $colaborador = $obj1->mostrar_vendedores();
                                    while($col=mysqli_fetch_row($colaborador))
                                    {
                                ?>
                            <option value="<?php echo $col[0] ?>" ><?php echo $col[1] ?></option>
                                <?php
                                    }

                                ?>               
                        </select>
                    </div>
                    <div class="col-2" style="padding-top: 10px;">
                        <input type="submit" value="Buscar" class="btn btn-registrar">
                    </div>
                    <div class="col-2 text-right" style="padding-top: 10px;">
                        <button type="button" id="export_excel" class="btn btn-success text-right" onclick="exportExcel('dtclienven')">Excel</button>
                        <button type="button" id="export_pdf"  class="btn btn-danger text-right" onclick="exportarPDF()">PDF</button>
                    </div>
                </div>
                <hr>
            </form>
            <div class="row">
                <!-- Button trigger modal -->
            <div class="col-lg-12">


<?php
if(isset($_POST['vendedor']))
{
        require_once '../clases/Conexion.php';
        require_once '../clases/Reporte.php';
        $obj = new Reporte();
        $result = $obj->consultar_ventas_vendedor($_POST['vendedor']);
?>

   <table id="dtclienven" class="table table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Nom. Cliente</td>
                            <td>Email</td>
                            <td>Telefono</td>
                            <td>Fecha</td>
                            <td>Evento</td>
                            <td>Pago</td>
                            <td>Moneda</td>
                            <td>Total</td>
                            <td>Comisión</td>
                            <td>Cliente</td>
                            <td>Venta</td>
                        </tr>
                    </thead>
                    <tbody>
<?php
    while($fila=mysqli_fetch_row($result))
    {
 ?>

    <tr>
        <td><?php echo $fila[10] ?></td>
        <td><?php echo $fila[0] ?></td>
        <td><?php echo $fila[1] ?></td>
        <td><?php echo $fila[2] ?></td>
        <td><?php echo $fila[3] ?></td>
        <td><?php echo $fila[4] ?></td>
        <td><?php echo $fila[5] ?></td>
        <td><?php echo $fila[6] ?></td>
        <td><?php echo $fila[7] ?></td>
        <td><?php echo $fila[8] ?></td>

        <td>
            <a href="#" class="btn btn-sm btn-registrar" data-toggle="modal" data-target="#exampleModal" onclick="mostrarcliente('<?php echo $fila[11] ?>')">
                <span class="fa fa-credit-card" role="button" data-toggle="tooltip" data-placement="top" title="Ver cliente"></span></a>                 
        </td>
        <td>
            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal2" onclick="functions('<?php echo $fila[10] ?>')">
                <span class="fa fa-credit-card" role="button" data-toggle="tooltip" data-placement="top" title="Ver venta"></span></a>
        </td>

    </tr>
    <?php
} 
                        }
                        else{
                        }?>

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


<script>
    
    function mostrarcliente(id){
        $.ajax({
        type:"POST",
        data:"id_cliente=" + id,
        url:"../procesos/reportes/mostrar_cliente_porid.php",
        success:function(r){
            var dato=JSON.parse(r);
            $('#nombrecli').val(dato['nombrecli']);
            $('#telefonocli').val(dato['telefonocli']);
            $('#emailcli').val(dato['emailcli']);
            $('#paiscli').val(dato['paiscli']);
            $('#ciudadcli').val(dato['ciudadcli']);
            $('#cumpleanoscli').val(dato['cumpleanoscli']);
        }
      });
    }    

     function functions(id){
        agregadatosventa(id);
        mostrarventa(id);
    }


    function mostrarventa(id){
        $.ajax({
        type:"POST",
        data:"id_venta=" + id,
        url:"../procesos/reportes/mostrar_ventas_porid.php",
        success:function(r){
            var dato=JSON.parse(r);
            $('#vendedorven').val(dato['vendedorven']);
            $('#clienteven').val(dato['clienteven']);
            $('#eventoven').val(dato['eventoven']);
            $('#fechaven').val(dato['fechaven']);
            $('#metodopagoven').val(dato['metodopagoven']);
            $('#tipopagoven').val(dato['tipopagoven']);
            $('#estadoven').val(dato['estadoven']);
            $('#comisionven').val(dato['comisionven']);
            $('#totalven').val(dato['totalven']);
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

$(document).ready(function(){
    $('#dtclienven').dataTable({
            "ordering": false,
            "info":     false
    });    
});

//// función para exportar a Excel ////
$(document).ready(function(){    
    $("#export_excel").click(function(){
        exportExcel("dtclienven");
    });
});

function exportExcel(tableId, filename = 'VentasVendedor'){
    var wb = XLSX.utils.table_to_book(document.getElementById(tableId), {sheet:"Sheet JS"});
    return XLSX.writeFile(wb, filename + ".xlsx");
}
//// Fin de la función para exportar a Excel ////


//// función para exportar a PDF ////
function exportarPDF() {
  // Crear un objeto jsPDF
  var doc = new jsPDF({
      orientation: 'landscape',
      format: 'a4',
      unit: 'in'
    });

  // Obtener la tabla HTML
  var tabla = document.getElementById('dtclienven');

  // Obtener todas las filas de la tabla
  var filas = tabla.rows;

  // Definir un array vacío para almacenar los datos de la tabla
  var datos = [];

  // Iterar sobre las filas de la tabla y agregar los datos a nuestro array
  for (var i = 0; i < filas.length; i++) {
    var fila = filas[i].cells;
    var filaDatos = [];

    for (var j = 0; j < fila.length; j++) {
      filaDatos.push(fila[j].textContent);
    }

    datos.push(filaDatos);
  }

  // Agregar la tabla al archivo PDF
  doc.autoTable({
    head: [datos[0]],
    body: datos.slice(1)
  });

  // Descargar el archivo PDF
  doc.save('VentasVendedor.pdf');
}
//// Fin de la función para exportar a PDF ////
  
    
  
</script>


