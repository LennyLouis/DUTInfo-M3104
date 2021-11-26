<?php

include_once('db.inc.php');

if (isset($server)&&isset($host)&&isset($base)&&isset($user)&&isset($pass)) {
    $bdd = new PDO("$server:host=$host;dbname=$base", $user, $pass);
}

if($_GET['search']!=""){
    $sql = 'SELECT * FROM pizza WHERE name LIKE "'.$_GET['search'].'%"';
} else {
    $sql = "SELECT * FROM pizza";
}

echo '<div class="pizzaList" id="listPizza">';

foreach ($bdd->query($sql) as $pizza) {?>

    <div class="pizza">
        <h2><?= $pizza['name'] ?></h2>
        <img src="<?= $pizza['img'] ?>" class="pizzaImg" alt="Pizza Image">
        <p><?= $pizza['price'] ?>€</p>
    </div>

<?php
}

echo '</div>';