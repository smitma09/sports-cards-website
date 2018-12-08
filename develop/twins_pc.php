<?php
	include_once("./../php/navbar.php");
?>

<html>
<head>
	<link href="/css/siteTheme.css" rel="stylesheet">
	<link href="/css/modal.css" rel="stylesheet">
	<style>
		.attributes span {
			margin-right: 1rem;
		}
		/* From getCard.php */
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
			var results = JSON.parse(this.responseText);
			console.log("Results:", results);

			var num = results['numResults'];

			// Show number of results
			if (num == 0) {
				document.getElementById("test").innerHTML = "<p>No cards matched your query. Try refining your search terms to get some results.</p>";
			} else if (num == 1) {
				document.getElementById("test").innerHTML = "<p>1 card matched your query.</p>";
			} else if (num > 1) {
				document.getElementById("test").innerHTML = "<p>" + num + " cards matched your query.</p>";
			} else {
				document.getElementById("test").innerHTML = "<p>Choose some filters to see some results!</p>";
			}

			// Display results
			if (num > 0) {
				// resultsDiv is section for all results after displaying # of cards
				var resultsDiv = document.createElement("div");
				resultsDiv.setAttribute('class', 'results');
				
				// Set up each image
				for (i=0; i<num; i++) {
					// fullContainerDiv is section for an individual image and description
					var fullContainerDiv = document.createElement("div");
					fullContainerDiv.setAttribute('class', 'fullContainer');
					fullContainerDiv.addEventListener('click', modal);
					resultsDiv.appendChild(fullContainerDiv); //fullContainerDiv

					// imgContainer is section for an individual image
					var imgContainer = document.createElement("div");
					imgContainer.setAttribute('class', 'imgContainer');				

					// Getting img src and <img> tags set up
					var wwwImg = results['results'][i]['pic'];
					var img = document.createElement('img');
					img.setAttribute('src', wwwImg);
					img.setAttribute('class', 'image');
					imgContainer.appendChild(img);
					
					// Getting description and <p> tags set up
					var fullCardInfo = results['results'][i]['info'];
					var p = document.createElement('p');
					p.setAttribute('class', 'text');
					p.innerHTML = fullCardInfo;

					//Append individual image container and fullCardInfo to full container
					fullContainerDiv.appendChild(imgContainer);
					fullContainerDiv.appendChild(p);
				}
				// Add results section to body
				document.getElementById("test").appendChild(resultsDiv);
			} // End if num cards > 0

		}
	}; // End changeParams()
	function closeModal() {
		console.log("trying to close modal");
		var theModal = document.getElementById("theModal");
		theModal.style.display = "none";
	};
	function modal() {
		// modalTop is the main <span> that holds modal elements
		var modalTop = document.getElementById("theModal");
		modalTop.style.display = "block";

		// Set img src and card info variables
		var img = this.querySelector("img").src; // i.e. http://104.236.240.123/images/twins_pc/2018/Bowman/9_Zack_Granite.jpg
		var pieces = img.split("images");
		var wwwImg = "/images" + pieces[1];
		var fullCardInfo = "<h4>" +  this.querySelector("p").innerHTML + "</h4>"; // i.e. 2018 Bowman Zack Granite 9

		// Set modal image and caption
		modalTop.querySelector("img").setAttribute('src', wwwImg);
		document.getElementById("modalCaption").innerHTML = fullCardInfo;

		document.getElementById("closeButton").addEventListener("click", closeModal);
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
				} elseif ($row['subset'] == "Timber & Threads Combo Material") {
					echo '<option value="Timber %26 Threads Combo Material">Timber & Threads Combo Material</option>';
				} elseif ($row['subset'] == "Cuts & Glory Patches") {
					echo '<option value="Cuts %26 Glory Patches">Cuts & Glory Patches</option>';
				} elseif ($row['subset'] == "Black & White") {
					echo '<option value="Black %26 White">Black & White</option>';
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
	                	echo '<option value="' . $row['playerFirst'] . '">' . $row['playerFirst'] . "</option>";
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
                        	echo '<option value="' . $row['playerLast'] . '">' . $row['playerLast'] . "</option>";
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
		</span> <!-- End attributes -->

		<br>

		<!-- -------------------- Searchbar -------------------- -->
		<input type="text" size="50" onkeyup="changeParams()" name="search" id="search" placeholder="Search"></input>

	</form>

	<div id="test">Choose some filters to see some results!</div>

	<span id="theModal" class="modal">

		<table><tr>
				<td class="top"><p id="modalCaption"></p><hr></td>
			</tr>
			<tr>
				<td class="bottom"><img class="modalImgContainer"></td>
			</tr>
			<!--<td class="right">right<p id="modalCaption"></p></td>->
		</tr></table>


		<!--<div class="modalContainer">
			<div class="modalImgContainer">
				<img class="modalImg">
			</div>
			<p id="modalCaption"></p>
		</div>-->
		<span class="close" id="closeButton">&times;</span>
	</span>

</div> <!-- Ends content div -->
</body>
</html>


<!-- Change up modal section so that it mimics the gallery page, just bigger
		-Container for image and text so they stay attached
-->