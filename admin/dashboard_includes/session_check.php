<?php
if (!isset($_SESSION["login"])) {
    header("location:/admin/auth/signin.php");
}
