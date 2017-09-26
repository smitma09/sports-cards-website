<?php
	include_once("./../php/navbar.php");
?>

<html>
<head>
	<link href="/css/siteTheme.css" rel="stylesheet">
	<style>
		.attributes span {
			margin-right: 1rem;
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
		auto = document.getElementById("auto").checked;
		if (auto) { autoVar = "1"; } else { autoVar = "0"; }
		relic = document.getElementById("relic").checked;
		if (relic) {
			relicVar = "1";
		} else {
			relicVar = "0";
		}
		patch = document.getElementById("patch").checked;
		if (patch) { patchVar = "1"; } else { patchVar = "0"; }
		manurelic = document.getElementById("manurelic").checked;
		if (manurelic) { manuVar = "1"; } else { manuVar = "0"; }
		patch = document.getElementById("patch").checked;
		if (patch) { patchVar = "1"; } else { patchVar = "0"; }
		rc = document.getElementById("rc").checked;
		if (rc) { rcVar = "1"; } else { rcVar = "0"; }
		sn = document.getElementById("numbered").checked;
		if (sn) { snVar = "1"; } else { snVar = "0"; }
		oneofone = document.getElementById("oneofone").checked;
		if (oneofone) { oneofoneVar = "1"; } else { oneofoneVar = "0"; }
		hof = document.getElementById("hof").checked;
		if (hof) { hofVar = "1"; } else { hofVar = "0"; }
		spvar = document.getElementById("spvar").checked;
		if (spvar) { spvVar = "1"; } else { spvVar = "0"; }
		graded = document.getElementById("graded").checked;
		if (graded) { gradedVar = "1"; } else { gradedVar = "0"; }
		grader = document.getElementById("grader").value;

		url = "getCard.php?year="+year+"&playerFirst="+playerFirst+"&playerLast="+playerLast+"&cardSet="+set+"&subset="+subset+"&auto="+autoVar+"&relic="+relicVar+"&patch="+patchVar+"&manu="+manuVar+"&rc="+rcVar+"&sn="+snVar+"&oneofone="+oneofoneVar+"&hof="+hofVar+"&spvar="+spvVar+"&graded="+gradedVar+"&grader="+grader+"&search="+search;//+"&auto="+auto;
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
	} /* End function */
	</script>
</head>
<body>
<div class="content">
	<h1>Twins PC Gallery</h1>
	<p>Here you can view cards from my Twins PC visually. This is one of my favorite pages on my site. By using the selectors below, you can view any card in my Twins collection. Enjoy!</p>

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

		<br>

		<!-- -------------------- Autographed -------------------- -->
		<span class="attributes">
		<span><input type="checkbox" onclick="changeParams()" name="auto" id = "auto"> Auto</input></span>
		<span><input type="checkbox" onclick="changeParams()" name="relic" id = "relic"> Relic</input></span>
		<span><input type="checkbox" onclick="changeParams()" name="patch" id = "patch"> Patch</input></span>
		<span><input type="checkbox" onclick="changeParams()" name="manurelic" id = "manurelic"> Manu. relic</input></span>
		<span><input type="checkbox" onclick="changeParams()" name="rc" id = "rc"> RC</input></span>
		<span><input type="checkbox" onclick="changeParams()" name="numbered" id = "numbered"> Numbered</input></span>
		<span><input type="checkbox" onclick="changeParams()" name="oneofone" id = "oneofone"> 1/1</input></span>
		<span><input type="checkbox" onclick="changeParams()" name="hof" id = "hof"> HOF</input></span>
		<span><input type="checkbox" onclick="changeParams()" name="spvar" id = "spvar"> SP/VAR</input></span>
		<span><input type="checkbox" onclick="changeParams()" name="graded" id = "graded"> Graded</input></span>
		<span><select onchange="changeParams()" name="grader" id="grader">
			<option value="All">Grader</option>
        <?php
                include("/var/www/admin.php");
                $conn = mysqli_connect($dbServername, $publicdbUsername, $publicdbPass, $dbName);
                if (!$conn) {
                    die('Could not connect: ' . mysqli_error($conn));
                }
                $sql = "select grader from twins_pc group by grader";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
			if ($row['grader'] != "") {
                        	echo "<option value=" . $row['grader'] . ">" . $row['grader'] . "</option>";
			}
                }
	        mysqli_close($conn);
        ?>
		</select></span>
		</span>

		<br>

		<!-- -------------------- Searchbar -------------------- -->
		<input type="text" size="50" onkeyup="changeParams()" name="search" id="search" placeholder="Search"></input>


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
	<div id="test">Choose some filters to see some results!</div>

	</form>
</div> <!-- Ends content div -->
</body>
</html>
