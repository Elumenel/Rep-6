<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear Cuenta de Usuario</title>
  </head>

  <body>
    <script type="text/javascript">
      function showPw() {
        var input1 = document.getElementById("signupPassword");
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
          <h2><p class="title-line-1">creá un</p><p class=title-line-2>usuario</p></h2>
        </div>

        <div class="container alert-container">
          <div class="alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
            <strong>¡Felicitaciones!</strong><br>Acabás de crear tu cuenta de usuario.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <div class="alert alert-unavailable alert-dismissible fade show" id="alert-user" role="alert">
            <strong>Usuario no disponible</strong><br>Lamentablemente, ya existe un usuario registrado con ese nombre.<br>Por favor, elegí uno diferente.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>

        <div class="container form-container">
          <form action="" class="signup-form" method="POST">
            <div class="row gy-4">
              <div class="col-12">
                <input type="text" class="form-control" id="user" name="signupUser" placeholder="nombre de usuario" maxlength="10" required>
              </div>

              <div class="col-12">
                <input type="email" class="form-control" id="email" name="signupEmail" placeholder="dirección de email" required>
              </div>

              <div class="col-11">
                <input type="password" class="form-control" id="signupPassword" name="signupPassword" minlength="8" maxlength="15" placeholder="contraseña" required>
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

              <!-- ｡･:*:･ﾟ★,｡･:*:･ﾟ☆　INSTANCIAR LA CLASE DEL METODO ESTATICO ｡･:*:･ﾟ★,｡･:*:･ﾟ☆ -->
              <?php
                $registro = ControladorFormularios::ctrRegistro();

                if($registro == "ok") {
                  echo "<script>
                    if (window.history.replaceState){
                      window.history.replaceState(null,null, window.location.href);
                    }

                    document.getElementById('alert-success').style.visibility = 'visible';
                  </script>";
                }
              ?>

              <div class="col-12">
                <button type="submit" name="crear" class="btn btn-primary small-green-button">crear usuario</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
