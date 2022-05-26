<?php
require_once "controladores/plantilla.controlador.php";
require_once "controladores/formularios.controlador.php";
require_once "controladores/tienda.controlador.php";

require_once "modelos/formularios.modelo.php";
require_once "modelos/tienda.modelo.php";

// ｡･:*:･ﾟ★,｡･:*:･ﾟ☆　instanciar objetos ｡･:*:･ﾟ★,｡･:*:･ﾟ☆ //
$plantilla = new ControladorPlantilla();

// ｡･:*:･ﾟ★,｡･:*:･ﾟ☆　ejecutar el método ｡･:*:･ﾟ★,｡･:*:･ﾟ☆ //
$plantilla -> ctrGetPlantilla();
