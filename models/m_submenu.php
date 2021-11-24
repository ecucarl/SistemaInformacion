<?php
require_once "conexion.php";
class ModeloSubMenu{
    /*=============================================
    LISTAR CATALOGO POR CODIGO Y ESTADO
    =============================================*/
    static public function mdlListarMenu($datos){
    $stmt = Conexion::conectar()->prepare(
        "SELECT menu.menudbk as menudbk, menu.Descripcion as menu, submenu.descripcion as submenu, submenu.icono as icono, submenu.mostrar as mostrar 
        FROM ".$datos["tabla"]."
        WHERE ".$datos["item"]." =:".$datos["item"]." and usuarios.perfildbk = submenu.perfildbk and submenu.menudbk = menu.menudbk group by menu order by ".$datos["item2"].""
    );            
    $stmt -> bindParam(":".$datos["item"], $datos["valor"], PDO::PARAM_INT);
    $stmt -> execute();
    return $stmt -> fetchAll();                        
    $stmt -> close();
    $stmt = null;
    }
    /*=============================================
    LISTAR SUBACCESO POR USUARIO
    =============================================*/
    static public function mdlListarSubMenu($datos){
    $stmt = Conexion::conectar()->prepare(
        "SELECT * FROM ".$datos["tabla"]." WHERE ".$datos["item"]." =:".$datos["item"]." order by ".$datos["item2"].""
    );            
    $stmt -> bindParam(":".$datos["item"], $datos["valor"], PDO::PARAM_INT);
    $stmt -> execute();
    return $stmt -> fetchAll();                        
    $stmt -> close();
    $stmt = null;
    }    
}    