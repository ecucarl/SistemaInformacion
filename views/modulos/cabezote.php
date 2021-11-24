<header class="main-header">
    <!--=====================================
    LOGOTIPO
    ======================================-->
    <a href="inicio" class="logo">
        <!-- logo mini -->
        <span class="logo-mini">
            <img src="views/img/plantilla/favicons.png" class="img-responsive" style="padding:10px">
        </span>
        <!-- logo normal -->
        <span class="logo-lg">
            <img src="views/img/plantilla/favicons.png" class="img-responsive" style="padding:10px 40px">
        </span>
    </a>
    <!--=====================================
    BARRA DE NAVEGACIÓN
    ======================================-->
    <nav class="navbar navbar-static-top" role="navigation">		
        <!-- Botón de navegación -->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- perfil de usuario -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="views/img/usuarios/default/anonymous.png" class="user-image">                        
                        <span class="hidden-xs"><?php  echo $_SESSION["nickname"] ?></span>
                    </a>
                    <!-- Dropdown-toggle -->
                    <ul class="dropdown-menu">
                        <li class="user-body">
                            <div class="pull-right">
                                <a href="salir" class="btn btn-default btn-flat">Salir</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
 </header>

