
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
                <div style="float: left;">
                    <h3 class="main-title">Reporte de Clientes</h3>
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
                            <td>#</td>
                            <td>Nombre</td>
                            <td>Telefono</td>
                            <td>Email</td>
                            <td>Pais</td>
                            <td>Ciudad</td>
                            <td>Cumpleaños</td>
                            <td>Vendedor</td>
                            <td>Estado</td>
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


<script>
$(document).ready(function(){
    
    var table = $('#myTable').DataTable({
        "ajax":{
            "url":"../procesos/clientes/mostrar_reporte.php",
            "type":"GET"
            //"crossDomain": "true",
            //"dataType": "json",
            //"dataSrc":""
        },
        "columns":[
            {"data":"id_cliente"},
            {"data":"nombre"},
            {"data":"telefono"},
            {"data":"email"},
            {"data":"pais"},
            {"data":"ciudad"},
            {"data":"cumpleanos"},
            {"data":"nombre_vendedor"},
            {"data":"estado"}
        ],
        responsive:true,
                "ordering": false


    });
    
});

//// función para exportar a Excel ////
$(document).ready(function(){    
    $("#export_excel").click(function(){
        exportExcel("myTable");
    });
});

function exportExcel(tableId, filename = 'Clientes'){
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
  doc.save('Clientes.pdf');
}
//// Fin de la función para exportar a PDF ////

/**
$(document).ready(function(){    
    $("#export_pdf").click(function(){
        Swal.fire("Se presionó el botón de pdf");
        exportPdf("myTable");
    });
});

function exportPdf(tableId, filename = 'pdf_report'){
  const doc = new jsPDF();
  doc.autoTable({html: '#' + tableId});
  doc.save(filename + ".pdf");
}
**/


/**
 document.getElementById("txt_archivo").addEventListener("change", () => {
        var fileName = document.getElementById("txt_archivo").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.lenght).toLowerCase();
        if (extFile==".xlsx" || extFile==".xlsb"){
            //To do
        } else{
            Swal.fire("MENSAJE DE ADVERTENCIA","Solo se aceptan archivos de Excel - Se ha agregado un archivo con extensión "+extFile,"warning");
            document.getElementById("txt_archivo").value="";
        }
    })

 function Cargar_Excel(){
    let archivo = document.getElementById('txt_archivo').value;
    if (archivo.lenght==0) {
        return Swal.fire("MENSAJE DE ADVERTENCIA","Seleccione un archivo","warning")
    }
    let formData = new FormData();
    let excel = $("#txt_archivo")[0].files[0];
    formData.append('excel',excel);
    $.ajax({
        url:'../clases/importarExcel.php',
        type:'POST',
        data:formData,
        contentType:false,
        processData:false,
        succes:function(resp){
            alert(resp);
        }
    })
    return false;
 }**/

</script>