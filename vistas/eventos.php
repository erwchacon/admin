<?php
require 'header.php';

//if(isset($_SESSION['usuario']))
if($_SESSION['admin'] == 1)
{
    //if ($_SESSION['admin'] !== 1) exit('<div class="content-page"><div class="content"><div class="container-fluid"><div class="row"><div class="col-12"><div class="col-6"></div><div class="col-6"><h1>Lo sentimos, solamente el administrador puede ver esta sección<br><br><i class="fa fa-hand-paper-o fa-4x"></i></h1></div></div></div></div></div></div>');

?>



<!-- Modal registrar -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
           
           <div class="col-lg-12">
           <form id="frmregistrar">
            <label>Nombre evento (*)</label>
            <input type="text" class="form-control" id="txtnombre" name="txtnombre">
            <label>Ciudad</label>
            <input type="text" class="form-control" id="ciudad" name="ciudad">
            <label>Lugar</label>
            <input type="text" class="form-control" id="lugar" name="lugar">
            <label>Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha">
            <label>Hora</label>
            <input type="time" class="form-control" id="hora" name="hora">
            <label>Ubicación</label>
            <input type="text" class="form-control" id="ubicacion" name="ubicacion">
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
    
    


<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
           
           <div class="col-lg-12">
           <form id="frmeditar">
            <label>Nombre evento</label>
            <input type="text" class="form-control" id="txtnombree" name="txtnombree">
            <label>Ciudad</label>
            <input type="text" class="form-control" id="ciudade" name="ciudade">
            <label>Lugar</label>
            <input type="text" class="form-control" id="lugare" name="lugare">
            <label>Fecha</label>
            <input type="date" class="form-control" id="fechae" name="fechae">
            <label>Hora</label>
            <input type="time" class="form-control" id="horae" name="horae">
            <label>Ubicación</label>
            <input type="text" class="form-control" id="ubicacione" name="ubicacione">
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
    
      

    <div class="content-page">
	
    <!-- Start content -->
    <div class="content">
        
        <div class="container-fluid">
                
                    <div class="row">
                                <div class="col-xl-12">
                                        <div class="breadcrumb-holder" style="padding-bottom: 10px;">
                                                <h1 class="main-title float-left">Eventos</h1>
                                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button"  class="btn btn-registrar" data-toggle="modal" data-target="#exampleModal">
                                                 Registrar
                                                </button>
                                                <!--<h1><?php echo $_SESSION['admin'] ?></h1>-->
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
                                    <td>Ciudad</td>
                                    <td>Lugar</td>
                                    <td>Fecha</td>
                                    <td>Hora</td>
                                    <td>Ubicación</td>
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



<?php
require 'footer.php';
}
else {
    exit('<div class="content-page"><div class="content"><div class="container-fluid"><div class="row"><div class="col-12"><div class="col-6"></div><div class="col-6"><h1>Lo sentimos, solamente el administrador puede ver esta sección<br><br><i class="fa fa-hand-paper-o fa-4x"></i></h1></div></div></div></div></div></div>');
	//header("location:../index.php");  
}

?>


<script>
$(document).ready(function(){
    
    var table = $('#myTable').DataTable({
        "ajax":{
            "url":"../procesos/eventos/mostrar.php",
            "type":"GET"
            //"crossDomain": "true",
            //"dataType": "json",
            //"dataSrc":""
        },
        "columns":[
            {
                "data":"id_evento"
            },
            {
                
                "data":"nombre"
            },
            {
                
                "data":"ciudad"
            },
            {
                
                "data":"lugar"

            },
            {
                
                "data":"fecha"
            },
            {
                
                "data":"hora"
            },
            {
                
                "data":"ubicacion"
            },
            {
                sTitle: "Eliminar",
                mDataProp: "id_evento",
                sWidth: '7%',
                orderable: false,
                render: function(data) {
                    acciones = `<button id="` + data + `" value="Eliminar"  type="button" class="fa fa-times btn btn-danger accionesTabla" >
                                    
                                </button>`;
                    return acciones
                }
            },
            {
                sTitle: "Editar",
                mDataProp: "id_evento",
                sWidth: '7%',
                orderable: false,
                render: function(data) {
                    acciones = `<button id="` + data + `" value="Traer" class="fa fa-pencil-square-o btn btn-registrar accionesTabla" data-toggle="modal" data-target="#exampleModal2" type="button"  >
                                    
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
                        url : "../procesos/eventos/traer.php",
                        data:'id_evento='+id
                    }).done(function(msg) {
                        var dato=JSON.parse(msg);
				        $('#txtnombree').val(dato['nombre']);
                        $('#ciudade').val(dato['ciudad']);
                        $('#lugare').val(dato['lugar']);
                        $('#fechae').val(dato['fecha']);
                        $('#horae').val(dato['hora']);
                        $('#ubicacione').val(dato['ubicacion']);
                        
                        
                        
                        $('#btneditar').unbind().click(function(){
                            
                            noma = $("#txtnombree").val();
                            ciu = $("#ciudade").val();
                            lug = $("#lugare").val();
                            fech = $("#fechae").val();
                            hora = $("#horae").val();
                            ubic = $("#ubicacione").val();
                            if(noma.length != 0)
                                {
                             oka = {
						                "txtnombree" : noma , "id_evento" : id,
                                        "ciudade" : ciu, "lugare" : lug,
                                        "fechae" : fech , "horae" : hora ,
                                        "ubicacione" : ubic 
                                };
                            //alert(oka);
                            //alert(JSON.stringify(oka));
                            $.ajax({
                                method : "POST",
                                //contentType: 'application/json; charset=utf-8',
                                url : "../procesos/eventos/editar.php",
                                data : oka
                                }).done(function(msg) {
                                alertify.success("¡Evento Editado Correctamente!");
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
            
            alertify.confirm('Eliminar Evento', '¿Esta seguro que desea eliminar este evento?', function()
                {
                        $.ajax({
                                type:"POST",
                                url : "../procesos/eventos/eliminar.php",
                                data : "id="+id
                            }).done(function(msg) {
                                alertify.success("Evento Eliminado Correctamente");
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
                url:'../procesos/eventos/registrar.php',
                data:datos,
                success:function(r)
                {
                    
                    if(r==1)
                        {
                            alertify.success("Evento Registrado Correctamente");
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
</script>


