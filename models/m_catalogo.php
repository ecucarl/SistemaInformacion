<?php
require_once "conexion.php";
class ModeloCatalogo{
    /*=============================================
    LISTAR CATALOGO POR CODIGO Y ESTADO
    =============================================*/
    static public function mdlListarCatalogoCodigoEstado($datos){
    $stmt = Conexion::conectar()->prepare(
        "SELECT * FROM ".$datos["tabla"]." WHERE ".$datos["item1"]." =:".$datos["item1"]." and ".$datos["item2"]." =:".$datos["item2"]." order by ".$datos["item3"].""
    );            
    $stmt -> bindParam(":".$datos["item1"], $datos["valor1"], PDO::PARAM_STR);
    $stmt -> bindParam(":".$datos["item2"], $datos["valor2"], PDO::PARAM_STR);
    $stmt -> execute();
    return $stmt -> fetchAll();                        
    $stmt -> close();
    $stmt = null;
    }
}    