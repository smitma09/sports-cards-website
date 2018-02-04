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
		max-height: 92%;
		max-width: 92%;
		position: absolute;
		margin: auto;
		left: 0;
		right: 0;
		top: 0;
		bottom: 0;
		/*max-height: 270px;
		max-width: 190px;*/
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
	$auto = $_GET['auto'];
	$relic = $_GET['relic'];
	$patch = $_GET['patch'];
	$manu = $_GET['manu'];
	$rc = $_GET['rc'];
	$sn = $_GET['sn'];
	$oneofone = $_GET['oneofone'];
	$hof = $_GET['hof'];
	$spVar = $_GET['spvar'];
	$graded = $_GET['graded'];
	$grader = $_GET['grader'];

//	echo "<h3>" . $auto . "</h3>";

	$conn = mysqli_connect($dbServername, $publicdbUsername, $publicdbPass, $dbName);
	if (!$conn) {
	    die('Could not connect: ' . mysqli_error($conn));
	    echo '$conn';
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
	} if ($cardSet != "All") {
		if ($clauses == 0) {
			$sql = $sql . ' where cardSet = "' . $cardSet . '" and';
			$clauses = $clauses + 1;
		} else {
			$sql = $sql . ' cardSet = "' . $cardSet . '" and';
		}
	} if ($subset != "All") {
		if ($clauses == 0) {
			$sql = $sql . ' where subset = "' . $subset . '" and';
			$clauses = $clauses + 1;
		} else {
			$sql = $sql . ' subset = "' . $subset . '" and';
		}
	} if ($playerFirst != "All") {
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
	} if ($auto == "1") {
		if ($clauses == 0) {
			$sql = $sql . " where auto = '" . $auto . "' and";
			$clauses = $clauses + 1;
		} else {
			$sql = $sql . " auto = '" . $auto . "' and";
		}
	} if ($relic == "1") {
		if ($clauses == 0) {
			$sql = $sql . " where relic = '" . $relic . "' and";
			$clauses = $clauses + 1;
		} else {
			$sql = $sql . " relic = '" . $relic . "' and";
		}
	} if ($patch == "1") {
		if ($clauses == 0) {
			$sql = $sql . " where patch = '" . $patch . "' and";
			$clauses = $clauses + 1;
		} else {
			$sql = $sql . " patch = '" . $patch . "' and";
		}
	} if ($manu == "1") {
		if ($clauses == 0) {
			$sql = $sql . " where manuRelic = '" . $manu . "' and";
			$clauses = $clauses + 1;
		} else {
			$sql = $sql . " manuRelic = '" . $manu . "' and";
		}
	} if ($rc == "1") {
		if ($clauses == 0) {
			$sql = $sql . " where rc = '" . $rc . "' and";
			$clauses = $clauses + 1;
		} else {
			$sql = $sql . " rc = '" . $rc . "' and";
		}
	} if ($sn == "1") {
		if ($clauses == 0) {
			$sql = $sql . " where numbered = '" . $sn . "' and";
			$clauses = $clauses + 1;
		} else {
			$sql = $sql . " numbered = '" . $sn . "' and";
		}
	} if ($oneofone == "1") {
		if ($clauses == 0) {
			$sql = $sql . " where oneofone = '" . $oneofone . "' and";
			$clauses = $clauses + 1;
		} else {
			$sql = $sql . " oneofone = '" . $oneofone . "' and";
		}
	} if ($hof == "1") {
		if ($clauses == 0) {
			$sql = $sql . " where hof = '" . $hof . "' and";
			$clauses = $clauses + 1;
		} else {
			$sql = $sql . " hof = '" . $hof . "' and";
		}
	} if ($spVar == "1") {
		if ($clauses == 0) {
			$sql = $sql . " where spVar = '" . $spVar . "' and";
			$clauses = $clauses + 1;
		} else {
			$sql = $sql . " spVar = '" . $spVar . "' and";
		}
	} if ($graded == "1") {
		if ($clauses == 0) {
			$sql = $sql . " where graded = '" . $graded . "' and";
			$clauses = $clauses + 1;
		} else {
			$sql = $sql . " graded = '" . $graded . "' and";
		}
	} if ($grader != "All") {
		if ($clauses == 0) {
			$sql = $sql . ' where grader = "' . $grader . '" and';
			$clauses = $clauses + 1;
		} else {
			$sql = $sql . ' grader = "' . $grader . '" and';
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
	$sql = $sql . ' order by year desc, cardset asc, subset asc, cast(cardNum as signed) asc';

	$result = mysqli_query($conn, $sql);
	$num_cards = mysqli_num_rows($result);
	if ($num_cards == 0 or $clauses == 0) {
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
