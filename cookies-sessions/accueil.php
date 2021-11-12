<?php
require_once('model/user.class.php');
session_start();


$u = $_SESSION['user'];


?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Page d'accueil</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/styles.css">
        <script src="https://unpkg.com/feather-icons"></script>
        <?php
        if(isset($_SESSION['mode'])){
            if($_SESSION['mode']=="dark"){
        ?>
                <style>
                    :root {
                        --bs-primary: #292f2e;
                        --bs-secondary: #2c3e50;
                        --bs-primary-rgb: 41, 47, 56;
                        --bs-secondary-rgb: 44, 62, 80;
                    }

                    .copyright {
                        background-color: #2c3e50;
                    }
                </style>
        <?php
            }
        }
        ?>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">Mon compte</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <!--<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolio">Portfolio</a></li>-->
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="lumiere.php"><?php if(isset($_SESSION['mode'])){if($_SESSION['mode']=='dark'){ echo '<i data-feather="sun"></i>'; } else { echo '<i data-feather="moon"></i>'; }} else { echo '<i data-feather="moon"></i>'; }?></a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="logout.php">Deconnexion<i style="padding-left: 4px;" data-feather="log-out"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5 img-thumbnail" src="<?= $u->getAvatar() ?>" alt="..." />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Bonjour <?= $u->getFirstname() . $u->getLastname() ?></h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
            </div>
        </header>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; Your Website 2021</small></div>
        </div>
    <script>
        feather.replace()
    </script>
    </body>
</html>
