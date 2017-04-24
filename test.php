<html>
	<body>
		<h1>Testing</h1>

	<?php

		include "/var/www/admin.php";

		$conn = new mysqli($dbServername, $dbUsername, $dbPass, $dbName);
		if ($conn->connect_error) {
			echo "<p>Connection failed :(</p>";
		} else {
			echo "<p>Connection succeeded :)</p>";
		}

		echo "<form><select>
			<option>One</option>
			<option>Two</option>
			<option>Three</option>
			</select></form>";

	?>


	</body>
</html>
