		        		<!-- BEGIN CSS for this page -->
<link href="../assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
<?php
require 'header.php';

//if(isset($_SESSION['usuario']))
if($_SESSION['admin'] == 1)
{

?>



<!-- Modal -->
<div class="modal fade" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="frmproducto">
                    <div class="row">
                        <div class="col-6">
                            <label>Nombre Producto</label>
                            <input type="text" class="form-control" id="txtnombre" name="txtnombre">
                        </div>
                        <div class="col-6">
                            <label>Precio Compra</label>
                            <input type="number" class="form-control" id="txtprecioc" name="txtprecioc">
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label>Precio US$</label>
                                <input type="number" class="form-control" id="txtpreciovd" name="txtpreciovd">
                            </div>
                            <div class="col-4">
                                <label>Precio MX$</label>
                                <input type="number" class="form-control" id="txtpreciovm" name="txtpreciovm">
                            </div>
                            <div class="col-4">
                                <label>Precio AR$</label>
                                <input type="number" class="form-control" id="txtpreciova" name="txtpreciova">
                            </div>
                        </div>
                    </div>
                        <br>
                        <!--<label>Stock (*)</label>
                        <input type="number" class="form-control" id="txtstock" name="txtstock">-->
                    <div class="row">
                        <div class="col-6">
                            <label>Proveedor</label>
                            <select id="txtproveedor" name="txtproveedor" class="form-control">
                                <option value="A">Seleccione...</option>
                                <?php
                                    require_once '../clases/Proveedor.php';
                                    require_once '../clases/Conexion.php';
                                    $obj1 = new Proveedor();
                                    $proveedor = $obj1->mostrar();
                                    while($pro=mysqli_fetch_row($proveedor))
                                    {
                                ?>
                                <option value="<?php echo $pro[0] ?>" ><?php echo $pro[1] ?></option>
                                <?php
                                    }
                                ?>               
                            </select>
                        </div>
                        <div class="col-6">
                            <label>Categoria</label>
                            <select id="txtcategoria" name="txtcategoria" class="form-control">
                                <option value="A">Seleccione...</option>
                                <?php
                                    require_once '../clases/Categoria.php';
                                    require_once '../clases/Conexion.php';
                                    $obj1 = new Categoria();
                                    $categoria = $obj1->mostrar();
                                    while($cat=mysqli_fetch_row($categoria))
                                    {
                                ?>
                                <option value="<?php echo $cat[0] ?>" ><?php echo $cat[1] ?></option>
                                <?php
                                    }
                                ?>               
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-registrar" id="btnregistrar">Guardar</button>
            </div>
        </div>
    </div>
</div>
    
    
<!-- Modal -->
<!--
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<div class="modal-body">
       <form id="frmproductoa">
        <div class="row">
            <label>Stock (*)</label>
            <input type="number" class="form-control" id="txtstocka" name="txtstocka">
            </form>
        </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnañadir" class="btn btn-registrar">Guardar</button>
      </div>
    </div>
  </div>
</div>
-->



<!-- Modal -->
<div class="modal fade" id="exampleModal2"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="frmproductoe">
                    <div class="row">
                        <div class="col-6">
                            <label>Nombre</label>
                            <input type="text" class="form-control" id="txtnombree" name="txtnombree">
                        </div>
                        <div class="col-6">
                            <label>Precio Compra</label>
                            <input type="number" class="form-control" id="txtprecioce" name="txtprecioce">
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label>Precio US$</label>
                                <input type="number" class="form-control" id="txtpreciovde" name="txtpreciovde">
                            </div>
                            <div class="col-4">
                                <label>Precio MX$</label>
                                <input type="number" class="form-control" id="txtpreciovme" name="txtpreciovme">
                            </div>
                            <div class="col-4">
                                <label>Precio AR$</label>
                                <input type="number" class="form-control" id="txtpreciovae" name="txtpreciovae">
                            </div>
                        </div>
                    </div>
                        <br>
                        <!--<label>Stock (*)</label>
                        <input type="number" class="form-control" id="txtstock" name="txtstock">-->
                    <div class="row">
                        <div class="col-6">
                            <label>Proveedor</label>
                            <select id="txtproveedore" name="txtproveedore" class="form-control-s">
                                <option value="A">Seleccione...</option>
                                <?php
                                    require_once '../clases/Proveedor.php';
                                    require_once '../clases/Conexion.php';
                                    $obj1 = new Proveedor();
                                    $proveedor = $obj1->mostrar();
                                    while($pro=mysqli_fetch_row($proveedor))
                                    {
                                ?>
                                <option value="<?php echo $pro[0] ?>" ><?php echo $pro[1] ?></option>
                                <?php
                                    }
                                ?>               
                            </select>
                        </div>
                        <div class="col-6">
                            <label>Categoria</label>
                            <select id="txtcategoriae" name="txtcategoriae" class="form-control-s">
                                <option value="A">Seleccione...</option>
                                <?php
                                    require_once '../clases/Categoria.php';
                                    require_once '../clases/Conexion.php';
                                    $obj1 = new Categoria();
                                    $categoria = $obj1->mostrar();
                                    while($cat=mysqli_fetch_row($categoria))
                                    {
                                ?>
                                <option value="<?php echo $cat[0] ?>" ><?php echo $cat[1] ?></option>
                                <?php
                                    }
                                ?>               
                            </select>
                        </div>
                    </div>
                </form>
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
                                                <h1 class="main-title float-left">Productos</h1>
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
                                    <td>Precio Compra</td>
                                    <td>Precio US$</td>
                                    <td>Precio MX$</td>
                                    <td>Precio AR$</td>
                                    <td>Proveedor</td>
                                    <td>Categoria</td>
                                    <td></td>
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
    $('#txtproveedor').select2({
        dropdownParent: $("#exampleModal .modal-content")
    });
    $('#txtcategoria').select2({
        dropdownParent: $("#exampleModal .modal-content")
    });
    $('#txtproveedore').select2({
        dropdownParent: $("#exampleModal2 .modal-content")
    });
    $('#txtcategoriae').select2({
        dropdownParent: $("#exampleModal2 .modal-content")
    });
    
    var table = $('#myTable').DataTable({
        "ajax":{
            "url":"../procesos/productos/mostrar.php",
            "type":"GET"
            //"crossDomain": "true",
            //"dataType": "json",
            //"dataSrc":""
        },
        "columns":[
            {
                "data":"id_producto"
            },
            {
                "data":"nombre"
            },
            {
                
                "data":"precio_compra"
            },
            {
                
                "data":"precio_venta_dl"
            },
            {
                
                "data":"precio_venta_mx"
            },
            {
                
                "data":"precio_venta_ar"
            },
            {
                
                "data":"id_proveedor"
            },  
            {
                
                "data":"id_categoria"
            },
            {
                sTitle: "Eliminar",
                mDataProp: "id_producto",
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
                mDataProp: "id_producto",
                sWidth: '7%',
                orderable: false,
                render: function(data) {
                    acciones = `<button id="` + data + `" value="Traer" class="fa fa-pencil-square-o btn btn-registrar accionesTabla" data-toggle="modal" data-target="#exampleModal2" type="button"  >
                                    
                                </button>`;
                    return acciones
                }
            },
            /*{
                sTitle: "Añadir",
                mDataProp: "id_producto",
                sWidth: '7%',
                orderable: false,
                render: function(data) {
                    acciones = `<button id="` + data + `" value="Añadir" class="fa fa-plus-circle btn btn-success accionesTabla" data-toggle="modal" data-target="#exampleModal3" type="button"  >
                                    
                                </button>`;
                    return acciones
                }
            }*/
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
                        url : "../procesos/productos/traer.php",
                        data:'id_producto='+id
                    }).done(function(msg) {
                        var dato=JSON.parse(msg);
                        
				        $('#txtnombree').val(dato['nombre']);
                        $('#txtprecioce').val(dato['precio_compra']);
                        $('#txtpreciovde').val(dato['precio_venta_dl']);
                        $('#txtpreciovme').val(dato['precio_venta_mx']);
                        $('#txtpreciovae').val(dato['precio_venta_ar']);
                        $('#txtstocke').val(dato['stock']);
                        $('#txtproveedore').val(dato['id_proveedor']);
                        $('#txtcategoriae').val(dato['id_categoria']);
                        
                        
                        
                        $('#btneditar').unbind().click(function(){
                            vacios = validarFormVacio('frmproductoe');
                            
                            
                            if(vacios <= 0)
                                {
                            noma = $("#txtnombree").val();
                            pc = $("#txtprecioce").val();
                            pvd = $("#txtpreciovde").val();
                            pvm = $("#txtpreciovme").val();
                            pva = $("#txtpreciovae").val();
                            prove = $("#txtproveedore").val();
                            cate = $("#txtcategoriae").val();
                             oka = {
						                "txtnombree" : noma , "id_producto" : id,
                                        "txtprecioce" : pc, "txtpreciovde" : pvd,
                                        "txtpreciovme" : pvm, "txtpreciovae" : pva,
                                        "txtproveedore" : prove, "txtcategoriae" : cate,
                                };
                            //alert(oka);
                            //alert(JSON.stringify(oka));
                            $.ajax({
                                method : "POST",
                                //contentType: 'application/json; charset=utf-8',
                                url : "../procesos/productos/editar.php",
                                data : oka
                                }).done(function(msg) {
                                alertify.success("Producto Editado Correctamente!");
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
            
            alertify.confirm('Producto', '¿Esta seguro que desea eliminar este producto?', function()
                {
                        $.ajax({
                                type:"POST",
                                url : "../procesos/productos/eliminar.php",
                                data : "id="+id
                            }).done(function(msg) {
                                alertify.success("Producto Eliminado Correctamente");
                                table.ajax.reload();
                            });
                }
                , function(){
                
                });



        
                    break;
        case "Añadir":
                        $('#btnañadir').unbind().click(function(){
                            vacios = validarFormVacio('frmproductoa');
                            
                            
                            if(vacios <= 0)
                                {
                            noma = $("#txtstocka").val();
                             oka = {
						                "txtstock" : noma , "id_producto" : id
                                };
                            //alert(oka);
                            //alert(JSON.stringify(oka));
                            $.ajax({
                                method : "POST",
                                //contentType: 'application/json; charset=utf-8',
                                url : "../procesos/productos/stock.php",
                                data : oka
                                }).done(function(msg) {
                                if(msg == 1)
                                    {
                                alertify.success("Stock Agregado Correctamente!");
                                table.ajax.reload();  
                                    }
                                else if(msg == "n")
                                    {
                                alertify.error("Ingrese un numero valido");                                        
                                    }
                                else{
                                     alertify.error("No se pudo añadir");
                                }

                                });                               
                                    
                                }
                            else{
                                alertify.error("Complete los datos");
                            }

                        });
            break;
        default:
            alert("No existe el valor");
            break;
    }
    });    
    
    
    
    $('#btnregistrar').click(function(){
        vacios = validarFormVacio('frmproducto');
        if(vacios <= 0 )
            {
            datos=$('#frmproducto').serialize();
            $.ajax({
               type:'post',
                url:'../procesos/productos/registrar.php',
                data:datos,
                success:function(r)
                {
                    
                    if(r==1)
                        {
                            alertify.success("Producto Registrado Correcamente");
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


