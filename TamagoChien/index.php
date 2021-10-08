<?php
require_once ('model/Chien.class.php');
require_once ('model/Nourriture.class.php');

$nico = new Chien("nico");
$medor = new Chien("médor");

$kfc = new Nourriture("KFC", -30, 40);

echo $nico->manger($kfc);

?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tamagochien</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <h1 style="text-align: center;"><?= ucfirst($nico->getNom()); ?></h1>
                <img src="img/dog.png" width="200px" alt="">
            </div>
        </div>
    </div>
    </body>
<script src="js/bootstrap.min.js"></script>
</html>
