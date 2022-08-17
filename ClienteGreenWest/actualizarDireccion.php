<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php require 'partes/header.php' ?>

    <h1>Actualiza tu direccion</h1>

    <div class= "container">
    <form action="actualizarDireccion.php" method="POST">
    <div class= "user-details">
      <div class= "input-box">
        <span class= "details"> Estado </span>
        <input name="estado" type="text" placeholder="Ingresa tu estado" required="required">
      </div>
      <div class= "input-box">
        <span class= "details"> Municipio </span>
        <input name="municipio" type="text" placeholder="Ingresa tu municipio" required="required">
      </div>
      <div class= "input-box">
        <span class= "details"> Calle </span>
        <input name="calle" type="text" placeholder="Ingresa tu calle" required="required">
      </div>
      <div class= "input-box">
        <span class= "details"> Número exterior </span>
        <input name="numero_exterior" type="int" placeholder="Ingresa tu num exterior" required="required">
      </div>
      <div class= "input-box">
        <span class= "details"> Numero interno </span>
        <input name="numero_interno" type="int" placeholder="Ingresa tu num interno" required="required">
      </div>       
      <input type="submit" value="Submit">
      </div>
    </form>


    <?php
        if (empty($_POST['estado']) || empty($_POST['municipio']) || empty($_POST['calle']) || empty($_POST['numero_exterior']) || empty($_POST['numero_interno'])) return;
        // rawurlencode modifica la url para aceptar caracteres especiales
        $id_usuario = 1; //Que se agregar a partir de los datos del usuario
        $estado = rawurlencode($_POST['estado']);
        $municipio = rawurlencode($_POST['municipio']);
        $calle = rawurlencode($_POST['calle']);
        $numero_exterior = rawurlencode($_POST['numero_exterior']);
        $numero_interno = rawurlencode($_POST['numero_interno']);
        $json = file_get_contents("http://localhost:6969/direccion/actualizar/{$id_usuario}/{$estado}/{$municipio}/{$calle}/{$numero_exterior}/{$numero_interno}");
        echo $json;
        // Solo si es un archivo json, se utiliza esto
        // $obj = json_decode($json, true);
        // print_r($obj);
    ?>

    </body>
</html>