<?php 
session_start();

$login_token = $_SESSION['login_token'];
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
?>

<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Form</title>

		<!-- main stylesheet link -->
		<link rel="stylesheet" type="text/css" href="../../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../../css/timeline.css" />

		<!-- Animated Modal Dialog Box -->
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css" />


		<!-- HTML5Shiv: adds HTML5 tag support for older IE browsers -->
		<!--[if lt IE 9]>
<script src="js/html5shiv.min.js"></script>
<![endif]-->

		<!-- JQuery CDN -->
		<script
				src="https://code.jquery.com/jquery-3.2.1.min.js"
				integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
				crossorigin="anonymous"></script>
        
        <!--jQuery timeline-->
        <script src="../../js/modernizr.js"></script>
<!--        <script src="../../js/jquery-2.1.4.js"></script>-->
        <script src="../../js/jquery.mobile.custom.min.js"></script>
        <script src="../../js/main.js"></script>
        
		<!-- JS scripts -->
        
        
	</head>

	<body>
		<div class="admin-content">
			<h2>PROFILE</h2>
			<p>USER DESCRIPTIONS AND BIO</p>
            
			<?php
			echo "<br>";
			echo "<h4>".$login_token."</h4>";
            echo "<h4>".$user_id."</h4>";
            echo "<h4>".$username."</h4>";
            echo "<h5>".$email."</h5>";
			?>
            
		</div>

        
        
<!--USER'S TRAVEL POST TIMELINE-->
        <section class="cd-horizontal-timeline">
            <div class="timeline">
                <div class="events-wrapper">
                    <div class="events">
                        <ol>
<!--pam : data-* global attribute-->
                            <li><a href="#0" data-date="01/06/2017" class="selected">01 Jun</a></li>
                            <li><a href="#0" data-date="08/06/2017">08 Jun</a></li>
                            <li><a href="#0" data-date="20/06/2017">20 Jun</a></li>
                            <li><a href="#0" data-date="26/06/2017">26 Jun</a></li>
                            <li><a href="#0" data-date="18/07/2017">18 Jul</a></li>
                            <li><a href="#0" data-date="31/07/2017">31 Jul</a></li>
                        </ol>

                        <span class="filling-line" aria-hidden="true"></span>
                    </div>
                </div>

                <div class="cd-timeline-navigation">
                    <a href="#0" class="prev inactive">Prev</a>
                    <a href="#0" class="next">Next</a>
                </div> 
            </div>

            <div class="events-content">
                <ol>
                    <li class="selected" data-date="01/06/2017">
                        <h2>Event Title</h2>
                        <em>June 1st, 2017</em>
                        <p>	
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                        </p>
                    </li>

                    <li data-date="08/06/2017">
                        <h2>Event Title</h2>
                        <em>June 8th, 2017</em>
                        <p>	
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                        </p>
                    </li>

                    <li data-date="20/06/2017">
                        <h2>Event Title</h2>
                        <em>June 20th, 2017</em>
                        <p>	
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                        </p>
                    </li>

                    <li data-date="26/06/2017">
                        <h2>Event Title</h2>
                        <em>June 26th, 2017</em>
                        <p>	
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                        </p>
                    </li>

                    <li data-date="18/07/2017">
                        <h2>Event Title</h2>
                        <em>July 18th, 2017</em>
                        <p>	
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                        </p>
                    </li>
                    
                    <li data-date="31/07/2017">
                        <h2>Event Title</h2>
                        <em>July 31st, 2017</em>
                        <p>	
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                        </p>
                    </li>
                </ol>
            </div>
        </section>
        
        
        
	</body>
</html>
