<?php
require 'header.php';

if(isset($_SESSION['usuario']))
{
date_default_timezone_set("America/Lima");

?>

<head>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

</head>

<body>

<div class="content-page">
	
    <!-- Start content -->
    <div class="content">
        
        <div class="container-fluid">
                
            <div class="row">
                <div class="col-6">
                    <div class="breadcrumb-holder"  style="padding-bottom: 10px;">
                        <h1 class="main-title float-left">Balances</h1>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="breadcrumb-holder text-right" style="padding-bottom: 10px;">
                        <button type="button" id="export_pdf"  class="btn btn-danger" onclick="exportarPDF()">PDF</button>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- Primera fila -->
            <div class="row" id="fila_uno">
                <div class="col-6">
                    <div class="dashboard" style="background-color: #F9F9F1;">
                        <center>
                            <table>
                                <tr>
                                    <th colspan="2" style="padding-bottom: 1em;"><center>Reporte por Evento</center></th>
                                </tr>
                                <tr>
                                    <td>Seleccione Evento:</td>
                                    <td>
                                        <select id="evento" name="evento" class="form-control-dashboard" onchange="functions()">
                                            <option value="A">Seleccione...</option>
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
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Ventas:</td>
                                    <td>
                                        <center><input readonly class="form-control-dashboard" id="totalventas" name="totalventas" type="text" style="color: green;"/></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Gastos:</td>
                                    <td>
                                        <center><input readonly  class="form-control-dashboard" id="totalgastos" name="totalgastos" type="number" style="color: red;"/></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Comisiones:</td>
                                    <td>
                                        <center><input readonly  class="form-control-dashboard" id="totalcomisiones" name="totalcomisiones" type="number" style="color: red;"/></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Balance:</td>
                                    <td>
                                        <center><input readonly  class="form-control-dashboard" id="totalbalance" name="totalbalance" type="number" style="color: blue;"/></center>
                                    </td>
                                </tr>
                            </table>
                        </center>
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="dashboard" style="background-color: #FFFFFF;">
                        <center>
                            <table>
                                <tr>
                                    <th colspan="2" style="padding-bottom: 1em;"><center>Reporte Vendedor / Evento</center></th>
                                </tr>
                                <tr>
                                    <td>Seleccione Vendedor:</td>
                                    <td>
                                        <select id="vendedor" name="vendedor" class="form-control-dashboard" onchange="functions_vendedor()">
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
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Ventas:</td>
                                    <td>
                                        <center><input readonly class="form-control-dashboard" id="totalventasven" name="totalventasven" type="text" style="color: green;"/></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Gastos:</td>
                                    <td>
                                        <center><input readonly  class="form-control-dashboard" id="totalgastosven" name="totalgastosven" type="number" style="color: red;"/></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Comisiones:</td>
                                    <td>
                                        <center><input readonly  class="form-control-dashboard" id="totalcomisionesven" name="totalcomisionesven" type="number" style="color: red;"/></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Balance:</td>
                                    <td>
                                        <center><input readonly  class="form-control-dashboard" id="totalbalanceven" name="totalbalanceven" type="number" style="color: blue;"/></center>
                                    </td>
                                </tr>
                            </table>
                        </center>
                    </div>
                </div>

            </div>
            <!-- end row -->

            <!-- Segunda fila -->
            <div class="row" id="fila_dos">
                <div class="col-6">
                    <div class="dashboard" style="background-color: #FFFFFF;">
                        <center>
                            <table>
                                <tr>
                                    <th colspan="2" style="padding-bottom: 1em;"><center>Reporte Fecha / Evento</center></th>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-12" style="padding: 0px">
                                            <input type="date"  class="form-control-dashboard" id="txtfecha1" name="txtfecha1" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-12" style="padding: 0px">
                                            <input type="date" class="form-control-dashboard" id="txtfecha2" name="txtfecha2" onchange="functions_fecha()" />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Ventas:</td>
                                    <td>
                                        <center><input readonly class="form-control-dashboard" id="totalventasfec" name="totalventasfec" type="text" style="color: green;"/></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Gastos:</td>
                                    <td>
                                        <center><input readonly  class="form-control-dashboard" id="totalgastosfec" name="totalgastosfec" type="number" style="color: red;"/></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Comisiones:</td>
                                    <td>
                                        <center><input readonly  class="form-control-dashboard" id="totalcomisionesfec" name="totalcomisionesfec" type="number" style="color: red;"/></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Balance:</td>
                                    <td>
                                        <center><input readonly  class="form-control-dashboard" id="totalbalancefec" name="totalbalancefec" type="number" style="color: blue;"/></center>
                                    </td>
                                </tr>
                            </table>
                        </center>
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="dashboard" style="background-color: #F1F9F5;">
                        <center>
                            <table>
                                <tr>
                                    <th colspan="2" style="padding-bottom: 1em;"><center>Reporte Vendedor / Fecha / Evento</center></th>
                                </tr>
                                <tr>
                                    <td>Seleccione Vendedor:</td>
                                    <td>
                                        <select id="vendedorcombi" name="vendedorcombi" class="form-control-dashboard" onchange="functions_combi()">
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
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Ventas:</td>
                                    <td>
                                        <center><input readonly class="form-control-dashboard" id="totalventascombi" name="totalventascombi" type="text" style="color: green;"/></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Gastos:</td>
                                    <td>
                                        <center><input readonly  class="form-control-dashboard" id="totalgastoscombi" name="totalgastoscombi" type="number" style="color: red;"/></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Comisiones:</td>
                                    <td>
                                        <center><input readonly  class="form-control-dashboard" id="totalcomisionescombi" name="totalcomisionescombi" type="number" style="color: red;"/></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Balance:</td>
                                    <td>
                                        <center><input readonly  class="form-control-dashboard" id="totalbalancecombi" name="totalbalancecombi" type="number" style="color: blue;"/></center>
                                    </td>
                                </tr>
                            </table>
                        </center>
                    </div>
                </div>

            </div>
            <!-- end row -->
        </div>
        <!-- END container-fluid -->
    </div>
    <!-- END content -->
</div>
<!-- END content-page -->



<?php
require 'footer.php';
?>

</body>

<script>
$(document).ready(function() {
			

} );	


function functions(){
    total_ventas_evento();
    total_imp_evento();
    total_comisiones_evento();
    balance_evento();
}

function total_ventas_evento() {
  var evento = document.getElementById("evento").value;

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        document.getElementById("totalventas").value = xhr.responseText;
      } else {
        console.log("Hubo un problema al obtener el total de las ventas del evento.");
      }
    }
  };
  xhr.open("POST", "../procesos/reportes/ventasporevento.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("evento=" + evento);
}

