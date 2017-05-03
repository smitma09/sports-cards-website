<?php
	include_once("navbar.php");
?>

<html>
	<head>
		<link rel="stylesheet" href="./../css/readData.css">
	</head>
	<body>

<?php
	include "/var/www/admin.php";

	$conn = new mysqli($dbServername, $publicdbUsername, $publicdbPass, $dbName);
	if ($conn->connect_error) {
		echo "<h1>Connection error</h1>";
		echo "<p>There was an error in connecting to the database. Please try again</p>";
	} else {
		echo "<h1>Full data</h1><p>The following is full card info from entries in my Twins PC:</p>";
		$sql = "select * from twins_pc order by year desc, cardSet, subset, cardNum+0 asc"; //Need extra work here to correctly sort cardNums with letters
		$result = $conn->query($sql);
		if ($result->num_rows == 0) {
			echo "<p>No data</p>";
		} else {
			echo "<table>";
			echo "<tr class='header'>
				<td>Year</td>
				<td>Set</td>
				<td>Subset</td>
				<td>Player first</td>
				<td>Player last</td>
				<td>All players</td>
				<td>Card #</td>
				<td>Auto</td>
				<td>Relic</td>
				<td>Patch</td>
				<td>Manu. relic</td>
				<td>RC</td>
				<td>Numbered</td>
				<td>1/1</td>
				<td>HOF</td>
				<td>SP/VAR</td>
				<td>Graded</td>
			</tr>";
			$counter = 0;
			while ($row = $result->fetch_assoc()) {
				$counter = $counter + 1;
				$path = $row["pathToPic"];
				$wwwImg = substr($path, 13);
				if (($counter % 2) == 0) {

/*
	Go through some if statements to clean up the table a bit, rather than having a bunch of 1/0s for the tinyint entries
	Numbering column should also be cleaned up
	Need to do a bit of styling as well in CSS file at top of page to make alternate rows gray and easier to read
*/
					echo "<tr class='oddRow'><td>" . $row["year"] . "</td>
						<td>" . $row["cardSet"] . "</td>
						<td>" . $row["subset"] . "</td>
						<td>" . $row["playerFirst"] . "</td>
						<td>" . $row["playerLast"] . "</td>
						<td>" . $row["allPlayers"] . "</td>
						<td>" . $row["cardNum"] . "</td>
						<td>" . $row["auto"] . "</td >
						<td>" . $row["relic"] . "</td>
						<td>" . $row["patch"] . "</td>
						<td>" . $row["manuRelic"] . "</td>";
					if (!$row["rc"]) {
						echo "<td></td>";
					} else {
						echo "<td>X</td>";
					}
					if (!$row["serialFirst"]) {
						echo "<td></td>";
					} else {
						echo "<td>" . $row["serialFirst"] . "/" . $row["serialLast"] . "</td>";
					}
					echo "<td>" . $row["oneofone"] . "</td>
						<td>" . $row["hof"] . "</td>
						<td>" . $row["spVar"] . "</td>
						<td>" . $row["graded"] . "</td></tr>";

				} else {
					echo "<tr'><td>" . $row["year"] . "</td>
						<td>" . $row["cardSet"] . "</td>
						<td>" . $row["subset"] . "</td>
						<td>" . $row["playerFirst"] . "</td>
						<td>" . $row["playerLast"] . "</td>
						<td>" . $row["allPlayers"] . "</td>
						<td>" . $row["cardNum"] . "</td>
						<td>" . $row["auto"] . "</td>
						<td>" . $row["relic"] . "</td>
						<td>" . $row["patch"] . "</td>
						<td>" . $row["manuRelic"] . "</td>";
					if (!$row["rc"]) {
                                                echo "<td></td>";
                                        } else {
                                                echo "<td>X</td>";
                                        }
					if (!$row["serialFirst"]) {
                                                echo "<td></td>";
                                        } else {
                                                echo "<td>" . $row["serialFirst"] . "/" . $row["serialLast"] . "</td>";
                                        }
					echo "<td>" . $row["oneofone"] . "</td>
						<td>" . $row["hof"] . "</td>
						<td>" . $row["spVar"] . "</td>
						<td>" . $row["graded"] . "</td></tr>";
				}
			}
			echo "</table>";
		}

	}
	
?>
	</body>
</html>
