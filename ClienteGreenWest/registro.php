<?php
/*
  require 'database.php';
  $message = ''; 
  */
?> 

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


    <h1>Registrate</h1>
    <span> <a href="login.php">Ingresa</a></span>
    <span>ó regresa a la<a href="index.php"> Pagina principal</a></span>

    <div class= "container">
    <form action="registro.php" method="POST">
    <div class= "user-details">
      <div class= "input-box">
        <span class= "details"> Usuario </span>
        <input name="usuario" type="text" class="form-control" placeholder="Ingresa un usuario"  required="required">
      </div>
      <div class= "input-box">
        <span class= "details"> Contraseña </span>
        <input name="password" type="password" placeholder="Ingresa una contraseña" minlength="8" maxlength="8" required="required">
      </div>
      <div class= "input-box">
        <span class= "details"> Nombre </span>
        <input name="nombre" type="text" placeholder="Ingresa tu nombre" required="required">
      </div>
      <div class= "input-box">
        <span class= "details"> Apellido paterno </span>
        <input name="apellidoP" type="text" placeholder="Ingresa tu apellido paterno" required="required">
      </div>
      <div class= "input-box">
        <span class= "details"> Apellido materno </span>
        <input name="apellidoM" type="text" placeholder="Ingresa tu apellido materno" required="required">
      </div>
      <div class= "input-box">
        <span class= "details"> Correo </span>
        <input name="correo" type="text" placeholder="Ingresa tu correo" required="required">
      </div>
      <div class= "input-box">
        <span class= "details"> Estado </span>
        <input name="estado" type="text" placeholder="Ingresa tu estado de origen" required="required">
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
        if (empty($_POST['usuario']) || empty($_POST['password']) || empty($_POST['nombre']) || empty($_POST['estado']) || empty($_POST['municipio']) || empty($_POST['calle']) || empty($_POST['numero_exterior']) || empty($_POST['numero_interno'])) return;
        // rawurlencode modifica la url para aceptar caracteres especiales
        $user = rawurlencode($_POST['usuario']);
        $password = rawurlencode($_POST['password']);
        $nombre = rawurlencode($_POST['nombre']);
        $apellidoP = rawurlencode($_POST['apellidoP']);
        $apellidoM = rawurlencode($_POST['apellidoM']);
        $correo = rawurlencode($_POST['correo']);
        $estado = rawurlencode($_POST['estado']);
        $municipio = rawurlencode($_POST['municipio']);
        $calle = rawurlencode($_POST['calle']);
        $numero_exterior = rawurlencode($_POST['numero_exterior']);
        $numero_interno = rawurlencode($_POST['numero_interno']);
        $json = file_get_contents("http://localhost:6969/cuenta/agregar/{$user}/{$password}/{$nombre}/{$apellidoP}/{$apellidoM}/{$correo}/{$estado}/{$municipio}/{$calle}/{$numero_exterior}/{$numero_interno}");
        echo $json;
        // Solo si es un archivo json, se utiliza esto
        // $obj = json_decode($json, true);
        // print_r($obj);
    ?>


    </div>

  </body>
</html>