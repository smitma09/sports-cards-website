<html>
<head>
	<style>
	table {
		border-collapse: collapse;
	}
	td {
		border: 1px solid black;
	}
	table tr td div img {
	        display: none;
	}
	table tr td:hover div img {
	        display: block;
	        position: absolute;
	        border: 10px solid black;
	        height: 350px;
	}
	</style>
</head>
<body>
<?php
	include("/var/www/admin.php");
	$year = $_GET['year'];
	$player = $_GET['player'];

	$conn = mysqli_connect($dbServername, $publicdbUsername, $publicdbPass, $dbName);
	if (!$conn) {
	    die('Could not connect: ' . mysqli_error($conn));
	}

	echo "<p>Year: " . $year . " </p>";
	echo "<p>Player: " . $player . " </p>";

	$sql = 'select * from twins_pc';

	$clauses = 0;
	if ($year != "All") {
		$clauses = $clauses + 1;
	}
	if ($player != "All") {
		$clauses = $clauses + 1;
	}

	if ($clauses > 1) {
		//Both year and player is set
		$sql = $sql . ' where year = "' . $year . '" and playerFirst = "' . $player . '"';
	} else {
		//Only year or player is set
		if ($year != "All") {
			//Year is set but not player
			$sql = $sql . ' where year = "' . $year . '"';
		} else {
			//Player is set but not year
			$sql = $sql . ' where playerFirst = "' . $player . '"';
		}
	}

	// (old query) $sql = 'select * from twins_pc where playerFirst = "'. $player . '" and year = "' . $year . '"';
	$result = mysqli_query($conn, $sql);
	echo "<table><tr><td><b>Card</b></td></tr>";
	while ($row = mysqli_fetch_array($result)) {
//		$pic = $row['pathToPic'];
//		$wwwImg = substr($pic, 13);
		echo "<tr><td>" . $row['fullCardInfo'] . "</td></tr>";// . "<div><img src=" . $wwwImg . "></div></td></tr>";
	}
	echo "</table>";
	mysqli_close($conn);
?>
</body>
</html>
