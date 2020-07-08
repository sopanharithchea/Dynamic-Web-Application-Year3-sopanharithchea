<?php
session_start();
if ($_COOKIE["username"] == '' and $_SESSION["user"] == '') {
    echo 'Not logged in';
    header('Location:login.php');
    die();
} else {
    unset($_SESSION["logged"]);
    unset($_SESSION["user"]);
    unset($_SESSION["valid_user"]);

    $hour = time() - 3600 * 24 * 30;

    setcookie("userid", '', $hour);
    setcookie("username", '', $hour);
    setcookie("active", '', $hour);
    header('Location:login.php');
}
