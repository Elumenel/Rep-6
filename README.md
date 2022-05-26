Mi proyecto es un sitio de exhibición y venta de fotografías, que además permite al usuario dejar comentarios, registrarse para una newsletter y contactar al administrador del sitio por medio del envío de un correo electrónico. 

El usuario *registrado* puede además editar su propia información personal, de contacto y de envío de sus compras, y podrá gestionar las compras en cuestión a través de un “carro” interactivo.

Este proyecto es bastante complejo y algunas de las funcionalidades, como por ejemplo la gestión del carro de compras, aún no están resueltas. Para simplificar, voy a incluir en esta entrega solamente lo que considero suficiente para cumplir con los requisitos de la misma.

# **La llegada del usuario al sitio**
Cuando el usuario solicita el dominio (<https://iwebhusayithi.000webhostapp.com>) sin especificar una página específica, el servidor carga la página por defecto del sitio: **index.php**

Esta página invoca a todos los controladores y modelos actualmente en uso, crea un objeto de la clase **ControladorPlantilla** –definida en el archivo controladores/**plantilla.controlador.php**—y ejecuta su método **ctrGetPlantilla()**. Este método simplemente incluye el archivo vistas/**plantilla.php**.

Esta página analiza si existen parámetros de URL, y muestra diferentes contenidos de acuerdo a lo que encuentra.

## **La barra de navegación** 
Si encuentra el parámetro **ruta** con los valores “**contacto**”, “**ingreso**”, “**inicio**”, “**registro**”, “**tienda**” o “**usuario**”, muestra  una barra de navegación con links a las diferentes secciones del sitio. 

Algunos de estos links están disponibles solamente para usuarios registrados que han iniciado una sesión, mediante la constatación de la existencia de la variable de sesión **validarIngreso**. A la inversa, el link para “ingresar” sólo está disponible para usuarios que *no* han iniciado sesión. 

Si no existe un parámetro **ruta**, la barra de navegación tiene las mismas características.

Si existe un parámetro **ruta**, pero no es uno de los especificados, no se muestra barra de navegación. Esto es una decisión fundamentalmente estilística en relación a la página de error 404.

## **El cuerpo (main)**
Si encuentra el parámetro **ruta** con los valores “**contacto**”, “**ingreso**”, “**inicio**”, “**registro**”, “**tienda**” o “**usuario**”, incluye la página del mismo nombre ubicada en la carpeta vistas/paginas. Si el parámetro **ruta** tiene un valor desconocido, incluye la página vistas/paginas/**error404.php**.

Si no encuentra el parámetro **ruta**, incluye la página vistas/paginas/**inicio.php**.

## **El footer**
El footer contiene links a las secciones “**inicio**”, “**tienda**” y “**contacto**”, links a redes sociales, y un formulario para suscribirse a una lista de correo (no funcional en esta entrega). 

Se comporta de manera semejante a la barra de navegación superior: se muestra cuando la URL contiene el parámetro **ruta** con un valor reconocido o cuando no posee este parámetro, y no se muestra cuando existe un parámetro **ruta**, pero su valor *no es* uno de los especificados.

Como esta página “muestra” a todas las demás, incluye el head completo, con todos los enlaces a estilos/scripts necesarios para el funcionamiento de todas las paginas actualmente existentes.


# **La página “inicio”**
Esta página contiene (1) un carousel con fotos, que ocupa toda la pantalla en la posición inicial, (2) una galería de imágenes, con un botón/link a la tienda al pie y (3) una sección de comentarios de usuarios, con un botón para dejar un comentario que, al accionarse, despliega un formulario incluido desde vistas/paginas/**ncomentario.php**. 

Esta sección está pensada para interactuar con una tabla de la base de datos, pero elegí no incluir esa funcionalidad porque requería una tabla adicional de la base de datos, además de sumar mucho código, y no mostraba nada esencialmente diferente.

# **La página “tienda”**
Esta página contiene un muestrario de las láminas que están disponibles para comprar, con algunos datos de cada una de ellas, y un botón para “comprar”. Esta última funcionalidad no está activa en la presente entrega, ya que requería incluir una tabla adicional de la base de datos y, además, aún no he podido resolver completamente la funcionalidad del “carro” de compras.

Para mostrar los productos disponibles, la página instancia la clase **ControladorTienda** y ejecuta el método **ctrSeleccionarProductos()**, definidos en el archivo controladores/**tienda.controlador.php**, enviando dos parámetros null. El controlador define un argumento adicional (**tabla**) e invoca al modelo correspondiente.

El archivo modelos/**tienda.modelo.php** comienza con la inclusión del archivo modelos/**conexion.php**, que contiene todos la información de la base de datos y permitirá más adelante efectuar la conexión. 

Luego define el método **mdlSeleccionarProductos()**, que toma los parámetros enviados por el controlador y analiza si los valores de los parámetros **ítem** y **valor** son null. Como en este caso lo son, prepara una sentencia mysql para seleccionar *todos* los registros de la tabla en cuestión, ordenados por **id\_producto**, y la ejecuta. Devuelve un array con todas las filas que encontró.

En la presente entrega no se encuentra en uso la parte del código que permite buscar resultados acotados por un valor determinado en un cierto campo (esto sirve a la funcionalidad del “carro”).

El controlador recibe y reenvía los resultados a la vista, que recorre los elementos del array con un bucle foreach(). En cada iteración analiza el valor del campo formato, y muestra los datos en una tarjeta de la clase correspondiente a ese tipo de formato, a la que se aplican estilos específicos para optimizar la visualización.

En el caso de las imágenes, la base de datos contiene solo el nombre del archivo, mientras que el resto de la ruta (contenido/img/) está especificada directamente en el código.

# **La página “contacto”**
Esta página contiene un formulario para enviar un mensaje por email al administrador del sitio. Para enviar el mensaje instancia la clase **ControladorFormularios** y ejecuta el método **ctrEnviarComentario()**, definidos en el archivo controladores/**formularios.controlador.php**. 

El método define el correo del destinatario, el asunto y el mensaje, tomando los datos recibidos por medio de la variable **$\_POST**.** Luego invoca el modelo correspondiente, enviando esas variables como argumentos.

El método **mdlEnviarComentario()**, de la clase **ModeloFormularios**—definidos en el archivo modelos/**formularios.modelo.php**—simplemente envía el email usando los datos suministrados, y devuelve un “ok” si tiene éxito.  

Cuando el “ok” llega de vuelta a la vista, por intermediación del controlador, un mensaje de confirmación se vuelve visible.

# **La página “ingreso”**
Esta página contiene un formulario para iniciar una sesión de usuario, y un link para crear una *nueva* cuenta de usuario en caso de no tenerla. Aquí se instancia la clase **ControladorFormularios** y se ejecuta su método **ctrIngreso()**, definidas en controladores/**formularios.controlador.php**. 

Este método define tres variables: **tabla** (“clientes”), **item** (“user”, el nombre del campo correspondiente en la base de datos) y **valor** (el valor de **loginUser** enviado por POST). Luego invoca el modelo correspondiente, enviando esas variables como argumentos. 

El método **mdlSeleccionarRegistros ()**, de la clase **ModeloFormularios**, toma los parámetros recibidos y, al encontrar que **ítem** y **valor** no son nulos, ejecuta su segunda posible versión. Prepara una sentencia mysql para seleccionar el registro de la tabla suministrada en el parámetro **tabla** donde el valor del campo suministrado en el parámetro **item** sea igual al suministrado en parámetro **valor**,** y la ejecuta. Luego devuelve un array con los resultados.

El método **ctrIngreso()** verifica que el valor de **user** y de **pw** devueltos coincidan con los valores de **loginUser** y **loginPassword** recibidos por POST. De ser así, crea las variables de sesión **validarIngreso** (“OK”) y **cliente** (valor de **id\_cliente** devuelto por el controlador). Luego, el usuario es redirigido a la página de inicio.

Si los datos *no* coinciden, la vista muestra un banner de alerta indicando que las credenciales no son válidas.

# **La página “registro”**
Esta página contiene un formulario para crear una cuenta de usuario. En primer lugar, implementa una interacción con Ajax para validar la disponibilidad del nombre de usuario elegido, pero como esto no era un requerimiento del trabajo final no voy a extenderme describiendo su funcionamiento. Lo que es más, por alguna razón (que aún no puedo discernir) esto no funciona en el servidor de 000webhost.

Aquí se instancia la clase **ControladorFormularios** y se ejecuta su método **ctrRegistro()**, definidas en controladores/**formularios.controlador.php**.

Este método define una variable **tabla** (“clientes”) y un array **datos** (con los datos recibidos del formulario), e invoca al modelo correspondiente enviando esas variables como argumentos.

El método **mdlRegistro ()**, de la clase **ModeloFormularios**, toma los parámetros recibidos y prepara una sentencia mysql para insertar un nuevo registro en la tabla correspondiente, con los datos suministrados. Luego lo ejecuta, y devuelve “ok” en caso de tener éxito, o el error recibido en caso contrario.

Cuando la vista recibe la respuesta, por medio del controlador, se muestra un mensaje de confirmación de la cuenta de usuario.

# **La página “usuario”**
A esta página se accede mediante el link “mi cuenta”, que se hace visible en la barra de navegación luego de que un usuario ha iniciado sección. Permite visualizar la información sobre el usuario que se encuentra en la base de datos, como así también agregar o modificar esos datos, mediante un formulario compuesto por cuatro tabs separadas para facilitar su navegación.
## **Visualización de la información existente**
Aquí se instancia la clase **ControladorFormularios** y se ejecuta su método **ctrSeleccionarRegistros ()**, enviando como argumentos el **item** (“id\_cliente”) y su **valor** (el contenido de la variable de sesión **cliente**) que debe localizarse en la tabla clientes de la base de datos.

El controlador invoca nuevamente al método **mdlSeleccionarRegistros()**, pero al recibir valores en los parámetros **ítem** y **valor**, ejecuta su *primera* versión. Prepara una sentencia mysql para seleccionar el registro especifico del usuario actual, la ejecuta, y devuelve un array con los resultados.

De vuelta en la vista, los resultados obtenidos se muestran en cada uno de los inputs del formulario.
## **Actualización de los datos de usuario**
Para *actualizar* los datos del usuario se ejecuta el método **ctrActualizarRegistro ()** de la clase **ControladorFormularios**, que define una variable **tabla** (“clientes”) y un array **datos** (con los datos recibidos del formulario). En el caso de la contraseña, como decidí no mostrar su valor actual en el formulario, implementé una verificación para ver si el usuario ingresó una nueva o no—si la ingresó, se incluye esa nueva contraseña en el array; sino, se utiliza la contraseña existente, incluida en el formulario pero *oculta*.  Luego se invoca al modelo correspondiente enviando esas variables como argumentos.

El método **mdlActualizarRegistro ()**, de la clase **ModeloFormularios**, toma los parámetros recibidos y prepara una sentencia mysql para actualizar el registro correspondiente a la **id\_cliente** suministrada como parte del array **datos**, con los restantes datos suministrados. Luego lo ejecuta, y devuelve “ok” en caso de tener éxito, o el error recibido en caso contrario.

En la vista, la página se recarga y, en consecuencia, los datos se actualizan a su última versión.

Con respecto a esto, he notado que en el servidor de **000webhost** no es posible actualizar los datos de la pestaña “información personal” a menos que se introduzca una fecha de nacimiento, pero esto no sucede en la versión de xampp. No he logrado aún dilucidar por qué.
## **Eliminación del registro de usuario**
Finalmente, esta página también permite eliminar el registro de usuario de la persona que tiene una sesión activa, haciendo click en el ícono en la esquina inferior derecha de la pantalla. 

Este icono es el botón de tipo submit de un formulario oculto, que contiene el **id\_cliente** del usuario e instancia la clase **ControladorFormularios**, ejecutando su método **ctrEliminarRegistro()**.

El controlador invoca al método **mdlEliminarRegistro()**, de la clase **ModeloFormularios**, incluyendo los argumentos **tabla** y **valor** que él mismo define, el cual prepara  la sentencia mysql para eliminar el registro correspondiente y la ejecuta, devolviendo “ok” si la operación es exitosa.

En la vista, el usuario recibe una confirmación de que la cuenta ha sido eliminada, y es redirigido a la página de inicio.

# **La página “salir”**
Esta página, si bien está incluida en la carpeta vistas, no *muestra* nada. Contiene solamente el código para destruir la sesión del usuario, y redirigir a la página inicio.
