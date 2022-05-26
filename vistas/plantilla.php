<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/24e4d2a0d1.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hurricane&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="contenido/css/styles.css">
    <title></title>
  </head>

  <body>
    <header class="contenedor">
      <?php
      if (isset($_GET['ruta'])) {
        if (
          $_GET['ruta'] == "contacto" ||
          $_GET['ruta'] == "ingreso" ||
          $_GET['ruta'] == "inicio" ||
          $_GET['ruta'] == "registro" ||
          $_GET['ruta'] == "tienda" ||
          $_GET['ruta'] == "usuario"
        ) { ?>
          <nav class="navbar navbar-expand-lg navbar-light" id="navbar-container">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.php?ruta=inicio">Florencia Castellarin</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="navbar-text">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" id="a2" href="index.php?ruta=inicio">/inicio</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="a3" href="index.php?ruta=tienda">/tienda</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="a4" href="index.php?ruta=contacto">/contacto</a>
                  </li>
                  <?php
                  if (isset($_SESSION['validarIngreso'])) { ?>
                    <li class="nav-item">
                      <a class="nav-link" id="a5" href="index.php?ruta=usuario">/mi cuenta</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="a6" href="#" onclick="alert('Esta función aún no está disponible')">/mi canasto</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="a7" href="index.php?ruta=salir">/salir</a>
                    </li><?php
                  }else /* if !isset($_SESSION['validarIngreso']) */ { ?>
                    <li class="nav-item">
                      <a class="nav-link" id="a8" href="index.php?ruta=ingreso">/ingresar</span></a>
                    </li><?php
                  }; ?>
                </ul>
              </div>
            </div>
          </nav><?php
        }
      }else /*if !isset($_GET['ruta'])*/ { ?>
        <nav class="navbar navbar-expand-lg navbar-light" id="navbar-container">
          <div class="container-fluid">
            <a class="navbar-brand" href="index.php?ruta=inicio">Florencia Castellarin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbar-text">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" id="a2" href="index.php?ruta=inicio">/inicio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="a3" href="index.php?ruta=tienda">/tienda</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="a4" href="index.php?ruta=contacto">/contacto</a>
                </li>
                <?php
                if (isset($_SESSION['validarIngreso'])) { ?>
                  <li class="nav-item">
                    <a class="nav-link" id="a5" href="index.php?ruta=usuario">/mi cuenta</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="a6" href="#" onclick="alert('Esta función aún no está disponible')">/mi canasto</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="a7" href="index.php?ruta=salir">/salir</a>
                  </li><?php
                }else /* if !isset($_SESSION['validarIngreso']) */ { ?>
                  <li class="nav-item">
                    <a class="nav-link" id="a8" href="index.php?ruta=ingreso">/ingresar</span></a>
                  </li><?php
                } ?>
              </ul>
            </div>
          </div>
        </nav><?php
      } ?>
    </header>

    <main>
      <section id="contenido">
        <?php
        if (isset($_GET['ruta'])) {
          if (
            $_GET['ruta'] == "contacto" ||
            $_GET['ruta'] == "ingreso" ||
            $_GET['ruta'] == "inicio" ||
            $_GET['ruta'] == "pedido" ||
            $_GET['ruta'] == "registro" ||
            $_GET['ruta'] == "salir" ||
            $_GET['ruta'] == "tienda" ||
            $_GET['ruta'] == "usuario"
          ){
            include "paginas/".$_GET['ruta'].".php";
          }else {
            include "paginas/error404.php";
          }
        }else{
          include "paginas/inicio.php";
        } ?>
      </section>
    </main>

    <footer>
      <?php
      if (isset($_GET['ruta'])) {
        if (
          $_GET['ruta'] == "contacto" ||
          $_GET['ruta'] == "ingreso" ||
          $_GET['ruta'] == "inicio" ||
          $_GET['ruta'] == "registro" ||
          $_GET['ruta'] == "tienda" ||
          $_GET['ruta'] == "usuario"
        ) { ?>
          <div class="footer-container">
            <div class="row">
              <div class="col-md-6" id="footer-left">
                <h5 class="footer-brand"><a href="index.php?ruta=inicio" id="brand">Florencia Castellarin</a></h5>

                <ul class="nav">
                  <li><a href="index.php?ruta=inicio" class="footer-link">/inicio</a></li>
                  <li><a href="index.php?ruta=tienda" class="footer-link">/tienda</a></li>
                  <li><a href="index.php?ruta=contacto" class="footer-link">/contacto</a></li>
                </ul>
                <ul class="nav" id="icon-container">
                  <li class="nav-item"><a href="" class="nav-link footer-icon"><i class="fa fa-facebook fa-lg"></i></a></li>
                  <li class="nav-item"><a href="" class="nav-link footer-icon"><i class="fa fa-twitter fa-lg"></i></a></li>
                  <li class="nav-item"><a href="" class="nav-link footer-icon"><i class="fa fa-instagram fa-lg"></i></a></li>
                </ul>
              </div>

              <div class="col-md-6 g-2 container-right"> <!--'g' is the gutter size, don't forget again, OMG! -->
                <div class="newsletter-title">
                  <h4 class="signup-title">mi lista de correo</h4>
                  <hr>
                  <p class="newsletter-text">suscribite para estar siempre al día con todas las novedades del sitio</p>
                </div>

                <!--Falta 'action' (actualmente no hay conexión con la base de datos)-->
                <form class="row g-2" action="" method="post">
                  <div class="col-6">
                    <input type="text" class="form-control form-control-sm input-newsletter" placeholder="Nombre" name="nombre">
                  </div>
                  <div class="col-6">
                    <input type="email" class="form-control form-control-sm input-newsletter" placeholder="Correo" name="correo" required>
                  </div>

                  <div class="col-12">
                    <button type="submit" class="btn btn-secondary-outline btn-sm" value="submit" onclick="alert('No hay conexión a base de datos!')">¡suscribime!</button>
                  </div>
                </form>
              </div>
            </div>
          </div><?php
        }
      }else /*if !isset($_GET['ruta'])*/ { ?>
        <div class="footer-container">
          <div class="row">
            <div class="col-md-6" id="footer-left">
              <h5 class="footer-brand"><a href="index.php?ruta=inicio" id="brand">Florencia Castellarin</a></h5>

              <ul class="nav">
                <li><a href="index.php?ruta=inicio" class="footer-link">/inicio</a></li>
                <li><a href="index.php?ruta=tienda" class="footer-link">/tienda</a></li>
                <li><a href="index.php?ruta=contacto" class="footer-link">/contacto</a></li>
              </ul>
              <ul class="nav" id="icon-container">
                <li class="nav-item"><a href="" class="nav-link footer-icon"><i class="fa fa-facebook fa-lg"></i></a></li>
                <li class="nav-item"><a href="" class="nav-link footer-icon"><i class="fa fa-twitter fa-lg"></i></a></li>
                <li class="nav-item"><a href="" class="nav-link footer-icon"><i class="fa fa-instagram fa-lg"></i></a></li>
              </ul>
            </div>

            <div class="col-md-6 g-2 container-right"> <!--'g' is the gutter size, don't forget again, OMG! -->
              <div class="newsletter-title">
                <h4 class="signup-title">mi lista de correo</h4>
                <hr>
                <p class="newsletter-text">suscribite para estar siempre al día con todas las novedades del sitio</p>
              </div>

              <!--Falta 'action' (actualmente no hay conexión con la base de datos)-->
              <form class="row g-2" action="" method="post">
                <div class="col-6">
                  <input type="text" class="form-control form-control-sm input-newsletter" placeholder="Nombre" name="nombre">
                </div>
                <div class="col-6">
                  <input type="email" class="form-control form-control-sm input-newsletter" placeholder="Correo" name="correo" required>
                </div>

                <div class="col-12">
                  <button type="submit" class="btn btn-secondary-outline btn-sm" value="submit" onclick="alert('No hay conexión a base de datos!')">¡suscribime!</button>
                </div>
              </form>
            </div>
          </div>
        </div><?php
      } ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../MVC/contenido/js/script.js"></script>
  </body>
</html>
