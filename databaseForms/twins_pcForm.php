<html>

    <?php
        include_once("./../php/navbar.php");
    ?>

    <body>
        <h1>Add card to Twins PC</h1>
	<p>Enter card information and an image to add a card to your Twins PC. If there are multiple players on a card, don't put anything into the first and last name field and instead enter all players that appeared on the card in the appropriate field, separated by commas (i.e. "Joe Mauer, Justin Morneau"). If the card is a team card, you can enter the team into that field as well. If the card doesn't have information for the field or attribute, leave the appropriate sections blank or unchecked.</p>
        <form enctype="multipart/form-data" action="./../php/addCard.php" method="post">
            <p id="setInfo">Year <input type="text" name="year" size="5"> 
                Set <input type="text" name="set"> 
                Subset/parallel <input type="text" name="subset" default="" size="40"> <i>If this is a base card, leave this field blank</i></p>
            <p id="playerInfo">Player first name <input type="text" name="playerFirst" default=""> 
                Player last name <input type="text" name="playerLast" default=""></p>
	    <p id="allPlayerInfo">Or all players on card <input type="text" name="multiPlayers" default="" size="50"> <i>Enter each player's first and last name, separated by commas</i></p>
            <p id="cardNumber">Card number <input type="text" name="cardNum" size="5"> <i>Enter the card number exactly as it appears on the card</i></p>
            <h3>Attributes</h3>
            <ul style="list-style-type:none" id="attributes">
                <li><input type="checkbox" name="auto" default=""> Autograph</li>
                <li><input type="checkbox" name="relic" default=""> Relic</li>
                <li><input type="checkbox" name="patch" default=""> Patch</li>
                <li><input type="checkbox" name="manurelic" default=""> Manufactured relic</li>
                <li><input type="checkbox" name="rookiecard" default=""> RC</li>
                <li><input type="checkbox" name="numbered" default=""> Numbered</li>
                <ul style="list-style-type:none" id="numbering">
                    <li>Serial number <input type="number" name="serialFirst" default=""> <b>/</b> 
                        <input type="number" name="serialLast" default=""></li>
                </ul>
                <li><input type="checkbox" name="oneofone" default=""> 1/1</li>
                <li><input type="checkbox" name="hof" default=""> HOF</li>
		<li><input type="checkbox" name="spVar" default=""> SP/VAR</li>
                <li><input type="checkbox" name="graded" default=""> Graded/Slabbed</li>
                <ul style="list-style-type:none" id="gradingDetails">
                    <li>Grader <input type="text" name="grader"></li>
                    <li>Card grade <input type="number" step="0.5" name="cardGrade"></li>
                    <li>Autograph grade <input type="number" name="autoGrade"></li>
                    <li><input type="checkbox" name="authentic" default = ""> Authentic</li>
                </ul>
            </ul>
            <p>Image <input type="file" name="cardImage" accept="image/*"></p>
            <p>Password <input type="password" name="pswd"></p>
            <p><input type="submit"></p>
        </form>

    </body>
</html>
