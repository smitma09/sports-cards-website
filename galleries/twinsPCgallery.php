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
		echo "<p>The following are pictures of my Twins PC. Still a lot of work to be done here (searching/sorting/styling), but for now enjoy a big page with pictures of all the different cards in my PC (update- only showing cards from 2016 for now while building this page. Also going to need to add some styling rules for the selectors.</p>";

		echo "<div display='inline-block'>";
			$sql = "select year from twins_pc group by year order by year desc";
			$result = $conn->query($sql);
                	if ($result->num_rows == 0) {
                	        echo "<p>Whoops</p>";
                	} else {
                	        echo "Year: <select><option>All years</option>";
                	        while ($row = $result->fetch_assoc()) {
					$year = $row["year"];
					echo "<option>".$year."</option>";
				}
				echo "</select>";
			}
			$sql = "select cardSet from twins_pc group by cardSet order by cardSet";
                        $result = $conn->query($sql);
                        if ($result->num_rows == 0) {
                                echo "<p>Whoops</p>";
                        } else {
                                echo "Set: <select><option>All sets</option>";
                                while ($row = $result->fetch_assoc()) {
                                        $cardSet = $row["cardSet"];
                                        echo "<option>".$cardSet."</option>";
                                }
                                echo "</select>";
                        }
			$sql = 'select playerFirst, playerLast from twins_pc where playerFirst != "" and playerLast != "" group by playerFirst, playerLast order by playerLast, playerFirst';
			$result = $conn->query($sql);
			if ($result->num_rows == 0) {
				echo "<p>Whoops</p>";
			} else {
				echo "Player: <select><option>All players</option>";
				while ($row = $result->fetch_assoc()) {
					$playerName = $row["playerFirst"] . " " . $row["playerLast"];
					echo "<option>".$playerName."</option>";
				}
				echo "</select>";
			}
	/*		$sql = "select cardNum from twins_pc group by cardNum order by cardNum+00000000000000000000 desc";
			$result = $conn->query($sql);
			if ($result->num_rows == 0) {
				echo "<p>Whoops</p>";
			} else {
				echo "Card number is messed up for now: <select>";
				while ($row = $result->fetch_assoc()) {
					$cardNum = $row["cardNum"];
					echo "<option>".$cardNum."</option>";
				}
				echo "</select>";
			} */
			echo "Card num: <input type='text'>
			<br>
			Auto <input type='checkbox' value='auto'>
                	Relic <input type='checkbox' value='relic'>
                	Patch <input type='checkbox' value='patch'>
                	Manu. relic <input type='checkbox' value='manuRelic'>
                	RC <input type='checkbox' value='rc'>
                	#ed <input type='checkbox' value='serial'>
                	1/1 <input type='checkbox' value='oneofone'>
                	HOF <input type='checkbox' value='hof'>
                	SP/VAR <input type='checkbox' value ='spVar'>
                	Graded/slabbed <input type='checkbox' value='gradedSlabbed'>";



		echo "</div><hr>";

		$sql = "select fullCardInfo, pathToPic, year, cardSet, subset, cardNum from twins_pc where year=2016 order by year desc, cardSet, subset, cardNum+0";
                $result = $conn->query($sql);
                if ($result->num_rows == 0) {
                        echo "<p>No data</p>";
                } else {
			echo "<p>";
                        while ($row = $result->fetch_assoc()) {
                                $counter = $counter + 1;
                                $path = $row["pathToPic"];
                                $wwwImg = substr($path, 13);
				echo "<img src='$wwwImg' alt'Image' height='200'>";
				//Styling isn't perfect, but at this time I go get all images to show up on screen
				//Sorting isn't perfect- Borrowed from /var/www/html/php/getLitedInfo.php- Check back on this later after figuring out best sorting call
			} //End while loop for images
			echo "</p>";

		} // End if data block

	} // End successful database connection block
?>

</body>
</html>
