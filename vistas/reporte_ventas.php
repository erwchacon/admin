
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>

        <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>


</head>

<body>

<div id="main">

<div>
    
    <!-- Start content -->
    <div class="content">
        
        <div class="container-fluid">
                
            <div style="width: 100%; overflow: hidden; padding: 20px;">
                <div class="d-flex align-items-center" style="float: left;">
                    <h3 class="main-title flex-grow-1 text-nowrap mx-2">Reporte de Ventas</h3>
                    <input type="date" class="form-control  mx-2" name="txtfecha1" required/>
                    <input type="date" class="form-control  mx-2" name="txtfecha2" required/>
                    <input type="submit" value="Buscar" class="btn btn-registrar mx-2">
                </div>

                <div style="float: right;">
                    <button type="button" id="export_excel" class="btn btn-success">Excel</button>
                </div>
                <div style="float: right; padding-right: 10px;">
                    <button type="button" id="export_pdf"  class="btn btn-danger" onclick="exportarPDF()">PDF</button>
                </div>
                <div class="clearfix">
                        
                </div>
            </div>
            <!-- end row -->

            <div class="row">
               <!-- Button trigger modal -->
               
                <div class="col-lg-12">
                <table  id="myTable" class="table table-bordered table-hover table-condensed">
                    <thead>
                        <tr style="font-weight: bold;">
                            <td>Id</td>
                            <td>Vendedor</td>
                            <td>Cliente</td>
                            <td>Fecha</td>
                            <td>Mon</td>
                            <td>Pago</td>
                            <td>Tipo</td>
                            <td>Imp</td>
                            <td>Comi</td>
                            <td>Neto</td>
                            <td>Est</td>
                            <td style="width:15px">Ver</td>
                        </tr>
                    </thead>
                    <tbody>
                        
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

</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
require 'footer.php';
?>

<!-- Modal Detalle -->
<div class="modal fade" id="modalVer" tabindex="-1" role="dialog" aria-labelledby="modalVerLabel" aria-hidden="true">
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

<script>
$(document).ready(function(){
    
    var table = $('#myTable').DataTable({
        "ajax":{
            "url":"../procesos/ventas/mostrar_reporte.php",
            "type":"GET"
            //"crossDomain": "true",
            //"dataType": "json",
            //"dataSrc":""
        },
        "columns":[
            {"data":"id_venta"},
            {"data":"nombre_vendedor"},
            {"data":"cliente"},
            {"data":"fecha_compra"},
            {"data":"moneda"},
            {"data":"pagoparcial","render": function (data, type, row) {
                    return "$" + data;}},
            {"data":"tipopago"},
            {"data":"imp_plataforma","render": function (data, type, row) {
                    return "$" + data;}},
            {"data":"comision","render": function (data, type, row) {
                    return "$" + data;}},
            {"data":"neto","render": function (data, type, row) {
                    return "$" + data;}},
            {"data":"estado"},
            { 
                "targets": -1,
                "data": "id_venta",
                "render": function (data, type, row) {
                    return '<a href="#" class="btn btn-sm btn-registrar" data-idventa="' + data + '" data-toggle="modal" data-target="#modalVer">Ver</a>';
                }
            }
        ],
        "responsive": true,
        "ordering": false,
        "columnDefs": [
            { "orderable": false, "targets": -1 }
        ]

    });

    $('#modalVer').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id_venta = button.data('idventa');
        
        // Aquí puedes hacer una solicitud AJAX para obtener la información de la venta según el ID
        mostrardetalle(id_venta);
        agregadatosventa(id_venta);
        totalcompra(id_venta);
        // Una vez que tienes la información, puedes mostrarla en el modal
        var modal = $(this);
        // Actualizar el contenido del modal con la información de la venta
        //modal.find('#txtidcontr').text('ID de venta: ' + id_venta);
        // ... Actualizar otros campos del formulario con la información de la venta
        
        // Ejemplo de cómo mostrar la información en los campos del formulario
        /**modal.find('#txtcliente').val('Cliente de la venta con ID ' + id_venta);
        modal.find('#txtfecha').val('Fecha de la venta con ID ' + id_venta);
        modal.find('#vendedor').val('Vendedor de la venta con ID ' + id_venta);
        modal.find('#metodopago').val('Método de pago de la venta con ID ' + id_venta);
        modal.find('#idventa').val(id_venta);**/
        
        // ... Actualizar otros campos del formulario con la información de la venta
    });
    
});

//// función para exportar a Excel ////
$(document).ready(function(){    
    $("#export_excel").click(function(){
        exportExcel("myTable");
    });
});

function exportExcel(tableId, filename = 'Ventas'){
    var wb = XLSX.utils.table_to_book(document.getElementById(tableId), {sheet:"Sheet JS"});
    return XLSX.writeFile(wb, filename + ".xlsx");
}
//// Fin de la función para exportar a Excel ////

//// función para exportar a PDF ////
function exportarPDF() {
  // Crear un objeto jsPDF
  var doc = new jsPDF();

  // Obtener la tabla HTML
  var tabla = document.getElementById('myTable');

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
  doc.save('Ventas.pdf');
}
//// Fin de la función para exportar a PDF ////


/**function functions(id){
      mostrardetalle(id);
      agregadatosventa(id);
      totalcompra(id);
    }**/

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

</script>