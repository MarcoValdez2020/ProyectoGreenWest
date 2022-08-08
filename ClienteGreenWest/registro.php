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
        <input name="usuario" type="text" class="form-control" placeholder="Ingresa un usuario">
      </div>
      <div class= "input-box">
        <span class= "details"> Contraseña </span>
        <input name="password" type="password" placeholder="Ingresa una contraseña">
      </div>
      <div class= "input-box">
        <span class= "details"> Nombre </span>
        <input name="nombre" type="text" placeholder="Ingresa tu nombre">
      </div>
      <div class= "input-box">
        <span class= "details"> Apellido paterno </span>
        <input name="apellidoP" type="text" placeholder="Ingresa tu apellido paterno">
      </div>
      <div class= "input-box">
        <span class= "details"> Apellido materno </span>
        <input name="apellidoM" type="text" placeholder="Ingresa tu apellido materno">
      </div>
      <div class= "input-box">
        <span class= "details"> Correo </span>
        <input name="correo" type="text" placeholder="Ingresa tu correo">
      </div>
      <div class= "input-box">
        <span class= "details"> Fecha de nacimiento </span>
        <input name="nacimiento" type="text" placeholder="Ingresa tu fecha de nacimiento">
      </div>
      <div class= "input-box">
        <span class= "details"> Color favorito </span>
        <input name="palabra_clave" type="text" placeholder="Ingresa tu color favorito">
      </div>
      <div class= "input-box">
        <span class= "details"> Estado </span>
        <input name="estado" type="text" placeholder="Ingresa tu estado de origen">
      </div>
      <div class= "input-box">
        <span class= "details"> Municipio </span>
        <<input name="municipio" type="text" placeholder="Ingresa tu municipio">
      </div>
      <div class= "input-box">
        <span class= "details"> Calle </span>
        <input name="calle" type="text" placeholder="Ingresa tu calle">
      </div>
      <div class= "input-box">
        <span class= "details"> Número exterior </span>
        <input name="numero_exterior" type="int" placeholder="Ingresa tu num exterior">
      </div>
      <div class= "input-box">
        <span class= "details"> Numero interno </span>
        <input name="numero_interno" type="int" placeholder="Ingresa tu num interno">
      </div>
      <div class= "input-box">
        <span class= "details"> Latitud </span>
        <input name="coor_lantitud" type="text" placeholder="Ingresa tu latitud">
      </div>
      <div class= "input-box">
        <span class= "details"> Longitud </span>
        <input name="coor_longitud" type="text" placeholder="Ingresa tu longitud">
      </div>       
      <input type="submit" value="Submit">
      </div>
    </form>

    <?php
        if (empty($_POST['usuario']) || empty($_POST['password']) || empty($_POST['nombre']) || empty($_POST['apellidoP']) || empty($_POST['apellidoM']) || empty($_POST['correo']) || empty($_POST['nacimiento']) || empty($_POST['palabra_clave']) || empty($_POST['estado']) || empty($_POST['municipio']) || empty($_POST['calle']) || empty($_POST['numero_exterior']) || empty($_POST['numero_interno']) || empty($_POST['coor_lantitud']) || empty($_POST['coor_longitud'])) return;
        // rawurlencode modifica la url para aceptar caracteres especiales
        $user = rawurlencode($_POST['usuario']);
        $password = rawurlencode($_POST['password']);
        $nombre = rawurlencode($_POST['nombre']);
        $apellidoP = rawurlencode($_POST['apellidoP']);
        $apellidoM = rawurlencode($_POST['apellidoM']);
        $correo = rawurlencode($_POST['correo']);
        $nacimiento = rawurlencode($_POST['nacimiento']);
        $palabra_clave = rawurlencode($_POST['palabra_clave']);
        $estado = rawurlencode($_POST['estado']);
        $municipio = rawurlencode($_POST['municipio']);
        $calle = rawurlencode($_POST['calle']);
        $numero_exterior = rawurlencode($_POST['numero_exterior']);
        $numero_interno = rawurlencode($_POST['numero_interno']);
        $coor_lantitud = rawurlencode($_POST['coor_lantitud']);
        $coor_longitud = rawurlencode($_POST['coor_longitud']);
        $json = file_get_contents("http://localhost:6969/cuenta/agregar/{$user}/{$password}/{$nombre}/{$apellidoP}/{$apellidoM}/{$correo}/{$nacimiento}/{$palabra_clave}/{$estado}/{$municipio}/{$calle}/{$numero_exterior}/{$numero_interno}/{$coor_lantitud}/{$coor_longitud}");
        echo $json;
        // Solo si es un archivo json, se utiliza esto
        // $obj = json_decode($json, true);
        // print_r($obj);
    ?>


    </div>

  </body>
</html>