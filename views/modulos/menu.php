
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">      
            <?php
            $datos = array(
                "tabla" => "usuarios,submenu,menu",
                "item" => "usuariodbk",
                "valor" => $_SESSION["usuariodbk"],
                "item2" => "menu.orden"
            );
            
            $respuesta = ControladorSubMenu::ctrListarMenu($datos);
            if (is_array($respuesta)) {
                foreach ($respuesta as $key => $value) {
                    echo'
                    <li class="treeview">                    
                        <a href="#">
                            <i class="' . $value["icono"] . '"></i>					
                            <span>' . $value["menu"] . '</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                        </a>
                        <ul class="treeview-menu">';                    
                        $datos = array(
                            "tabla" => "submenu",
                            "item" => "menudbk",
                            "valor" => $value["menudbk"],                            
                            "item2" => "orden"
                        );
                        $respuesta2 = ControladorSubMenu::ctrListarSubMenu($datos);
                        foreach ($respuesta2 as $key2 => $value2) {
                            echo'
                                <li>
                                    <a href="' . $value2["descripcion"] . '">
                                        <i class="' . $value2["icono"] . '"></i>
                                        <span>' . $value2["mostrar"] . '</span>
                                    </a>
                                </li> 
                            ';
                        }
                echo'        
                        </ul>
                    </li>
                    ';
                }                                                        
            }
            ?>
        </ul>
    </section>
</aside>