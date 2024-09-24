
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


<?php
require 'header.php';

if(isset($_SESSION['usuario']))
{

?>

<!-- Modal registrar -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
           
           <div class="col-lg-12">
               <form id="frmregistrar">
                    <label>Vendedor</label>
                    <select id="vendedor" name="vendedor" class="form-control">
                        <option value="A">Seleccione...</option>
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
                    <label>Nombre cliente</label>
                    <input type="text" class="form-control" id="txtnombre" name="txtnombre">
                    <label>Telefono</label>
                    <input type="text" class="form-control" id="txttelefono" name="txttelefono">
                    <label>Email</label>
                    <input type="text" class="form-control" id="txtemail" name="txtemail">
                    <div id="respuesta"> </div>
                    <label>Pais residencia</label>
                    <select id="pais" name="pais" class="form-control">
                        <?php
                            $countries = array(
                                "Seleccione...",
                                "Estados Unidos",
                                "Argentina",
                                "Bolivia",
                                "Brasil",
                                "Chile",
                                "Colombia",
                                "Costa Rica",
                                "Cuba",
                                "Ecuador",
                                "El Salvador",
                                "Guatemala",
                                "Haití",
                                "Honduras",
                                "México",
                                "Nicaragua",
                                "Panamá",
                                "Paraguay",
                                "Perú",
                                "Puerto Rico",
                                "República Dominicana",
                                "Uruguay",
                                "Venezuela"
                            );

                            foreach ($countries as $country) {
                                echo "<option value=\"$country\">$country</option>";
                            }
                        ?>
                    </select>
                     <label>Ciudad residencia</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad">
                    <table>
                        <tr>
                            <th>
                                <label>Día cumpleaños</label>
                                <select id="dia_cumpleanos" name="dia_cumpleanos" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <?php
                                        $dias = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);

                                        foreach ($dias as $dia) {
                                            echo "<option value=\"$dia\">$dia</option>";
                                        }
                                    ?>
                                </select>
                            </th>
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            <th>
                                <label>Mes cumpleaños</label>
                                <select id="mes_cumpleanos" name="mes_cumpleanos" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <?php
                                        $meses = array(
                                            "Enero",
                                            "Febrero",
                                            "Marzo",
                                            "Abril",
                                            "Mayo",
                                            "Junio",
                                            "Julio",
                                            "Agosto",
                                            "Septiembre",
                                            "Octubre",
                                            "Noviembre",
                                            "Dieciembre"
                                        );

                                        foreach ($meses as $mes) {
                                            echo "<option value=\"$mes\">$mes</option>";
                                        }
                                    ?>
                                </select>
                            </th>
                        </tr>
                    </table>
                </form>
            </div>
           
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-registrar" id="btnregistrar">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin modal registrar -->   


<!-- Modal editar -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
           
           <div class="col-lg-12">
           <form id="frmeditar">
            <label>Nombre cliente</label>
            <input type="text" class="form-control" id="txtnombree" name="txtnombree">
            <label>Telefono</label>
            <input type="text" class="form-control" id="txttelefonoe" name="txttelefonoe">
            <label>Email</label>
            <input type="text" class="form-control" id="txtemaile" name="txtemaile">
            <label>Pais residencia</label>
            <select id="paise" name="paise" class="form-control">
                <?php
                    $countries = array(
                        "Seleccione...",
                        "Estados Unidos",
                        "Argentina",
                        "Bolivia",
                        "Brasil",
                        "Chile",
                        "Colombia",
                        "Costa Rica",
                        "Cuba",
                        "Ecuador",
                        "El Salvador",
                        "Guatemala",
                        "Haití",
                        "Honduras",
                        "México",
                        "Nicaragua",
                        "Panamá",
                        "Paraguay",
                        "Perú",
                        "Puerto Rico",
                        "República Dominicana",
                        "Uruguay",
                        "Venezuela"
                    );

                    foreach ($countries as $country) {
                        echo "<option value=\"$country\">$country</option>";
                    }
                ?>
            </select>
             <label>Ciudad residencia</label>
            <input type="text" class="form-control" id="ciudade" name="ciudade">

            <table>
                        <tr>
                            <th>
                                <label>Día cumpleaños</label>
                                <select id="dia_cumpleanose" name="dia_cumpleanose" class="form-control">
                                    <?php
                                        $dias = array("Seleccione...",1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);

                                        foreach ($dias as $dia) {
                                            echo "<option value=\"$dia\">$dia</option>";
                                        }
                                    ?>
                                </select>
                            </th>
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            <th>
                                <label>Mes cumpleaños</label>
                                <select id="mes_cumpleanose" name="mes_cumpleanose" class="form-control">
                                    <?php
                                        $meses = array(
                                            "Seleccione...",
                                            "Enero",
                                            "Febrero",
                                            "Marzo",
                                            "Abril",
                                            "Mayo",
                                            "Junio",
                                            "Julio",
                                            "Agosto",
                                            "Septiembre",
                                            "Octubre",
                                            "Noviembre",
                                            "Dieciembre"
                                        );

                                        foreach ($meses as $mes) {
                                            echo "<option value=\"$mes\">$mes</option>";
                                        }
                                    ?>
                                </select>
                            </th>
                        </tr>
                    </table>
            </form>
            </div>
           
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btneditar" class="btn btn-registrar">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin modal editar --> 