function total_imp_evento() {
  var evento = document.getElementById("evento").value;

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        document.getElementById("totalgastos").value = xhr.responseText;
      } else {
        console.log("Hubo un problema al obtener el total de las ventas del evento.");
      }
    }
  };
  xhr.open("POST", "../procesos/reportes/impporevento.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("evento=" + evento);
}

function total_comisiones_evento() {
  var evento = document.getElementById("evento").value;

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        document.getElementById("totalcomisiones").value = xhr.responseText;
      } else {
        console.log("Hubo un problema al obtener el total de las ventas del evento.");
      }
    }
  };
  xhr.open("POST", "../procesos/reportes/comisionporevento.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("evento=" + evento);
}

function balance_evento() {
  var evento = document.getElementById("evento").value;

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        document.getElementById("totalbalance").value = xhr.responseText;
      } else {
        console.log("Hubo un problema al obtener el total de las ventas del evento.");
      }
    }
  };
  xhr.open("POST", "../procesos/reportes/balanceporevento.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("evento=" + evento);
}

////////////////////////////////////////////////////////////////////////////////

function functions_vendedor(){
    total_ventas_vendedor();
    total_imp_vendedor();
    total_comisiones_vendedor();
    balance_vendedor();
}

function total_ventas_vendedor() {
    var evento = document.getElementById("evento").value;
    var vendedor = document.getElementById("vendedor").value;
    var input = document.getElementById("totalventasven");

    var xhr = new XMLHttpRequest();
    if(evento !== "A"){
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                document.getElementById("totalventasven").value = xhr.responseText;
                } else {
                    console.log("Hubo un problema al obtener el total de las ventas del evento.");
                }
            }
        };
    }else{
        //input.value = "Debe seleccionar un evento!";
        Swal.fire({
          icon: 'error',
          title: 'Debe seleccionar un evento',
          text: 'Seleccione un evento en el primer recuadro'
        })
    }
    xhr.open("POST", "../procesos/reportes/ventasporevento_vendedor.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //xhr.send("evento=" + evento);
    xhr.send("evento=" + evento + "&vendedor=" + vendedor);
}

