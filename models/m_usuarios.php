<?php
require_once "conexion.php";
class ModeloUsuarios {
    /* =============================================
      MOSTRAR USUARIOS
      ============================================= */
    static public function mdlMostrarUsuario($datos) {
        if ($datos["item"] != null) {
            $stmt = Conexion::conectar()->prepare(" 
                                                    SELECT * FROM ".$datos["tabla"]." WHERE ".$datos["item"]." =:".$datos["item"]."
                                                  ");
            $stmt->bindParam(":".$datos["item"], $datos["valor"], PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM ".$datos["tabla"]."");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }  
    /* =============================================
      ULTIMO LOGIN DEL USUARIO
      ============================================= */
    static public function mdlUltimoLoginUsuario($datos) {
        $stmt = Conexion::conectar()->prepare("UPDATE ".$datos["tabla"]." SET ".$datos["item1"]." =:".$datos["item1"]." WHERE ".$datos["item2"]." =:".$datos["item2"]."");
        $stmt->bindParam(":".$datos["item1"], $datos["valor1"], PDO::PARAM_STR);
        $stmt->bindParam(":".$datos["item2"], $datos["valor2"], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    /* =============================================
      ACTUALIZAR CLAVE
      ============================================= */    
    static public function mdlActualizar($datos) {
        $stmt = Conexion::conectar()->prepare("UPDATE ".$datos["tabla"]." SET ".$datos["item1"]." =:".$datos["item1"]." WHERE ".$datos["item2"]." =:".$datos["item2"]."");
        $stmt->bindParam(":".$datos["item1"], $datos["valor1"], PDO::PARAM_STR);
        $stmt->bindParam(":".$datos["item2"], $datos["valor2"], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    /* =============================================
      INTENTO FALLIDO DE LOGIN
      ============================================= */
    static public function mdlIntentoFallido($datos) {
        $stmt = Conexion::conectar()->prepare("UPDATE ".$datos["tabla"]." SET intento=intento+1 WHERE ".$datos["item"]." =:".$datos["item"]."");
        $stmt->bindParam(":".$datos["item"], $datos["valor"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }    
}
