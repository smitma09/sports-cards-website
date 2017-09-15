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

/* --------------------------------------------- */

	.results {
		text-align: center;
	}

	.fullContainer {
		width: 200px;
		display: inline-block;
		margin-right: 5px;
		vertical-align: top;
	}
	.imgContainer {
		height: 280px;
		width: 200px;
		background-color: black;
		position: relative;
	}
	.image {
		height: 92%;
		position: absolute;
		margin: auto;
		left: 0;
		right: 0;
		top: 0;
		bottom: 0;
	}
	.text {
		text-align: center;
	}

/* --------------------------------------------- */

	</style>
</head>
<body>
<?php
	include("/var/www/admin.php");
	$year = $_GET['year'];
	$playerFirst = $_GET['playerFirst'];
	$playerLast = $_GET['playerLast'];
	$cardSet = $_GET['cardSet'];
	$subset = $_GET['subset'];
	$search = $_GET['search'];
//	$auto = $_GET['auto'];

//	echo "<h3>" . $auto . "</h3>";

	$conn = mysqli_connect($dbServername, $publicdbUsername, $publicdbPass, $dbName);
	if (!$conn) {
	    die('Could not connect: ' . mysqli_error($conn));
	}

	$sql = 'select * from twins_pc';
	
	/* ---------- Creating SQL statement ---------- */
	$clauses = 0;
	if ($year != "All") {
		if ($clauses == 0) {
			$sql = $sql . ' where year = "' . $year . '" and';
			$clauses = $clauses + 1;
		} else {
		$sql = $sql . ' year = "' . $year . '" and';
		}
	}
	if ($cardSet != "All") {
		if ($clauses == 0) {
			$sql = $sql . ' where cardSet = "' . $cardSet . '" and';
			$clauses = $clauses + 1;
		} else {
			$sql = $sql . ' cardSet = "' . $cardSet . '" and';
		}
	}
	if ($subset != "All") {
		if ($clauses == 0) {
			$sql = $sql . ' where subset = "' . $subset . '" and';
			$clauses = $clauses + 1;
		} else {
			$sql = $sql . ' subset = "' . $subset . '" and';
		}
	}
	if ($playerFirst != "All") {
		if ($clauses == 0) {
			$sql = $sql . " where (playerFirst = '" . $playerFirst . "' or allPlayers like '%" . $playerFirst . " %') and";
			$clauses = $clauses + 1;
		} else {
			$sql = $sql . " (playerFirst = '" . $playerFirst . "' or allPlayers like '%" . $playerFirst . " %') and";
		}
	}
	if ($playerLast != "All") {
		if ($clauses == 0) {
			$sql = $sql . " where (playerLast = '" . $playerLast . "' or allPlayers like '% " . $playerLast . "%') and";
			$clauses = $clauses + 1;
		} else {
			$sql = $sql . " (playerLast = '" . $playerLast . "' or allPlayers like '% " . $playerLast . "%') and";
		}
	} if ($search != "") {
		if ($clauses == 0) {
			$sql = $sql . ' where fullCardInfo like "%' . $search . '%" and';
			$clauses = $clauses + 1;
		} else {
			$sql = $sql . ' fullCardInfo like "%' . $search . '%" and';
		}
	}

	// Need to chop of the last ' and' from the sql statement
	$sql = substr($sql, 0, -4);
	$sql = $sql . ' order by year desc, cardset asc, subset asc, cardNum';

	$result = mysqli_query($conn, $sql);
	$num_cards = mysqli_num_rows($result);
	if ($num_cards == 0) {
		echo "<p>No cards matched your query. Try refining your search terms to get some results.</p>";
	} else {
		echo "<p>" . $num_cards . " cards matched your query.</p>";
		echo "<div class=results>";
		echo "<div>";
		while ($row = mysqli_fetch_array($result)) {
		$pic = $row['pathToPic'];
		$wwwImg = substr($pic, 13);
			//echo "<span id=aCard><img src=" . $wwwImg . " height ='250px'>";
			//echo "<span class=text>" . $row['fullCardInfo'] . "</span></span>";
			echo "<div class=fullContainer><div class=imgContainer><img class=image src=" . $wwwImg ."></div><p class=text>" . $row['fullCardInfo'] . "</p></div>";
		}
		echo "</div></div>";
	}
	mysqli_close($conn);
?>
</body>
</html>
