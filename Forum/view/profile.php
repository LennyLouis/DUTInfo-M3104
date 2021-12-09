<?php
include_once ('../model/User.class.php');
session_start();

if (isset($_SESSION['user-session'])&&is_a($_SESSION['user-session'], 'User')) {
    $u = $_SESSION['user-session'];?>
    <!-- Here the code -->
    <h2>Profile</h2>


<?php } else {
    echo "Please log-in.";
}
?>