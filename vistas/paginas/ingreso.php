<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
  </head>
  <body>
    <script type="text/javascript">
      function showPw() {
        var input1 = document.getElementById("pw-input");
        if (input1.type === "password") {
          input1.type = "text";
        }else {
          input1.type = "password";
        }
      }
    </script>

    <main>
      <div class="container login-container">
        <i class="fa-solid fa-user"></i>
        <div class="container title-container">
          <h2><p class="title-line-1">iniciá</p><p class=title-line-2>sesión</p></h2>
        </div>

        <div class="container alert-container">
          <div class="alert alert-fail alert-dismissible fade show" id="alert-credentials" role="alert">
            <strong><i class="fa-solid fa-triangle-exclamation"></i> Las credenciales ingresadas son inválidas</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>

        <div class="container form-container">
          <form action="" method="POST">
            <div class="row gy-4">
              <div class="col-12">
                <input type="text" class="form-control" name="loginUser" placeholder="usuario" required>
              </div>

              <div class="col-11">
                <input type="password" class="form-control" id="pw-input" name="loginPassword" placeholder="contraseña" required>
              </div>

              <div class="col-1">
                <i class="fa-solid fa-eye" id="showme" onclick="showPw()"></i>
              </div>

              <div class="col-12 captcha">
              	<div class="spinner">
              		<label>
              			<input type="checkbox" onclick="$(this).attr('disabled','disabled');" required>
              			<span class="checkmark"><span>&nbsp;</span></span>
              		</label>
              	</div>
              	<div class="not-robot">
              		<p>no soy un rob<i class="fa-solid fa-robot"></i>t</p>
              	</div>
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-primary small-green-button">Ingresar</button>
              </div>

              <div class="col-12">
                <a href="index.php?ruta=registro">crea una nueva cuenta de usuario</a>
              </div>
            </form>
          </div>

          <!-- ｡･:*:･ﾟ★,｡･:*:･ﾟ☆　INSTANCIAR LA CLASE DEL METODO ESTATICO ｡･:*:･ﾟ★,｡･:*:･ﾟ☆ -->
          <?php
            $ingreso = new ControladorFormularios();
            $ingreso -> ctrIngreso();
          ?>
        </div>
    </main>
  </body>
</html>
