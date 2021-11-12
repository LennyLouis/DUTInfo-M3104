<?php
session_start();

include_once('model/user.class.php');

$uLenny = new User(0, "Lenny", "Chon", "assets/img/lenny.jpg");
$uAlexis = new User(1, "Astérix", "-Ménir", "assets/img/alexis.jpg");
$uAlbin = new User(2, "Albin", "ks", "assets/img/albin.jpg");

if(isset($_POST['user'])){
    switch ($_POST['user']){
        case 'Lenny':
            $_SESSION['user'] = $uLenny;
            break;
        case 'Alexis':
            $_SESSION['user'] = $uAlexis;
            break;
        case 'Albin':
            $_SESSION['user'] = $uAlbin;
            break;
    }
}

if(isset($_SESSION['user'])){
    header('Location: accueil.php');
}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
    <body>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-4">
                    <form action="" method="post">
                        <input type="radio" name="user" id="Lenny" value="Lenny" required>
                        <label for="Lenny">Lenny</label>
                        <input type="radio" name="user" id="Alexis" value="Alexis" required>
                        <label for="Alexis">Alexis</label>
                        <input type="radio" name="user" id="Albin" value="Albin" required>
                        <label for="Albin">Albin</label>
                        <br>
                        <input class="form-control" type="submit" value="Connexion">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
