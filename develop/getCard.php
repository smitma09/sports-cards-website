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

	/* The Modal (background) */
	.modal {
	    display: none; /* Hidden by default */
	    position: fixed; /* Stay in place */
	    z-index: 1; /* Sit on top */
	    padding-top: 100px; /* Location of the box */
	    left: 0;
	    top: 0;
	    width: 100%; /* Full width */
	    height: 100%; /* Full height */
	    overflow: auto; /* Enable scroll if needed */
	    background-color: rgb(0,0,0); /* Fallback color */
	    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
	}

	/* Modal Content (Image) */
	.modal-content {
	    margin: auto;
	    display: block;
	    width: 80%;
	    max-width: 700px;
	}

	/* The Close Button */
	.close {
	    position: absolute;
	    top: 15px;
	    right: 35px;
	    color: #f1f1f1;
	    font-size: 40px;
	    font-weight: bold;
	    transition: 0.3s;
	}

	.close:hover,
	.close:focus {
	    color: #bbb;
	    text-decoration: none;
	    cursor: pointer;
	}

/* --------------------------------------------- */

	</style>
</head>
<body>
	<div id="theModal" class="modal">
		<span class="close">&times;</span>
		<span class="modal-content" id="modalImg"></span>
		<div id="caption"></div>

	</div>

	<script>
		// Get the modal
		var modal = document.getElementById('theModal');

		// Get the image and insert it inside the modal - use its "alt" text as a caption
		var img = document.getElementById('modalImg');
		var modalImg = document.getElementById("img01");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() { 
		  modal.style.display = "none";
		}
	</script>


<?php
	include("/var/www/admin.php");

	$conn = mysqli_connect($dbServername, $publicdbUsername, $publicdbPass, $dbName);
	if (!$conn) {
	    die('Could not connect: ' . mysqli_error($conn));
	    echo '$conn';
	}

	$sql = 'select * from twins_pc where year=2013 and playerLast="Morneau" order by year desc, cardset asc, subset asc, cast(cardNum as signed) asc';
	

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
			echo "<div class=fullContainer><div class=imgContainer><img class=image id=" .$row['fullCardInfo'] . "src=" . $wwwImg ."></div><p class=text>" . $row['fullCardInfo'] . "</p></div>";
		}
		echo "</div></div>";
	}
	mysqli_close($conn);
?>

</body>
</html>
