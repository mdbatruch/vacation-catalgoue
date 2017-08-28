
<html lang="en">
	<body>

		<div id="home-journal">
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
					$journal_header = filter_var($row["journal_header"], FILTER_SANITIZE_STRING);
					$rating = filter_var($row["star_rating"], FILTER_SANITIZE_STRING);
					$city = filter_var($row["city_name"], FILTER_SANITIZE_STRING);
					$description = filter_var($row["journal_description"], FILTER_SANITIZE_STRING);
					$author = filter_var($row["author_name"], FILTER_SANITIZE_STRING);

					$redir = "../index.php";

					printf("
				<div>
					<h4>%s posted:</h4>
					<div class=\"display\">
						<div class=\"display-location\">%s<br>&nbsp;COUNTRY</div>
						<div class=\"display-icon\"><img src=\"../images/Gallery/icons/3.jpg\" /></div>
						<div class=\"display-description\"><p>%s</p></div>
					</div>
					<h5>READ MORE</h5>
				</div>",
						   $author,
						   $city,
						   $description);

					$del_id = $row["id"];

					// New URL to call "delete" function
					if($author==$username){
						echo "<a class='delete-button' href=\"views/admin.php?action=delete&delete-id=$del_id\">delete</a>";
					}

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
