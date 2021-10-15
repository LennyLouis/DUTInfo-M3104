<?php

include_once('db.inc.php');

$bdd = new PDO("$server:host=$host;dbname=$base", $user, $pass);

if(isset($_POST['atq'])&&isset($_POST['hp'])){
    $sql = 'SELECT * FROM pokemon ORDER BY ATQ '.$_POST['atq'].', HP '.$_POST['hp'];
} else {
    $sql = "SELECT * FROM pokemon";
}


?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Pokédex</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <div class="container row" style="padding-top: 50px">
            <div class="col-md-6">
                <form method="post">
                <p>Veuillez affinez vos critères de recherche :</p>
                <div>
                    <h2>Attaque :</h2>
                    <input type="radio" id="atqASC"
                           name="atq" value="DESC" required>
                    <label for="atqASC">Croissant</label>

                    <input type="radio" id="atqDESC"
                           name="atq" value="ASC" required>
                    <label for="atqDESC">Décroissant</label>

                    <h2>Point de vie :</h2>
                    <input type="radio" id="hpASC"
                           name="hp" value="DESC" required>
                    <label for="hpASC">Croissant</label>

                    <input type="radio" id="hpDESC"
                           name="hp" value="ASC" required>
                    <label for="hpDESC">Décroissant</label>
                </div>
                    <br>
                <div>
                    <button class="btn btn-warning" type="submit">Rechercher</button>
                </div>
            </form>
            </div>
            <div class="col-md-6">
                <h2>Mon pokédex : </h2>
                <br>
                <ul>
                <?php
                foreach($bdd->query($sql) as $poke){
                    echo '<li>'.$poke['nom'].' | Attaque : '.$poke['ATQ'].' - PDV : '.$poke['HP'].'</li>';
                }
                ?>
            </ul>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>