<?php
require 'header.php';

if(isset($_SESSION['usuario']))
{
date_default_timezone_set("America/Lima");

?>



<div class="content-page">
	
    <!-- Start content -->
    <div class="content">
        
        <div class="container-fluid">
                
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder"  style="padding-bottom: 10px;">
                        <h1 class="main-title float-left">Dashboard</h1>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- Primera fila -->
            <div class="row">
                <div class="col-4">
                    <a href="reporte_ventas.php">
                        <div class="dashboard">
                            <center>
                                <img src="../assets/images/png/ventas.png" alt = "Ventas" style="max-width: 100%; width: 100px;">
                                <h5>Ventas día</h5>
                                <span style="font-weight: bold; font-size: 1.4em;">
                                    <?php
                                        require_once '../clases/Reporte.php';
                                        require_once '../clases/Conexion.php';
                                        $obj1 = new Reporte();
                                        $r1 = $obj1->ventas_dia();
                                        echo $r1;
                                    ?>
                                </span>
                            </center>
                        </div>
                    </a>
                </div>
                <div class="col-4">
                    <a href="reporte_ventas.php">
                        <div class="dashboard">
                            <center>
                                <img src="../assets/images/png/ingresos.png" alt = "Ingresos" width="100" height="100">
                                <h5>Ingresos día</h5>
                                <span style="font-weight: bold; font-size: 1.4em;">
                                    <?php
                                        require_once '../clases/Reporte.php';
                                        require_once '../clases/Conexion.php';
                                        $obj1 = new Reporte();
                                        $r1 = $obj1->dinero_dia();
                                        if(empty($r1)){
                                            echo "0";
                                        }else{
                                            echo $r1;
                                        }
                                    ?>
                                </span>
                            </center>
                        </div>
                    </a>
                </div>
                <div class="col-4">
                    <a href="reporte_gastos.php">
                        <div class="dashboard">
                            <center>
                                <img src="../assets/images/png/egresos.png" alt = "Egresos" width="100" height="100">
                                <h5>Egresos día</h5>
                                <span style="font-weight: bold; font-size: 1.4em;">
                                    <?php
                                        require_once '../clases/Reporte.php';
                                        require_once '../clases/Conexion.php';
                                        $obj1 = new Reporte();
                                        $r1 = $obj1->egresos_dia();
                                        if(empty($r1)){
                                            echo "0";
                                        }else{
                                            echo $r1;
                                        }
                                    ?>
                                </span>
                            </center>
                        </div>
                    </a>
                </div>
            </div>
            <!-- end row -->

            <!-- Segunda fila -->
            <div class="row">
                <div class="col-4">
                    <a href="reporte_ventas.php">
                        <div class="dashboard">
                            <center>
                                <img src="../assets/images/png/productos1.png" alt = "Productos" width="100" height="100">
                                <h5>Prod. vendidos día</h5>
                                <span style="font-weight: bold; font-size: 1.4em;">
                                    <?php
                                        require_once '../clases/Reporte.php';
                                        require_once '../clases/Conexion.php';
                                        $obj2 = new Reporte();
                                        $r2 = $obj2->productos_dia();
                                        if(empty($r2)){
                                            echo "0";
                                        }else{
                                            echo $r2;
                                        }
                                    ?>
                                </span>
                            </center>
                        </div>
                    </a>
                </div>
                <div class="col-4">
                    <a href="clientes.php">
                        <div class="dashboard">
                            <center>
                                <img src="../assets/images/png/clientes.png" alt = "Clientes" width="100" height="100">
                                <h5>Total clientes</h5>
                                <span style="font-weight: bold; font-size: 1.4em;">
                                    <?php
                                        require_once '../clases/Reporte.php';
                                        require_once '../clases/Conexion.php';
                                        $obj1 = new Reporte();
                                        $r1 = $obj1->clientes_total();
                                        echo $r1;
                                    ?>
                                </span>
                            </center>
                        </div>
                    </a>
                </div>
                <div class="col-4">
                    <a href="ventas_rechazadas.php">
                        <div class="dashboard">
                            <center>
                                <img src="../assets/images/png/rech.png" alt = "Ventas" width="100" height="100">
                                <h5>Ventas rechazadas</h5>
                                <span style="font-weight: bold; font-size: 1.4em;">
                                    <?php
                                        require_once '../clases/Reporte.php';
                                        require_once '../clases/Conexion.php';
                                        $obj1 = new Reporte();
                                        $r1 = $obj1->ventas_rechazadas();
                                        echo $r1;
                                    ?>
                                </span>
                            </center>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                        
                <!--<H4>Tabla de productos con stock menor a 10 unidades</H4>
                <table id="dtventas" class="table table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Producto</td>
                            <td>Stock</td>
                            <td style="width:15px"></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                require_once '../clases/Conexion.php';
                                require_once '../clases/Reporte.php';
                                $obj = new Reporte();
                                $result = $obj->productos_0();
                        	while($fila=mysqli_fetch_row($result))
                        	{
                         ?>
                            <tr>
                        		<td><?php echo $fila[0] ?></td>
                        		<td><?php echo $fila[1] ?></td>
                        		<td><?php echo "<h5 style='color:red;'>$fila[2]</h5>"; ?></td>


                        	</tr>
                        	<?php
                        } ?>

                    </tbody>
                </table>
                                        
            </div>-->
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

<script>
$(document).ready(function() {
			

} );		
</script>
	
	
<!-- END Java Script for this page -->


<?php
}
else {
	header("location:../index.php");  
}

?>