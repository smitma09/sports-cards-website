<?php
	include_once("/var/www/html/php/navbar.php");
?>

<html id="top">
<head>
	<link href="/css/twinsPCwantlists.css" rel="stylesheet">
	<link href="/css/siteTheme.css" rel="stylesheet">
</head>

<body class="background">
<div class="content">
	<h1>Twins autographs, relics, etc</h1>

	<p>This page holds my list of all the Twins autos, relics, patches, 1/1s, manufactured relics, and other such items that I currently have in my collection. If you have a card that is not on this list, I would love to have for it!</p>

	<p><u>Quick stats</u><br>
	<?php
		include("/var/www/admin.php");
		//These PHP commands counts different types of cards I have and displays them on screen (i.e. reads database to see I have X number of autographed cards and displays that number)
            $conn = mysqli_connect($dbServername, $publicdbUsername, $publicdbPass, $dbName);
            if (!$conn) {
                die('Could not connect: ' . mysqli_error($conn));
            }
            //Autographs
            $sql = "select count(*) from twins_pc where auto = 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            echo "Autographs: " . $row[0] . "<br>";
            //Relics
            $sql = "select count(*) from twins_pc where relic = 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            echo "Game used/relics: " . $row[0] . "<br>";
            //Patches
            $sql = "select count(*) from twins_pc where patch = 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            echo "Patches: " . $row[0] . "<br>";
            //Manufactured relics
            $sql = "select count(*) from twins_pc where manuRelic = 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            echo "Manufactured relics: " . $row[0] . "<br>";
            //1/1s
            $sql = "select count(*) from twins_pc where oneofone = 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            echo "1/1s: " . $row[0] . "<br>";
            //Superfractors
            $sql = "select count(*) from twins_pc where fullCardInfo like '%Superfractor%'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            echo "Superfractors: " . $row[0] . "<br>";
            //Total unique
            $sql = "select count(*) from twins_pc where auto = 1 or relic = 1 or oneofone = 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            echo "Total unique autos, relics, 1/1s, etc: " . $row[0] . "</p>";

            mysqli_close($conn);
    ?>



    <?php

    	$conn = mysqli_connect($dbServername, $publicdbUsername, $publicdbPass, $dbName);
            if (!$conn) {
                die('Could not connect: ' . mysqli_error($conn));
            }

            // Get years I have an autographed, etc card from
            $sql = "select year from twins_pc where (auto = 1 or relic = 1 or patch = 1 or manuRelic = 1 or oneofone = 1) group by year order by year desc";
            $result = mysqli_query($conn, $sql);
            foreach ($result as $year) {

            	echo "<h1>" . $year['year'] . "</h1>";

            	// Get different card sets within a given year
            	$sql = "select cardSet from twins_pc where year = " . $year['year'] . " and (auto = 1 or relic = 1 or patch = 1 or manuRelic = 1 or oneofone = 1) group by cardSet order by cardSet";
            	$result = mysqli_query($conn, $sql);

            	foreach ($result as $set) {
            		// Display cards from a given card set from a given year
            		$sql = 'select fullCardInfo from twins_pc where year = ' . $year['year'] . ' and cardSet = "' . $set['cardSet'] . '" and (auto = 1 or relic = 1 or patch = 1 or manuRelic = 1 or oneofone = 1) order by subset, cardNum, serialFirst';
            		$result = mysqli_query($conn, $sql);

            		foreach ($result as $card) {
            			echo $card['fullCardInfo'] . "<br>";
            		}
            		echo "<br>";
            	}
            	echo "<hr>";
            }
    ?>

</div> <!-- End content tag -->
</body>
</html>