<!-- Modal importar --> 
<div class="modal fade" id="modalImportar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Importar Clientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <input type="file" id="fileInput" style="display: none;">
                            <button id="btnImport" class="btn btn-registrar">Seleccione el archivo</button>
                            <span id="selectedFileName"></span>
                        </div>
                        <br><br>
                        <button id="btnProcessImport" class="btn btn-success" style="float: right;">Importar</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin modal importar --> 


    <div class="content-page">
	
    <!-- Start content -->
    <div class="content">
        
        <div class="container-fluid">
                
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-holder" style="padding-bottom: 10px;">
                        <div class="row">
                            <div class="col-6">
                                <h1 class="main-title float-left">Clientes</h1>&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="button"  class="btn btn-registrar" data-toggle="modal" data-target="#exampleModal">
                                 Registrar
                                </button>
                            </div>
                            <div class="col-6" style="float: right !important;">
                                <button class="btn btn-success" data-toggle="modal" data-target="#modalImportar">Importar</button>
                            </div>
                        </div>
                        <div class="clearfix">
                        
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
               <!-- Button trigger modal -->
               
                <div class="col-lg-12">
                <table  id="myTable" class="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Nombre</td>
                            <td>Telefono</td>
                            <td>Email</td>
                            <td>Pais</td>
                            <td>Ciudad</td>
                            <td>Cumpleaños</td>
                            <td></td>
                            <td></td>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
require 'footer.php';
}
else {
	header("location:../index.php");  
}

?>


