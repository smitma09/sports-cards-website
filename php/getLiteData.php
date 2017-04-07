<html>
	<head>
		<link rel="stylesheet" href="./../css/readData.css">
	</head>
	<?php include_once("navbar.php"); ?>
	<body>

<?php
	include "/var/www/admin.php";

	$conn = new mysqli($dbServername, $publicdbUsername, $publicdbPass, $dbName);
	if ($conn->connect_error) {
		echo "<h1>Connection error</h1>";
		echo "<p>There was an error in connecting to the database. Please try again</p>";
	} else {
		echo "<h1>Lite data</h1><p>The following is full card info from entries in my Twins PC:</p>";
		$sql = "select fullCardInfo, pathToPic, year, cardSet, subset, cardNum from twins_pc order by year desc, cardSet, subset, cardNum+0"; //Need extra work to get the cardNum sorting correctly
		$result = $conn->query($sql);
		if ($result->num_rows == 0) {
			echo "<p>No data</p>";
		} else {
			$num_cards = $result->num_rows;
			echo "<table>";
			$counter = 0;
			while ($row = $result->fetch_assoc()) {
				$counter = $counter + 1;
				$path = $row["pathToPic"];
				$wwwImg = substr($path, 13);
				if (($counter % 2) == 0) {
					echo "<tr><td class='oddRow'>" . $row["fullCardInfo"] . "<div><img src=" . $wwwImg . "></div></tr></td>";
				} else {
					echo "<tr><td>" . $row["fullCardInfo"] . "<div><img src=" . $wwwImg . "></div></td></tr>";
				}
			}
			echo "</table>";
			//Quick stats section
			echo "<h1>Quick stats</h1><p>A few interesting notes about my Twins PC:</p><ul>";
//			$num_cards = mysql_num_rows($result);
				echo "<li>" . $num_cards . " unique cards</li>";
				echo "<li>Placeholder for more stats to come soon</li>";
				echo "<li>Ideas for more stats:</li><ul>";
					echo "<li>Top 5 players by number of cards</li>";
					echo "<li># of autos</li>";
					echo "<li># of relics</li>";
					echo "<li># of patches</li>";
					echo "<li># of numbered cards</li>";
					echo "<li>Just need a bit more space on this page</li>";
					echo "<li>To not have to worry about scrolling issues with pictures</li>";
					echo "<li>3 more should do it</li>";
					echo "<li>Almost there</li>";
					echo "<li>Last one</li>";
			echo "</ul>";
		}

	}
	
?>
	</body>
</html>