function total_imp_vendedor() {
    var evento = document.getElementById("evento").value;
    var vendedor = document.getElementById("vendedor").value;

    var xhr = new XMLHttpRequest();
    if(evento !== "A"){
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                document.getElementById("totalgastosven").value = xhr.responseText;
                } else {
                    console.log("Hubo un problema al obtener el total de las ventas del evento.");
                }
            }
        };
    }else{
        console.log("Debe seleccionar un evento en el recuadro anterior!");
    }
    xhr.open("POST", "../procesos/reportes/impporevento_vendedor.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("evento=" + evento + "&vendedor=" + vendedor);
}

function total_comisiones_vendedor() {
    var evento = document.getElementById("evento").value;
    var vendedor = document.getElementById("vendedor").value;

    var xhr = new XMLHttpRequest();
    if(evento !== "A"){
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                document.getElementById("totalcomisionesven").value = xhr.responseText;
                } else {
                    console.log("Hubo un problema al obtener el total de las ventas del evento.");
                }
            }
        };
    }else{
        console.log("Debe seleccionar un evento en el recuadro anterior!");
    }
    xhr.open("POST", "../procesos/reportes/comisionporevento_vendedor.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("evento=" + evento + "&vendedor=" + vendedor);
}

function balance_vendedor() {
    var evento = document.getElementById("evento").value;
    var vendedor = document.getElementById("vendedor").value;

    var xhr = new XMLHttpRequest();
    if(evento !== "A"){
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                document.getElementById("totalbalanceven").value = xhr.responseText;
                } else {
                    console.log("Hubo un problema al obtener el total de las ventas del evento.");
                }
            }
        };
    }else{
        console.log("Debe seleccionar un evento en el recuadro anterior!");
    }
    xhr.open("POST", "../procesos/reportes/balanceporevento_vendedor.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("evento=" + evento + "&vendedor=" + vendedor);
}

////////////////////////////////////////////////////////////////////////////////

function functions_fecha(){
    total_ventas_fechas();
    total_imp_fechas();
    total_comisiones_fechas();
    balance_fechas();
}

function total_ventas_fechas() {
    var evento = document.getElementById("evento").value;
    var fecha_ini = document.getElementById("txtfecha1").value;
    var fecha_fin = document.getElementById("txtfecha2").value;
    var input = document.getElementById("totalventasfec");

    var xhr = new XMLHttpRequest();
    if(evento !== "A"){
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                document.getElementById("totalventasfec").value = xhr.responseText;
                } else {
                    console.log("Hubo un problema al obtener el total de las ventas del evento.");
                }
            }
        };
    }else{
        //input.value = "Seleccione un evento!";
        Swal.fire({
          icon: 'error',
          title: 'Debe seleccionar un evento',
          text: 'Seleccione un evento en el primer recuadro'
        })
    }
    xhr.open("POST", "../procesos/reportes/ventasporevento_fechas.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //xhr.send("evento=" + evento);
    xhr.send("evento=" + evento + "&fecha_ini=" + fecha_ini + "&fecha_fin=" + fecha_fin);
}

