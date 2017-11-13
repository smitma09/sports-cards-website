<?php
	include_once("./../../php/navbar.php");
?>

<html>
<head>
	<link href="/css/siteTheme.css" rel="stylesheet">
	<style>
		.triple {
			border-spacing: .5rem; /* Adds spacing between columns */
			padding-bottom: 1rem;
		}
		.tri {
			width: 33%; /* Divides into 3 columns */
			min-width: 100px;
			max-height: 50%;
			display: table-cell;
			position: relative;
			border: 1px solid black;
			padding-left: 1rem; /* Adds spacing between border and column text */
			padding-right: 1rem; /* Adds spacing between border and column text */
		}
	</style>
</head>
<body>
<div class="content">
	<h1>Twins PC wants</h1>

	<div class="triple"> 
		<div class="tri">
			<h3><a href="./2015-2019.php">2015-2019</a></h3>
			<p>Take a look at my want lists and see if you can help me improve my collection. I have complete lists of everything I'm looking for available in my want lists section.</p>
		</div>
		<div class="tri">
			<h3><a href="./2010-2014.php">2010-2014</a></h3>
			<p>Take a look at my want lists and see if you can help me improve my collection. I have complete lists of everything I'm looking for available in my want lists section.</p>
		</div>
		<div class="tri">
			<h3><a href="./2005-2009.php">2005-2009</a></h3>
			<p>Interested in learning more about this me and my site? Read an quick introduction to myself and a more detailed description of this site and how it was made.</p>
		</div>
	</div>
	<div class="triple">
		<div class="tri">
			<h3><a href="./2000-2004.php">2000-2004</a></h3>
			<p>Browse through my personal collections and see what I have. Choose filters, such as a specific year, set, or player, choose to look at just autographs or relics, and more!</p>
		</div>
		<div class="tri">
			<h3><a href="./1990-1999.php">1990-1999</a></h3>
			<p>Take a look at my want lists and see if you can help me improve my collection. I have complete lists of everything I'm looking for available in my want lists section.</p>
		</div>
		<div class="tri">
			<h3><a href="./1980-1989.php">1980-1989</a></h3>
			<p>Interested in learning more about this me and my site? Read an quick introduction to myself and a more detailed description of this site and how it was made.</p>
		</div>
	</div>
	<div class="triple">
		<div class="tri">
			<h3><a href="./1970-1979.php">1970-1979</a></h3>
			<p>Browse through my personal collections and see what I have. Choose filters, such as a specific year, set, or player, choose to look at just autographs or relics, and more!</p>
		</div>
		<div class="tri">
			<h3><a href="./1961-1969.php">1961-1969</a></h3>
			<p>Take a look at my want lists and see if you can help me improve my collection. I have complete lists of everything I'm looking for available in my want lists section.</p>
		</div>
		<div class="tri">
			<h3><a href="./autos-relics-etc.php">Autos/Relics/Etc</a></h3>
			<p>Take a look at my want lists and see if you can help me improve my collection. I have complete lists of everything I'm looking for available in my want lists section.</p>
		</div>
	</div>

	<h1>Stats</h1>

	<p>Something I enjoy is keeping track of how my collection grows over time. The earliest record of how many Twins cards I had in my collection is from back on January 16, 2005 when I was just 9 years old. I kept all my Twins cards in a 3-ring binder and used post-its stuck to the inside of the binder cover with a date and count of how many cards I had in the binder at that time (just 153 different Twins cards on that date). By July 26th 2009, my collection had grown to 3,563 unique cards. I had more post-its in that binder over the years, but all but those two have since fallen off and disappeared. Still, I keep those original notes as reminders about how far my collection has come.</p>

	<p>Today, I have a much more elegant method of keeping track of the size of my Twins collection thanks to this site. Here's current a look at where my Twins collection stands numerically today. These totals update automatically when I add a new card in to my site- Much nicer than having to count everything by hand and write the numbers on a post-it!</p>

	<p><ul>
		<?php
			include("/var/www/admin.php");
			$conn = mysqli_connect($dbServername, $publicdbUsername, $publicdbPass, $dbName);
			if (!$conn) {
	    		die('Could not connect: ' . mysqli_error($conn));
			}
			$sql = 'select distinct fullCardInfo from twins_pc';
			$result = mysqli_query($conn, $sql);
			$num_cards = mysqli_num_rows($result);
			echo "<li>Total unique cards: " . $num_cards . "</li>";

			$sql = 'select distinct fullCardInfo from twins_pc where numbered = 1';
			$result = mysqli_query($conn, $sql);
			$num_cards = mysqli_num_rows($result);
			echo "<li>Numbered cards: " . $num_cards . "</li>";

			$sql = 'select distinct fullCardInfo from twins_pc where rc = 1';
			$result = mysqli_query($conn, $sql);
			$num_cards = mysqli_num_rows($result);
			echo "<li>Rookies: " . $num_cards . "</li>";

			$sql = 'select distinct fullCardInfo from twins_pc where auto = 1';
			$result = mysqli_query($conn, $sql);
			$num_cards = mysqli_num_rows($result);
			echo "<li>Autographs: " . $num_cards . "</li>";

			
			$sql = 'select distinct fullCardInfo from twins_pc where relic = 1';
			$result = mysqli_query($conn, $sql);
			$num_cards = mysqli_num_rows($result);
			echo "<li>Relics: " . $num_cards . "</li>";

			$sql = 'select distinct fullCardInfo from twins_pc where patch = 1';
			$result = mysqli_query($conn, $sql);
			$num_cards = mysqli_num_rows($result);
			echo "<li>Patches: " . $num_cards . "</li>";

			$sql = 'select distinct fullCardInfo from twins_pc where oneofone = 1';
			$result = mysqli_query($conn, $sql);
			$num_cards = mysqli_num_rows($result);
			echo "<li>1/1s: " . $num_cards . "</li>";

			echo "</ul></p>";
			echo "<p>Top 10 players in my Twins collection by number of cards:<br>
			<i>Note- These counts do not include cards that feature multiple players (difficult for me to figure out how to account for multi-player cards in these calculations), so exact totals may be slightly off.</i>
			<ul>";

			$sql = 'select count(*), playerFirst, playerLast from twins_pc where allPlayers = "" group by playerLast, playerFirst order by count(*) desc limit 10';
			$result = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_row($result)) {
				echo "<li>" . $row[1] . " " . $row[2] . ": " . $row[0] . "</li>";
			}
		?>
	</ul></p>

</div> <!-- End content tag -->
</body>
</html>
