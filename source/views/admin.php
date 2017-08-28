<?php
include('../includes/config.inc.php');
include('../includes/connect.inc.php');
include('../includes/functions.inc.php');
include('../includes/router.inc.php');

?>
<html>
    <head>
        <!-- main stylesheet link -->
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
        <link rel="stylesheet" type="text/css" href="../css/admin-style.css" />

        <!-- JQuery CDN -->
        <script
                src="https://code.jquery.com/jquery-3.2.1.min.js"
                integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                crossorigin="anonymous">
        </script>
		
		<!-- Custom JS -->
		<script src="../js/admin.js"></script>

        <script>
            $(document).ready(function(){

                $('#admin-contents').load("./admin-contents/admin-profile.php");

                $("#profile-icon").click(function(){
                    $('#admin-contents').load("./admin-contents/admin-profile.php");
                });

                $("#content-icon").click(function(){
                    $('#admin-contents').load("./admin-contents/admin-stories.php");
                });

                $("#favorites-icon").click(function(){
                    $('#admin-contents').load("./admin-contents/admin-favorites.php");
                });

                $("#post-icon").click(function(){
                    $('#admin-contents').load("./admin-contents/admin-post.php");
                });
            });
        </script>

    </head>
    <body>
        <!-- SIDE NAV -->
        <div id="mySidenav" class="sidenav">

            <a href="../index.php"><img src="../images/icons/home-white.png" class="home-icon"/></a>
            <div id="nav-items">
                <div id="profile-icon"><a>Profile</a></div>
                <div id="content-icon"><a>Content</a></div>
                <div id="favorites-icon"><a>Favorites</a></div>
                <div id="post-icon"><a>Post</a></div>
                <br>
                <div id="favorites-icon"><a href="../index.php?action=logout">Logout</a></div>
            </div>
        </div>

        <!-- PAGE CONTENT -->
        <div id="main">
            <div id="admin-contents"></div>
        </div>
    </body>
</html>