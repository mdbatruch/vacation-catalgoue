<?php 
session_start();

// Logged in Session variables
$token = $_SESSION[ 'login_token' ];
//$id = $_SESSION[ 'user_id' ];
//$username = $_SESSION[ 'userName' ];
//$email = $_SESSION[ 'email' ];

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <title>Vacation Catalog</title>

        <!-- main stylesheet link -->
        <link rel="stylesheet" href="css/style.css" />

        <!--		JQUERY         -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"
                integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
                crossorigin="anonymous"></script>

        <!--        JAVASCRIPT         -->
        <script src="../../js/scripts.js"></script>

        <!--        IMAGE GALLERY         -->
        <script src="../../js/pgwslider.js"></script>
        <link rel="stylesheet" href="../../css/pgwslider.css">

        <!-- Masonry -->
        <script src="../../js/masonry.pkgd.min.js"></script>

        <!-- Google Maps API -->
        <!--
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoPNsXcMUsUvMhL_5WdKdjMk8DEr4uCgI&callback=initMap"
async defer></script>
-->

        <!-- Login Modal -->
        <link rel="stylesheet" type="text/css" href="css/default.css" />
        <link rel="stylesheet" type="text/css" href="css/component.css" />

        <!--pam: preloading page StyleSheet-->
        <link rel="stylesheet" type="text/css" href="../../css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="../../css/demo.css" />
        <link rel="stylesheet" type="text/css" href="../../css/preload.css" />
        <!--pam: preloading js-->
        <script src="../../js/modernizr.custom.js"></script>



        <!-- HTML5Shiv: adds HTML5 tag support for older IE browsers -->
        <!--[if lt IE 9]>
<script src="js/html5shiv.min.js"></script>
<![endif]-->
    </head>

    <!--pam: add class to body-->
    <body class="demo-1">

        <!--pam: create a container for preloading page-->
        <div id="ip-container" class="ip-container">

            <!--pam: add nav into main content part-->
            <div class="ip-main">
                <nav id="main-header">
                    <div id="title">
                        <li><a href="index.php">Vacation Catalog</a></li>
                    </div>
                    <div class="pages" id="menu">

                        <li><a href="views/about-us.php">About</a></li>

                        <!-- Logged in/ & logged out Nav-->
                        <?php if($token===LOGGED_IN): ?>

                        <li><a href="../../views/admin.php">Admin</a></li>
                        <li><a href="index.php?action=logout">Logout</a></li>

                        <?php else: ?>

                        <li><a id="login-modal" class="md-trigger" data-modal="modal-1">Login</a></li>

                        <?php endif; ?>

                    </div>
                </nav>

                <nav id="header-placeholder"></nav>
            </div>
