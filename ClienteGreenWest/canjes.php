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
                        <i class="uil uil-store"></i>
                        <span class="text">Canjes </span>
                    </div>
                    <div class="p-2">
                        <?php
                        session_start();
                        print "<p>Bienvenido:  $_SESSION[user_name]</p>";
                        ?>
                    </div>
                    <div class="p-2">
                        <?php
                        $idUsuario = $_SESSION["id_cuenta"];
                        ?>
                    </div>
                </div>

            </div>
            <div class="dash-content">
                <table class="table table-striped table-hover" style="margin-top: 10%;">
                    <thead>
                        <tr>
                            <th scope="col">No. Canje</th>
                            <th scope="col">Fecha del Canje</th>
                            <th scope="col">Id Usuario</th>
                            <th scope="col">Id Regalo</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $canjes = file_get_contents("http://127.0.0.1:8000/api/consultarCanjes");
                        $lista = json_decode($canjes);
                        foreach ($lista as $list) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $list->id_canje ?></th>
                            <td><?php echo $list->fechaCanje ?></td>
                            <td><?php echo $list->id_usuario ?></td>
                            <td><?php echo $list->id_regalo ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </section>
    </main>
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