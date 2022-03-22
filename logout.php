<?php
session_start();
if (isset($_GET['q'])) {
    $_SESSION['login'] = FALSE;
    session_destroy();
    header("location: home.php");
}
