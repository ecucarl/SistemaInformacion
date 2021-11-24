<?php
class ControladorCatalogo {
    /*=============================================
    LISTAR CATALOGO POR CODIGO Y ESTADO
    =============================================*/
    static public function ctrListarCatalogoCodigoEstado($datos){
        $respuesta = ModeloCatalogo::mdlListarCatalogoCodigoEstado($datos);
        return $respuesta;
    }
}
    