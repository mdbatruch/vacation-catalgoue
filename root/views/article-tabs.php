
<div id="article-tabs">
	<?php 

	// Sets up query to fetch data
	$query = "SELECT id, journal_header, city_name, author_name, journal_description, star_rating FROM worldappreview";

	// Sends query to db server and wait for result
	$result = mysqli_query($database, $query)
		or die(mysqli_error($database));

	if($result = mysqli_query($database, $query)){

		// Fetch associative array then print
		// Each Row has class "review"
		while($row=mysqli_fetch_assoc($result)){
			// Sanitize
			$journal_id = filter_var($row["id"], FILTER_SANITIZE_STRING);
			$journal_header = filter_var($row["journal_header"], FILTER_SANITIZE_STRING);
			$rating = filter_var($row["star_rating"], FILTER_SANITIZE_STRING);
			$city = filter_var($row["city_name"], FILTER_SANITIZE_STRING);
			$description = filter_var($row["journal_description"], FILTER_SANITIZE_STRING);
			$author = filter_var($row["author_name"], FILTER_SANITIZE_STRING);
            

			// Only display first word
			$word = explode(' ',trim($journal_header));
			
			printf("
					<div>
						<div class=\"article-header\"><a href=\"city-description.php?action=article&journalid=$journal_id\">%s</a></div>
					</div>",
				   $word[0]);

			$id = $row["id"];
		}

		// Free result set
		mysqli_free_result($result);
	}
	?>
</div>