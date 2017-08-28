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


$page_title = 'City Description';
?>

<head>
	<!-- main stylesheet link -->
	<link rel="stylesheet" href="../css/style.css" />

	<!--		JQUERY         -->
	<script src="https://code.jquery.com/jquery-1.12.4.js"
			integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
			crossorigin="anonymous"></script>

	<!--        IMAGE GALLERY         -->
	<script src="../js/pgwslider.js"></script>
	<link rel="stylesheet" href="../css/pgwslider.css">

	<script>
		// PGW Slider
		$(document).ready(function() {
			$('.pgwSlider').pgwSlider({

				maxHeight: 300
			});
		})
	</script>

	<?php if($token===null): ?>
	<!-- Add event listener if not logged in -->
	<script>

		$(document).ready(function(){
			document.getElementById("login-redir").addEventListener("click", function(){
				location.href='../index.php#login';
			})
		})
	</script>

	<?php endif; ?>

</head>
<body>
	<header>
		<nav id="main-header">
			<div id="title"><li><a href="../../index.php">Vacation Catalog</a></li></div>
			<div class="pages">

				<li><a href="about-us.php">About</a></li>

				<!-- Logged in/ & logged out Nav-->
				<?php if($token===LOGGED_IN): ?>

				<li><a href="../views/admin.php">Admin</a></li>
				<li><a href="../index.php?action=logout">Logout</a></li>

				<?php else: ?>

				<li><a id="login-redir">Login</a></li>

				<?php endif; ?>

			</div>
		</nav>

		<nav id="header-placeholder"></nav>
	</header>

	<main>
		<!-- Title, City -->
		<!-- Tabs to change article -->
		<?php 
		// Lists all articles under Nav
		include('article-tabs.php'); 

		// Countries Array
		include('../includes/data/countries.php'); 

		// Clicking article tabs will change article by Session ID

		if (empty($_SESSION["journal_id"])){

			// Random journal if session['journal_id'] not set
			$query = "SELECT id, journal_header, city_name, country_name, author_name, journal_description, star_rating FROM worldappreview ORDER BY RAND() LIMIT 1";

			$journal_id;

		}else{

			$journal_id = $_SESSION["journal_id"];

			// Sets up query to fetch data
			$query = "SELECT id, journal_header, city_name, country_name, author_name, journal_description, star_rating FROM worldappreview WHERE id=$journal_id";
		}


		// Sends query to db server and wait for result
		$result = mysqli_query($database, $query)
			or die(mysqli_error($database).'Could not connect to database');

		if($result = mysqli_query($database, $query)){

			// Fetch Row
			while($row=mysqli_fetch_assoc($result)){
				// Sanitize
				$journal_id = $row["id"];
				$journal_header = filter_var($row["journal_header"], FILTER_SANITIZE_STRING);
				$rating = filter_var($row["star_rating"], FILTER_SANITIZE_STRING);
				$city = filter_var($row["city_name"], FILTER_SANITIZE_STRING);
				$country = filter_var($row["country_name"], FILTER_SANITIZE_STRING);
				$description = filter_var($row["journal_description"], FILTER_SANITIZE_STRING);
				$author = filter_var($row["author_name"], FILTER_SANITIZE_STRING);

				// Finds Continent of $country
				foreach($countries as $key => $value){
					if($key == $country){
						$continent = $countries[$key];
					};
				}

				// TITLE & NAMES
				// Displays corresponding Continent img
				printf("
				<section id=\"head-section\">

					<div id=\"city-header\" class=\"colhalf fl\">
						<div id=\"main-desc\">
							%s
						</div>
						<div id=\"city-name\" class=\"alignright\">
							%s,&nbsp;&nbsp; <br> %s
						</div>
						<div id=\"author-name\">
							By %s
						</div>
						<div class=\"clear\"></div>
					</div>

					<div id=\"country-image\" class=\"colhalf fl\">
						<img src=\"../images/Continents/$continent.png\" class=\"image-responsive\" alt=\"continent\">
					</div>
					<div class=\"clear\"></div>

				</section>",
					   $journal_header,
					   $country,
					   $city,
					   $author);

				$del_id = $row["id"];


				// GALLERY
				printf("
				<section id=\"mid-section\">
					<ul class=\"pgwSlider\">
						<li>
							<img src=\"../images/Gallery/thumbnails/6.jpg\">
						</li>
						<li>
							<img src=\"../images/Gallery/thumbnails/6.jpg\">
							<span>Shanghai, China</span>
						</li>
						<li>
							<a href=\"http://www.nyc.gov\" target=\"_blank\">
								<img src=\"../images/Gallery/thumbnails/4.jpg\">
								<span>New York, NY, USA</span>
							</a>
						</li>
					</ul>
					<div class=\"clear\"></div>
				</section>");


				// DESCRIPTION
				printf("
				<section id=\"city-description\">
					<span id=\"journal-desc\">
						<p>
							%s
						</p>
				</span>
				</section>",
					   $description);
			}

			// Free result set
			mysqli_free_result($result);
		}



		?>



		<section id="comment-section">
			<?php if($token===LOGGED_IN): ?>
			<!-- If logged in -->
			<!-- Comment Form -->
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>?action=add_comment" method="post">
				<fieldset>
					<legend id="comment-legend">Leave a comment, <a href="admin.php"><?php echo $username ?></a></legend>
					<input type="hidden" name="review_id" value="<?php echo $journal_id; ?>" />
					<ul>
						<li>
							<input type="hidden"
								   name="username"
								   id="comment-username"
								   value="<?php echo $username; ?>" />
						</li>
						<li>
							<textarea name="review_comment"
									  cols="30" 
									  rows="10"
									  id="comment-comment"
									  pattern=".{15,}"   required title="3 characters minimum"
									  ></textarea>
						</li>
						<li>
							<input type="submit"
								   name="submit"
								   id="comment-submit"
								   class="fr"/>
						</li>
					</ul>
				</fieldset>
			</form>

			<?php else: ?>
			
			<!-- Login Redirect -->
			<div><a href="../index.php#login">LOG IN</a> or <a href="../includes/templates/sign-up.tpl.php">SIGN UP</a> to leave a comment!</div>

			<?php endif; ?>

			<div id="comment-feed">
				<fieldset id="comment-fieldset">
					<?php 
					$result = get_comment( $database, $del_id );
					while( $rows = mysqli_fetch_assoc( $result ) ): 
					?>
					<div class="comment-container">
						<legend id="comment-author"><?php echo $rows['username']; ?></legend>
						<p><?php echo $rows['review_comment']; ?></p>
						
						<div id="comment-published">
							<?php 
							$timestamp = strtotime( $rows['date_submitted'] );

							// Year included
							//echo date( 'F ' . 'j ' . 'Y', $timestamp );

							echo "<div class=\"date-published\">".date( 'F ' . 'j ', $timestamp )."</div>";

							?> 
						</div>
					</div>
					<br>

					<?php endwhile; ?>
				</fieldset>
				<div class="clear"></div>
			</div>
		</section>

	</main>
</body>