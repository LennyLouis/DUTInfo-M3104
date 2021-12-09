<?php

include_once('../model/User.class.php');
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $query = User::checkUserPassword($_POST['username'], $_POST['password']);
    if(is_a($query, "User")){
        $_SESSION['user-session'] = $query;
        header('Location: ../index.php');
    } else {
        switch($query){
            case 'username-error':
                $_SESSION['login-error'] = "You entered a wrong username.";
                break;
            case 'password-error':
                $_SESSION['login-error'] = "You entered a wrong password.";
                break;
            case 'bdd-connection-error':
                $_SESSION['login-error'] = "There is a problem with the database. Please contact the admin.";
                break;
            default:
                $_SESSION['login-error'] = "An error has occurred.";
                break;
        }
        header('Location: ../index.php');
    }

} else {
    header('Location: ../index.php');
}