function total_imp_fechas() {
    var evento = document.getElementById("evento").value;
    var fecha_ini = document.getElementById("txtfecha1").value;
    var fecha_fin = document.getElementById("txtfecha2").value;
    var input = document.getElementById("totalgastosfec");

    var xhr = new XMLHttpRequest();
    if(evento !== "A"){
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                document.getElementById("totalgastosfec").value = xhr.responseText;
                } else {
                    console.log("Hubo un problema al obtener el total de las ventas del evento.");
                }
            }
        };
    }else{
        //input.value = "Seleccione un evento!";
    }
    xhr.open("POST", "../procesos/reportes/imporevento_fechas.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //xhr.send("evento=" + evento);
    xhr.send("evento=" + evento + "&fecha_ini=" + fecha_ini + "&fecha_fin=" + fecha_fin);
}

function total_comisiones_fechas() {
    var evento = document.getElementById("evento").value;
    var fecha_ini = document.getElementById("txtfecha1").value;
    var fecha_fin = document.getElementById("txtfecha2").value;
    var input = document.getElementById("totalcomisionesfec");

    var xhr = new XMLHttpRequest();
    if(evento !== "A"){
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                document.getElementById("totalcomisionesfec").value = xhr.responseText;
                } else {
                    console.log("Hubo un problema al obtener el total de las ventas del evento.");
                }
            }
        };
    }else{
        //input.value = "Seleccione un evento!";
    }
    xhr.open("POST", "../procesos/reportes/comisionporevento_fechas.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //xhr.send("evento=" + evento);
    xhr.send("evento=" + evento + "&fecha_ini=" + fecha_ini + "&fecha_fin=" + fecha_fin);
}

function balance_fechas() {
    var evento = document.getElementById("evento").value;
    var fecha_ini = document.getElementById("txtfecha1").value;
    var fecha_fin = document.getElementById("txtfecha2").value;
    var input = document.getElementById("totalbalancefec");

    var xhr = new XMLHttpRequest();
    if(evento !== "A"){
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                document.getElementById("totalbalancefec").value = xhr.responseText;
                } else {
                    console.log("Hubo un problema al obtener el total de las ventas del evento.");
                }
            }
        };
    }else{
        //input.value = "Seleccione un evento!";
    }
    xhr.open("POST", "../procesos/reportes/balanceporevento_fechas.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //xhr.send("evento=" + evento);
    xhr.send("evento=" + evento + "&fecha_ini=" + fecha_ini + "&fecha_fin=" + fecha_fin);
}

////////////////////////////////////////////////////////////////////////////////

function functions_combi(){
    total_ventas_combi();
    total_imp_combi();
    total_comisiones_combi();
    balance_combi();
}

function total_ventas_combi() {
    var evento = document.getElementById("evento").value;
    var fecha_ini = document.getElementById("txtfecha1").value;
    var fecha_fin = document.getElementById("txtfecha2").value;
    var vendedorcombi = document.getElementById("vendedorcombi").value;

    var xhr = new XMLHttpRequest();

    if(evento !== "A"){
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                document.getElementById("totalventascombi").value = xhr.responseText;
                } else {
                    console.log("Hubo un problema al obtener el total de las ventas del evento.");
                }
            }
        };
    }else{
        //input.value = "Seleccione un evento!";
        Swal.fire({
          icon: 'error',
          title: 'Debe seleccionar un evento y un periodo',
          text: 'Seleccione un evento, una fecha inicio y una fecha fin'
        })
    }
    xhr.open("POST", "../procesos/reportes/ventasporevento_combi.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //xhr.send("evento=" + evento);
    xhr.send("evento=" + evento + "&fecha_ini=" + fecha_ini + "&fecha_fin=" + fecha_fin + "&vendedor=" + vendedorcombi);
}

