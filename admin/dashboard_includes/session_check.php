<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: /admin/auth/signin.php");
    die();
}
if (!isset($_COOKIE["login"])) {
    session_destroy();
}
