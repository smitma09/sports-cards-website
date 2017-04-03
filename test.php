<html>
	<body>
		<h1>Testing</h1>

	<?php
		$servername = "localhost";
		$username = "hollywood42";
		$password = "Pass4Database";
		$dbname = "cardCollections";

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			echo "<p>Connection failed :(</p>";
		} else {
			echo "<p>Connection succeeded :)</p>";
		}

	?>
	</body>
</html>
