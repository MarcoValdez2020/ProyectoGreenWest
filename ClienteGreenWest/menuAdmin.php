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
    <link rel="stylesheet" href="css/datosUsuario.css">

</head>

<body>
        <main>
            <nav>
                <div class="logo-image">
                    <img src="../ClienteGreenWest/assets/images/LogoGreenWest.png" alt="">
                </div>
                <div class="menu-items">
                    <ul class="nav-links">
                        <li><a href="menuAdmin.php">
                                <i class="uil uil-shopping-cart-alt"></i>
                                <span class="link-name"><b>Regalos</b></span>
                            </a></li>
                            <li><a href="verRegalos.php">
                                <i class="uil uil-shopping-cart-alt"></i>
                                <span class="link-name"><b>Ver Regalos</b></span>
                            </a></li>
                        <li><a href="http://127.0.0.1:4301">
                                <i class="uil uil-dashboard"></i>
                                <span class="link-name"><b>Dashboard</b></span>
                            </a></li>
                        <li><a href="canjes.php">
                                <i class="uil uil-store"></i>
                                <span class="link-name"><b>Canjes</b></span>
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
                    <div class="d-flex flex-row" id="enca">
                        <div class="p-2">
                            <i class="uil uil-shopping-cart-alt"></i>
                            <span class="text">Regalos </span>
                        </div>
                        <div class="p-2">
                            <?php
                            session_start();
                            print "<p>Bienvenido:  $_SESSION[user_name]</p>";
                            $idUsuario = $_SESSION["id_cuenta"];
                            ?>
                        </div>
                    </div>
                </div>
                <div class="dash-content">
                <form action="menuAdmin.php" method="POST" class="form-content">
                    <h1 class="tituloDatosPersonales">Regalos</h1>
                    <div class="mb-3">
                        <img src="assets/images/regalo.png" class="imagePersonal" alt="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nombre: </label>
                        <input name="nombre" type="text" class="form-control"  required="required">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Imagen:</label>
                        <input name="imagen" type="file" class="form-control"  required="required" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label">Precio:</label>
                        <input name="costePuntos" type="text" class="form-control" required="required" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label">Cantidad: </label>
                        <input name="cantidad" class="form-control" type="text" required="required" >
                    </div>
                    <div class="d-flex flex-row mb-3">
                        <div class="p-2">
                            <input type="submit" value="Agregar" class="btn btn-success">
                        </div>
                    </div>
                </form>
                <?php
                echo "Hola";
                if (empty($_POST['nombre']) || empty($_POST['imagen']) || empty($_POST['costePuntos']) || empty($_POST['cantidad'])) return;
                $nombre = rawurlencode($_POST['nombre']);
                $imagen = rawurlencode($_POST['imagen']);
                $costePuntos = rawurlencode($_POST['costePuntos']);
                $cantidad = rawurlencode($_POST['cantidad']);
                $array = array(
                    "nombre" => $nombre,
                    "imagen" => $imagen,
                    "costePuntos" => $costePuntos,
                    "cantidad" => $cantidad
                );
                $json = json_encode($array);
                $bytes = file_put_contents("myfile.json", $json);
                $js = json_decode($json);
                //print_r($json);
               // header('Content-Type: application/json');
                $jsonagregar = file_get_contents("http://127.0.0.1:8000/api/agregarRegalo",$json);
                //echo '<script type="text/javascript">
                  //  alert("Usuario Actualizado");
                //    window.location.href="datosUsuario.php";
                //    </script>';
                ?>
            </div>
            </div>
        </section>
        </main>
</body>

</html>
<?php
                           /* if (empty($_POST['nombre']) || empty($_POST['imagen']) || empty($_POST['costePuntos']) || empty($_POST['cantidad'])) return;
                            $nombre = rawurlencode($_POST['nombre']);
                            $imagen = rawurlencode($_POST['imagen']);
                            $costePuntos = rawurlencode($_POST['costePuntos']);
                            $cantidad = rawurlencode($_POST['cantidad']);

                            $array = array(
                                "nombre" => $nombre,
                                "imagen" => $imagen,
                                "costePuntos" => $costePuntos,
                                "cantidad" => $cantidad
                            );
                            $json = json_encode($array);
                            $bytes = file_put_contents("myfile.json", $json);
                            $js = json_decode($json);
                            echo "Hola";

                            $jsonagregar = file_get_contents("http://127.0.0.1:8000/api/agregarRegalo");
                          */ // echo '<script type="text/javascript">
                    //alert("Regalo Agregado");
                    //window.location.href="datosUsuario.php";
                    //</script>';
                            ?>
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