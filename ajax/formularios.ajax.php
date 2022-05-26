<?php
require_once "../controladores/formularios.controlador.php";
require_once "../modelos/formularios.modelo.php";

class AjaxFormularios {
	// ｡･:*:･ﾟ★,｡･:*:･ﾟ☆　VALIDACIÓN USUARIO EXISTENTE ｡･:*:･ﾟ★,｡･:*:･ﾟ☆ //
	public $validarUser;

	public function ajaxValidarUser() {
		$item = "user";
		$valor = $this -> validarUser;

		$respuesta = ControladorFormularios::ctrSeleccionarRegistros($item, $valor);

		echo json_encode($respuesta);
	}
}

// ｡･:*:･ﾟ★,｡･:*:･ﾟ☆　OBJETO AJAX (recibe variable POST) ｡･:*:･ﾟ★,｡･:*:･ﾟ☆ //
if (isset($_POST["validarUser"])) {
	$valUser = new AjaxFormularios();
	$valUser -> validarUser = $_POST["validarUser"];
	$valUser -> ajaxValidarUser();
}
