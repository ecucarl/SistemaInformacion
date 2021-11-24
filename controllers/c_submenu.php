<?php
class ControladorSubMenu{
    /*=============================================
    LISTAR ACCESOS POR USUARIO
    =============================================*/
    static public function ctrListarMenu($datos){
        $respuesta = ModeloSubMenu::mdlListarMenu($datos);
        return $respuesta;
    }
    /*=============================================
    LISTAR SUBACCESOS 
    =============================================*/
    static public function ctrListarSubMenu($datos){
        $respuesta = ModeloSubMenu::mdlListarSubMenu($datos);
        return $respuesta;
    }    
    
    
}
    