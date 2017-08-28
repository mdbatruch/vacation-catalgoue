<?php
session_start();

// Logged in Session variables
//$token = $_SESSION[ 'login_token' ];
//$id = $_SESSION[ 'user_id' ];
//$username = $_SESSION[ 'userName' ];
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
		});
	</script>
</head>
<body>
	<header>
		<nav id="main-header">
			<div id="title"><li><a href="../../index.php">Vacation Catalog</a></li></div>
			<div id="pages">

				<li><a href="">About</a></li>

				<!-- Logged in/ & logged out Nav-->
				<?php if($token===LOGGED_IN): ?>

				<li><a href="../views/admin.php">Admin</a></li>
				<li><a href="index.php?action=logout">Logout</a></li>

				<?php else: ?>

				<li><a class="md-trigger" data-modal="modal-1">Login</a></li>

				<?php endif; ?>

			</div>
		</nav>

		<nav id="header-placeholder"></nav>
	</header>

	<main>
		<!-- Title, City -->
		<!-- Tabs to change article -->
		<?php 
		include('article-tabs.php'); 

		// Sets up query to fetch data
		$query = "SELECT id, journal_header, city_name, author_name, journal_description, star_rating FROM worldappreview";

		// Sends query to db server and wait for result
		$result = mysqli_query($database, $query)
			or die(mysqli_error($database).'Could not connect to database');

		if($result = mysqli_query($database, $query)){

			// Fetch associative array then print
			// Each Row has class "review"
			while($row=mysqli_fetch_assoc($result)){
				// Sanitize
				$journal_header = filter_var($row["journal_header"], FILTER_SANITIZE_STRING);
				$rating = filter_var($row["star_rating"], FILTER_SANITIZE_STRING);
				$city = filter_var($row["city_name"], FILTER_SANITIZE_STRING);
				$description = filter_var($row["journal_description"], FILTER_SANITIZE_STRING);
				$author = filter_var($row["author_name"], FILTER_SANITIZE_STRING);

				// TITLE & NAMES
				printf("
				<section id=\"head-section\">

					<div id=\"city-header\" class=\"colhalf fl\">
						<div id=\"main-desc\">
							%s
						</div>
						<div id=\"city-name\" class=\"alignright\">
							Australia,&nbsp; <br> %s
						</div>
						<div id=\"author-name\">
							By %s
						</div>
						<div class=\"clear\"></div>
					</div>

					<div id=\"country-image\" class=\"colhalf fl\">
						<img src=\"../images/Asset1.png\" class=\"image-responsive\" alt=\"australia\">
					</div>
					<div class=\"clear\"></div>

				</section>",
					   $journal_header,
					   $city,
					   $author);

				$del_id = $row["id"];

				
				// GALLERY
				printf("
				<section id=\"mid-section\">
					<ul class=\"pgwSlider\">
						<li>
							<img src=\"../images/Gallery/thumbnails/1.jpg\" alt=\"Paris, France\" data-description=\"Eiffel Tower and Champ de Mars\">
						</li>
						<li>
							<img src=\"../images/Gallery/thumbnails/3.jpg\" alt=\"Montréal, QC, Canada\" data-large-src=\"../images/Gallery/thumbnails/3.jpg\">
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
<div id="comment-feed">
<fieldset id="comment-fieldset">
<?php 
    $result = get_comment( $database );
    while( $rows = mysqli_fetch_assoc( $result ) ): ?>
<legend id="comment-author"><?php echo $rows[ 'username']; ?></legend>
<p><?php echo $rows[ 'review_comment']; ?>
</p>
<div id="comment-published">
 <?php echo $rows['date_submitted']; ?> 
</div>
<?php endwhile; ?>
</fieldset>
<div class="clear"></div>
</div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>?action=add_comment" method="post">
        <fieldset>
            <legend>Add a Comment</legend>
                <ul>
                    <li>
                    <?php echo $errors[ 'username' ]; ?>
                        <label>Username</label>
                            <input type="text"
                            name="username"
                            id="comment-username"
                            value="<?php echo $_POST[ 'username' ]; ?>">
                    </li>
                    <li>
                    <?php echo $errors[ 'reviewComment' ]; ?>
                        <label class="fl">Comment</label>
                            <textarea name="reviewComment"
                            cols="30" 
                            rows="10"
                            id="comment-comment"
                            value="<?php echo $_POST[ 'reviewComment' ]; ?>"></textarea>
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
</section>

	</main>
</body>