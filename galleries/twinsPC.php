<?php
	include_once("./../php/navbar.php");
?>

<html>
<head>
	<link href="/css/siteTheme.css" rel="stylesheet">
	<style>
		.content {

		}
	</style>
	<script>
	function changeParams() {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("test").innerHTML = this.responseText;
		}
	};
		year = document.getElementById("years_select").value;
		playerFirst = document.getElementById("players_select_first").value;
		playerLast = document.getElementById("players_select_last").value;
		set = document.getElementById("set_select").value;
		subset = document.getElementById("subset_select").value;
		search = document.getElementById("search").value;
	//	auto = document.getElementById("auto").checked;

		url = "getCard.php?year="+year+"&playerFirst="+playerFirst+"&playerLast="+playerLast+"&cardSet="+set+"&subset="+subset+"&search="+search;//+"&auto="+auto;
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
	} /* End function */
	</script>
</head>
<body>
<div class="content">
	<h1>Twins PC Gallery</h1>
	<p>Here you can explore the cards within my Twins PC visually. To get started, use the text boxes and dropdowns to filter certain cards.</p>
	<form>Card details:
		<!-- -------------------- Year -------------------- -->
		<select onchange="changeParams()" name="years" id="years_select">
			<option value="All">Year</option>
	<?php
		include("/var/www/admin.php");
                $conn = mysqli_connect($dbServername, $publicdbUsername, $publicdbPass, $dbName);
                if (!$conn) {
                    die('Could not connect: ' . mysqli_error($conn));
                }
                $sql = "select year from twins_pc group by year order by year desc";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
			echo "<option value=" . $row['year'] . ">" . $row['year'] . "</option>";
                }
                mysqli_close($conn);
        ?>
		</select>
		<!-- -------------------- Set -------------------- -->
		<select onchange="changeParams()" name="set" id="set_select">
			<option value="All">Set</option>
	<?php
		include("/var/www/admin.php");
                $conn = mysqli_connect($dbServername, $publicdbUsername, $publicdbPass, $dbName);
                if (!$conn) {
                    die('Could not connect: ' . mysqli_error($conn));
                }
                $sql = "select cardSet from twins_pc group by cardSet order by cardSet";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
			if ($row['cardSet'] == "Topps Allen & Ginter") {
				echo "<option value='Topps Allen %26 Ginter'>Topps Allen & Ginter</option>";
			} elseif ($row['cardSet'] == "Topps Moments & Milestones") {
				echo "<option value='Topps Moments %26 Milestones'>Topps Moments & Milestones</option>";
			} elseif ($row['cardSet'] == "Topps Updates & Highlights") {
				echo "<option value='Topps Updates %26 Highlights'>Topps Updates & Highlights</option>";
			}
			else {
				echo '<option value="' . $row['cardSet'] . '">' . $row['cardSet'] . '</option>';
			}
                }
                mysqli_close($conn);
        ?>
		</select>
		<!-- -------------------- Subset -------------------- -->
		<select onchange="changeParams()" name="subset" id="subset_select">
			<option value="All">Subset</option>
	<?php
		include("/var/www/admin.php");
                $conn = mysqli_connect($dbServername, $publicdbUsername, $publicdbPass, $dbName);
                if (!$conn) {
                    die('Could not connect: ' . mysqli_error($conn));
                }
                $sql = "select subset from twins_pc group by subset order by subset";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
			if ($row['subset'] != "") {
				if ($row['subset'] == "Minis A&G Back") {
					echo '<option value="Minis A%26G Back">Minis A&G Back</option>';
				} else {
					echo '<option value="' . $row['subset'] . '">' . $row['subset'] . '</option>';
				}
			}
                }
                mysqli_close($conn);
        ?>
		</select>
		<!-- -------------------- First name -------------------- -->
		<select onchange="changeParams()" name="playersFirst" id="players_select_first">
			<option value="All">First name</option>
	<?php			
	        include("/var/www/admin.php");
	        $conn = mysqli_connect($dbServername, $publicdbUsername, $publicdbPass, $dbName);
	        if (!$conn) {
	            die('Could not connect: ' . mysqli_error($conn));
	        }
	        $sql = "select playerFirst from twins_pc group by playerFirst";
	        $result = mysqli_query($conn, $sql);
	        while ($row = mysqli_fetch_array($result)) {
			if ($row['playerFirst'] != "") {
	                	echo "<option value=" . $row['playerFirst'] . ">" . $row['playerFirst'] . "</option>";
			}
       		}
        	mysqli_close($conn);
	?>
		</select>
		<!-- -------------------- Last name -------------------- -->
		<select onchange="changeParams()" name="playersLast" id="players_select_last">
			<option value="All">Last name</option>
        <?php
                include("/var/www/admin.php");
                $conn = mysqli_connect($dbServername, $publicdbUsername, $publicdbPass, $dbName);
                if (!$conn) {
                    die('Could not connect: ' . mysqli_error($conn));
                }
                $sql = "select playerLast from twins_pc group by playerLast";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
			if ($row['playerLast'] != "") {
                        	echo "<option value=" . $row['playerLast'] . ">" . $row['playerLast'] . "</option>";
			}
                }
	        mysqli_close($conn);
        ?>
		</select>
		<!-- -------------------- Searchbar -------------------- -->
		<input type="text" onkeyup="changeParams()" name="search" id="search" placeholder="Search"></input>

		<br>

		<!-- -------------------- Autographed -------------------- -->
<!--
		<input type="checkbox" onclick="changeParams()" name="auto" id="auto"> Autographed
		<input type="checkbox" onclick="changeParams()" name="relic" id = "relic"> Relic -->


<!--
Potentially adding sections for serial first/last, as well as grading details (first/last as input, grader as dropdown, card/auto grade as dropdown), authentic as checkbox
		Relic: <input type="checkbox" onchange="changeParams()" name="relic" id="relic" value="True">
		Manu. relic: <input type="checkbox" onchange="changeParams()" name="manuRelic" id="manuRelic" value="True">
		RC: <input type="checkbox" onchange="changeParams()" name="rc" id="rc" value="True">
		Numbered: <input type="checkbox" onchange="changeParams()" name="numbered" id="numbered" value="True">
		1/1: <input type="checkbox" onchange="changeParams()" name="oneofone" id="oneofone" value="True">
		HOF: <input type="checkbox" onchange="changeParams()" name="hof" id="hof" value="True">
		SP/VAR: <input type="checkbox" onchange="changeParams()" name="spVar" id="spVar" value="True">
		Graded/Slabbed: <input type="checkbox" onchange="changeParams()" name="graded" id="graded" value="True">
-->


	</form>
	<div id="test"></div>

	</form>
</div> <!-- Ends content div -->
</body>
</html>
