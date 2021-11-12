<?php
session_start();

if(isset($_SESSION['mode'])){
    if($_SESSION['mode'] == "light"){
        $_SESSION['mode'] = "dark";
    } else {
        $_SESSION['mode'] = "light";
    }
} else {
    $_SESSION['mode'] = "dark";
}

echo $_SESSION['mode'];

header("Location: accueil.php");