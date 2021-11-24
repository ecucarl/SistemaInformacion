<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sistema de Información PHP</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="icon" href="views/img/plantilla/favicons.png">
        <!--=====================================
        PLUGINS DE CSS
        ======================================-->
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="views/Bootstrap/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="views/Bootstrap/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="views/Bootstrap/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="views/AdminLTE/css/AdminLTE.css">
        <!-- AdminLTE Skins -->
        <link rel="stylesheet" href="views/AdminLTE/css/skins/_all-skins.min.css">
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <!-- DataTables -->
        <link rel="stylesheet" href="views/Bootstrap/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="views/Bootstrap/datatables.net-bs/css/responsive.bootstrap.min.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="../plugin/iCheck/all.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="views/Bootstrap/bootstrap-daterangepicker/daterangepicker.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="views/Bootstrap/morris.js/morris.css">
        <!--=====================================
        PLUGINS DE JAVASCRIPT
        ======================================-->
        <!-- jQuery 3 -->
        <script src="views/Bootstrap/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="views/Bootstrap/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="views/Bootstrap/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="views/AdminLTE/js/adminlte.min.js"></script>
        <!-- DataTables -->
        <script src="views/Bootstrap/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="views/Bootstrap/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="views/Bootstrap/datatables.net-bs/js/dataTables.responsive.min.js"></script>
        <script src="views/Bootstrap/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
        <!-- SweetAlert 2 -->
        <script src="../plugin/sweetalert2/sweetalert2.all.js"></script>
        <!-- iCheck 1.0.1 -->
        <script src="../plugin/iCheck/icheck.min.js"></script>
        <!-- InputMask -->
        <script src="../plugin/input-mask/jquery.inputmask.js"></script>
        <script src="../plugin/input-mask/jquery.inputmask.date.extensions.js"></script>
        <script src="../plugin/input-mask/jquery.inputmask.extensions.js"></script>
        <!-- jQuery Number -->
        <script src="../plugin/jqueryNumber/jquerynumber.min.js"></script>
        <!-- daterangepicker -->
        <script src="views/Bootstrap/moment/min/moment.min.js"></script>
        <script src="views/Bootstrap/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- Morris.js charts -->
        <script src="views/Bootstrap/raphael/raphael.min.js"></script>
        <script src="views/Bootstrap/morris.js/morris.min.js"></script>
        <!-- ChartJS -->
        <script src="views/Bootstrap/chart.js/Chart.js"></script>
    </head>
<!--=====================================
CUERPO DOCUMENTO
======================================-->
    <body class="hold-transition skin-blue sidebar-mini login-page">
        <?php
        if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){
            echo '<div class="wrapper">';
            /*=============================================
            CABEZOTE
            =============================================*/
            include "modulos/cabezote.php";
            /*=============================================
            MENU
            =============================================*/
            include "modulos/menu.php";
            /*=============================================
            CONTENIDO
            =============================================*/           
            if(isset($_GET["ruta"])){
                if($_GET["ruta"] == "inicio" ||                  
                   $_GET["ruta"] == "salir"){
                    include "modulos/".$_GET["ruta"].".php";
                }else{
                    include "modulos/404.php";
                }
            }else{
                include "modulos/inicio.php";
            }
            
            /*=============================================
            FOOTER
            =============================================*/
            include "modulos/footer.php";
            echo '</div>';
        }else{
            include "modulos/login.php";
        }
        ?>        
        <script src="views/js/plantilla.js"></script>
        <script src="https://www.google.com/recaptcha/api.js?render=6Lfpc1UdAAAAABX2XPZrlEH8w8mFLcGzovVyBAkr"></script>

	<script>
		$(document).ready(function() {
			$('#sign').click(function() {
				grecaptcha.ready(function() {
					grecaptcha.execute('6Lfpc1UdAAAAABX2XPZrlEH8w8mFLcGzovVyBAkr', {
						action: 'validate'
						}).then(function(token) {
						$('#form-login').prepend('<input type="hidden" name="token" value="' + token + '" >');
						$('#form-login').prepend('<input type="hidden" name="action" value="validate" >');
						$('#form-login').submit();
					});
				});
			});
		});
	</script>    
    </body>
</html>


