<!DOCTYPE html>
<html lang="es">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SAAI Admin</title>
    <link rel="shortcut icon" href="images/favicon.png" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <script src="assets/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="assets/login/login.css">
    
    
    <link rel="stylesheet" type="text/css" href="assets/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="assets/alertifyjs/css/themes/default.css">
    <script type="text/javascript" src="assets/alertifyjs/alertify.js"></script>
    
</head>
    
<body>
    <div class="container">
        <center>
            <div class="col-md-4 col-md-offset-4 col-xs-offset-2 col-xs-8">
                <div class="card-body" style="background: #ffffff; color: gray; box-shadow: 0px 0px 5px 1px gray; margin-top: 30px; border-radius: 5px; border-top-color: #e9b002 !important; border-top-style: solid !important; border-top-width: 3px;">
                    <p class="text-center" style="margin: 20px 0 30px;"><img src="assets/images/logo_vert.png" alt = "" width="130" height="130"></p>
                    <h5 class="card-title text-center"><strong>Sistema Administrativo SAAI</strong></h5>
                    <form class="form-signin" id="frmlogin">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" id="inputEmail" name="inputEmail" class="form-control" placeholder="Usuario" required autofocus>
                                <label for="inputEmail"></label>
                            </div>
                            <div class="form-group">
                                <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
                                <label for="inputPassword"></label>
                            </div>
                        </div>
                        <span class="btn btn-lg btn-success btn-block text-uppercase" id="btningresar" type="submit">Ingresar</span><br>
                        <div class="custom-control custom-checkbox mb-3">
                        </div>
                    </form>
                </div>
            </div>
        </center>
      
    </div>
 
</body>
</html>



<script>
    
    $(document).ready(function(){
        $('#btningresar').click(function(){
            datos = $('#frmlogin').serialize();
            var usu = $('#inputEmail').val();
            var cla = $('#inputPassword').val();
            
            if(usu.length == 0 || cla.length ==0)
                {
                    alertify.error("Complete los campos");
                }
            else
            {
            $.ajax(
                {
               type:"POST",
               data:datos,
               url:"procesos/usuarios/login.php", 
                success:function(r)
                {
                    if(r==1)
                        {
                            window.location = "vistas/inicio.php";
                        }
                    else if(r==2)
                        {
                            window.location = "vistas/inicio.php";
                            //window.location = "vistas/inicio_user.php";
                        }
                    else if(r==0){
                            alertify.error("Error al ingresar los datos");
                        }
                    else
                        {
                            //alertify.error("Error al ingresar los datos");
                            alert(r);
                        }
                }
            });                
            }

        });
    });


</script>