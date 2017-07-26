<html>
<body>

<?php

        include("/var/www/admin.php");
        $year = $_GET['year'];
        $player = $_GET['player'];

        $conn = mysqli_connect($dbServername, $publicdbUsername, $publicdbPass, $dbName);
        if (!$conn) {
            die('Could not connect: ' . mysqli_error($conn));
        }

	$sql = "select playerFirst, playerLast from twins_pc group by playerLast, playerFirst";
        $result = mysqli_query($conn, $sql);
	echo "<select>";
	while ($row = mysqli_fetch_array($result)) {
		echo "<option value=" . $row['playerFirst'] . ">". $row['playerFirst']. " " . $row['playerLast'];
	}
	echo "</select>";


/*Old stuff:
        echo "<table><tr><td><b>Card</b></td></tr>";
        while ($row = mysqli_fetch_array($result)) {
                $pic = $row['pathToPic'];
                $wwwImg = substr($pic, 13);
//              echo "<tr><td>" . $row['fullCardInfo'] . "<div><img src=" . $wwwImg . "></div></td></tr>";
                echo "<img src=".$wwwImg." alt='Whoops' height='200px'>";
        }
        echo "</table>";
        mysqli_close($conn);

*/


?>


</body>
</html>
