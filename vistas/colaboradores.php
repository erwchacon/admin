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
        <h5 class="modal-title" id="exampleModalLabel">Registrar Colaborador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                <form id="frmregistrar">
                    <label>Nombre Colaborador</label>
                    <input type="text" class="form-control" id="txtnombre" name="txtnombre">
                    <label>Telefono</label>
                    <input type="tel" class="form-control" id="txttelefono" name="txttelefono">
                    <label>Email</label>
                    <input type="text" class="form-control" id="txtemail" name="txtemail">
                    <label>Documento</label>
                    <input type="text" class="form-control" id="documento" name="documento">
                    <label>No. de Cuenta</label>
                    <input type="text" class="form-control" id="cuenta" name="cuenta">
                    <label>Banco</label>
                    <input type="text" class="form-control" id="banco" name="banco">
                    <label>No. Contrato</label>
                    <input type="text" class="form-control" id="contrato" name="contrato">
                    <label>Rol</label>
                    <select id="rol" name="rol" class="form-control">
                        <option value="A">Seleccione...</option>
                        <?php
                            require_once '../clases/Rol.php';
                            require_once '../clases/Conexion.php';
                            $obj1 = new Rol();
                            $rol = $obj1->mostrar();
                            while($ro=mysqli_fetch_row($rol))
                            {
                        ?>
                        <option value="<?php echo $ro[0] ?>" ><?php echo $ro[1] ?></option>
                        <?php
                            }
                        ?>               
                    </select>
                    <label for="consignacion">Cargar contrato</label><br>
                    <input name="archivo" id="archivo" type="file">
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
<!-- Fin Modal registrar -->
    
<!-- Modal Editar -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Colaborador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                <form id="frmeditar">
                    <label>Nombre</label>
                    <input type="text" class="form-control" id="txtnombree" name="txtnombree">
                    <label>Telefono</label>
                    <input type="tel" class="form-control" id="txttelefonoe" name="txttelefonoe">
                    <label>Email</label>
                    <input type="text" class="form-control" id="txtemaile" name="txtemaile">
                    <label>Documento</label>
                    <input type="text" class="form-control" id="documentoe" name="documentoe">
                    <label>No. de Cuenta</label>
                    <input type="text" class="form-control" id="cuentae" name="cuentae">
                    <label>Banco</label>
                    <input type="text" class="form-control" id="bancoe" name="bancoe">
                    <label>No. Contrato</label>
                    <input type="text" class="form-control" id="contratoe" name="contratoe">
                    <label>Rol</label>
                    <select id="rol" name="rol" class="form-control">
                        <option value="A">Seleccione...</option>
                        <?php
                            require_once '../clases/Rol.php';
                            require_once '../clases/Conexion.php';
                            $obj1 = new Rol();
                            $rol = $obj1->mostrar();
                            while($ro=mysqli_fetch_row($rol))
                            {
                        ?>
                        <option value="<?php echo $ro[0] ?>" ><?php echo $ro[1] ?></option>
                        <?php
                            }
                        ?>               
                    </select>
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
<!-- Fin Modal Editar -->
      

<div class="content-page">
	
    <!-- Start content -->
    <div class="content">
        
        <div class="container-fluid">
                
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder" style="padding-bottom: 10px;">
                        <h1 class="main-title float-left">Colaboradores</h1>
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
                                <td>Nombre</td>
                                <td>Telefono</td>
                                <td>Email</td>
                                <td>Rol</td>
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
            "url":"../procesos/colaboradores/mostrar.php",
            "type":"GET"
            //"crossDomain": "true",
            //"dataType": "json",
            //"dataSrc":""
        },
        "columns":[
            {
                "data":"id_colaborador"
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
                
                "data":"rol"
            },
            {
                sTitle: "Elim",
                mDataProp: "id_colaborador",
                sWidth: '7%',
                orderable: false,
                render: function(data) {
                    acciones = `<button id="` + data + `" value="Eliminar"  type="button" class="fa fa-times btn btn-sm btn-danger accionesTabla" >
                                    
                                </button>`;
                    return acciones
                }
            },
            {
                sTitle: "Edit",
                mDataProp: "id_colaborador",
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
                        url : "../procesos/colaboradores/traer.php",
                        data:'id_colaborador='+id
                    }).done(function(msg) {
                        var dato=JSON.parse(msg);
				        $('#txtnombree').val(dato['nombre']);
                        $('#txttelefonoe').val(dato['telefono']);
                        $('#txtemaile').val(dato['email']);
                        $('#documentoe').val(dato['documento']);
                        $('#cuentae').val(dato['cuenta']);
                        $('#bancoe').val(dato['banco']);
                        $('#contratoe').val(dato['contrato']);
                        $('#role').val(dato['rol']);
                        
                        $('#btneditar').unbind().click(function(){
                            
                            noma = $("#txtnombree").val();
                            tele = $("#txttelefonoe").val();
                            ema = $("#txtemaile").val();
                            docu = $("#documentoe").val();
                            cuen = $("#cuentae").val();
                            banc = $("#bancoe").val();
                            cont = $("#contratoe").val();
                            rol = $("#role").val();
                            if(noma.length != 0)
                                {
                             oka = {
						                "txtnombree" : noma , "id_colaborador" : id,
                                        "txttelefonoe" : tele, "txtemaile" : ema,
                                        "documentoe" : docu, "cuentae" : cuen,
                                        "bancoe" : banc, "contratoe" : cont, "role" : rol
                                };
                            //alert(oka);
                            //alert(JSON.stringify(oka));
                            $.ajax({
                                method : "POST",
                                //contentType: 'application/json; charset=utf-8',
                                url : "../procesos/colaboradores/editar.php",
                                data : oka
                                }).done(function(msg) {
                                alertify.success("Colaborador Editado Correctamente!");
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
            
            alertify.confirm('Eliminar Colaborador', '¿Esta seguro que desea eliminar este Colaborador?', function()
                {
                        $.ajax({
                                type:"POST",
                                url : "../procesos/colaboradores/eliminar.php",
                                data : "id="+id
                            }).done(function(msg) {
                                alertify.success("Colaborador Eliminado Correctamente");
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
                url:'../procesos/colaboradores/registrar.php',
                data:datos,
                success:function(r)
                {
                    
                    if(r==1)
                        {
                            alertify.success("Colaborador Registrado Correctamente");
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

    /**$('#btnregistrar').click(function(){
      
        var nombre = $('#txtnombre').val();
        var telefono = $('#txttelefono').val();
        var email = $('#txtemail').val();
        var documento = $('#documento').val();
        var cuenta = $('#cuenta').val();
        var banco = $('#banco').val();
        var contrato = $('#contrato').val();
        var rol = $('#rol').val();

        var archivo = $('#archivo').prop('files')[0];

        if (!archivo) {
            alertify.error("Debe subir una imagen del contrato del colaborador");
            return;
        }

        if(nombre.length != 0 )
        {
            var datos = new FormData();
            datos.append("txtnombre", nombre);
            datos.append("txttelefono", telefono);
            datos.append("txtemail", email);
            datos.append("documento", documento);
            datos.append("cuenta", cuenta);
            datos.append("banco", banco);
            datos.append("contrato", contrato);
            datos.append("rol", rol);

            $.ajax({
                url:'../procesos/colaboradores/registrar.php',
                data: datos,
                type: 'POST',
                contentType: false,
                processData: false,
                success:function(r)
                {
                    
                    if(r==1)
                        {
                            alertify.success("Colaborador Registrado Correctamente");
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
            }
        }
        else{
            alertify.error("Complete los datos");
        }
    });**/

});
</script>


