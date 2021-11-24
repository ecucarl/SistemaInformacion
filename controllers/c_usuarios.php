<?php
require_once "c_email.php";
class ControladorUsuarios {
    /* =============================================
      INGRESO DE USUARIO
      ============================================= */
    static public function ctrIngresoUsuario() {
        if (isset($_POST["ingNickname"])) {
            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingNickname"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingClave"])) {
                //$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                $encriptar = $_POST["ingClave"];
                $datos = array("tabla" => "usuarios",
                    "item" => "nickname",
                    "valor" => $_POST["ingNickname"]);
                $respuesta = ModeloUsuarios::MdlMostrarUsuario($datos);
                if (is_array($respuesta) && ($respuesta["nickname"] == $_POST["ingNickname"]) && ($respuesta["clave"] == $encriptar) && ($respuesta["intento"] < 4)) {
                    if ($respuesta["estado"] == 'ACTIVO'){
                        define('CLAVE', '6LfGSFAdAAAAAEr0XRmbTWN22H27h7HPAEQ4jvl_');
                        $_SESSION["iniciarSesion"] = "ok";
                        $_SESSION["usuariodbk"] = $respuesta["usuariodbk"];
                        $_SESSION["email"] = $respuesta["email"];
                        $_SESSION["nickname"] = $respuesta["nickname"];
                        /* =============================================
                          REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
                          ============================================= */
                        date_default_timezone_set('America/Guayaquil');
                        $fecha = date('Y-m-d');
                        $hora = date('H:i:s');
                        $fechaActual = $fecha . ' ' . $hora;
                        $datos = array("tabla" => "usuarios",
                            "item1" => "ultimo_login",
                            "valor1" => $fechaActual,
                            "item2" => "usuariodbk",
                            "valor2" => $respuesta["usuariodbk"]
                        );
                        $ultimoLogin = ModeloUsuarios::mdlUltimoLoginUsuario($datos);
                        
                        if ($ultimoLogin == "ok") {
                            $datos = array(
                                "tabla" => "usuarios",
                                "item1" => "intento",
                                "valor1" => 0,
                                "item2" => "usuariodbk",
                                "valor2" => $respuesta["usuariodbk"]
                            );                   
                            $respuesta = ModeloUsuarios::mdlActualizar($datos);
                            echo '
                                <script>
                                    window.location = "inicio";
                                </script>';
                        }
                    } else {
                        echo '
                            <br>
                            <div class="alert alert-danger">El usuario se encuentra inactivo</div>';
                    }
                } else {                    
                    $respuesta = ModeloUsuarios::mdlIntentoFallido($datos);
                    $respuesta = ModeloUsuarios::MdlMostrarUsuario($datos);
                    if(is_array($respuesta)){                        
                        if($respuesta["intento"]<3){                            
                            echo '<br><div class="alert alert-danger">El usuario o la contraseña son incorrectas '.$respuesta["intento"].' de 3 Intentos</div>';
                        }else{
                            echo '<br><div class="alert alert-danger">Su usuario ha sido bloqueado por intentos concurrentes de acceso fallido</div>';
                            $datos = array(
                                "tabla" => "usuarios",
                                "item1" => "estado",
                                "valor1" => "INACTIVO",
                                "item2" => "usuariodbk",
                                "valor2" => $respuesta["usuariodbk"]
                            );                   
                            $respuesta = ModeloUsuarios::mdlActualizar($datos);
                        }                                                
                    }else{
                        echo '<br><div class="alert alert-danger">El usuario o la contraseña son incorrectas</div>';                        
                        
                    }
                }
            }
        }
    }
    /* =============================================
      RESTABLECER CLAVE DE USUARIO
    ============================================= */
    static public function ctrRecuperarClave($datos) {
        //if (((isset($datos["valor"]))&&(($datos["item"])=="email")) ||((isset($datos["valor"]))&&(($datos["item"])=="nickname"))){
        if ((($datos["valor"]!="")&&(($datos["item"])=="email")) ||(($datos["valor"]!="")&&(($datos["item"])=="nickname"))){
            $respuesta = ModeloUsuarios::mdlMostrarUsuario($datos);
            if(empty($respuesta['usuariodbk'])){
                echo'
                    <script type="text/javascript">
                        alert("Usuario no encontrado");
                        window.history.back(-1);                        
                    </script>';           
            } else {
                $idusuario = $respuesta['usuariodbk'];
                $username = $respuesta['nickname']; 
                $email = $respuesta['email'];
                $password = substr(md5(microtime()), 1, 10);
                //Encriptar contraseña
                //include '../modelos/Clave.php';
                //$clavehash = Clave::encriptar($password);
                $datos = array("tabla" => "usuarios",
                            "item1" => "clave",
                            "item2" => "usuariodbk",
                            "valor1" => $password,
                            "valor2" => $idusuario,
                            "valor3" => $username,
                            "valor4" => $email
                        );
                $respuesta = ModeloUsuarios::mdlActualizar($datos);                               
                $mail = ControladorEmail::ctrRestablecerClaveEmail($datos);                
                echo'<script type="text/javascript">
                        alert("Contraseña Actualizada. Nueva contraseña enviada a su correo electrónico");
                        window.history.back(-1);
                        </script>';
            }
        }
    }
}
