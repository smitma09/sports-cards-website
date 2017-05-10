<html>
<head>
	<style>
/*	table {
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
*/
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

	$sql = 'select * from twins_pc where year = "'. $q. '" ';
	$result = mysqli_query($conn, $sql);
	echo "<table><tr><td><b>Card</b></td></tr>";
	while ($row = mysqli_fetch_array($result)) {
		$pic = $row['pathToPic'];
		$wwwImg = substr($pic, 13);
//		echo "<tr><td>" . $row['fullCardInfo'] . "<div><img src=" . $wwwImg . "></div></td></tr>";
		echo "<img src=".$wwwImg." alt='Whoops' height='200px'>";
	}
	echo "</table>";
	mysqli_close($conn);
?>
</body>
</html>
