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
      <div class="container" id="comment-title">
        <h2><p class="title-line-1">dejame un</p><p class=title-line-2>comentario</p></h2>
      </div>

      <!--Start Form-->
      <div class="container col-md-7 g-2 form-container"> <!--'g' is the gutter size, don't forget again, OMG! -->
        <p class="form-description"><span id="expoint">¡</span>Atención! Este formulario es para publicar un comentario en mi página de inicio.<br>Si querés comunicarte personalmente conmigo, podés hacerlo <a href="pag_contacto.php">aquí</a>.</p>
        <!--Falta 'action' (actualmente no hay conexión con la base de datos)-->
        <form class="row g-2" action="" method="POST">
          <div class="col-6">
            <input type="text" class="form-control form-control-sm" placeholder="nombre" name="nombre" required>
          </div>
          <div class="col-6">
            <input type="email" class="form-control form-control-sm" placeholder="correo" name="correo">
          </div>
          <div class="col-12">
            <textarea class="form-control form-control-sm" placeholder="comentario" name="comentario" maxlength="300" required></textarea>
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
          <div class="col">
            <button class="btn btn-primary btn-lg small-green-button" type="submit" value="submit" name="submit" onclick="alert('No hay conexión a base de datos!')">enviar</button>
          </div>
          <div class="col">
            <button type="button" class="btn btn-secondary btn-lg small-green-button" onclick="location.reload()">borrar</button>
          </div>
        </form>
      </div>
      <!--End Form-->
    </main>
  </body>
</html>
