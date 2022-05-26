<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <!--  meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TP Integrador</title>
  </head>
  <body>
    <main>
      <?php
        if (isset($_SESSION['cliente'])) {
          $item = "id_cliente";
          $valor = $_SESSION['cliente'];

          $usuario = ControladorFormularios::ctrSeleccionarRegistros($item, $valor);
        }else {
          echo '<script>window.location = "index.php?ruta=ingreso";</script>';
        }
      ?>

      <div class="container main-container">
        <div class="table-header row justify-content-center">
          <div class="container title-container">
            <h2><p class="title-line-1">editá tus</p><p class=title-line-2>datos</p></h2>
          </div>
          <p class="form-description">¡Ayudame a conocerte mejor! Completá tu información en cada una de las siguientes pestañas.</p>
        </div>

        <!-- ｡･:*:･ﾟ★,｡･:*:･ﾟ☆　UPDATE RECORD FORM ｡･:*:･ﾟ★,｡･:*:･ﾟ☆ -->
        <div class="container form-container">
          <form class="row g-4" action="" method="POST">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tab-personal" data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab" aria-controls="home" aria-selected="true">información personal</button>
              </li>

              <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-contacto" data-bs-toggle="tab" data-bs-target="#contacto" type="button" role="tab" aria-controls="profile" aria-selected="false">medios de contacto</button>
              </li>

              <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-domicilio" data-bs-toggle="tab" data-bs-target="#domicilio" type="button" role="tab" aria-controls="contact" aria-selected="false">domicilio de entrega</button>
              </li>

              <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-login" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="contact" aria-selected="false">login</button>
              </li>
            </ul>

            <div class="tab-content mh-100" id="myTabContent">
              <!--︵‿︵‿୨   Tab #1 - Content  ୧‿︵‿︵-->
              <div class="tab-pane fade show active py-3" id="personal" role="tabpanel" aria-labelledby="tab-personal">
                <div class="row g-4">
                  <div class="col-6">
                    <label class="form-label">nombre</label>
                    <input type="text" class="form-control" name="updateNombre" value="<?php echo $usuario['nombre']; ?>" >
                  </div>

                  <div class="col-6">
                    <label class="form-label">apellido</label>
                    <input type="text" class="form-control" name="updateApellido" value="<?php echo $usuario['apellido']; ?>" >
                  </div>

                  <div class="col-3">
                    <label class="form-label">fecha de nacimiento</label>
                    <input type="date" class="form-control" name="updateDob" value="<?php echo $usuario['dob']; ?>" >
                  </div>

                  <div class="col-3">
                    <label class="form-label">dni</span></label>
                    <input type="number" class="form-control" name="updateDni" maxlength="8" value="<?php echo $usuario['dni']; ?>" >
                  </div>
                  </div>
                </div>

              <!--︵‿︵‿୨   Tab #2 - Content  ୧‿︵‿︵-->
              <div class="tab-pane fade row g-4" id="contacto" role="tabpanel" aria-labelledby="tab-contacto">
                <div class="row g-4">
                  <div class="col-5">
                    <label class="form-label">email</label>
                    <input type="email" class="form-control" name="updateEmail" value="<?php echo $usuario['email']; ?>" >
                  </div>

                  <div class="col-7"></div>

                  <div class="col-1">
                    <label class="form-label">cód. area</label>
                    <input type="number" class="form-control" name="updateArea" value="<?php echo $usuario['tel_area']; ?>">
                  </div>

                  <div class="col-3">
                    <label class="form-label">teléfono fijo</label>
                    <input type="number" class="form-control" name="updateFijo" value="<?php echo $usuario['tel_fijo']; ?>">
                  </div>

                  <div class="col-3">
                    <label class="form-label">teléfono celular</label>
                    <input type="number" class="form-control" name="updateCel" value="<?php echo $usuario['tel_cel']; ?>">
                  </div>
                </div>
              </div>

              <!--︵‿︵‿୨   Tab #3 - Content  ୧‿︵‿︵-->
              <div class="tab-pane fade row g-4" id="domicilio" role="tabpanel" aria-labelledby="tab-domicilio">
                <div class="row g-4">
                  <div class="col-6">
                    <label class="form-label">calle</label>
                    <input type="text" class="form-control" name="updateCalle" value="<?php echo $usuario['dom_calle']; ?>" >
                  </div>

                  <div class="col-2">
                    <label class="form-label">altura</label>
                    <input type="text" class="form-control" name="updateAltura" value="<?php echo $usuario['dom_altura']; ?>" >
                  </div>

                  <div class="col-1">
                    <label class="form-label">piso</label>
                    <input type="text" class="form-control" name="updatePiso" value="<?php echo $usuario['dom_piso']; ?>">
                  </div>

                  <div class="col-1">
                    <label class="form-label">depto</label>
                    <input type="text" class="form-control" name="updateDpto" value="<?php echo $usuario['dom_dpto']; ?>">
                  </div>

                  <div class="col-4">
                    <label class="form-label">ciudad</label>
                    <input type="text" class="form-control" name="updateCiudad" value="<?php echo $usuario['ciudad']; ?>" >
                  </div>

                  <div class="col-3">
                    <label class="form-label">provincia</label>
                    <select class="form-select" aria-label="Provincia" name="updateProvincia" >
                        <option <?php if ($usuario['provincia'] == "Buenos Aires") { echo "selected"; } ?>>Buenos Aires</option>
                        <option <?php if ($usuario['provincia'] == "Capital Federal") { echo "selected"; } ?>>Capital Federal</option>
                        <option <?php if ($usuario['provincia'] == "Catamarca") { echo "selected"; } ?>>Catamarca</option>
                        <option <?php if ($usuario['provincia'] == "Chaco") { echo "selected"; } ?>>Chaco</option>
                        <option <?php if ($usuario['provincia'] == "Chubut") { echo "selected"; } ?>>Chubut</option>
                        <option <?php if ($usuario['provincia'] == "Córdoba") { echo "selected"; } ?>>Córdoba</option>
                        <option <?php if ($usuario['provincia'] == "Corrientes") { echo "selected"; } ?>>Corrientes</option>
                        <option <?php if ($usuario['provincia'] == "Entre Ríos") { echo "selected"; } ?>>Entre Ríos</option>
                        <option <?php if ($usuario['provincia'] == "Formosa") { echo "selected"; } ?>>Formosa</option>
                        <option <?php if ($usuario['provincia'] == "Jujuy") { echo "selected"; } ?>>Jujuy</option>
                        <option <?php if ($usuario['provincia'] == "La Pampa") { echo "selected"; } ?>>La Pampa</option>
                        <option <?php if ($usuario['provincia'] == "La Rioja") { echo "selected"; } ?>>La Rioja</option>
                        <option <?php if ($usuario['provincia'] == "Mendoza") { echo "selected"; } ?>>Mendoza</option>
                        <option <?php if ($usuario['provincia'] == "Misiones") { echo "selected"; } ?>>Misiones</option>
                        <option <?php if ($usuario['provincia'] == "Neuquén") { echo "selected"; } ?>>Neuquén</option>
                        <option <?php if ($usuario['provincia'] == "Río Negro") { echo "selected"; } ?>>Río Negro</option>
                        <option <?php if ($usuario['provincia'] == "Salta") { echo "selected"; } ?>>Salta</option>
                        <option <?php if ($usuario['provincia'] == "San Juan") { echo "selected"; } ?>>San Juan</option>
                        <option <?php if ($usuario['provincia'] == "San Luis") { echo "selected"; } ?>>San Luis</option>
                        <option <?php if ($usuario['provincia'] == "Santa Cruz") { echo "selected"; } ?>>Santa Cruz</option>
                        <option <?php if ($usuario['provincia'] == "Santa Fe") { echo "selected"; } ?>>Santa Fe</option>
                        <option <?php if ($usuario['provincia'] == "Santiago del Estero") { echo "selected"; } ?>>Santiago del Estero</option>
                        <option <?php if ($usuario['provincia'] == "Jujuy") { echo "selected"; } ?>>Jujuy</option>
                        <option <?php if ($usuario['provincia'] == "Tierra del Fuego") { echo "selected"; } ?>>Tierra del Fuego</option>
                        <option <?php if ($usuario['provincia'] == "Tucumán") { echo "selected"; } ?>>Tucumán</option>
                      </select>
                    </div>

                  <div class="col-2">
                    <label class="form-label">código postal</label>
                    <input type="text" class="form-control" name="updateCp" value="<?php echo $usuario['cp']; ?>" >
                  </div>
                </div>

              </div>

              <!--︵‿︵‿୨   Tab #4 - Content  ୧‿︵‿︵-->
              <div class="tab-pane fade row g-4" id="login" role="tabpanel" aria-labelledby="tab-login">
                <div class="col-4">
                  <label class="form-label">usuario</label>
                  <!-- Readonly! Si se incluye la posibilidad de cambiar el username, implementar un duplicate check -->
                  <input type="text" class="form-control" name="updateUser" maxlength="10" value="<?php echo $usuario['user']; ?>" readonly>
                </div>

                <div class="col-3">
                  <label class="form-label">contraseña</label>
                  <input type="password" class="form-control" name="updatePassword" minlength="8" maxlength="15">
                  <input type="password" name="currentPassword" value="<?php echo $usuario['pw']; ?>" hidden>
                </div>
              </div>

            </div>

            <div>
              <input type="number" name="id_cliente" value="<?php echo $usuario['id_cliente']; ?>" hidden>
            </div>

            <?php
              $actualizar = ControladorFormularios::ctrActualizarRegistro();

              if ($actualizar == "ok") {
                echo '<script>
                  if (window.history.replaceState) {
                    window.history.replaceState( null, null, window.location.href );
                  }
                  </script>';

        			  echo '<div class="alerta alerta-actulizar">El usuario ha sido actualizado</div>
                  <script>
                    setTimeout(function() {
                      window.location = "index.php?pagina=inicio";
                    },3000);
                  </script>';
              } ?>

            <div class="col">
              <button class="btn btn-primary btn-lg small-green-button" type="submit" value="submit" name="submit">guardar cambios</button>
            </div>
            <div class="col">
              <button type="button" class="btn btn-secondary btn-lg small-green-button" onclick="location.reload()">cancelar</button>
            </div>
          </form>

          <!-- ｡･:*:･ﾟ★,｡･:*:･ﾟ☆　DELETE RECORD PSEUDO-FORM ｡･:*:･ﾟ★,｡･:*:･ﾟ☆ -->
          <form class="form-delete-user" action="" method="post">
            <input type="number" value="<?php echo $usuario['id_cliente']; ?>" name="deleteUser" hidden>
            <button type="submit" class="btn-delete-user" onclick="return confirm('¿Estás seguro de que querés borrar tu cuenta de usuario?')"><i class="fa-solid fa-user-slash"></i></i></button>
            <?php
              $eliminar = new ControladorFormularios();
              $eliminar -> ctrEliminarRegistro();
            ?>
          </form>
        </div>
        <!--End Form-->
    </main>
  </body>
</html>