function total_imp_combi() {
    var evento = document.getElementById("evento").value;
    var fecha_ini = document.getElementById("txtfecha1").value;
    var fecha_fin = document.getElementById("txtfecha2").value;
    var vendedorcombi = document.getElementById("vendedorcombi").value;

    var xhr = new XMLHttpRequest();

    if(evento !== "A"){
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                document.getElementById("totalgastoscombi").value = xhr.responseText;
                } else {
                    console.log("Hubo un problema al obtener el total de las ventas del evento.");
                }
            }
        };
    }else{
        //input.value = "Seleccione un evento!";
        Swal.fire({
          icon: 'error',
          title: 'Debe seleccionar un evento y un periodo',
          text: 'Seleccione un evento, una fecha inicio y una fecha fin'
        })
    }
    xhr.open("POST", "../procesos/reportes/impporevento_combi.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //xhr.send("evento=" + evento);
    xhr.send("evento=" + evento + "&fecha_ini=" + fecha_ini + "&fecha_fin=" + fecha_fin + "&vendedor=" + vendedorcombi);
}

function total_comisiones_combi() {
    var evento = document.getElementById("evento").value;
    var fecha_ini = document.getElementById("txtfecha1").value;
    var fecha_fin = document.getElementById("txtfecha2").value;
    var vendedorcombi = document.getElementById("vendedorcombi").value;

    var xhr = new XMLHttpRequest();

    if(evento !== "A"){
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                document.getElementById("totalcomisionescombi").value = xhr.responseText;
                } else {
                    console.log("Hubo un problema al obtener el total de las ventas del evento.");
                }
            }
        };
    }else{
        //input.value = "Seleccione un evento!";
        Swal.fire({
          icon: 'error',
          title: 'Debe seleccionar un evento y un periodo',
          text: 'Seleccione un evento, una fecha inicio y una fecha fin'
        })
    }
    xhr.open("POST", "../procesos/reportes/comisionporevento_combi.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //xhr.send("evento=" + evento);
    xhr.send("evento=" + evento + "&fecha_ini=" + fecha_ini + "&fecha_fin=" + fecha_fin + "&vendedor=" + vendedorcombi);
}

function balance_combi() {
    var evento = document.getElementById("evento").value;
    var fecha_ini = document.getElementById("txtfecha1").value;
    var fecha_fin = document.getElementById("txtfecha2").value;
    var vendedorcombi = document.getElementById("vendedorcombi").value;

    var xhr = new XMLHttpRequest();

    if(evento !== "A"){
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                document.getElementById("totalbalancecombi").value = xhr.responseText;
                } else {
                    console.log("Hubo un problema al obtener el total de las ventas del evento.");
                }
            }
        };
    }else{
        //input.value = "Seleccione un evento!";
        Swal.fire({
          icon: 'error',
          title: 'Debe seleccionar un evento y un periodo',
          text: 'Seleccione un evento, una fecha inicio y una fecha fin'
        })
    }
    xhr.open("POST", "../procesos/reportes/balanceporevento_combi.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //xhr.send("evento=" + evento);
    xhr.send("evento=" + evento + "&fecha_ini=" + fecha_ini + "&fecha_fin=" + fecha_fin + "&vendedor=" + vendedorcombi);
}

//////////////////////////////////////////////////////////////////////////////

// función Exportar PDF
function exportarPDF() {
    // Crear un nuevo objeto jsPDF
    var pdf = new jsPDF({
        orientation: 'landscape',
        unit: 'mm',
        format: 'a3'
    });

    // Obtener los elementos HTML que se quieren exportar a PDF
    var fila_uno = document.getElementById("fila_uno");
    var fila_dos = document.getElementById("fila_dos");

    // Agregar las filas al documento PDF
    pdf.html(fila_uno, {
        callback: function () {
            pdf.addPage();
            pdf.html(fila_dos, {
                callback: function () {
                    // Descargar el archivo PDF con el nombre "balances.pdf"
                    pdf.save("balances.pdf");
                }
            });
        }
    });
}

</script>
	
	
<!-- END Java Script for this page -->


<?php
}
else {
	header("location:../index.php");  
}

?>