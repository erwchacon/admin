<?php
require 'header.php';

if(isset($_SESSION['usuario']))
{
date_default_timezone_set("America/Lima");

?>

<style type="text/css">
	*{margin: 0; padding: 0;}
	.caja{
	  display: flex;
	  flex-flow: column wrap;
	  justify-content: center;
	  align-items: center;
	  background: #333944;
	}
	.box{
	  width: 450px;
	  height: 300px;
	  background: #CCC;
	  overflow: hidden;
	}

	.box img{
	  width: 100%;
	  height: auto;
	}
	@supports(object-fit: cover){
	    .box img{
	      height: 100%;
	      object-fit: cover;
	      object-position: center center;
	    }
	}
</style>

<div class="content-page">
	
    <!-- Start content -->
    <div class="content">
        
        <div class="container-fluid">

        	<div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left" style="color: #ffffff"><?php echo $_SESSION['admin'] ?></h1>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        	<center>
        		<div class="row">
        			<div class="col-md-3 col-lg-3">
	                    <span hidden>.</span>
	                </div>
	                <br>
	                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
	                    <center>
	                    	<div style="width:100%; height:100%;">
	                    		<h4 style="color: #909090; font-family: Tahoma;">Bienvenido al Sistema Administrativo SAAI</h4>
	                    		<br><br>
	                    		<img src="../assets/images/logo_horizon.png" width="420" height="160" style="filter: opacity(60%);">      
	                    	</div>
	                    </center>
	                </div>
	            </div>
	        </center>
        </div>
    </div>
</div>


<?php
require 'footer.php';
?>

<script>
	$(document).ready(function() {	
	} );		
</script>
	
<?php
}
else {
	header("location:../index.php");  
}

?>