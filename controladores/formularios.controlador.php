<?php
class ControladorFormularios {
  // ｡･:*:･ﾟ★,｡･:*:･ﾟ☆　INSERTAR REGISTRO USUARIO ｡･:*:･ﾟ★,｡･:*:･ﾟ☆ //
  static public function ctrRegistro() {
    if (isset($_POST["signupUser"])) {
      $tabla = "clientes";

      $datos = array(
        "email" => $_POST["signupEmail"],
        "user" => $_POST["signupUser"],
        "password" => $_POST["signupPassword"]
      );
      $respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);
      return $respuesta;
    }
  }


  // ｡･:*:･ﾟ★,｡･:*:･ﾟ☆　SELECCIONAR REGISTROS ｡･:*:･ﾟ★,｡･:*:･ﾟ☆ //
  static public function ctrSeleccionarRegistros($item, $valor) {
    $tabla = "clientes";
    $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
    return $respuesta;
  }


  // ｡･:*:･ﾟ★,｡･:*:･ﾟ☆　INGRESO / LOGIN USUARIO ｡･:*:･ﾟ★,｡･:*:･ﾟ☆ //
  public function ctrIngreso() {
    if (isset($_POST['loginUser'])) {
      $tabla = "clientes";
      $item = "user";
      $valor = $_POST['loginUser'];

      $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
      if ($respuesta['user'] == $_POST['loginUser'] && $respuesta['pw'] == $_POST['loginPassword']) {
        //variable obsoleta! la variable 'cliente' puede cumplir la función de 'validarIngreso', pero antes de eliminarla tengo que rastrear dónde la usé
        $_SESSION['validarIngreso'] = "ok";
        $_SESSION['cliente'] = $respuesta['id_cliente'];

        echo "<script>
          if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
          }
          window.location = 'index.php?ruta=inicio';
          </script>";
      }else {
        echo "<script>
          if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
          }
          </script>";
        echo "<script>
          document.getElementById('alert-credentials').style.visibility = 'visible';
        </script>";
      }
    }
  }


  // ｡･:*:･ﾟ★,｡･:*:･ﾟ☆　ACTUALIZAR REGISTROS USUARIO ｡･:*:･ﾟ★,｡･:*:･ﾟ☆ //
  static public function ctrActualizarRegistro() {
    if (isset($_POST["updateUser"])) {
      if ($_POST["updatePassword"] != "") {
        $password = $_POST["updatePassword"];
      }else {
        $password = $_POST["currentPassword"];
      }

      $tabla = "clientes";
      $datos = array(
        "id_cliente" => $_POST["id_cliente"],
        "nombre" => $_POST['updateNombre'],
        "apellido" => $_POST['updateApellido'],
        "dob" => $_POST['updateDob'],
        "dni" => $_POST['updateDni'],
        "email" => $_POST['updateEmail'],
        "tel_area" => $_POST['updateArea'],
        "tel_fijo" => $_POST['updateFijo'],
        "tel_cel" => $_POST['updateCel'],
        "dom_calle" => $_POST['updateCalle'],
        "dom_altura" => $_POST['updateAltura'],
        "dom_piso" => $_POST['updatePiso'],
        "dom_dpto" => $_POST['updateDpto'],
        "ciudad" => $_POST['updateCiudad'],
        "provincia" => $_POST['updateProvincia'],
        "cp" => $_POST['updateCp'],
        "user" => $_POST["updateUser"],
        "pw" => $password,
      );

      $respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);

      if ($respuesta == "ok") {
        echo "<script>
          if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
          }
          window.location = 'index.php?ruta=usuario';
        </script>";
      }
    }
  }


  // ｡･:*:･ﾟ★,｡･:*:･ﾟ☆　ELIMINAR REGISTROS USUARIO ｡･:*:･ﾟ★,｡･:*:･ﾟ☆ //
  public function ctrEliminarRegistro() {
    if (isset($_POST["deleteUser"])) {
      $tabla = "clientes";
      $valor = $_POST["deleteUser"];

      $respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);

      if ($respuesta == "ok") {
        session_destroy();
        echo "<script>
          if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
          }
          window.location = 'index.php?ruta=inicio';
          alert('Su cuenta de usuario ha sido eliminada.');
        </script>";
      }
    }
  }


  // ｡･:*:･ﾟ★,｡･:*:･ﾟ☆　ENVIAR COMENTARIO POR EMAIL ｡･:*:･ﾟ★,｡･:*:･ﾟ☆ //
  static public function ctrEnviarComentario() {
    if (isset($_POST['sendCorreo'])) {
      $destinatario = "c4st3ll4r1n@gmail.com";
      $asunto = "Nuevo contacto desde tu sitio web";
      $mensaje = "Nombre: ".$_POST['sendNombre']." ".$_POST['sendApellido']."\nCorreo: ".$_POST['sendCorreo']."\nComentario: ".$_POST['sendMensaje'];

      $respuesta = ModeloFormularios::mdlEnviarComentario($destinatario, $asunto, $mensaje);
      return $respuesta;
    }
  }
}
