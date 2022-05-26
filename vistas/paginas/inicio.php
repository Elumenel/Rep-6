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
      <section id="photo-carrousel">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner" id="carousel-main">
            <div class="carousel-item active">
              <img src="contenido/img/pescador.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="contenido/img/caminito.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="contenido/img/giardini.jpg" class="d-block w-100" alt="...">
            </div>
            <!--<div class="carousel-item">
              <img src="img/desert.jpg" class="d-block w-100" alt="...">
            </div>-->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </section>

      <section id="galeria">
        <div class="container">
          <h2><p class="title-line-1">galería de</p><p class=title-line-2>instantes</p></h2>
        </div>

        <div class="grid-container">
          <div class="grid-inner">
            <div class="text" id="text1">Puerta al Báltico</div>
            <div class="grid_item" id="pic1"><img class="image" src="contenido/img/peterhof.jpg" alt="Palacio de Peterhof"></div>

            <div class="text" id="text2">Colores planos/Planos de colores</div>
            <div class="grid_item" id="picture2"><img class="image" src="contenido/img/pompidou.jpg" alt="Centre Pompidou"></div>

            <div class="text" id="text3">Luces de Al-Qāhira</div>
            <div class="grid_item" id="picture3"><img class="image" src="contenido/img/mosque.jpg" alt="Mezquita de Mehmet Alí Pasha"></div>

            <div class="text" id="text4">Tiempo suspendido</div>
            <div class="grid_item" id="picture4"><img class="image" src="contenido/img/vittorio-emanuele.jpg" alt="Galleria Vittorio Emanuele II"></div>

            <div class="text" id="text5">Linajes</div>
            <div class="grid_item" id="picture5"><img class="image" src="contenido/img/old_jewish_cemetery.jpg" alt="Antiguo Cementerio Judío"></div>

            <div class="text" id="text6">Desfasajes temporales</div>
            <div class="grid_item" id="picture6"><img class="image" src="contenido/img/giza.jpg" alt="Necrópolis de Giza"></div>

            <div class="text" id="text7">Memento mori</div>
            <div class="grid_item" id="picture7"><img class="image" src="contenido/img/memento_mori.JPG" alt=""></div>

            <div class="text" id="text8">Vista panorámica</div>
            <div class="grid_item" id="picture8"><img class="image" src="contenido/img/ischia.jpg" alt="Golfo de Napoli"></div>

            <div class="text" id="text9">Serenidad</div>
            <div class="grid_item" id="picture9"><img class="image" src="contenido/img/oriental_garden.jpg" alt="Jardín Oriental"></div>

            <div class="text" id="text10">Punto de fuga</div>
            <div class="grid_item" id="picture10"><img class="image" src="contenido/img/rivera_paris.jpg" alt="Paris-Plage"></div>

            <div class="text" id="text11">Soledad/compañía</div>
            <div class="grid_item" id="picture11"><img class="image" src="contenido/img/venezia.jpg" alt=""></div>

            <div class="text" id="text12">Una vez en la montaña</div>
            <div class="grid_item" id="picture12"><img class="image" src="contenido/img/formazza.jpg" alt="Valle Formazza"></div>

            <div class="text" id="text13">Actividad de invierno</div>
            <div class="grid_item" id="picture13"><img class="image" src="contenido/img/duckylake.jpg" alt="Reserva Natural de Earlswood Common"></div>

            <div class="text" id="text14">Desfile cansino</div>
            <div class="grid_item" id="picture14"><img class="image" src="contenido/img/juni.jpg" alt="Desfile de Juni "></div>

            <div class="text" id="text15">Luxemburg florecido</div>
            <div class="grid_item" id="picture15"><img class="image" src="contenido/img/Jardin_du_Luxembourg.JPG" alt=""></div>
          </div>
        </div>
        <div class="container call-to-action">
          <a href="index.php?ruta=tienda">comprá una lámina<i class="fa-solid fa-cart-shopping"></i></a>
        </div>
      </section>

      <section id="comentarios">
        <div class="container">
          <h2><p class="title-line-1">muro de</p><p class=title-line-2>comentarios</p></h2>
        </div>

        <div class="container">
          <div class="thank-you">
            <?php
            if (isset($_GET['status'])) { ?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Comentario recibido</strong><br>¡Gracias por compartir tu opinión!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php } ?>
          </div>
        </div>

        <div class="container comments-container">
          <div class="row gx-4 gy-4">
            <!--Esto es una muestra. Los comentarios deberían traerse de la base de datos-->
            <div class="col-4">
              <div class="speech-bubble">
                  <cite>Me encantó la página. En especial los gansos. Gracias por compartirlos!</cite>
                </div>
              <div class="quote-reference">
                  <p class="quote-author">Marta Sánchez</p>
                  <p class="quote-date">4 de enero de 2022</p>
                </div>
            </div>
            <div class="col-4">
              <div class="speech-bubble">
                  <cite>Hola! Soy un spambot!</cite>
                </div>
              <div class="quote-reference">
                  <p class="quote-author">Elsa Pallo</p>
                  <p class="quote-date">4 de enero de 2022</p>
                </div>
            </div>
            <div class="col-4">
              <div class="speech-bubble">
                  <cite>Ya compré 5 láminas, pero nunca son suficientes! No veo la hora de que suban nuevas láminas de gansos a la tienda!</cite>
                </div>
              <div class="quote-reference">
                  <p class="quote-author">Justin</p>
                  <p class="quote-date">4 de enero de 2022</p>
                </div>
            </div>
            <div class="col-4">
              <div class="speech-bubble">
                  <cite>Qué maravilla todos estos gansos! No puedo esperar a que llegue mi pedido!</cite>
                </div>
              <div class="quote-reference">
                  <p class="quote-author">Elton</p>
                  <p class="quote-date">4 de enero de 2022</p>
                </div>
            </div>
            <div class="col-4">
              <div class="speech-bubble">
                  <cite>Esta página es realmente sublime, como así también lo son las láminas que se pueden adquirir a través de ella. Cualquier amante de las artes que se precie de tal debe aprovechar esta oportunidad única en la vida para hacerse de maravillosas láminas de gansos, que atesorarán por el resto de sus vidas</cite>
                </div>
              <div class="quote-reference">
                  <p class="quote-author">Susana Horia</p>
                  <p class="quote-date">4 de enero de 2022</p>
                </div>
            </div>

          </div>
        </div>

        <div class="container call-to-action">
          <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">agregá un comentario<i class="fa-solid fa-comment-dots"></i></a>
        </div>

        <div class="collapse" id="collapseExample">
          <?php include "ncomentario.php"; ?>
        </div>
      </section>
    </main>
  </body>
</html>
