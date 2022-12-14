<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dashboard.css">
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
                    <i class="uil uil-user-square"></i>
                    <span class="text">Mi cuenta</span>
                    <?php
                    session_start();
                    $idUsuario = $_SESSION["id_cuenta"];
                    $jsonusuario = file_get_contents("http://localhost:6969/usuario/obtenerusuario/{$idUsuario}");
                    $obj = json_decode($jsonusuario);
                    $name = ($obj->nombre);
                    $apeP = ($obj->apellidoP);
                    $apeM = ($obj->apellidoM);
                    $mail = ($obj->correo);
                    ?>
                </div>
                <img src="../ClienteGreenWest/assets/images/LogoGreenWest.png" alt="">
            </div>
            <div class="dash-content">
                <form action="datosUsuario.php" method="POST" class="form-content">
                    <h1 class="tituloDatosPersonales">VERIFIQUE SUS DATOS PERSONALES</h1>
                    <div class="mb-3">
                        <img src="assets/images/datos_usuario_img.png" class="imagePersonal" alt="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nombre: </label>
                        <input name="nombre" type="text" class="form-control" placeholder="Nombre" required="required" value="<?php echo $name?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Apellido Paterno:</label>
                        <input name="apellidoP" type="text" class="form-control" placeholder="Apellido Paterno" required="required" value="<?php echo $apeP?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label">Apellido Materno:</label>
                        <input name="apellidoM" type="text" class="form-control" placeholder="Apellido Materno" required="required"  value="<?php echo $apeM?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label">Correo </label>
                        <input name="correo" class="form-control" type="text" placeholder="Correo" required="required"  value="<?php echo $mail ?>">
                    </div>
                    <div class="d-flex flex-row mb-3">
                        <div class="p-2">
                            <input type="submit" value="Actualizar" class="btn btn-success">
                        </div>
                    </div>
                </form>
                <?php
                if (empty($_POST['nombre']) || empty($_POST['apellidoP']) || empty($_POST['apellidoM']) || empty($_POST['correo'])) return;
                $nombre = rawurlencode($_POST['nombre']);
                $apellidoPat = rawurlencode($_POST['apellidoP']);
                $apellidoMat = rawurlencode($_POST['apellidoM']);
                $correo = rawurlencode($_POST['correo']);
                $json = file_get_contents("http://localhost:6969/usuario/actualizarusuario/{$nombre}/{$apellidoPat}/{$apellidoMat}/{$correo}/{$idUsuario}");
                echo '<script type="text/javascript">
                    alert("Usuario Actualizado");
                    window.location.href="datosUsuario.php";
                    </script>';
                ?>
            </div>
            </div>
        </section>

    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

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

</html>