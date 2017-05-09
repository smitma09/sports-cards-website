<html>
<head>
	<style>
		table {
			border-collapse: collapse;
		}
		td {
			border: 1px solid black;
		}
	</style>
</head>
<body>
<?php
	include("/var/www/admin.php");
	$q = $_GET['q'];

	$conn = mysqli_connect($dbServername, $publicdbUsername, $publicdbPass, $dbName);
	if (!$conn) {
	    die('Could not connect: ' . mysqli_error($conn));
	}

	$sql = 'select * from twins_pc where playerFirst = "'. $q. '" ';
	$result = mysqli_query($conn, $sql);
	echo "<table><tr><td><b>Card</b></td></tr>";
	while ($row = mysqli_fetch_array($result)) {
		echo "<tr><td>" . $row['fullCardInfo'] . "</td></tr>";
	}
	echo "</table>";
	mysqli_close($conn);
?>
</body>
</html>
