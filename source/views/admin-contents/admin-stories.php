<?php 
session_start();
$login_token = $_SESSION['login_token'];
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];

include('../../includes/config.inc.php');
include('../../includes/connect.inc.php');
include('../../includes/functions.inc.php');
include('../../includes/router.inc.php');
?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Form</title>

        <!-- main stylesheet link -->
        <link rel="stylesheet" type="text/css" href="../../css/style.css" />
        <!-- Styling for rating stars -->
        <link rel="stylesheet" type="text/css" href="../../css/rating-style.css" />


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

        <!-- JS scripts -->

    </head>

    <body>
        <h4>MY JOURNAL</h4>
        <?php 

        include('../../includes/connect.inc.php');

        // Sets up query to fetch data
        $query = "SELECT id, rating, title, description, imagelink, author,date FROM Stories WHERE author='$username'";

        // Sends query to db server and wait for result
        $result = mysqli_query($connect, $query)
            or die(mysqli_error($connect));

        if($result = mysqli_query($connect, $query)){

            // Fetch associative array then print
            // Each Row has class "review"
            while($row=mysqli_fetch_assoc($result)){
                // Sanitize
                $title = filter_var($row["title"], FILTER_SANITIZE_STRING);
                $description = filter_var($row["description"], FILTER_SANITIZE_STRING);
                $url = filter_var($row["imagelink"], FILTER_SANITIZE_URL);
                $author = filter_var($row["author"], FILTER_SANITIZE_STRING);

                printf ("
                <div class='stories'>
                <h3>Rating: %s</h3>
                <h4>%s</h4>
                <p>%s</p>
                <p>%s</p>
                <span>Submitted %s</span>", 
                        $row["rating"], 
                        $title, 
                        $description,
                        $url,
                        $row["date"]);

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
