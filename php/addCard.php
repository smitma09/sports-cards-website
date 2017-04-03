<?php
	include_once("./navbar.php");
?>

<html>
	<body>
	<?php
		include "/var/www/admin.php";

	//If password correct, process form data, store image to correct location
		$password = $_POST["pswd"];
		if (password_verify($password, $uploadPass)) {

			$year = $_POST["year"];
			$set = $_POST["set"];
			$set = str_replace("'", "\'", $set);
			$subset = $_POST["subset"];
			$subset = str_replace("'", "\'", $subset);
			$playerFirst = $_POST["playerFirst"];
			$playerFirst = str_replace("'", "\'", $playerFirst);
			$playerLast = $_POST["playerLast"];
			$playerLast = str_replace("'", "\'", $playerLast);
			$cardNum = $_POST["cardNum"];
			$serialFirst = $_POST["serialFirst"];
			$serialLast = $_POST["serialLast"];
			$multiPlayers = $_POST["multiPlayers"];
			$multiPlayers = str_replace("'", "\'", $multiPlayers);
		// Auto 
			if (isset($_POST["auto"])) {
				$auto = $_POST["auto"];
				if ($auto == "on") {
					$auto = True;
				}
			} else {
				$auto = False;
			}
		//Relic
			if (isset($_POST["relic"])) {
				$relic = $_POST["relic"];
				if ($relic == "on") {
					$relic = True;
				}
			} else {
				$relic = False;
			}
		//Patch
			if (isset($_POST["patch"])) {
				$patch = $_POST["patch"];
				if ($patch == "on") {
					$patch = True;
				}
			} else {
				$patch = False;
			}
		//Manu. relic
			if (isset($_POST["manurelic"])) {
				$manurelic = $_POST["manurelic"];
				if ($manurelic == "on") {
					$manurelic = True;
				}
			} else {
				$manurelic = False;
			}
		//RC
			if (isset($_POST["rookiecard"])) {
				$rookiecard = $_POST["rookiecard"];
				if ($rookiecard == "on") {
					$rookiecard = True;
				}
			} else {
				$rookiecard = False;
			}
		//Numbered
			if (isset($_POST["numbered"])) {
				$numbered = $_POST["numbered"];
				if ($numbered == "on") {
					$numbered = True;
					$numbering = "#ed $serialFirst/$serialLast";
				}
			} else {
				$numbered = False;
				$numbering = "";
			}
		// 1/1
			if (isset($_POST["oneofone"])) {
				$oneofone = $_POST["oneofone"];
				if ($oneofone == "on") {
					$oneofone = True;
				}
			} else {
				$oneofone = False;
			}
		//HOF
			if (isset($_POST["hof"])) {
				$hof = $_POST["hof"];
				if ($hof == "on") {
					$hof = True;
				}
			} else {
				$hof = False;
			}
		//SP and/or VAR
			if (isset($_POST["spVar"])) {
				$spVar = $_POST["spVar"];
				if ($spVar == "on") {
					$spVar = True;
				}
			} else {
				$spVar = False;
			}
		//Graded
			if (isset($_POST["graded"])) {
				$graded = $_POST["graded"];
				if ($graded == "on") {
					$graded = True;
					$grader = $_POST["grader"];
					$cardGrade = $_POST["cardGrade"];
					$autoGrade = $_POST["autoGrade"];
					if (isset($_POST["authentic"])) {
						$authentic = $_POST["authentic"];
					}
					else {
						$authentic = False;
					}
					if ($cardGrade != "") {
						$cg = True;
					}
					else {
						$cg = False;
					}
					if ($autoGrade != "") {
						$ag = True;
					}
					else {
						$ag = False;
					}
					if ($authentic != "") {
						$auth = True;
					}
					else {
						$auth = False;
					}
					if ($cg && $ag) {
						$fullGradeInfo = "$grader $cardGrade/$autoGrade";
						if ($auth) {
							$fullGradeInfo = "$fullGradeInfo Authentic";
						}
					}
					if ($cg && !$ag) {
						$fullGradeInfo = "$grader $cardGrade";
						if ($auth) {
							$fullGradeInfo = "$fullGradeInfo Authentic";
						}
					}
					if ($auth && !$cg && !$ag) {
						$fullGradeInfo = "$grader Authentic";
					}
					if ($ag && !$cg) {
						$fullGradeInfo = "$grader Auto $autoGrade";
						if ($auto) {
							$fullGradeInfo = "$fullGradeInfo Authentic";
						}
					}
				}
			} else {
				$graded = False;
				$grader = "";
				$cardGrade = "";
				$autoGrade = "";
				$fullGradeInfo = "";
			} // End graded block

		//Setting $fullCardInfo variable
			$fullCardInfo = $year . " " . $set;
			if (!($subset == "")) {
				$fullCardInfo = $fullCardInfo . " " . $subset;
			}
			if (!($playerFirst == "") && !($playerLast == "") && ($multiPlayers == "")) {
				//Single player
				$fullCardInfo = $fullCardInfo . " " . $playerFirst . " " . $playerLast;
			} else {
				//Multi player
				$fullCardInfo = $fullCardInfo . " " . $multiPlayers;
			}
			$fullCardInfo = $fullCardInfo . " " . $cardNum;
			if ($numbered) {
				$fullCardInfo = $fullCardInfo . " #ed " . $serialFirst . "/" . $serialLast;
			}
			if ($graded) {
				$fullCardInfo = $fullCardInfo . " " . $fullGradeInfo;
			}

		//Setting path information for file
			$setUnderscores = str_replace(" ", "_", $set);
			$setUnderscores = str_replace("\'", "", $setUnderscores);
			$pathToPicture = "/var/www/html/images/twins_pc/" . $year . "/" . $setUnderscores . "/";
			if (!($subset == "")) {
				$subsetUnderscores = str_replace(" ", "_", $subset);
				$subsetUnderscores = str_replace("\'", "", $subsetUnderscores);
				$pathToPicture = $pathToPicture . $subsetUnderscores . "/";
			}

		//Set file name
			$theNewFile = $cardNum . "_";
			if (!($playerFirst == "") && !($playerLast == "") && ($multiPlayers == "")) {
				//Single player
				//Remove single quotes from file path
				$playerFirstPlain = str_replace("\'", "", $playerFirst);
				$playerLastPlain = str_replace("\'", "", $playerLast);
				$theNewFile = $theNewFile . $playerFirstPlain . "_" . $playerLastPlain;
			} else {
				//Multiplayer or team
				$multiPlayerUnderscores = str_replace(",", "", $multiPlayers);
				$multiPlayerUnderscores = str_replace(" ", "_", $multiPlayerUnderscores);
				$multiPlayerUnderscores = str_replace("\'", "", $mutliPlayerUnderscores);
				$theNewFile = $theNewFile . $multiPlayerUnderscores;
			}
			if ($numbered) {
				$theNewFile = $theNewFile . "_" . $serialFirst . "_" . $serialLast;
			}
			$pathToPictureWithFile = $pathToPicture . $theNewFile;
			$pathToPictureWithFile = str_replace(" ", "_", $pathToPictureWithFile);

		//Testing mkdir stuff
			if (!file_exists($pathToPicture)) {
				$oldmask = umask(0);
				mkdir($pathToPicture, 0775, true); //Previously 0777
				umask($oldmask);
			}

			$path_parts = pathinfo($_FILES["cardImage"]["name"]);
			$extension = "." . strtolower($path_parts["extension"]);
			$finalPath = $pathToPictureWithFile . $extension;

	//Moving image to correct directory and confirming card details
		$acceptedTypes = array('png', 'PNG', 'jpg', 'JPG', 'gif', 'GIF', 'jpeg', 'JPEG');
		$fileName = $_FILES["cardImage"]["name"];
		$fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
		if (in_array($fileExt, $acceptedTypes)) {
			if (move_uploaded_file($_FILES["cardImage"]["tmp_name"], $finalPath)) {
				echo "<h1>Upload success</h1>";
				$cardDisplayName = str_replace("\'", "'", $fullCardInfo);
				echo "<p>You entered the card: '$cardDisplayName' with attributes:</p><ul>";
				if ($auto) {
					echo "<li>Autograph</li>";
				}
				if ($relic) {
					echo "<li>Relic</li>";
				}
				if ($patch) {
					echo "<li>Patch</li>";
				}
				if ($manurelic) {
					echo "<li>Manufactured relic</li>";
				}
				if ($rookiecard) {
					echo "<li>RC</li>";
				}
				if ($numbered) {
					echo "<li>Numbered ($serialFirst/$serialLast)</li>";
				}
				if ($oneofone) {
					echo "<li>1/1</li>";
				}
				if ($hof) {
					echo "<li>HOF</li>";
				}
				if ($spVar) {
					echo "<li>SP/VAR</li>";
				}
				if ($graded) {
					echo "<li>Graded ($fullGradeInfo)</li>";
				}
				if (!$auto && !$relic && !$patch && !$manurelic && !$rookiecard && !$numbered && !$oneofone && !$hof && !$spVar && !$graded) {
				echo "<li>No special attributes</li>";
				}
				echo "</ul>";
				echo "<p>Image was uploaded to $finalPath</p>";
				echo "<p>Want to <a href='/databaseForms/twins_pcForm.php'>enter another card</a>?</p>";

			//Connecting to database
				$server = "localhost";
				$username = "hollywood42";
				$password = "Pass4Database";
				$db = "cardCollections";
				$conn = new mysqli($server, $username, $password, $db);
			//Check connection
				if ($conn->connect_error) {
					echo "<h1>Database error</h1><p>Connection to database failed</p>";
				}
				else { //Connected to database
				//Set variables to be inserted
					if ($playerFirst == "") {
						$playerFirst = "";
					}
					if ($playerLast == "") {
						$playerLast = "";
					}
					if ($multiPlayers == "") {
						$multiPlayers = "";
					}
					if (!($auto)) {
						$autoDB = 0;
					} else {
						$autoDB = True;
					}
					if (!($relic)) {
						$relicDB = 0;
					} else {
						$relicDB = True;
					}
					if (!($patch)) {
						$patchDB = 0;
					} else {
						$patchDB = True;
					}
					if (!($manurelic)) {
						$manuRelicDB = 0;
					} else {
						$manuRelicDB = True;
					}
					if (!($rookiecard)) {
						$rcDB = 0;
					} else {
						$rcDB = True;
					}
					if (!($numbered)) {
						$numberedDB = 0;
						$serialFirst = NULL;
						$serialLast = NULL;
					} else {
						$numberedDB = True;
					}
					if (!($oneofone)) {
						$oneofoneDB = 0;
					} else {
						$oneofoneDB = True;
					}
					if (!($hof)) {
						$hofDB = 0;
					} else {
						$hofDB = True;
					}
					if (!($spVar)) {
						$spVarDB = 0;
					} else {
						$spVarDB = True;
					}
					if (!($graded)) {
						$gradedDB = 0;
					} else {
						$gradedDB = True;
					}
					if ($grader == "") {
						$grader = "";
					}
					if ($cardGrade == "") {
						$cardGrade = "";
					}
					if ($autoGrade == "") {
						$autoGrade = "";
					}
					if (!($auth)) {
						$authenticDB = 0;
					} else {
						$authenticDB = True;
					}

					if ($numbered) {
						$sql = "insert into twins_pc (year, cardSet, subset, playerFirst, playerLast, allPlayers, cardNum, auto, relic, patch, manuRelic, rc, numbered, serialFirst, serialLast, oneofone, hof, spVar, graded, grader, cardGrade, autoGrade, authentic, fullCardInfo, pathToPic) values ($year, '$set', '$subset', '$playerFirst', '$playerLast', '$multiPlayers', '$cardNum', $autoDB, $relicDB, $patchDB, $manuRelicDB, $rcDB, $numberedDB, $serialFirst, $serialLast, $oneofoneDB, $hofDB, $spVarDB, $gradedDB, '$grader', '$cardGrade', '$autoGrade', $authenticDB, '$fullCardInfo', '$finalPath')";
					} else {
						$sql = "insert into twins_pc (year, cardSet, subset, playerFirst, playerLast, allPlayers, cardNum, auto, relic, patch, manuRelic, rc, numbered, oneofone, hof, spVar, graded, grader, cardGrade, autoGrade, authentic, fullCardInfo, pathToPic) values ($year, '$set', '$subset', '$playerFirst', '$playerLast', '$multiPlayers', '$cardNum', $autoDB, $relicDB, $patchDB, $manuRelicDB, $rcDB, $numberedDB, $oneofoneDB, $hofDB, $spVarDB, $gradedDB, '$grader', '$cardGrade', '$autoGrade', $authenticDB, '$fullCardInfo', '$finalPath')";
					}

					if ($conn->query($sql) === TRUE) {
						echo "<h1>Database success</h1>";
						echo "<p>Information successfully written to database</p>";
						$wwwImg = substr($finalPath, 13);
						echo "<p>The following image was uploaded:</p>";
						echo "<img src='$wwwImg' alt='Uploaded image' height='400'>";
					} else {
						echo "<h1>Database error</h1><p>Successfully connected to the database, error writing to database</p>";
						echo "<p>SQL statement: " . $sql . "</p>";
						echo "<p>" . $conn->error . "</p>";
					}

				}
				$conn->close();

			} else { //Something wrong in moving image
				echo "<h1>Image error</h1><p>Something went wrong. Image not uploaded</p>";
			}
		} else { //Unacceptable file type (png, jgp, jpeg, gif are acceptable)
			echo "<h1>File type error</h1><p>Invalid file type. Please try again</p>";
		}
		} else { // Code block for password incorrect
				echo "<h1>Incorrect password</h1>";
				echo "<p>No information was processed. Please go back and try again.</p>";
                        }
	?>

	</body>
</html>
