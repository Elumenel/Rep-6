<?php
require_once "conexion.php";

class ModeloTienda {
  // ｡･:*:･ﾟ★,｡･:*:･ﾟ☆　SELECCIONAR PRODUCTOS ｡･:*:･ﾟ★,｡･:*:･ﾟ☆ //
  static public function mdlSeleccionarProductos($tabla, $item, $valor){
    if ($item == null && $valor == null) {
      /*︵‿︵‿୨   select all table rows   ୧‿︵‿︵*/
      $stmt = Conexion::conectar() -> prepare("SELECT *, DATE_FORMAT(date_added, '%d/%m/%Y') AS date_added FROM $tabla ORDER BY id_producto DESC");
      $stmt -> execute();
      return $stmt -> fetchAll();
    }else {
      /*︵‿︵‿୨   select specific row that matches parameters passed   ୧‿︵‿︵*/
      $stmt = Conexion::conectar() -> prepare("SELECT *, DATE_FORMAT(date_added, '%d/%m/%Y') AS date_added FROM $tabla WHERE $item = :$item ORDER BY id_producto DESC");
      $stmt -> bindParam(":" . $item, $valor, PDO::PARAM_STR);

      $stmt -> execute();
      return $stmt -> fetch();
    }
    $stmt -> closeCursor();
    $stmt = null;
  }
}
