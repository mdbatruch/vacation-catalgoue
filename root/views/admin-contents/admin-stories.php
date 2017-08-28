<?php 
session_start();
$login_token = $_SESSION['login_token'];
//$user_id = $_SESSION['user_id'];
//$username = $_SESSION['username'];
//$email = $_SESSION['email'];

include('../../includes/config.inc.php');
include('../../includes/connect.inc.php');
include('../../includes/functions.inc.php');
include('../../includes/router.inc.php');
?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Content</title>

        <!-- main stylesheet link -->
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
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
            <h2>MY JOURNAL</h2>
            <p>Timeline of Journals</p>
        </div>
        
		<!--pam: USER'S TRAVEL POST TIMELINE-->
        <section class="cd-horizontal-timeline">
            <div class="timeline">
                <div class="events-wrapper">
                    <div class="events">
                        <ol>
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
		
		<?php 

       // include('../../includes/connect.inc.php');
        
        // Sets up query to fetch data
        $query = "SELECT id, journal_header, city_name, country_name, author_name, journal_description, star_rating FROM worldappreview WHERE author='$username'";

        // Sends query to db server and wait for result
        $result = mysqli_query($connect, $query)
            or die(mysqli_error($connect)); 

        if($result = mysqli_query($connect, $query)){

            // Fetch associative array then print
            // Each Row has class "review"
            while($row=mysqli_fetch_assoc($result)){
                // Sanitize
                $title = filter_var($row["journal_header"], FILTER_SANITIZE_STRING);
                $country = filter_var($row["country_name"], FILTER_SANITIZE_STRING);
                $city = filter_var($row["city_name"], FILTER_SANITIZE_STRING);
                $author = filter_var($row["author_name"], FILTER_SANITIZE_STRING);
                $description = filter_var($row["journal_description"], FILTER_SANITIZE_STRING);
                $rating = filter_var($row["star_rating"], FILTER_SANITIZE_STRING);

                printf ("
                <div class='stories'>
                <h3>Rating: %s</h3>
                <h4>%s</h4>
                <p>%s</p>
                <p>%s</p>
                <span>Submitted %s</span>", 
                        $title, 
                        $description,
                        $country,
                        $city,
                        $author,
                        $rating
                        );

                $id = $row["id"];

                // New URL to call "delete" function
                if($author==$username){
                    echo "<a class='delete-button' href=\"../includes/delete.inc.php?delete=$id\">delete</a>";
                }

                echo "</div><br>"; // Closes review container
            }

            // Free result set
            mysqli_free_result($result);
        }
        // Closes connection
        mysqli_close($connect);
        ?>
    </body>
</html>
