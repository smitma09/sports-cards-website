<html>
<head>
	<script>
	function changeParams() {
/*	if (str == "") {
		document.getElementById("test").innerHTML = "";
		return;
	} else {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} */
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
		url = "getPlayer.php?year="+year+"&playerFirst="+playerFirst+"&playerLast="+playerLast;
/*		if (year != "All") {
			url = url + "year=" + year;
		}
		if (player != "All") {
			url = url +"&player=" + player;
		}*/
		xmlhttp.open("GET", url, true);
		//xmlhttp.open("GET", "getPlayer.php?year="+year+"&player="+player, true);
		xmlhttp.send();
	} /* End function */
	</script>
</head>
<body>
	<h1>Ajax test</h1>
	<p>Testing out some Ajax</p>
	<p>NOTE! Will need to play with both the URL that gets sent to the PHP file (in terms of both ?year=___ and &player=___), as well as the SQL statement in the PHP file (if no player is selected, want to show all players). Currently sending a blank select as "All" to MySQL and dealing with it on that side, but will need to figure out a more elegant solution in the future. Currently works if one or both of the above selects have a value, but I'll need to look for better solutions too</p>
	<form>
		<select onchange="changeParams()" name="years" id="years_select">
			<option value="All"></option>
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
<!--			<option value="2017">2017</option>
			<option value="2016">2016</option> -->
		</select>
		<select onchange="changeParams()" name="playersFirst" id="players_select_first">
			<option value="All"></option>
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
<!--			<option value="All"></option>
			<option value="Brian">Brian Dozier</option>
			<option value="Joe">Joe Mauer</option>
			<option value="Miguel">Miguel Sano</option> -->
		</select>
		<select onchange="changeParams()" name="playersLast" id="players_select_last"> <!-- Last name -->
			<option value="All"></option>
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
		<select onchange="changeParams()" name="playersLast" id="players_select_last">



	</form>
	<div id="test"></div>


	<p><b>Things below this point are just setting up selects, etc that I'll need to add in above later for filters</b></p>
	<form>
		<select>
			<option>Years</option>
		</select>
		<select>
			<option>Set</option>
		</select>
		<select>
			<option>Subset</option>
		</select>
		<select>
			<option>Player first</option>
		</select>
		<select>
			<option>Player last</option>
		</select>
		<br>
		<input type="checkbox">Autograph<br>
		<input type="checkbox">Relic<br>
		<input type="checkbox">Patch<br>
		<input type="checkbox">Manufactured relic<br>
		<input type="checkbox">Rookie card<br>
		<input type="checkbox">Numbered (add serial first/last?)<br>
		<input type="checkbox">1/1<br>
		<input type="checkbox">HOF<br>
		<input type="checkbox">SP/VAR<br>
		<input type="checkbox">Graded/slabbed (add qualifiers?)
	</form>
</body>
</html>
