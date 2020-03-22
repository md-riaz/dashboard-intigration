<?php
include 'db.php';
//Check role
function role($role)
{
    if ($role == 1) {
        echo "Admin";
    } else if ($role == 2) {
        echo "Moderator";
    } else if ($role == 3) {
        echo "Editor";
    } else {
        echo "User";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- jQuery -->
    <script src="/admin/dashboard_assets/js/core/jquery.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link href="/css/fontawesome-all.min.css" rel="stylesheet">
    <!-- Material Kit CSS -->
    <link href="/admin/dashboard_assets/css/material-dashboard.min.css?v=2.1.2" rel="stylesheet" />
    <link href="/admin/dashboard_assets/css/style.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper ">
        <div class="main-panel">