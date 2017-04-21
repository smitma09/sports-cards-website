<?php
	include_once("./php/navbar.php");
?>

<html>
	<body>
		<h1>Database info</h1>
		<p>
			<form action="./php/getLiteData.php" method="POST">
				<input type="submit" value="Lite data">
			</form>
		Lite data will list all full card display names in a single column table. Be sure to hover over an entry in the table to see an image of the card!</p>
		<p>
			<form action="./php/getFullData.php">
				<input type="submit" value="Full data">
			</form>
		Full data will list all attributes of a card, each in its own column in a table. You will also (soon) be able to hover over a row to see an image of the card.</p>
	<body>
</html>
