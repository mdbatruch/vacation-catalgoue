<?php

session_start();

include('includes/config.inc.php');
include('includes/connect.inc.php');
include('includes/functions.inc.php');
include('includes/router.inc.php');

// Nav
include('includes/templates/header.tpl.php');

// Login Form
include('includes/templates/login.tpl.php');

$login_token = $_SESSION['login_token'];
//$user_id = $_SESSION['user_id'];
$username = $_SESSION['userName'];
//$email = $_SESSION['email'];

?>

<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
<!-- JQV World Map -->
<link rel="stylesheet" href="css/jqvmap.min.css" />
<link rel="stylesheet" href="css/jqvmap.css" />
<script type="text/javascript" src="js/world-map/jquery.vmap.js"></script>
<script type="text/javascript" src="js/world-map/jquery.vmap.min.js" charset="utf-8"></script>
<script type="text/javascript" src="js/world-map/maps/jquery.vmap.world.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#vmap').vectorMap({ 
            map: 'world_en',
            backgroundColor: '#f2efea',
            borderColor: '#000',
            borderOpacity: 0.25,
            borderWidth: 1,
            color: '#223843',
            enableZoom: false,
            hoverColor: '#62929e',
            hoverOpacity: null,
            normalizeFunction: 'linear',
            scaleColors: ['#b6d6ff', '#005ace'],
            selectedColor: '#132731',
            selectedRegions: null,
            showTooltip: true,
            //            onRegionClick: function(element, code, region)
            //            {
            //                var message = 'You clicked "'
            //                + region
            //                + '" which has the code: '
            //                + code.toUpperCase();
            //
            //                alert(message);
            //            }

        });
    });
</script>


<script>

    // Log journey (Signed in)
    function postJournal(){
        location.href='views/admin.php#post';
        $('#admin-contents').load("./admin-contents/admin-post.php");
    };

    // function for city-description page's login
    $(document).ready(function(){

        if( window.location.hash == '#login' ){
            document.getElementById("login-modal").click();

            window.location.hash = "";
        }
    })

</script>


<div id="home-main-list">
    <?php if($token===LOGGED_IN): ?>
    <!-- If logged in -->
    <!-- Goes to post in admin panel-->
    <li><a id="log-journey" onclick="postJournal(this)">LOG YOUR JOURNEY</a></li>

    <?php else: ?>

    <!-- Opens login modal -->
    <li><a class="md-trigger" data-modal="modal-1">LOG YOUR JOURNEY</a></li>

    <?php endif; ?>


    <li><a href="views/city-description.php">DISCOVER</a></li>
</div>

<div id="vmap" style="width: 100%; height: 400px;"></div>

<!--
<div id="home-banner-container">

</div>
-->

<!-- Map API or Visual Component -->
<!--<div id="home-map-container">-->
<!-- REGULAR MAP API
<div id="map"></div> -->

<!-- STATIC MAP API -->
<!--
<img src="https://maps.googleapis.com/maps/api/staticmap?center=0,0&zoom=2&size=900x350&style=feature:all|element:labels.text.fill|color:0xffffff&style=feature:all|element:labels.text.stroke|color:0x000000|lightness:13&style=feature:administrative|element:geometry.fill|color:0x000000&style=feature:administrative|element:geometry.stroke|color:0x144b53|lightness:14|weight:1.4&style=feature:landscape|element:all|color:0x223843&style=feature:poi|element:geometry|color:0x0c4152|lightness:5&style=feature:road.highway|element:geometry.fill|color:0x000000&style=feature:road.highway|element:geometry.stroke|color:0x0b434f|lightness:25&style=feature:road.arterial|element:geometry.fill|color:0x000000&style=feature:road.arterial|element:geometry.stroke|color:0x0b3d51|lightness:16&style=feature:road.local|element:geometry|color:0x000000&style=feature:transit|element:all|color:0x146474&style=feature:water|element:all|color:0xdee3df&key=AIzaSyCF1F_DOA_N0Tev7tX5Nsa7PDYaWysYRlc" />
</div>
-->

<!-- Content Selector (New/Popular) -->
<div id="selector-container">
    <ul>

    </ul>
</div>

<!-- Gallery Slider/Generator -->
<div id="home-gallery">
    <div class="masonry">
        <div class="grid-item"><img src="./images/Gallery/thumbnails/1.jpg" id="img1" /></div>
        <div class="grid-item"><img src="./images/Gallery/thumbnails/2.jpg" id="img2" /></div>
        <div class="grid-item"><img src="./images/Gallery/thumbnails/3.jpg" id="img3" /></div>
        <div class="grid-item"><img src="./images/Gallery/thumbnails/4.jpg" id="img4" /></div>
        <div class="grid-item"><img src="./images/Gallery/thumbnails/5.jpg" id="img5" /></div>
        <div class="grid-item"><img src="./images/Gallery/thumbnails/6.jpg" id="img6"/></div>
    </div>
</div>



<!-- Journals Display -->
<?php 
include('views/home-display.php');
include('includes/templates/footer.tpl.php');
?>

<!-- classie.js by @desandro: https://github.com/desandro/classie -->
<script src="js/modal/classie.js"></script>
<script src="js/modal/modalEffects.js"></script>


<!--pam - for preloading page animation-->
<script src="js/classie.js"></script>
<!--<script src="js/pathLoader.js"></script>
<script src="js/preload.js"></script>-->

