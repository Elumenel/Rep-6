<?php
class ControladorTienda {
  // ｡･:*:･ﾟ★,｡･:*:･ﾟ☆　SELECCIONAR PRODUCTOS ｡･:*:･ﾟ★,｡･:*:･ﾟ☆ //
  static public function ctrSeleccionarProductos($item, $valor) {
    $tabla = "productos";
    $respuesta = ModeloTienda::mdlSeleccionarProductos($tabla, $item, $valor);
    return $respuesta;
  }
}
