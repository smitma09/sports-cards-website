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
	#aCard .text {
		position: absolute;
		visibility: hidden;
	}
	#aCard:hover .text {
		visibility: visible;
		background-color: white;
		border: 2px solid black;
	}
	</style>
</head>
<body>
<?php
	include("/var/www/admin.php");
	$year = $_GET['year'];
	$playerFirst = $_GET['playerFirst'];
	$playerLast = $_GET['playerLast'];

	$conn = mysqli_connect($dbServername, $publicdbUsername, $publicdbPass, $dbName);
	if (!$conn) {
	    die('Could not connect: ' . mysqli_error($conn));
	}

/*	echo "<p>Year: " . $year . " </p>";
	echo "<p>Player first: " . $playerFirst . " </p>";
*/

	$sql = 'select * from twins_pc';
	
/**/
	$clauses = 0;
	if ($year != "All") {
		if ($clauses == 0) {
			$sql = $sql . ' where year = "' . $year . '" and';
			$clauses = $clauses + 1;
		} else {
		$sql = $sql . ' year = "' . $year . '" and';
		}
	}
	if ($playerFirst != "All") {
		if ($clauses == 0) {
			$sql = $sql . ' where playerFirst = "' . $playerFirst . '" and';
			$clauses = $clauses + 1;
		} else {
			$sql = $sql . ' playerFirst = "' . $playerFirst . '" and';
		}
	}/* */
	if ($playerLast != "All") {
		if ($clauses == 0) {
			$sql = $sql . ' where playerLast = "' . $playerLast . '" and';
			$clauses = $clauses + 1;
		} else {
			$sql = $sql . ' playerLast = "' . $playerLast . '" and';
		}
	}

	
// Under this method, need to chop of the last ' and' from the sql statement
	$sql = substr($sql, 0, -4);
	$sql = $sql . ' order by year desc, cardset asc, subset asc, cardNum';

	$result = mysqli_query($conn, $sql);
	$num_cards = mysqli_num_rows($result);
	if ($num_cards == 0) {
		echo "<p>No cards matched your query</p>";
	} else {
		echo "<p>" . $num_cards . " cards matched your query</p>"; 
//		echo "<table><tr><td><b>Card</b></td></tr>";
		echo "<div>";
		while ($row = mysqli_fetch_array($result)) {
		$pic = $row['pathToPic'];
		$wwwImg = substr($pic, 13);
		//	echo "<tr><td>" . $row['fullCardInfo'] . "</td></tr>";//<div><img src=" . $wwwImg . "></div></td></tr>";
			echo "<span id=aCard><img src=" . $wwwImg . " height ='250px'>";
			echo "<span class=text>" . $row['fullCardInfo'] . "</span></span>";
		}
		echo "</div>";
//		echo "</table>";
	}
	mysqli_close($conn);
?>
</body>
</html>
