<?php
session_start();

// Logged in Session variables
$token = $_SESSION[ 'login_token' ];
//$id = $_SESSION[ 'user_id' ];
$username = $_SESSION[ 'userName' ];
//$email = $_SESSION[ 'email' ];


include('../includes/config.inc.php');
include('../includes/connect.inc.php');
include('../includes/functions.inc.php');
include('../includes/router.inc.php');
//include(SITE_ROOT.'includes/templates/header.tpl.php');


$page_title = 'About Us';
?>

<head>
    <!-- main stylesheet link -->
    <link rel="stylesheet" href="../css/style.css" />

    <!--		JQUERY         -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"
            integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
            crossorigin="anonymous"></script>
    <script>
        // function for city-description page's login
		$(document).ready(function(){
			document.getElementById("login-redir").addEventListener("click", function(){
				location.href='../index.php#login';
			})
		})
    </script>

</head>


<header>
    <nav id="main-header">
        <div id="title"><li><a href="../index.php">Vacation Catalog</a></li></div>
        <div class="pages">

            <li><a href="#">About</a></li>

            <?php if($token===LOGGED_IN): ?>

            <li><a href="admin.php">Admin</a></li>
            <li><a href="../index.php?action=logout">Logout</a></li>

            <?php else: ?>

            <li><a id="login-redir">Login</a></li>

            <?php endif; ?>

        </div>
    </nav>

    <nav id="header-placeholder"></nav>
</header>

<body>
    <div id="about-us">
        <h3>- Our Mission Statement -</h3>
        <p>At Vacation Catalog, our goal is to enable travellers to share their experiences with the world. Those who are looking to travel can also look through the journals on our platform, to discover their next destination, or simply enjoy reading about the experiences of others. </p>
        <br>
        <blockquote>"I feel happy when I’m gaining new experiences and insights, and challenging my boundaries. Travel is the perfect catalyst for happiness, as it has allowed me to experience the natural, cultural and man-made wonders of the world. Being in foreign lands, it also continuously forces me to step out of my comfort zone - a great confidence-builder. In my book, travel is the best school there is: I’ve learned so much about the world and, most importantly, about myself."</blockquote>
        <blockquote>"I’m travelling right now and yes, I am indeed very happy. I am in Myanmar and learning and appreciating another culture.’ Tam worked with Minister of Home and Culture in Myanmar and the first Prime Minister of Bhutan to introduce the idea of the International Day of Happiness to the UN, an annual day which this year falls on 20th March. ‘Travel expands our capacity for wonder, joy and appreciation of the amazing diversity on our lovely planet. It makes me very happy indeed. If I didn’t travel, I may never have had the opportunity to meet the Minister and, who knows, maybe the International Day of Happiness may not have happened yet."</blockquote>
    </div>
</body>
