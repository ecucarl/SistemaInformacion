<?php
require_once "../controllers/c_usuarios.php";
require_once "../models/m_usuarios.php";

class AjaxUsuarios{    
    /*=============================================
    RECUPERAR CLAVE POR EMAIL
    =============================================*/	
    public $email;
    public function ajaxRecuperarPorEmail(){
        $datos = array(
            "tabla" => "usuarios",
            "item" => "email",
            "valor" => $this->email
        );        
        $respuesta = ControladorUsuarios::ctrRecuperarClave($datos);        
        echo json_encode($respuesta);
    }
    /*=============================================
    RECUPERAR CLAVE POR NICKNAME
    =============================================*/	
    public $nickname;
    public function ajaxRecuperarPorNickname(){
        $datos = array(
            "tabla" => "usuarios",
            "item" => "nickname",
            "valor" => $this->nickname
        );        
        $respuesta = ControladorUsuarios::ctrRecuperarClave($datos);        
        echo json_encode($respuesta);
    }
}
/*=============================================
RECUPERAR CLAVE POR EMAIL
=============================================*/
//if(isset($_POST["email"])){
if($_POST["email"]!=""){
    $recupera = new AjaxUsuarios();
    $recupera -> email = $_POST["email"];
    $recupera ->ajaxRecuperarPorEmail();
}
/*=============================================
RECUPERAR CLAVE POR NICKNAME
=============================================*/
//if(isset($_POST["username"])){
if($_POST["username"]!=""){
    $recupera = new AjaxUsuarios();
    $recupera -> nickname = $_POST["username"];
    $recupera ->ajaxRecuperarPorNickname();
}