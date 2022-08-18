<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/menuUsuario.css">

</head>

<body>
    <v-app id="#view-dashboard">
        <v-main>
            <nav>
                <div class="logo-image">
                    <img src="../ClienteGreenWest/assets/images/LogoGreenWest.png" alt="">
                </div>
                <div class="menu-items">
                    <ul class="nav-links">
                        <li><a href="menuUsuario.php">
                                <i class="uil uil-shopping-cart-alt"></i>
                                <span class="link-name"><b>Centro de canje</b></span>
                            </a></li>
                        <li><a href="datosUsuario.php">
                                <i class="uil uil-user-square"></i>
                                <span class="link-name"><b>Datos Personales</b></span>
                            </a></li>
                        <li><a href="contenedores.php">
                                <i class="uil uil-trash-alt"></i>
                                <span class="link-name"><b>Contenedores </b></span>
                            </a></li>
                        <li><a href="actualizarDireccion.php">
                                <i class="uil uil-location-pin-alt"></i>
                                <span class="link-name"><b>Dirección</b></span>
                            </a></li>
                        <li><a href="index.php">
                                <i class="uil uil-signout"></i>
                                <span class="link-name"><b>Cerrar Sesión</b></span>
                            </a></li>
                    </ul>
                    <ul class="logout-mode">
                        <li class="mode">
                            <div class="mode-toggle">
                                <span class="switch"></span>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <section class="dashboard">
                <div class="top">
                    <i class="uil uil-bars sidebar-toggle"></i>
                    <div class="title">
                        <i class="uil uil-shopping-cart-alt"></i>
                        <span class="text">Centro de Canje </span>
                        <?php
                        session_start();
                        print "<p>Bienvenido:  $_SESSION[user_name]</p>";
                        $idUsuario = $_SESSION["id_cuenta"];
                        $jsonpuntos = file_get_contents("http://127.0.0.1:8000/api/consultarPuntos/{$idUsuario}");
                        $puntos = json_decode($jsonpuntos);
                        echo ("Puntos: " . $puntos);
                        ?>
                    </div>
                    <img src="../ClienteGreenWest/assets/images/LogoGreenWest.png" alt="">
                </div>
                <div class="dash-content">
                    <div class="container">
                        <?php
                        $regalos = file_get_contents("http://127.0.0.1:8000/api/verRegalos");
                        $lista = json_decode($regalos);
                        foreach ($lista as $list) {
                        ?>
                            <div class="card-group">
                                <div class="card" style="width: 18rem;">
                                    <img src="http://127.0.0.1:8000<?php echo $list->imagen ?>" class="card-img-top" id="img-card" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $list->nombre ?></h5>
                                        <p class="card-text">
                                            Precio: <?php echo $list->costePuntos ?> puntos
                                            <br>
                                            Cantidad: <?php echo $list->cantidad ?> unidades 
                                            <br>
                                            <?php echo $list->id_regalo ?></p>
                                        </p>
                                        <form action="menuUsuario.php" method="POST" class="form-content">
                                            <input type="submit" value="Canjear" class="btn btn-success" name="canjear">
                                        </form>

                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                        <?php
                        $canjear = "";
                        if (isset($_POST['canjear'])) $canjear = $_POST['canjear'];

                        if ($canjear) {
                            $jsoncanje = file_get_contents("http://127.0.0.1:8000/api/Canjear/{$idUsuario}/{$id_regalo}}");
                            // var_dump($http_response_header);
                            // echo '<script type="text/javascript">
                            // alert("Caje Realizado");
                            //</script>';
                        }

                        ?>
                    </div>
                </div>
                </div>
            </section>

        </v-main>
    </v-app>
</body>

</html>

<script>
    const body = document.querySelector("body"),
        modeToggle = body.querySelector(".mode-toggle");
    sidebar = body.querySelector("nav");
    sidebarToggle = body.querySelector(".sidebar-toggle");

    let getMode = localStorage.getItem("mode");
    if (getMode && getMode === "dark") {
        body.classList.toggle("dark");
    }

    let getStatus = localStorage.getItem("status");
    if (getStatus && getStatus === "close") {
        sidebar.classList.toggle("close");
    }

    modeToggle.addEventListener("click", () => {
        body.classList.toggle("dark");
        if (body.classList.contains("dark")) {
            localStorage.setItem("mode", "dark");
        } else {
            localStorage.setItem("mode", "light");
        }
    });

    sidebarToggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
        if (sidebar.classList.contains("close")) {
            localStorage.setItem("status", "close");
        } else {
            localStorage.setItem("status", "open");
        }
    })
</script>