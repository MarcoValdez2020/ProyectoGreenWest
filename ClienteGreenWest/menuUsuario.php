<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
   

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
                        <li><a href="#">
                                <i class="uil uil-shopping-cart-alt"></i>
                                <span class="link-name"><b>Centro de canje</b></span>
                            </a></li>
                        <li><a href="#">
                                <i class="uil uil-user-square"></i>
                                <span class="link-name"><b>Datos Personales</b></span>
                            </a></li>
                        <li><a href="contenedores.php">
                                <i class="uil uil-trash-alt"></i>
                                <span class="link-name"><b>Contenedores </b></span>
                            </a></li>
                        <li><a href="#">
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
                        <span class="text">Centro de Canje</span>
                    </div>
                    <img src="../ClienteGreenWest/assets/images/LogoGreenWest.png" alt="">
                </div>
                <div class="dash-content">
                    <h1 id="title-dash">BIENVENIDO, QUE TENGA UN EXCELENTE DÍA</h1>
                </div>
                </div>
            </section>

        </v-main>

        <footer>
            <div class="flex-container">
                <div class="content1-login">
                    <strong class="subheading footer-text">Green Waste C.V <i class="uil uil-estate"></i></strong>
                </div>
                <div class="content2-longin">
                    <strong class="text-gps">Pachuca de Soto Hidalgo<i class="uil uil-home"></i></strong>
                </div>
            </div>
        </footer>
    </v-app>
</body>

</html>
<script>
    const body = document.querySelector("body"),
      modeToggle = body.querySelector(".mode-toggle");
      sidebar = body.querySelector("nav");
      sidebarToggle = body.querySelector(".sidebar-toggle");

let getMode = localStorage.getItem("mode");
if(getMode && getMode ==="dark"){
    body.classList.toggle("dark");
}

let getStatus = localStorage.getItem("status");
if(getStatus && getStatus ==="close"){
    sidebar.classList.toggle("close");
}

modeToggle.addEventListener("click", () =>{
    body.classList.toggle("dark");
    if(body.classList.contains("dark")){
        localStorage.setItem("mode", "dark");
    }else{
        localStorage.setItem("mode", "light");
    }
});

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")){
        localStorage.setItem("status", "close");
    }else{
        localStorage.setItem("status", "open");
    }
})
</script>
<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

:root{
    /* ===== Colors ===== */
    --primary-color: #6BCB77;
    --panel-color: #FFF;
    --text-color: #000;
    --black-light-color: #888;
 
    
    /* ====== Transition ====== */
    --tran-05: all 0.5s ease;
    --tran-03: all 0.3s ease;
    --tran-03: all 0.2s ease;
}



/* === Custom Scroll Bar CSS === */

nav{
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 250px;
    padding: 10px 14px;
    background-color: var(--panel-color);
    border-right: 1px solid var(--border-color);
    transition: var(--tran-05);
    
}
nav.close{
    width: 73px;

}
nav .logo-name{
   text-align: center;
}
nav .logo-image{
    display: flex;
    justify-content: center;
    min-width: 25px;
}
nav .logo-image img{
    width: 100%;
    object-fit: cover;
    border-radius: 50%;
}

nav .menu-items{
    margin-top: 0px;
    height: calc(100% - 90px);
    display: flex;
    flex-direction: column;
    justify-content: space-between;

}
.menu-items li{
    list-style: none;
    margin-top:10px;
}
.menu-items li a{
    display: flex;
    align-items: center;
    height: 50px;
    text-decoration: none;
    position: relative;
}
.nav-links li a:hover:before{
    content: "";
    position: absolute;
    left: -12px;
    height: 10px;
    width: 10px;
    border-radius: 100%;
    background-color: var(--primary-color);
}
body.dark li a:hover:before{
    background-color: #fff
}
.menu-items li a i{
    font-size: 24px;
    min-width: 45px;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--black-light-color);
}
.menu-items li a .link-name{
    font-size: 18px;
    font-weight: 400;
    color: var(--black-light-color);    
    transition: var(--tran-05);
}
nav.close li a .link-name{
    opacity: 0;
    pointer-events: none;
}
.nav-links li a:hover i,
.nav-links li a:hover .link-name{
    color:#fff;
}
li:hover{
    border-radius: 20px;
    background: #6BCB77;
}
body.dark .nav-links li a:hover i,
body.dark .nav-links li a:hover .link-name{
    color: #fff;
}
.dashboard{
    position: relative;
    left: 250px;
    background-color: #F8F8F8;
    min-height: 100vh;
    width: calc(100% - 250px);
    padding: 10px 14px;
    transition: var(--tran-05);
}
nav.close ~ .dashboard{
    left: 73px;
    width: calc(100% - 73px);
}
.dashboard .top{
    position: fixed;
    top: 0;
    left: 250px;
    display: flex;
    width: calc(100% - 250px);
    justify-content: space-between;
    align-items: center;
    padding: 10px 14px;
    background-color: var(--panel-color);
    transition: var(--tran-05);
    z-index: 10;
    box-shadow: 2px 2px #888888;
}
nav.close ~ .dashboard .top{
    left: 73px;
    width: calc(100% - 73px);
}
.dashboard .top .sidebar-toggle{
    font-size: 26px;
    color: var(--text-color);
    cursor: pointer;
}

.top img{
    width: 40px;
    border-radius: 50%;
}

@media (max-width: 900px) {
    nav{
        width: 73px;
        
    }
    nav.close{
        width: 250px;
    }
    nav .logo_name{
        opacity: 0;
        pointer-events: none;
    }
    nav.close .logo_name{
        opacity: 1;
        pointer-events: auto;
    }
    nav li a .link-name{
        opacity: 0;
        pointer-events: none;
    }
    nav.close li a .link-name{
        opacity: 1;
        pointer-events: auto;
    }
    nav ~ .dashboard{
        left: 73px;
        width: calc(100% - 73px);
    }
    nav.close ~ .dashboard{
        left: 250px;
        width: calc(100% - 250px);
    }
    nav ~ .dashboard .top{
        left: 73px;
        width: calc(100% - 73px);
    }
    nav.close ~ .dashboard .top{
        left: 250px;
        width: calc(100% - 250px);
    }
    .activity .activity-data{
        overflow-X: scroll;
    }
}

@media (max-width: 780px) {
   
}
@media (max-width: 560px) {

}
@media (max-width: 400px) {
    nav{
        width: 0px;
    }
    nav.close{
        width: 73px;
    }
    nav .logo_name{
        opacity: 0;
        pointer-events: none;
    }
    nav.close .logo_name{
        opacity: 0;
        pointer-events: none;
    }
    nav li a .link-name{
        opacity: 0;
        pointer-events: none;
    }
    nav.close li a .link-name{
        opacity: 0;
        pointer-events: none;
    }
    nav ~ .dashboard{
        left: 0;
        width: 100%;
    }
    nav.close ~ .dashboard{
        left: 73px;
        width: calc(100% - 73px);
    }
    nav ~ .dashboard .top{
        left: 0;
        width: 100%;
    }
    nav.close ~ .dashboard .top{
        left: 0;
        width: 100%;
    }
}
</style>

