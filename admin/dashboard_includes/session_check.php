<?php

if (!isset($_SESSION["login"])) {
    header("location: /admin/auth/signin.php");
}
if (!isset($_COOKIE["login"])) {
    session_destroy();
}
