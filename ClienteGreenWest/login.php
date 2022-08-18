<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
  <?php require 'partes/header.php' ?>


    <h1>Ingresa</h1>
    <span><a href="registro.php">Registrate</a></span>
    <span>ó regresa a la<a href="index.php"> Pagina principal</a></span>

      <form action="login.php" method="POST">
        <input name="usuario" type="text" placeholder="Ingresa tu usuario" required="required">
        <input name="password" type="password" placeholder="Ingresa tu contraseña" minlength="8" maxlength="8" required="required">
        <input type="submit" value="Submit">
      </form>

    <?php
        if (empty($_POST['usuario']) || empty($_POST['password'])) return;
        $usuario = rawurlencode($_POST['usuario']);
        $password = rawurlencode($_POST['password']);
        $json = file_get_contents("http://localhost:6969/cuenta/login/{$usuario}/{$password}");

        if($json == "true"){
          $usuarioLogueado = file_get_contents("http://localhost:6969/cuenta/consultarcuenta/{$usuario}/{$password}");
          $user = json_decode($usuarioLogueado);
          //Obtener usuario logueado
          session_start();
          $_SESSION["id_cuenta"] = $user->id_cuenta;
          //Obtener nombre del usuario logueado
          $_SESSION["user_name"] = $user->usuario;

          if($user->rol==false){
            $menuUsuario='menuUsuario.php';
            header('Location: '.$menuUsuario);
          } else{
            $menuAdmin='menuAdmin.php';
            header('Location: '.$menuAdmin);
          }
        } else{
          echo "Usuario o contraseña incorrecto";
        }
    ?>
  </body>
</html>
