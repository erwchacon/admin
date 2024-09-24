<?php

session_start();
if(isset($_SESSION['usuario']))
{

?>
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

</head>

<body class="adminbody" onload="cargarMenu()">

<div id="main">

	<!-- top bar navigation -->
	<div class="headerbar">

        <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">           

                        <li class="list-inline-item dropdown notif">
                            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="../assets/images/avatars/avatar-barba.png" alt="Profile image" class="avatar-rounded">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown dropdown-lg">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="text-overflow"><small>Hola, <?php echo $_SESSION['usuario'] ?></small> </h5>
                                </div>

                                <!-- item-->
                                <a href="perfil.php" class="dropdown-item notify-item">
                                    <i class="fa fa-user"></i> <span>Cambiar Contraseña</span>
                                </a>

                                <!-- item-->
                                <a href="../procesos/usuarios/salir.php" class="dropdown-item notify-item">
                                    <i class="fa fa-power-off"></i> 
                                    <span>
                                        Cerrar sesión
                                    </span>
                                </a>
								
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left">
								<i class="fa fa-fw fa-bars" style="color: #333;"></i>
                            </button>
                            <a href="inicio.php"><button class="button-menu-mobile open-left">
                                <i class="fa fa-fw fa-home" style="color: #333;"></i>
                            </button></a>
                        </li>                        
                    </ul>

        </nav>

	</div>
	<!-- End Navigation -->


	<!-- Left Sidebar -->
	<div class="left main-sidebar" id="menu_admin">
	
		<div class="sidebar-inner leftscroll">

		  <div id="sidebar-menu">
        
			<ul>
                <!-- hidden -->
                    <li class="submenu" style="background-color: #2C3E50;">
                        <p><i style="color: #2C3E50;"></i><span hidden> Menú </span></p>
                    </li>
                <!-- hidden -->

                    <!-- Logo -->
                    <div style="text-align: center; padding: 0; margin: 0;">
                        <a href="inicio.php" class="navbar-brand"><img alt="Logo" src="../assets/images/logo_vert.png" style="max-width: 100%; width: 100px;"></a>
                    </div>

                    
                    <li class="submenu" style="background-color: #2C3E50;">
                        <p><i style="color: #2C3E50;"></i><span hidden> Menú </span></p>
                    </li>
                    <br>
                    <li class="submenu">
                        <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span> </a>
                    </li>

                    <li class="submenu">
                        <a href="genera_venta.php"><i class="fa fa-shopping-cart"></i><span>Venta</span> </a>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fa fa-dollar"></i><span>Comercial</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="clientes.php"> Clientes </a></li>
                                <li><a href="eventos.php"> Eventos </a></li>
                                <li><a href="marcar_ventas.php">Confirmar Ventas</a></li>
                                <li><a href="marcar_ventas_pdtes.php">Ventas Pdtes</a></li>
                                <li><a href="ventas_rechazadas.php">Ventas Rechazadas</a></li>
                            </ul>
                    </li>
                    
                    <li class="submenu">
                        <a href="#"><i class="fa fa-user"></i><span>Administrativo</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="colaboradores.php"> Colaboradores </a></li>
                                <li><a href="proveedores.php"> Proveedores </a></li>
                                <li><a href="roles.php"> Roles </a></li>
                                <li><a href="usuarios.php"> Usuarios </a></li>
                            </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fa fa-truck"></i><span>Inventario</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="productos.php"> Productos </a></li>
                                <li><a href="categorias.php"> Categorias </a></li>
                            </ul>
                    </li>
                    
                    <li class="submenu">
                        <a href="#"><i class="fa fa-calculator"></i><span> Contabilidad</span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="genera_gasto.php">Registrar Gasto</a></li>
                            <li><a href="marcar_gastos.php">Confirmar Gastos</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fa fa-file-pdf-o"></i><span> Reportes</span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="balances.php">Balances</a></li>
                            <li><a href="#" onclick="window.open('reporte_clientes.php','Reporte Clientes','width='+screen.width+',height='+screen.height)">Reporte Clientes</a></li>
                            <li><a href="#" onclick="window.open('reporte_ventas.php','Reporte Ventas','width='+screen.width+',height='+screen.height)">Reporte Ventas</a></li>
                            <li><a href="#" onclick="window.open('reporte_ventas_vendedor.php','Reporte Ventas Vendedor','width='+screen.width+',height='+screen.height)">Ventas por Vendedor</a></li>
                            <li><a href="reporte_gastos.php">Reporte de Gastos</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fa fa-info-circle"></i></i><span>Ayudas</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="#" data-toggle="modal" data-target="#valor_dolar_ar">Valor AR-Dolar</span> </a></li>
                            </ul>
                    </li>					

            </ul>
          </div>
        </div>
    </div>

    <div class="left main-sidebar" id="menu_user">
        <div class="sidebar-inner leftscroll">
          <div id="sidebar-menu">

            <ul>
                <!-- hidden -->
                    <li class="submenu" style="background-color: #2C3E50;">
                        <p><i style="color: #2C3E50;"></i><span hidden> Menú </span></p>
                    </li>
                    <br>
                    <li class="submenu" style="background-color: #2C3E50;">
                        <p><i style="color: #2C3E50;"></i><span hidden> Menú </span></p>
                    </li>
                <!-- hidden -->

                    <li class="submenu">
                        <a href="genera_venta.php"><i class="fa fa-shopping-cart"></i><span>Venta</span> </a>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fa fa-dollar"></i><span>Comercial</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="clientes.php"> Clientes </a></li>
                                <li><a href="marcar_ventas_pdtes.php">Ventas Pdtes</a></li>
                            </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fa fa-calculator"></i><span> Contabilidad</span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="genera_gasto.php">Registrar Gasto</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fa fa-file-pdf-o"></i><span> Reportes</span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="#" onclick="window.open('reporte_clientes.php','Reporte Clientes','width='+screen.width+',height='+screen.height)">Reporte Clientes</a></li>
                            <li><a href="#" onclick="window.open('reporte_ventas_vendedor.php','Reporte Ventas Vendedor','width='+screen.width+',height='+screen.height)">Ventas por Vendedor</a></li>
                        </ul>
                    </li>                       

            </ul>

		  </div>
	   </div>
	</div>
    <!-- End Sidebar -->

    <!-- Modal valor peso Ar -->
    <div class="modal fade" id="valor_dolar_ar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Valor Peso AR respecto al Dolar hoy:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php include 'dolarhoy_ar.php'; ?>
                        </div>
               
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

<?php
}
else {
    header("location:../index.php");    
}
?>

<script>
    
    function cargarMenu(){
        let session = '<?php echo $_SESSION['admin']; ?>';
        var menu_admin = document.getElementById("menu_admin");
        var menu_user = document.getElementById("menu_user");

        if (session == 1) {
            menu_admin.style.display = "block";
            menu_user.style.display = "none";
        } else {
            menu_admin.style.display = "none";
            menu_user.style.display = "block";
        }
    }

</script>

