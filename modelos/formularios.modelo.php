<?php
require_once "conexion.php";

class ModeloFormularios {
  // ｡･:*:･ﾟ★,｡･:*:･ﾟ☆　INSERTAR REGISTRO ｡･:*:･ﾟ★,｡･:*:･ﾟ☆ //
  static public function mdlRegistro($tabla, $datos) {
    $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla (email, user, pw) VALUES (:email, :user, :password)");

    $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
    $stmt -> bindParam(":user", $datos["user"], PDO::PARAM_STR);
    $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);

    if ($stmt -> execute()) {
      return "ok";
    }else {
      print_r(Conexion::conectar() -> errorInfo());
    }
    $stmt -> closeCursor();
    $stmt = null;
  }


  // ｡･:*:･ﾟ★,｡･:*:･ﾟ☆　SELECCIONAR REGISTROS ｡･:*:･ﾟ★,｡･:*:･ﾟ☆ //
  static public function mdlSeleccionarRegistros($tabla, $item, $valor){
    if ($item == null && $valor == null) {
      /*︵‿︵‿୨   select all table rows   ୧‿︵‿︵*/
      $stmt = Conexion::conectar() -> prepare("SELECT *, DATE_FORMAT(date_added, '%d/%m/%Y') AS date_added FROM $tabla ORDER BY id_cliente DESC");
      $stmt -> execute();
      return $stmt -> fetchAll();
    }else {
      /*︵‿︵‿୨   select specific row that matches parameters passed   ୧‿︵‿︵*/
      $stmt = Conexion::conectar() -> prepare("SELECT *, DATE_FORMAT(date_added, '%d/%m/%Y') AS date_added FROM $tabla WHERE $item = :$item ORDER BY id_cliente DESC");
      $stmt -> bindParam(":" . $item, $valor, PDO::PARAM_STR);

      $stmt -> execute();
      return $stmt -> fetch();
    }
    $stmt -> closeCursor();
    $stmt = null;
  }


  // ｡･:*:･ﾟ★,｡･:*:･ﾟ☆　ACTUALIZAR REGISTROS ｡･:*:･ﾟ★,｡･:*:･ﾟ☆ //
  static public function mdlActualizarRegistro($tabla, $datos) {
    $stmt = Conexion::conectar() -> prepare("UPDATE $tabla SET nombre=:nombre, apellido=:apellido, dob=:dob, dni=:dni, email=:email, tel_area=:tel_area, tel_fijo=:tel_fijo, tel_cel=:tel_cel, dom_calle=:dom_calle, dom_altura=:dom_altura, dom_piso=:dom_piso, dom_dpto=:dom_dpto, ciudad=:ciudad, provincia=:provincia, cp=:cp, user=:user, pw=:pw WHERE id_cliente=:id_cliente");

      $stmt -> bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
      $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
      $stmt -> bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
      $stmt -> bindParam(":dob", $datos["dob"], PDO::PARAM_STR);
      $stmt -> bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
      $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
      $stmt -> bindParam(":tel_area", $datos["tel_area"], PDO::PARAM_INT);
      $stmt -> bindParam(":tel_fijo", $datos["tel_fijo"], PDO::PARAM_INT);
      $stmt -> bindParam(":tel_cel", $datos["tel_cel"], PDO::PARAM_INT);
      $stmt -> bindParam(":dom_calle", $datos["dom_calle"], PDO::PARAM_STR);
      $stmt -> bindParam(":dom_altura", $datos["dom_altura"], PDO::PARAM_STR);
      $stmt -> bindParam(":dom_piso", $datos["dom_piso"], PDO::PARAM_STR);
      $stmt -> bindParam(":dom_dpto", $datos["dom_dpto"], PDO::PARAM_STR);
      $stmt -> bindParam(":ciudad", $datos["ciudad"], PDO::PARAM_STR);
      $stmt -> bindParam(":provincia", $datos["provincia"], PDO::PARAM_STR);
      $stmt -> bindParam(":cp", $datos["cp"], PDO::PARAM_STR);
      $stmt -> bindParam(":user", $datos["user"], PDO::PARAM_STR);
      $stmt -> bindParam(":pw", $datos["pw"], PDO::PARAM_STR);

    if ($stmt -> execute()) {
      return "ok";
    }else {
      print_r(Conexion::conectar() -> errorInfo());
    }

    $stmt -> closeCursor();
    $stmt = null;
  }


  // ｡･:*:･ﾟ★,｡･:*:･ﾟ☆　ELIMINAR REGISTROS ｡･:*:･ﾟ★,｡･:*:･ﾟ☆ //
  static public function mdlEliminarRegistro($tabla, $valor) {
		$stmt = Conexion::conectar() -> prepare("DELETE FROM $tabla WHERE id_cliente = :id");

		$stmt -> bindParam(":id", $valor, PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else {
			print_r(Conexion::conectar() -> errorInfo());
		}

		$stmt->closeCursor();
		$stmt = null;
	}


  // ｡･:*:･ﾟ★,｡･:*:･ﾟ☆　ENVIAR COMENTARIO POR EMAIL ｡･:*:･ﾟ★,｡･:*:･ﾟ☆ //
  static public function mdlEnviarComentario($destinatario, $asunto, $mensaje) {
    if (mail($destinatario, $asunto, $mensaje)) {
      return "ok";
    }else {
      return "failed";
    }
  }
}
