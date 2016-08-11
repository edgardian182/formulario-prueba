<html>
<head>
  <meta charset="UTF-8">
  <title>Formulario</title>
</head>
<body>

  <?php
    // issset() -->  Comprueba que una variable este seteada = definida
    // $_POST[] --> Es como el HASH PARAMS en RAils y contiene los datos enviados con el Formulario
    // Las variables se crean anteponiendo $ en su nombre
    // La concatenación o interpolación de texto se hace: '. $variable .'
    if (isset($_POST['nombre']) && ($_POST['email'] != '') && ($_POST['mensaje'] != '')) {

      // DEFINICIÓN DE VARIABLES BASADAS EN EL POST
      $nombre = $_POST['nombre'];
      $email = $_POST['email'];
      $mensaje = $_POST['mensaje'];

      // Contenido del Mensaje
      $titulo = "Información de contacto"
      // Se agrega contenido HTML
      $contenido =
            '<html>
              <head>
                <title>'. $titulo .'</title>
              </head>
              <body>
                <h1>Haz recibido un mensaje de la web fiudesco.com</h1>
                <p>El visitante <strong>'. $nombre .'</strong> te ha enviado el siguiente mensaje:</p>
                <p>Mensaje: '. $mensaje .' <br><br> Puedes ponerte en contacto con él al email '. $email .'</p>
                <hr>
                <p>Este mensaje ha sido creado automáticamente desde tu web</p>
              </body>
            </html>';
      // Especificamos los METADATOS del Header enviado al servidor
      // Los datos son concatenados en lugar de usar un Array con .=
      // Los servidores web solicitan que use CamelCase al definir parámetros del Header
      $header = "MIME-Version: 1.0\r\n";
      $header .= "Content-Type: text/html; charset=UTF-8\r\n";
      $header .= "From: fiudesco.com <fiudesco.colombia@gmail.com>\r\n";
      $header .= "Reply-To: fiudesco.colombia@gmail.com\r\n";


      // Para el envío de email usamos una función nativa de PHP mail que recibe 3 parámetros (donde_enviar,titulo,contenido,encabezado) El encabezado es opcional pero permite que se envie correctamente el mensaje
      $para = "edgarquintana984@hotmail.com"

      $envio = mail($para,$titulo,$contenido,$header);

      if ($envio == true) {
        echo "<h1>Mensaje enviado correctamente</h1>";
      }
      else {
        echo "<h1>Se ha presentado un error en el envio del email</h1>";
      }


    }
    else {
      echo "<h1>Se ha presentado un error, completa los campos del formulario</h1>";
    }
  ?>

  <h2><img src="loading.gif" alt="">Te estamos redireccionando al sitio web</h2>


</body>
</html>
