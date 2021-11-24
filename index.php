<?php
require_once "controllers/c_plantilla.php";
require_once "controllers/c_usuarios.php";
require_once "controllers/c_email.php";
require_once "controllers/c_catalogo.php";
require_once "controllers/c_submenu.php";

require_once "models/m_usuarios.php";
require_once "models/m_catalogo.php";
require_once "models/m_submenu.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();