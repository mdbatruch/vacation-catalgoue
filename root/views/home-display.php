
<html lang="en">
	<body>

		<div id="home-journal">
			<?php 

			// Sets up query to fetch data
			$query = "SELECT id, journal_header, city_name, country_name, author_name, journal_description, star_rating FROM worldappreview LIMIT 4";

			// Sends query to db server and wait for result
			$result = mysqli_query($database, $query)
				or die(mysqli_error($database));

			if($result = mysqli_query($database, $query)){
                $i = 0;
				// Fetch associative array then print
				// Each Row has class "review"
				while($row=mysqli_fetch_assoc($result)){
                    
					// Sanitize
					$journal_id = filter_var($row["id"]);
					$journal_header = filter_var($row["journal_header"], FILTER_SANITIZE_STRING);
					$rating = filter_var($row["star_rating"], FILTER_SANITIZE_STRING);
					$city = filter_var($row["city_name"], FILTER_SANITIZE_STRING);
					$country = filter_var($row["country_name"], FILTER_SANITIZE_STRING);
					$description = filter_var($row["journal_description"], FILTER_SANITIZE_STRING);
					$author = $row["author_name"];

					$redir = "../index.php";

					// Limit words for display
					$maxChar = 250;
					

					// strip tags to avoid breaking any html
					//$string = strip_tags($string);

					if (strlen($description) > $maxChar) {

						// truncate string
						$stringCut = substr($description, 0, $maxChar);

						// make sure it ends in a complete word
						$description = substr($stringCut, 0, strrpos($stringCut, ' ')); 
					}
                    
                    // Temporary solution for icon display. Picks random icon for home-display summaries.
                    $iconNum = rand(1,20);
                    
					printf("
				<div>
					<h4>%s posted:</h4>
					<div class=\"display\">
						<div class=\"display-location\">%s<br>&nbsp;%s</div>
						<div class=\"display-icon\"><img src=\"../images/Gallery/icons/$iconNum.jpg\" /></div>
						<div class=\"display-description\"><p>%s...</p></div>
					</div>
					<h5><a href=\"views/city-description.php?action=article&journalid=$journal_id\">READ MORE</a></h5>",
						   $author,
						   $city,
						   $country,
						   $description);

					$del_id = $row["id"];
                    
					// New URL to call "delete" function
					if($author==$username){
						echo "<a class='delete-button' href=\"views/admin.php?action=delete&delete-id=$del_id\">delete</a>";
					}
					
					printf("</div>");

				}

				// Free result set
				mysqli_free_result($result);
			}

			// Closes connection
			mysqli_close($database);

			?>
		</div>

	</body>
</html>
