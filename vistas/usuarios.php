<?php
require 'header.php';

//if(isset($_SESSION['usuario']))
if($_SESSION['admin'] == 1)
{

?>



<!-- Modal registrar -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
               <form id="frmregistrar">
                    <label>Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario">
                    <label>Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                    <label>Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido">
                    <label>Contraseña</label>
                    <input type="password" class="form-control" id="contraseña" name="contraseña">
                    <label>Repetir Contraseña</label>
                    <input type="password" class="form-control">
                    <label>Tipo</label>
                    <input type="radio" id="user" name="tipo" value="User" checked/>
                    <label for="user">User</label>
                    <input type="radio" id="admin" name="tipo" value="Admin"/>
                    <label for="admin">Admin</label>
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
    
    


<!-- Modal editar -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                <form id="frmeditar">
                    <label>Usuario</label>
                    <input type="text" class="form-control" id="usuarioe" name="usuarioe">
                    <label>Nombre</label>
                    <input type="text" class="form-control" id="nombree" name="nombree">
                    <label>Apellido</label>
                    <input type="text" class="form-control" id="apellidoe" name="apellidoe">
                    <label>Contraseña</label>
                    <input type="password" class="form-control" id="contraseñae" name="contraseñae">
                    <label>Repetir Contraseña</label>
                    <input type="password" class="form-control">
                    <label>Tipo</label>
                    <input type="radio" id="user" name="tipoe" value="0" checked/>
                    <label for="user">User</label>
                    <input type="radio" id="admin" name="tipoe" value="1"/>
                    <label for="admin">Admin</label>
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
                        <div class="col-12">
                            <div class="breadcrumb-holder" style="padding-bottom: 10px;">
                                <h1 class="main-title float-left">Usuarios</h1>
                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button"  class="btn btn-registrar" data-toggle="modal" data-target="#exampleModal">
                                 Registrar
                                </button>
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
                                    <td>Usuario</td>
                                    <td>Nombre</td>
                                    <td>Tipo</td>
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
            "url":"../procesos/usuarios/mostrar.php",
            "type":"GET"
            //"crossDomain": "true",
            //"dataType": "json",
            //"dataSrc":""
        },
        "columns":[
            {
                "data":"id_usuario"
            },
            {
                
                "data":"usuario"
            },
            {
                
                "data":"nombre_completo"
            },
            {
                
                "data":"admin"
            },
            {
                sTitle: "Eliminar",
                mDataProp: "id_usuario",
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
                mDataProp: "id_usuario",
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
    
/**$(document).on('click', '.accionesTabla', function() {
    var id = this.id;
    var val = this.value;

    switch (val) {
        case "Traer":
            $.ajax({
                method : "GET",
                url : "../procesos/usuarios/traer.php",
                data:'id_usuario='+id
            }).done(function(msg) {
                var dato=JSON.parse(msg);
		        $('#usuarioe').val(dato);
                $('#nombree').val(dato);
                $('#apellidoe').val(dato);
                $('#contraseñae').val(dato);
                $('#tipoe').val(dato);

                $('#btneditar').unbind().click(function(){
                            
                    usu = $("#usuarioe").val();
                    nom = $("#nombree").val();
                    ape = $("#apellidoe").val();
                    cont = $("#contraseñae").val();
                    tipo = $("#tipoe").val();
                    if(usu.length != 0){
                        oka = {
			                "usuarioe" : usu, "id_usuario" : id
                            "nombree" : nom, "apellidoe" : ape,
                            "contraseñae" : cont, "tipoe" : tipo
                        };
                        $.ajax({
                            method : "POST",
                            url : "../procesos/usuarios/editar.php",
                            data : oka
                        }).done(function(msg) {
                            alertify.success("Usuario Editado Correctamente!");
                            table.ajax.reload();
                        });                               
                                    
                    }else{
                        alertify.error("Complete los datos");
                    }
                });
            });
        break;
        case "Eliminar":
            alertify.confirm('Usuario', '¿Esta seguro que desea eliminar este usuario?', function(){
                    $.ajax({
                        type:"POST",
                        url : "../procesos/usuarios/eliminar.php",
                        data : "id="+id
                    }).done(function(msg){
                        alertify.success("Usuario Eliminado Correctamente");
                        table.ajax.reload();
                    });
                });
        break;
        default:
            alert("No existe el valor");
        break;
    }
});**/ 
    
    
    
    $('#btnregistrar').click(function(){
       usu = $('#usuario').val();
        if(usu.length != 0 )
            {
            datos = $('#frmregistrar').serialize();
            $.ajax({
               type:'post',
                url:'../procesos/usuarios/registrar.php',
                data:datos,
                success:function(r)
                {
                    if(r==1)
                        {
                            alertify.success("Usuario Registrado Correctamente");
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


