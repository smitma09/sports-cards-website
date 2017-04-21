<?php
	include_once("./../php/navbar.php");
?>

<html>
<body>

	<h1>Twins PC gallery</h1>

<?php
        include "/var/www/admin.php";

        $conn = new mysqli($dbServername, $publicdbUsername, $publicdbPass, $dbName);
        if ($conn->connect_error) {
                echo "<h1>Connection error</h1>";
                echo "<p>There was an error in connecting to the database. Please try again</p>";
        } else {
		//Successfully connected to database
		echo "<p>The following are pictures of my Twins PC. Still a lot of work to be done here (searching/sorting/styling), but for now enjoy a big page with pictures of all the different cards in my PC.</p>";

		$sql = "select fullCardInfo, pathToPic, year, cardSet, subset, cardNum from twins_pc order by year desc, cardSet, subset, cardNum+0";
                $result = $conn->query($sql);
                if ($result->num_rows == 0) {
                        echo "<p>No data</p>";
                } else {
                        while ($row = $result->fetch_assoc()) {
                                $counter = $counter + 1;
                                $path = $row["pathToPic"];
                                $wwwImg = substr($path, 13);
				echo "<img src='$wwwImg' alt'Image' height='200'>";
				//Styling isn't perfect, but at this time I go get all images to show up on screen
				//Sorting isn't perfect- Borrowed from /var/www/html/php/getLitedInfo.php- Check back on this later after figuring out best sorting call
			} //End while loop for images

		} // End if data block

	} // End successful database connection block
?>

</body>
</html>
