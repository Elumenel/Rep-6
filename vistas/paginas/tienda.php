<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TP Integrador</title>
  </head>
  <body>
    <main>
      <section id="store-window">
        <div class="container forsale-container">
          <div class="row row-cols-1 row-cols-md-3 g-5">
            <?php
            $productos = ControladorTienda::ctrSeleccionarProductos(null, null);

            foreach ($productos as $key => $value):
              /*︵‿︵‿୨   Formato Horizontal   ୧‿︵‿︵*/
              if ($value['formato']=='horizontal') { ?>
                <div class="col" id="ver-horizontal">
                  <div class="card-body">
                    <div class="shop-card">
                      <div class="img-container">
                        <img class="image shop-img" src="contenido/img/<?php echo $value['imagen']; ?>" alt="<?php echo $value['lugar']; ?>">
                      </div>
                      <div class="info-container">
                        <h6 class="photo-location"><?php echo $value['lugar']; ?></h6>
                        <h5 class="photo-title"><?php echo $value['titulo']; ?></h5>
                        <div class="descripcion">
                          <i>Formato: <?php echo $value['dimensiones']; ?>cm<br>Impresa en Papel Fotografico Epson Ultra Premium Luster</i>
                        </div>
                      </div>
                      <div class="shop-container">
                        <form class="buy-container" action="" method="post">
                          <input type="text" value="<?php echo $value['id_producto']; ?>" name="id_producto" hidden>
                          <button type="submit" class="btn btn-outline-primary buy-me" onclick="alert('Esta función aún no está disponible')">comprar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div><?php
              /*︵‿︵‿୨   Formato Vertical   ୧‿︵‿︵*/
              }else { ?>
                <div class="col" id="ver-vertical">
                  <div class="card-body">
                    <div class="shop-card-v">
                      <div class="img-container">
                        <img class="image shop-img-v" src="contenido/img/<?php echo $value['imagen']; ?>" alt="">
                      </div>
                      <div class="info-container">
                        <h6 class="photo-location"><?php echo $value['lugar']; ?></h6>
                        <h5 class="photo-title"><?php echo $value['titulo']; ?></h5>
                        <div class="descripcion">
                          <i>Formato: <?php echo $value['dimensiones']; ?>cm<br>Impresa en Papel Fotografico Epson Ultra Premium Luster</i>
                        </div>
                      </div>
                      <div class="shop-container">
                        <form class="buy-container" action="" method="post">
                          <input type="text" value="<?php echo $value['id_producto']; ?>" name="id_producto" hidden>
                          <button type="submit" class="btn btn-outline-primary buy-me" onclick="alert('Esta función aún no está disponible')">comprar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div><?php
              }
              endforeach ?>
          </div>
        </div>
      </section>
    </main>
  </body>
</html>
