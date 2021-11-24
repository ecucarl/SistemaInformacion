<!DOCTYPE html>
<html>
    <head>
        <title>Sistema de Información PHP</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../views/Bootstrap/jquery/dist/jquery.min.js"></script>
        <script src="../views/Bootstrap/bootbox.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="../views/Bootstrap/bootstrap/dist/css/bootstrap.min.css">        
    </head>
    <body>
        <div class="box">        
            <!-- Main content -->
            <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                <div class="col-lg-12">
                    <h1>
                        <img src="../views/img/plantilla/php-seeklogo.com.svg" width="60" height="60" class="d-inline-block align-top" alt="">
                        Sistema de Información en PHP</h1>
                </div>
            </nav>

            <div class="row">
                <h1  style="text-align: center">Recuperar Credenciales de Acceso</h1>
            </div>
            <!-- /.box-header -->
            <div class="container">
                <p>Para restablecer su contraseña, envíe su nombre de usuario o su dirección de correo electrónico. 
                    Si podemos encontrarlo en la base de datos, se enviará un email con instrucciones para poder modificar la clave de acceso.</p>
            </div> 
            <!-- centro --> 
            <div  class="container">        
                <form action="../ajax/usuarios.ajax.php" id="formulario" method="POST" >

                    <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-8" style="text-align: center;">
                        <div id="error"></div>
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h3>Buscar por dirección de correo electrónico:</h3> 
                        <br>                        
                        <input type="email" class="form-control" name="email" id="email" maxlength="50" placeholder="Email">
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button class="btn btn-primary" type="submit" id="btnBuscar">Buscar</button>
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h3>Buscar por nombre de usuario:</h3> 
                        <br>
                        <input type="text" class="form-control" name="username" id="username" maxlength="20" placeholder="Usuario">
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button class="btn btn-primary" type="submit" id="btnBuscar">Buscar</button> 
                        <br>
                        <br>
                    </div>
                </form>
            </div>
            <!--Fin centro -->
        </div><!-- /.box -->
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-primary" style="height: 100px">
            <br>
            <b>Usted aún no se ha identificado</b>
            <br>
            <a href="login.php" style="color: #ffffff;">Página Principal</a>
        </div>

        <script src="../public/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>