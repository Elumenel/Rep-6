<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TP Integrador</title>
  </head>
  <body>
    <main>
      <div class="container">
        <h2><p class="title-line-1">formulario de</p><p class=title-line-2>contacto</p></h2>
      </div>

      <div class="thank-you" id="thanks">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
          <strong>Mensaje enviado</strong><br>¡Gracias por comunicarte conmigo!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

      </div>

      <div class="container col-md-7 g-2 form-container"> <!--'g' is the gutter size, don't forget again, OMG! -->
        <p class="form-description">Si tenés alguna pregunta o un comentario que no quieras publicar abiertamente, o si simplemente tenés ganas de ponerte en contacto conmigo, <span id="expoint">¡</span>enviame un mensaje aquí!</p>
        <!--Falta 'action' (actualmente no hay conexión con la base de datos)-->
        <form class="row align-items-center g-2" action="" method="post">
          <div class="col-6">
            <input type="text" class="form-control form-control-sm" placeholder="nombre" name="sendNombre" required>
          </div>
          <div class="col-6">
            <input type="text" class="form-control form-control-sm" placeholder="apellido" name="sendApellido">
          </div>
          <div class="col-12">
            <input type="email" class="form-control form-control-sm" placeholder="correo" name="sendCorreo" required>
          </div>
          <div class="col-12">
            <textarea class="form-control form-control-sm" placeholder="mensaje" name="sendMensaje" maxlength="1000" style="height: 100px" required></textarea>
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
            $enviar = ControladorFormularios::ctrEnviarComentario();

            if($enviar == "ok") {
              echo "<script>
                document.getElementById('thanks').style.visibility = 'visible';
              </script>";
            }
          ?>
          <div class="col">
            <button class="btn btn-primary btn-lg small-green-button" type="submit" value="submit" name="submit">enviar</button>
          </div>
          <div class="col">
            <button type="button" class="btn btn-secondary btn-lg small-green-button" onclick="location.reload()">borrar</button>
          </div>
        </form>
      </div>
    </main>
  </body>
</html>