<script>
$(document).ready(function(){
    
    var table = $('#myTable').DataTable({
        "ajax":{
            "url":"../procesos/clientes/mostrar.php",
            "type":"GET"
            //"crossDomain": "true",
            //"dataType": "json",
            //"dataSrc":""
        },
        "columns":[
            {
                "data":"id_cliente"
            },
            {
                
                "data":"nombre"
            },
            {
                
                "data":"telefono"
            },
            {
                
                "data":"email"

            },
            {
                
                "data":"pais"

            },
            {
                
                "data":"ciudad"

            },
            {
                
                "data":"cumpleanos"

            },
            {
                sTitle: "Elim",
                mDataProp: "id_cliente",
                sWidth: '7%',
                orderable: false,
                render: function(data) {
                    acciones = `<button id="` + data + `" value="Eliminar"  type="button" class="fa fa-times-circle btn btn-sm btn-danger accionesTabla" >
                                    
                                </button>`;
                    return acciones
                }
            },
            {
                sTitle: "Edit",
                mDataProp: "id_cliente",
                sWidth: '7%',
                orderable: false,
                render: function(data) {
                    acciones = `<button id="` + data + `" value="Traer" class="fa fa-pencil-square-o btn btn-sm btn-registrar accionesTabla" data-toggle="modal" data-target="#exampleModal2" type="button"  >
                                    
                                </button>`;
                    return acciones
                }
            }
        ],
        responsive:true,
                "ordering": false


    });
    
    $(document).on('click', '.accionesTabla', function() {
        var id = this.id;
        var val = this.value;

        switch (val) {
            case "Traer":
                        $.ajax({
                            method : "GET",
                            url : "../procesos/clientes/traer.php",
                            data:'id_cliente='+id
                        }).done(function(msg) {
                            var dato=JSON.parse(msg);
    				        $('#txtnombree').val(dato['nombre']);
                            $('#txttelefonoe').val(dato['telefono']);
                            $('#txtemaile').val(dato['email']);
                            $('#paise').val(dato['pais']);
                            $('#ciudade').val(dato['ciudad']);
                            $('#dia_cumpleanose').val(dato['dia_cumpleanos']);
                            $('#mes_cumpleanose').val(dato['mes_cumpleanos']);
                            
                            $('#btneditar').unbind().click(function(){
                                
                                noma = $("#txtnombree").val();
                                tele = $("#txttelefonoe").val();
                                ema = $("#txtemaile").val();
                                pais = $("#paise").val();
                                ciu = $("#ciudade").val();
                                dcumple = $("#dia_cumplanose").val();
                                mcumple = $("#mes_cumplanose").val();
                                if(noma.length != 0)
                                    {
                                 oka = {
    						                "txtnombree" : noma , "id_cliente" : id,
                                            "txttelefonoe" : tele, "txtemaile" : ema,
                                            "paise" : pais, "ciudade" : ciu,
                                            "dia_cumpleanose" : dcumple,  
                                            "mes_cumpleanose" : mcumple
                                    };
                                //alert(oka);
                                //alert(JSON.stringify(oka));
                                $.ajax({
                                    method : "POST",
                                    //contentType: 'application/json; charset=utf-8',
                                    url : "../procesos/clientes/editar.php",
                                    data : oka
                                    }).done(function(msg) {
                                    //alertify.success("¡Cliente Editado Correctamente!");
                                    Swal.fire({
                                      position: 'bottom-end',
                                      icon: 'success',
                                      title: '¡Cliente Editado Correctamente!',
                                      showConfirmButton: false,
                                      timer: 1500
                                    })
                                    table.ajax.reload();
                                    });                               
                                        
                                    }
                                else{
                                    alertify.error("Complete los datos");
                                }

                            });
                        });
                break;
            case "Eliminar":
                
                alertify.confirm('Eliminar Cliente', '¿Esta seguro que desea eliminar este cliente?', function()
                    {
                            $.ajax({
                                    type:"POST",
                                    url : "../procesos/clientes/eliminar.php",
                                    data : "id="+id
                                }).done(function(msg) {
                                    //alertify.success("Cliente Eliminado Correctamente");
                                    Swal.fire({
                                      position: 'bottom-end',
                                      icon: 'error',
                                      title: '¡Cliente Eliminado Correctamente!',
                                      showConfirmButton: false,
                                      timer: 1500
                                    })
                                    table.ajax.reload();
                                });
                    }
                    , function(){
                    
                    });



            
                        break;
            default:
                alert("No existe el valor");
                break;
        }
    });    
    
    
    
    $('#btnregistrar').click(function(){
       nom = $('#txtnombre').val();
        if(nom.length != 0 )
            {
            datos = $('#frmregistrar').serialize();
            $.ajax({
               type:'post',
                url:'../procesos/clientes/registrar.php',
                data:datos,
                success:function(r)
                {
                    if(r==1)
                        {
                            //alertify.success("Cliente Registrado Correctamente");
                            Swal.fire({
                              position: 'bottom-end',
                              icon: 'success',
                              title: '¡Cliente Registrado Correctamente!',
                              showConfirmButton: false,
                              timer: 1500
                            })
                            table.ajax.reload();
                        }
                    else if(r==0)
                        {
                            alertify.error("No se pudo registrar");
                        }
                    else
                        {
                            alert(r);
                        }
                }
            });
            }
        else{
            alertify.error("Complete los datos");
        }
    });
});

$("#txtemail").on("keyup", function() {
  var email = $("#txtemail").val(); 
  var longitudEmail = $("#txtemail").val().length; 

  if(longitudEmail > 1){
    var dataString = 'email=' + email;

      $.ajax({
          url: '../clases/verificarEmail.php',
          type: "GET",
          data: dataString,
          dataType: "JSON",

          success: function(datos){

                if( datos.success == 1){

                $("#respuesta").html(datos.message);

                $("input").attr('disabled',true); 
                $("select").attr('disabled',true);
                $("#btnregistrar").attr('disabled',true); 
                $("input#txtemail").attr('disabled',false); 

                }else{

                $("#respuesta").html(datos.message);

                $("input").attr('disabled',false);
                $("select").attr('disabled',false);
                $("#btnregistrar").attr('disabled',false);

                    }
                  }
                });
              }
          });

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

//Importar archivo Excel
$(document).ready(function() {
      /**$('#btnOpenModal').click(function() {
        $('#modal').modal('show');
      });**/

       $('#btnImport').click(function() {
        $('#fileInput').trigger('click');
      });

      $('#fileInput').change(function() {
        var fileName = $(this).val();
        $('#selectedFileName').text(fileName);
      });

      $('#btnProcessImport').click(function() {
        var file_data = $('#fileInput').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);

        $.ajax({
          url: 'procesar_importacion.php',
          dataType: 'text',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: 'post',
          success: function(response) {
            Swal.fire({
              icon: 'success',
              title: 'Importación exitosa',
              text: response,
            });
            $('#modal').modal('hide');
          },
          error: function(xhr, ajaxOptions, thrownError) {
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'Error al procesar la importación',
            });
          }
        });
      });
    });


</script>


