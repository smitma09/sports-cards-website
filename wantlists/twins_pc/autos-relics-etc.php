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

	<!-- -------------------- 2018 -------------------- -->

	<h1>2018</h1><p>

	2018 Diamond Kings DK Rookie Materials Signatures Mitch Garver RMS-MG #ed 065/299 (dual relic auto)<br>

	<br>

	2018 Panini Immaculate Collection Jumbo Mitch Garver (relic)<br>

	<br>

	2018 Topps 1983 Topps Autographs Max Kepler 83A-MK (auto)<br>
	2018 Topps 1983 Topps Autographs Black Zack Granite 83A-ZG (auto)<br>
	2018 Topps Major League Material Miguel Sano MLM-MS (relic)<br>

	<br>

	2018 Topps Allen & Ginter Relic Miguel Sano FSRB-MS (relic)<br>

	<br>

	2018 Topps Chrome Rookie Autographs Zack Granite RA-ZG (auto)<br>

	<br>

	2018 Topps Gypsy Queen Autographs Jose Berrios GQA-JB (auto)<br>

	<br>

	2018 Topps Inception Rookie and Emerging Stars Autographs Red Zack Granite RED-ZG #ed 44/75 (auto)<br>

	<br>

	2018 Topps Stadium Club Autographs Jose Berrios SCA-JBE (auto)</p>

	<hr>

	<!-- -------------------- 2017 -------------------- -->

	<h1>2017</h1><p>

	2017 Bowman Chrome Prospect Autographs Fernando Romero CPA-FRO (auto)<br>
	2017 Bowman Chrome Prospect Autographs Purple Refractors Fernando Romero CPA-FRO #ed 224/250 (auto)<br>

	<br>

	2017 Bowman Draft Chrome Draft Picks Autographs Brent Rooker CDA-BR (auto)<br>

	<br>

	2017 Bowman Platinum Top Prospects Autographs Alex Kirilloff TPA-AK (auto)<br>

	<br>

	2017 Topps Jackie Robinson Day Commemorative Pin Miguel Sano JRPC-MSA (manu pin)<br>
	2017 Topps Major League Material Autograph Relics Miguel Sano MLMA-MSA #ed 48/50 (auto relic)<br>

	<br>

	2017 Topps Inception Black Brian Dozier 17 #ed 1/1<br>
	2017 Topps Inception Printing Plates Cyan Brian Dozier 17 #ed 1/1 (printing plate)<br>

	<br>

	2017 Topps Tier One Breakout Autograps Max Kepler BOA-MK #ed 035/300 (auto)<br>
	2017 Topps Tier One Breakout Autograps Copper Ink Max Kepler BOA-MKE #ed 06/25 (auto)<br>
	2017 Topps Tier One Prime Performers Autograps Copper Ink Rod Carew PPA-RC #ed 11/25 (auto)</p>

	<hr>

	<!-- -------------------- 2016 -------------------- -->

	<h1>2016</h1><p>
	2016 Bowman Chrome Rookie Autographs Refractors Miguel Sano CRA-MS #ed 403/499 (auto)<br>
	2016 Bowman Prospect Autographs Purple Nick Gordon PA-NG #ed 160/250 (auto)<br>

	<br>

	2016 Bowman Chrome Rookie Autographs Refractors Jose Berrios BCAR-JBE #ed 053/499 (auto)<br>
	2016 Bowman Chrome Rookie Autographs Orange Refractors Miguel Sano BCAR-MS #ed 16/25 (auto)<br>

	<br>

	2016 Bowman Inception Autograph Relics Jose Berrios IAR-JB (auto relic)<br>
	2016 Bowman Inception Prospect Autographs Blue Nick Gordon PA-NG #ed 52/99 (auto)<br>
	2016 Bowman Inception Rookie Autographs Green Byung-Ho Park RA-BP #ed 02/50 (auto)<br>

	<br>

	2016 Donruss Jersey Kings Brian Dozier JK-BD (jersey)<br>
	2016 Donruss Promising Pros Materials Miguel Sano PPM-MS (relic)<br>

	<br>

	2016 Donruss Optic Studio Signatures Jose Berrios SSJB (auto)<br>

	<br>

	2016 Topps In the Name Relics Brian Dozier "Z" ITN-BD #ed 1/1 (letter patch)<br>
	2016 Topps Scouting Reports Autographs Kurt Suzuki SRA-KSU (auto)<br>
	2016 Topps Scouting Reports Relics Miguel Sano SRR-MSA (jersey)<br>

	<br>

	2016 Topps Allen & Ginter Mini Framed Cloth Brian Dozier 74 #ed 06/10 (silk)<br>
	2016 Topps Allen & Ginter Minis Wood Tyler Duffey 305 #ed 1/1<br>

	<br>

	2016 Topps Chrome Rookie Autographs Jose Berrios RA-JOS (auto)<br>
	2016 Topps Chrome Rookie Autographs Max Kepler RA-MK (auto)<br>
	2016 Topps Chrome Rookie Autographs Tyler Duffey RA-TD (auto)<br>
	2016 Topps Chrome Rookie Autographs Refractors Jose Berrios RA-JOS #ed 312/499 (auto)<br>
	2016 Topps Chrome Rookie Autographs Blue Refractors Tyler Duffey RA-TD #ed 061/150 (auto)<br>
	2016 Topps Chrome Rookie Autographs Gold Refractors Tyler Duffey RA-TD #ed 33/50 (auto)<br>
	2016 Topps Chrome Rookie Autographs Green Refractors Tyler Duffey RA-TD #ed 60/99 (auto)<br>
	2016 Topps Chrome Rookie Autographs Orange Refractors Tyler Duffey RA-TD #ed 12/25 (auto)<br>
	2016 Topps Chrome Rookie Autographs Purple Refractors Jose Berrios RA-JOS #ed 101/250 (auto)<br>
	2016 Topps Chrome Rookie Autographs Purple Refractors Tyler Duffey RA-TD #ed 242/250 (auto)<br>
	2016 Topps Chrome Rookie Autographs Red Refractors Tyler Duffey RA-TD #ed 1/5 (auto)<br>

	<br>

	2016 Topps Five Star Autographs Max Kepler FSA-MK (auto)<br>
	2016 Topps Five Star Autographs Miguel Sano FSA-MSA (auto)<br>

	<br>

	2016 Topps Gypsy Queen Autographs Max Kepler GQA-MK (auto)<br>
	2016 Topps Gypsy Queen Mini Autographs Byron Buxton GMA-BB #ed 15/25 (auto)<br>
	2016 Topps Gypsy Queen Mini Framed Printing Plates Black Tyler Duffey 221 #ed 1/1 (printing plate)<br>
	2016 Topps Gypsy Queen Mini Framed Printing Plates Magenta Tyler Duffey 221 #ed 1/1 (printing plate)<br>

	<br>

	2016 Topps Heritage High Number Real One Autographs Red Ink Max Kepler ROA-MK #ed 51/67 (auto)<br>
	2016 Topps Heritage High Number Real One Autographs Red Ink Jose Berrios ROA-JBER #ed 06/67 (auto)<br>

	<br>

	2016 Topps Hi Tek Autographs Max Kepler HT-MK (auto)<br>

	<br>

	2016 Topps Museum Collection Silver Framed Autographs Miguel Sano MCA-MS #ed/09/15 (auto)<br>

	<br>

	2016 Topps Stadium Club Autographs Byung-Ho Park SCA-BHP (auto)<br>

	<br>

	2016 Topps Tier One Breakout Autographs Copper Ink Miguel Sano BOA-MSN (auto)<br>
	2016 Topps Tier One Prime Performers Autographs Kurt Suzuki PP-KSU #ed 274/299 (auto)<br>

	<br>

	2016 Topps Triple Threads All-Star Patches Brian Dozier TTASP-BD #ed 3/9 (triple patch)<br>
	2016 Topps Triple Threads All-Star Patches Glen Perkins TTASP-GP #ed 7/9 (triple patch)</p>

	<hr>

	<!-- -------------------- 2015 -------------------- -->

	<h1>2015</h1><p>

	2015 Bowman Chrome Rookie Autographs Refractors Trevor May BCAR-TM #ed 333/499 (auto)<br>
	2015 Bowman Chrome Rookie Autographs Blue Refractors Trevor May BCAR-TM #ed 144/150 (auto)<br>

	<br>

	2015 Bowman Chrome Prime Position Autographs Byron Buxton PPA-BB (auto)<br>
	2015 Bowman Chrome Prospect Autographs Amaurys Minier BCAP-AM (auto)<br>
	2015 Bowman Chrome Prospect Autographs Stephen Gonsalves BCAP-SG (auto)<br>
	2015 Bowman Chrome Prospect Autographs Refractors Stephen Gonsalves BCAP-SG #ed 316/499 (auto)<br>

	<br>

	2015 Bowman Chrome Draft Bowman Scouts' Fantasy Impact Autographs Refractors Tyler Jay BSI-TJ #ed 92/99 (auto)<br>

	<br>

	2015 Bowman Inception Autographs Jose Berrios BIA-JB (auto)<br>

	<br>

	2015 Bowman's Best 1995 Bowman's Best Autographs Joe Mauer 95BB-JM (auto)<br>
	2015 Bowman's Best Best of 2015 Autographs Tyler Jay B15-TJ (auto)<br>

	<br>

	2015 Donruss Signature Series Trevor May 28 (auto)<br>

	<br>

	2015 Diamond Kings DK Signatures Silver Danny Santana 34 #ed 098/299 (auto/jersey/bat)<br>

	<br>

	2015 Elite 21st Century Signatures Red Trevor May RC 28 #ed 20/21 (auto)<br>
	2015 Elite Members Only Material Prime Brian Dozier 35 #ed 11/25 (patch)<br>

	<br>

	2015 Finest Autographs Trevor May FA-TM (auto)<br>
	2015 Finest Autographs Gold Refractors Trevor May FA-TM #ed 35/50 (auto)<br>
	2015 Finest Autographs Green Refractors Trevor May FA-TM #ed 92/99 (auto)<br>
	2015 Finest Autographs Orange Refractors Trevor May FA-TM #ed 13/25 (auto)<br>
	2015 Finest Autographs Red Refractors Trevor May FA-TM #ed 5/5 (auto)<br>
	2015 Finest Autographs Printing Plates Cyan Trevor May FA-TM #ed 1/1 (auto)<br>

	<br>

	2015 Panini Elite 21st Century Signatures Kennys Vargas 32 (auto)<br>
	2015 Panini Elite Future Threads Kennys Vargas 2 (relic)<br>
	2015 Panini Elite Future Threads Trevor May 29 (relic)<br>

	<br>

	2015 Panini Immaculate Swatches Prime Trevor May 61 #ed 38/99 (patch)<br>

	<br>

	2015 Panini Prizm Rookie Autographs Prizms Kennys Vargas 42 (auto)<br>
	2015 Panini Prizm Rookie Autographs Red Power Prizms Trevor May 67 #ed 042/125 (auto)<br>

	<br>

	2015 Sportkings Series B Patch Justin Morneau P-15 #ed 2/5 (patch)<br>

	<br>

	2015 Topps Brian Duensing 330 (IP/TTM auto)<br>
	2015 Topps First Home Run Medallions Joe Mauer FHRM-JM (manu. relic)<br>

	<br>

	2015 Topps Allen & Ginter Dual Autograph Relic Book Cards Joe Mauer, Kennys Vargas DBC-MV #ed 09/10 (dual auto, dual patch, booklet)<br>

	<br>

	2015 Topps Chrome Autographed Rookies Refractors Trevor May AR-TM #ed 214/499<br>

	<br>

	2015 Topps Museum Collection Signature Swatches Dual Relic Autographs Gold Kennys Vargas SSD-KV #ed 12/25 (dual patch auto)<br>

	<br>

	2015 Topps Update All-Star Jumbo Patches Brian Dozier ASJP-BD #e 6/6 (patch)<br>
	2015 Topps Update All-Star Stitches Brian Dozier STIT-BD (relic)</p>

	<hr>

	<!-- -------------------- 2014 -------------------- -->

	<h1>2014</h1><p>

	2014 Bowman Chrome Draft Autographs Orange Refractors Nick Burdi BCA-NB #ed 17/25 (auto)<br>

	<br>

	2014 Bowman Inception Autograph Relics Miguel Sano AR-MSA (auto-jersey)<br>
	2014 Bowman Inception Autograph Relics Gold Eddie Rosario AR-ERO #ed 02/10 (auto-jersey)<br>
	2014 Bowman Inception Prospect Autographs Jorge Polanco PA-JPO (auto)<br>

	<br>

	2014 Finest Rookie Autographs Josmil Pinto RA-JPI (auto)<br>

	<br>

	2014 National Treasures Baseball Signature Die Cuts Joe Mauer 50 #ed 14/25 (auto)<br>

	<br>

	2014 Topps Trajectory Relics Aaron Hicks TR-RH (jersey)<br>

	<br>

	2014 Topps High Tek Press Proofs Black Joe Mauer HT-JM #ed 1/1 (press proof)<br>

	<br>

	2014 Topps Tier One Acclaimed Autographs Silver Ink Ricky Nolasco AA-RNO #ed 05/10 (auto)<br>

	<br>

	2014 Topps Triple Threads Unity Relics Emerald Joe Mauer UJR-JM #ed 16/18 (relic)<br>

	<br>

	2014 Topps Update Jorge Polanco 237 (IP auto)<br>
	2014 Topps Update All-Star Relics Gold Glen Perkins ASR-GP #ed 41/50 (jersey)</p>

	<hr>

	<!-- -------------------- 2013 -------------------- -->

	<h1>2013</h1><p>

	2013 Bowman Black Collection Autographs Alex Meyer BBC-AME #ed 09/25 (auto)<br>
	2013 Bowman Black Collection Autographs Ryan Eades BBC-RE #ed 12/25 (auto)<br>

	<br>

	2013 Bowman Chrome Prospect Autographs Jose Berrios BCP-JB (auto)<br>
	2013 Bowman Chrome Prospect Autographs Oswaldo Arcia BCP-OA (auto)<br>

	<br>

	2013 Bowman Chrome Prospect Autographs Jorge Polanco BCP-JPO (auto)<br>
	2013 Bowman Chrome Prospect Autographs Refractors Jorge Polanco BCP-JPO #ed 167/500 (auto)<br>

	<br>

	2013 Bowman Chrome Draft Draft Picks Superfractors Stephen Gonsalves BDPP49 #ed 1/1 BGS 9.5<br>

	<br>

	2013 Bowman Chrome Mini Printing Plates Black Derrick Pinella 66 #ed 1/1 (printing plate)<br>
	2013 Bowman Chrome Mini Printing Plates Black Nelson Molina 281 #ed 1/1 (printing plate)<br>

	<br>

	2013 Bowman Draft Picks and Prospects Chrome Prospect Autographs Kohl Stewart BCA-KS (auto)<br>
	2013 Bowman Draft Picks and Prospects Printing Plates Magenta Kyle Gibson 22 #ed 1/1 (printing plate)<br>

	<br>

	2013 Bowman Inception Prospect Autographs Byron Buxton PA-BB (auto)<br>
	2013 Bowman Inception Prospect Autographs Jose Berrios PA-JB (auto)<br>

	<br>

	2013 Bowman Platinum Prospect Autographs Max Kepler BPAP-MK (auto)<br>
	2013 Bowman Platinum Prospect Autographs Nate Roberts BPAP-NR (auto)<br>

	<br>

	2013 Bowman Victory Autographs Nate Roberts BVA-NR #ed 09/10 (auto)<br>

	<br>

	2013 Finest Rookie Autographs Refractors Kyle Gibson RA-KG (auto)<br>
	2013 Finest Autograph Jumbo Relic Rookie Orange Refractors Oswaldo Arcia AJR-OA #ed 79/99 (auto/jersey)<br>
	2013 Finest Autograph Jumbo Relic Rookie X-Fractors Oswaldo Arcia AJR-OA #ed 086/149 (auto/jersey)<br>

	<br>

	2013 Panini America's Pastime Black Chris Herrmann 226 #ed 1/1<br>

	<br>

	2013 Panini Prizm Autographs Josh Willingham JW (auto)<br>

	<br>

	2013 Select Chris Herrmann 199 #ed 557/750 (auto)<br>
	2013 Select Prizm Chris Herrmann 199 #ed 28/99 (auto)<br>
	2013 Select Prizm Gold Chris Herrmann 199 #ed 13/25 (auto)<br>

	<br>

	2013 Topps Manufactured Rookie Patch Joe Mauer MCP-21 (cloth manu. relic)<br>
	2013 Topps Printing Plates Yellow Chris Herrmann #ed 1/1 (printing plate)<br>

	<br>

	2013 Topps Allen & Ginter Mini Framed Printing Plates Cyan Josh Willingham 196 #ed 1/1 (printing plate)<br>
	2013 Topps Allen & Ginter Mini Framed Printing Plates Cyan Justin Morneau 324 #ed 1/1 (printing plate)<br>
	2013 Topps Allen & Ginter Relics Joe Mauer AGFR-JMA (jersey, full sized)<br>

	<br>

	2013 Topps Chrome Autographs Rookie Variation Oswaldo Arcia (auto)<br>(100)

	<br>

	2013 Topps Gypsy Queen Autographs Cole DeVries GQA-CD (auto)<br>
	2013 Topps Gypsy Queen Autographs Scott Diamond GQA-SD (auto)<br>
	2013 Topps Gypsy Queen Hometown Currency Coins Scott Diamond 138 #ed 3/5 (coin relic)<br>
	2013 Topps Gypsy Queen Mini Framed Relics Justin Morneau GQMR-JMO (jersey)<br>

	<br>

	2013 Topps Heritage Real Ones Autographs Bill Fischer ROA-BF (auto)<br>
	2013 Topps Heritage Real Ones Autographs Red Ink Scott Diamond ROA-SD #ed 17/64(auto)<br>

	<br>

	2013 Topps Mini Printing Plates Black Chris Herrmann 335 #ed 1/1 (printing plate)<br>
	2013 Topps Mini Printing Plates Yellow Chris Herrmann 335 #ed 1/1 (printing plate)<br>

	<br>

	2013 Topps Pro Debut Trevor May 190 (IP/TTM auto)<br>

	<br>

	2013 Topps Tribute Autographs Blue Scott Diamond TA-SD #ed 40/50 (auto)<br>
	2013 Topps Tribute Autographs Sepia Scott Diamond TA-SD #ed 14/35 (auto)<br>
	2013 Topps Tribute Superstar Swatches Orange Joe Mauer SS-JM #ed 21/25 (dual jersey)<br>

	<br>

	2013 Topps Update All-Star Stitches Glen Perkins ASR-GP (jersey)</p>

	<hr>

	<!-- -------------------- 2012 -------------------- -->

	<h1>2012</h1><p>

	2012 Bowman Chrome Prospect Autographs Eddie Rosario BCP9 (auto)<br>

	<br>

	2012 Bowman Chrome Superfractors Brian Dozier RC 91 #ed 1/1 (my first super!)<br>

	<br>

	2012 Finest Rookie Autographs Orange Refractors Liam Hendriks AR-LH #ed 92/99 (auto)<br>

	<br>

	2012 Leaf Ultimate Draft Heading to the Show Autographs Gold Byron Buxton HS-BB1 #ed 07/10 (auto)<br>

	<br>

	2012 National Treasures Prime Bert Blyleven 117 #ed 10/25 (patch)<br>
	2012 National Treasures Rated Rookie Autographs Gold Chris Parmelee 164 #ed 06/25 (auto)<br>

	<br>

	2012 Panini Prizm Autographs Trevor Plouffe TP (auto)<br>

	<br>

	2012 Topps Own the Name Michael Cuddyer "Y" ONTR-MCU #ed 1/1 (letter patch)<br>
	2012 Topps Retired Numbers Patches Rod Carew RN-RC (manu patch)<br>

	<br>

	2012 Topps Chrome Rookie Autographs Liam Hendriks 154 (auto)<br>
	2012 Topps Chrome Rookie Autographs Refractors Chris Parmelee 162 #ed 224/499 (auto)<br>
	2012 Topps Chrome Rookie Autographs Black Refractor Liam Hendriks 154 #ed 069/100 (auto)<br>
	2012 Topps Chrome Rookie Autographs Gold Refractor Chris Parmelee 152 #ed 36/50 (auto)<br>

	<br>

	2012 Topps Five Star Jumbo Jersey Relics Joe Mauer JJR-JM #ed 33/92 (jumbo relic)<br>

	<br>

	2012 Topps Gypsy Queen Autographs Joe Benson GQA-B (auto)<br>

	<br>

	2012 Topps Museum Collection Momentous Material Jumbo Relics Gold Rod Carew MMJR-RCA #ed 17/35 (relic)<br>

	<br>

	2012 Topps Triple Threads Ben Revere 104 #ed 62/99 (auto-relic)</p>

	<hr>

	<!-- -------------------- 2011 -------------------- -->

	<h1>2011</h1><p>

	2011 Bowman Draft Prospects Autographs Blue Alex Wimmers BPA-AW #ed 010/199 (auto)<br>

	<br>

	2011 Bowman Platinum Prospect Autographs Refractors Joe Benson BPA-JB (auto)<br>

	<br>

	2011 Bowman Sterling Dual Autographs Ben Revere/Liam Hendriks BSDA-RH #ed 034/225 (dual auto)<br>
	2011 Bowman Sterling Prospect Autographs Aaron Hicks BSP-AH (auto)<br>
	2011 Bowman Sterling Rookie Autographs Ben Revere RC 17 (auto)<br>

	<br>

	2011 Topps Allen & Ginter Mini Framed Printing Plates Black Joe Mauer 350 #ed 1/1 (printing plate)<br>
	2011 Topps Allen & Ginter Relics Justin Morneau AGR-JMO (bat)<br>

	<br>

	2011 Topps Chrome Rookie Autographs Ben Revere 175 (auto)<br>
	2011 Topps Chrome Canary Anniversary Refractors Justin Morneau 154 #ed 1/1<br>
	2011 Topps Chrome Superfractors Justin Morneau 154 #ed 1/1<br>

	<br>

	2011 Topps Commerative Patch Joe Mauer "1982 Twins" TLMP-JM (manu. patch)<br>

	<br>

	2011 Topps Heritage Denard Span 84 (IP/TTM auto)<br>
	2011 Topps Heritage Clubhouse Collection Relics Francisco Liriano CCR-FL (jersey)<br>
	2011 Topps Heritage Clubhouse Collection Relics Jim Thome CCR-JT (jersey)<br>
	2011 Topps Heritage Clubhouse Collection Relics Justin Morneau CCR-JMO (jersey)<br>
	2011 Topps Heritage Framed Dual Stamps Danny Valencia/Cole Hamels 55 #ed 52/62 (manu. stamps)<br>

	<br>

	2011 Topps Marquee Acclaimed Impressions Dual Relics Autographs Danny Valencia AID-60 #ed 417/500 (auto/3-color patch/jersey)<br>
	2011 Topps Marquee Titanic Threads Jumbo Relics Justin Morneau TTJR-98 #ed 91/99 (jersey)<br>

	<br>

	2011 Topps Tier One Top Shelf Relics Dual Paul Molitor TSR-29 #ed 51/99 (dual jersey)<br>

	<br>

	2011 Topps Triple Threads Printing Plates Yellow Justin Morneau 99 #ed 1/1 (printing plate)<br>

	<br>

	2011 Topps Triple Threads Relics Combos Sepia Joe Mauer/Justin Morneau/Francisco Liriano TTRC-23 #ed 20/27 (triple jersey, spells out "TWINS")<br>
	2011 Topps Triple Threads Unity Relics Gold Justin Morneau TTUSR-234 #ed 2/9 (jersey)</p>

	<hr>

	<!-- -------------------- 2010 -------------------- -->

	<h1>2010</h1><p>

	2010 Bowman Chrome Prospect Autographs Kyle Gibson BCP202 (auto)<br>

	<br>

	2010 Bowman Sterling Dual Relics Refractors Joe Mauer-Brian McCann BL-3 #ed 83/99 (dual relic)<br>

	<br>

	2010 In the Game Heroes and Prospects Baseball Hits Series 2 Heroes Autographs Bert Blyleven HA-BB (auto)<br>

	<br>

	2010 Topps 206 Autographs Piedmont Border Jason Kubel TA-JK (auto)<br>

	<br>

	2010 Topps Chrome Rookie Autographs  Drew Butera 202 (auto)<br>

	<br>

	2010 Topps Manufactured Hat Logo Patch Harmon Killebrew MHR-380 (manu. patch)<br>

	<br>

	2010 Topps National Chicle Autographs Denard Span NCA-DS (auto)<br>

	<br>

	2010 Topps National Chicle Relics Justin Morneau NCR-JM (jersey)<br>

	<br>

	2010 Topps Silk Collection Delmon Young #ed 26/50 (silk)<br>

	<br>

	2010 Topps Tribute Relics Triple Justin Morneau TTR-JM #ed 82/99 (triple bat)<br>
	2010 Topps Tribute Relics Triple Black Justin Morneau TTR-JM #ed 29/50 (triple bat)<br>

	<br>

	2010 Topps Triple Threads Relics Justin Morneau TTR-117 #ed 04/36 (jersey, "3X All ★)<br>

	<br>

	2010 Upper Deck Game Jerseys Justin Morneau UDGJ-JU (jersey)<br>
	2010 Upper Deck Game Jerseys Matt Tolbert UDGJ-MT (jersey<br>
	2010 Upper Deck Signature Sensations Denard Span SS-DS (auto)</p>

	<hr>

	<!-- -------------------- 2009 -------------------- -->

	<h1>2009</h1><p>

	2009 Bowman Blue Jose Mijares 228 #ed 287/500 (auto)<br>

	<br>

	2009 Bowman Chrome Draft Picks & Prospects Printing Plates Cyan Chris Herrmann BDPP-57 #ed 1/1 (BGS 9 Mint, printing plate)<br>

	<br>

	2009 Bowman Draft Picks & Prospects Red Chris Herrmann BDPP-57 #ed 1/1 (encased and authenticated)<br>
	2009 Bowman Draft Picks & Prospects Printing Plates Black Chris Herrmann BDPP-57 #ed 1/1 (printing plate)<br>
	2009 Bowman Draft Picks & Prospects Printing Plates Yellow Chris Herrmann BDPP-57 #ed 1/1 (printing plate)<br>

	<br>

	2009 Donruss Elite Extra Edition Evan Bigley 180 #ed 654/819 (auto)<br>

	<br>

	2009 SP Authentic By the Letter Joe Nathan BTL-NA "O" #ed 20/25 (auto letter patch)<br>

	<br>

	2009 SP Legendary Cuts Generations Memorabilia Justin Morneau/Paul Molitor GM-MM (dual jersey)<br>

	<br>

	2009 Sweet Spot Classic Signatures Black Baseball Black Stitch Silver Ink Kent Hrbek SC-KH #ed 03/14 (auto)<br>
	2009 Sweet Spot Signatures Red Stitch Blue Ink Joe Nathan S-JN #ed 240/299 (auto)<br>
	2009 Sweet Spot Swatches Triple Joe Mauer/Carlton Fisk/Brian McCann TS-FMM (triple jersey)<br>

	<br>

	2009 Topps 206 Mini Framed Autographs Glen Perkins FMA-6 (auto)<br>

	<br>

	2009 Topps Allen & Ginter Autographs Denard Span AGA-DS (auto, could use replacement)<br>
	2009 Topps Allen & Ginter Relics Joe Mauer AGR-JM (jersey)<br>

	<br>

	2009 Topps Silk Collection Joe Crede S-236 #ed 34/50 (silk)<br>

	<br>

	2009 Topps Update All-Star Stitches Joe Nathan AST-41 (jersey)<br>

	<br>

	2009 Ultimate Collection Ultimate Patch Joe Mauer UP-JM #ed 12/35 (patch)<br>

	<br>

	2009 Upper Deck Ballpark Collection Jersey-Autographs Matt Garza JA-MG (jersey-auto)<br>

	<br>

	2009 Upper Deck Goodwin Champions Memorabilia Justin Morneau GCM-MO (jersey, can use replacement)<br>

	<br>

	2009 Upper Deck Goudey Memorabilia Denard Span GM-DS (jersey)<br>

	<br>

	2009 Upper Deck Icons Future Foundations Jerseys Francisco Liriano FF-FL (jersey)<br>
	2009 Upper Deck Icons Immortal Lettermen Paul Molitor Letter "R" IL-PM #ed 21/40 (letter patch)<br>
	2009 Upper Deck Icons Letterman Joe Nathan Letter "J" IL-JN #ed 32/45 (letter patch)<br>
	2009 Upper Deck Icons Lettermen Joe Nathan Letter "N" IL-JN #ed 01/45 (letter patch)<br>

	<br>

	2009 Upper Deck X Jerseys Delmon Young UDXJ-DY (jersey)<br>
	2009 Upper Deck X Jerseys Jason Kubel UDXJ-JK (jersey)<br>
	2009 Upper Deck X Jerseys Joe Nathan UDXJ-JN (jersey)</p>

	<hr>

	<!-- -------------------- 2008 -------------------- -->

	<h1>2008</h1><p>

	2008 Bowman Signs of the Future Jose Mijares SOF-JM (auto)<br>

	<br>

	2008 Bowman Chrome Prospects Brian Dinkelman BCP283 (auto)<br>

	<br>

	2008 Bowman Sterling Delmon Young BS-DY (jersey)<br>

	<br>

	2008 Razor Letterman 20 Carlos Gutierrez Letter "G" CG-G #ed 16/20 (auto letter patch)<br>
	2008 Razor Letterman 20 Carlos Gutierrez Letter "U" CG-U #ed 20/20 (auto letter patch)<br>
	2008 Razor Lettermen 20 Carlos Gutierrez Letter "T" CG-T #ed 13/20 (auto letter patch)<br>
	2008 Razor Lettermen 20 Carlos Gutierrez Letter "I" CG-I #ed 17/20 (auto letter patch)<br> (200)
	2008 Razor Lettermen 20 Carlos Gutierrez Letter "E" CG-E1 #ed 14/20 (auto letter patch)<br>
	2008 Razor Letterman 20 Carlos Gutierrez Letter "R" CG-R2 #ed 03/20 (auto letter patch)<br>
	2008 Razor Lettermen 20 Carlos Gutierrez Letter "E" CG-E2 #ed 20/20 (auto letter patch)<br>

	<br>

	2008 SP Legendary Cuts Generations Memorabilia Harmon Killebrew/Travis Hafner GEN-HK (dual jersey)<br>
	2008 SP Legendary Cuts Legendary Memorabilia 50 Paul Molitor LM-PM2 #ed 19/50 (relic)<br>

	<br>

	2008 SPx Winning Materials Limited Patch SPx Justin Morneau WM-JM #ed 18/99 (3-color patch)<br>
	2008 SPx Winning Materials Limited Patch Team Initials Joe Nathan WM-JN #ed 46/50 (patch)<br>
	2008 SPx Winning Materials MLB 125 Francisco Liriano WM-FL #ed 020/175 (jersey)<br>
	2008 SPx Winning Materials Dual Limited Patch Team Initials 25 Justin Morneau WM-MO #ed 21/25 (dual patch)<br>
	2008 SPx Winning Materials Dual Team Initials 25 Joe Nathan WM-JN #ed 08/25 (dual jersey)<br>
	2008 SPx Winning Materials Triple SPx 15 Francisco Liriano WM-FL #ed 04/15 (triple jersey)<br>
	2008 SPx Winning Materials Triple Team Initials 10 Francisco Liriano WM-FL #ed 08/10 (triple jersey)<br>

	<br>

	2008 Sweet Spot Swatches Joe Mauer SS-JM (jersey)<br>
	2008 Sweet Spot Swatches Dual Patch Justin Morneau, Travis Hafner DS-HM #ed 04/25 (dual patch)<br>

	<br>

	2008 Stadium Club Beam Team Autographs Francisco Liriano BTA-FL (auto)<br>

	<br>

	2008 Upper Deck UD Game Jersey Michael Cuddyer UDJ-CU (jersey)<br>

	<br>

	2008 Upper Deck A Piece of History Stadium Scenes Jersey Red Joe Mauer SS-32 (jersey)<br>
	2008 Upper Deck A Piece of History Timeless Moments Jersey Justin Morneau TM-29 (jersey)<br>
	
	<br>

	2008 Upper Deck Ballpark Collection Johan Santana/Cole Hamels 163 (dual jersey)<br>
	2008 Upper Deck Ballpark Collection Teammate Timelines Quad Memorabilia Justin Morneau, Joe Mauer, Francisco Liriano, Denard Span 272 #ed 135/500 (quad jersey)<br>

	<br>

	2008 Upper Deck Goudey Autographs Glen Perkins GG-GP (auto)<br>
	2008 Upper Deck Goudey Memorabilia Joe Mauer M-JM (jersey)<br>

	<br>

	2008 Upper Deck Premier Patches Gold Position Johan Santana PP2-JS #ed 02/50 (dual patch)<br>
	2008 Upper Deck Premier Patches Gold Position Torii Hunter PP2-HU #ed 31/50 (dual patch)<br>
	2008 Upper Deck Premier Patches Gold Milestones Justin Morneau PP2-JM #ed 05/22 (dual patch)<br>

	<br>

	2008 Upper Deck USA Baseball National Team The Letters Kyle Gibson "N" NTL-KG #ed 6/6 (letter patch)<br>

	<br>

	2008 Upper Deck X Memorabilia Jason Kubel UDXM-KU (jersey)<br>
	2008 Upper Deck X Memorabilia Matt Garza UDXM-MG (jersey)</p>

	<hr>

	<!-- -------------------- 2007 -------------------- -->

	<h1>2007</h1><p>

	2007 Artifacts Antiquity Artifacts Justin Morneau AA-MO #ed 078/199 (jersey)<br>
	2007 Artifacts Divisional Artifacts Limited Justin Morneau DA-MO #ed 099/130 (jersey)<br>

	<br>

	2007 Bowman Printing Plates Magenta Michael Cuddyer 94 #ed 1/1 (printing plate)<br>
	2007 Bowman Prospects Chris Parmelee BP121 (auto)<br>

	<br>

	2007 Bowman Heritage Pieces of Greatness Joe Mauer JM (bat)<br>

	<br>

	2007 Donruss Elite Extra Edition Turn of the Century Autographs Paul Kelly 36 #ed 497/500 (auto)<br>

	<br>

	2007 Exquisite Rookie Signatures Kevin Slowey 185 #ed 074/199 (auto/quad jersey)<br>

	<br>

	2007 Just Minors Just Autographs Joe Benson JA-03 (IP/TTM auto)<br>

	<br>

	2007 SP Authentic By the Letter Justin Morneau BL-52 #ed 03/15 (letter auto "E")<br>

	<br>

	2007 SP Legendary Cuts Masterful Material Kirby Puckett MM-KP (jersey)<br>

	<br>

	2007 SP Rookie Edition Autographs Glen Perkins 137 (auto)<br>

	<br>

	2007 SPx Winning Materials 199 SPx Joe Nathan WM-JM #ed 022/199 (jersey)<br>
	2007 SPx Young Star Signatures Justin Morneau YS-MO (auto)<br>

	<br>

	2007 Sweet Spot Signatures Bat Barrel Blue Ink Glen Perkins SS-GP #ed 07/60 (auto)<br>
	2007 Sweet Spot Sweet Beginnings Signatures Glen Perkins 117 (auto/manu. mini helmet)<br>

	<br>

	2007 Sweet Spot Classic Memorabilia Paul Molitor CM-PM (relic)<br>
	2007 Sweet Spot Classic Signatured Red Stitch Gold Ink Tony Oliva SPS-TO #ed 160/175 (auto)<br>

	<br>

	2007 TriStar Prospects Plus Farm Hands Autographs Ben Revere FH-BR (auto)<br>

	<br>

	2007 Topps Allen & Ginter Autographs Justin Morneau AGA-JM (auto)<br>

	<br>

	2007 Topps Heritage Real Ones Autographs Justin Morneau ROA-JM (auto)<br>

	<br>

	2007 Topps Triple Threads Justin Morneau 128a #ed 35/99 (auto triple bat "★★★")<br>
	2007 Topps Triple Threads Justin Morneau 128b #ed 83/99 (auto, triple bat "MIN")<br>
	2007 Topps Triple Threads Emerald Justin Morneau 128b #ed 42/50 (auto, triple bat "MIN")<br>
	2007 Topps Triple Threads Relics Sepia Justin Morneau TTR-55 #ed 21/27 (triple bat, "MVP")<br>

	<br>

	2007 Ultimate Collection America's Pastime Memorabilia Patches Justin Morneau PM-JM #ed 25/50 (patch)<br>
	2007 Ultimate Collection Ultimate Star Materials Justin Morneau SM-JU2 (jersey)<br>

	<br>

	2007 Upper Deck Elements Elemental Autographs Jesse Crain AU-JC (auto)<br>

	<br>

	2007 Upper Deck Goudey Sport Royalty Autographs Justin Morneau SR-JM (auto)<br>(250)

	<br>

	2007 Upper Deck Masterpieces Captured on Canvas Francisco Liriano CC-FL (jersey)<br>
	2007 Upper Deck Masterpieces Captured on Canvas Joe Nathan CC-JN (jersey)<br>
	2007 Upper Deck Masterpieces Captured on Canvas Johan Santana CC-SA (jersey)<br>
	2007 Upper Deck Masterpieces Stroke of Genius Glen Perkins SG-GP (auto)<br>

	<br>

	2007 Upper Deck Premier Patches Dual Gold Johan Santana PP2-SA #ed 06/20 (dual patch)<br>
	2007 Upper Deck Premier Patches Triple Gold Justin Morneau PP3-MO #ed 20/33 (triple patch)<br>
	2007 Upper Deck Premier Patches Triple Gold Johan Santana PP3-SA #ed 40/57 (triple patch)<br>
	2007 Upper Deck Premier Patches Triple Platinum Johan Santana PP3-SA #ed 3/5 (triple patch)<br>

	<br>

	2007 Upper Deck Spectrum Swatches Gold Justin Morneau SSW-MO #ed 70/75 (jersey)<br>

	2007 Upper Deck Star Signings Jason Kubel SS-JK (auto)</p>

	<hr>

	<!-- -------------------- 2006 -------------------- -->

	<h1>2006</h1><p>

	2006 Artifacts Auto-Facts Signatures Joe Nathan AF-JN #ed 341/800 (auto)<br>
	2006 Artifacts Auto-Facts Signatures Tony Oliva AF-TO #ed 251/300 (auto)<br>

	<br>

	2006 SP Authentic By the Letter Justin Morneau BL-MO "M" #ed 16/75 (auto letter patch)<br>
	2006 SP Authentic By the Letter Justin Morneau BL-MO "O" #ed 48/75 (auto letter patch)<br>
	2006 SP Authentic By the Letter Justin Morneau BL-MO "N"#ed 71/75 (auto letter patch)<br>
	2006 SP Authentic By the Letter Justin Morneau BL-MO "A"#ed 56/75 (auto letter patch)<br>

	<br>

	2006 SPx Boof Bonser RC 152 #ed 405/999 (auto)<br>

	<br>

	2006 Sweet Spot Signatures Justin Morneau 174 #ed 155/275 (auto)<br>
	2006 Sweet Spot Update Sweet Beginnings Swatches Justin Morneau SW-JM (quad jersey)<br>

	<br>

	2006 Topps Allen & Ginter Relics Johan Santana AGR-JS (jersey)<br>

	<br>

	2006 Ultimate Collection Ultimate Numbers Patches Jason Kubel UN-KU #ed 35/35 (dual patch)<br>
	2006 Ultimate Collection Ultimate Numbers Patches Torii Hunter UN-HU #ed 06/35 (dual patch)<br>
	2006 Ultimate Collection Ultimate Tandem Materials Johan Santana/Joe Mauer UT-SM #ed 24/25 (dual jersey)<br>

	<br>

	2006 Upper Deck Epic Materials Teal Harmon Killebrew EM-HK #ed 04/99 (jersey)<br>

	<br>

	2006 Upper Deck Ovation Center Stage Signatures Michael Cuddyer CS-MC #ed 03/25 (auto)</p>

	<hr>

	<!-- -------------------- 2005 -------------------- -->

	<h1>2005</h1><p>

	2005 Absolute Memorabilia Team Tandems Swatch Single Spectrum Prime Black David Ortiz/JC Romero TT-74 (dual patch)<br>
	2005 Absolute Memorabilia Team Six Swatch Single Johan Santana/Joe Mays/Justin Morneau/Torii Hunter/Shannon Stewart/Michael Cuddyer) TS-41 #ed 075/150 (6 relics)<br>

	<br>

	2005 Diamond Kings Diamond Cuts Materials Shannon Stewart CD-44 (bat)<br>
	2005 Diamond Kings Materials Framed Blue Johan Santana 362 #ed 007/100 (dual jersey)<br>

	<br>

	2005 Donruss Timber & Threads Combo Material Torii Hunter TT-39 (bat/jersey)<br>

	<br>

	2005 Finest Refractors Glen Perkins 143 #ed 320/399 (auto)<br>

	<br>

	2005 Flair Cuts & Glory Patches Shannon Stewart SS #ed  47/50 (auto, patch)<br>

	<br>

	2005 Fleer Authentix Auto Mezzanine Lew Ford AA-LF #ed 31/40 (auto)<br>

	<br>

	2005 Leaf Game Collection Torii Hunter 8 (bat)<br>

	<br>

	2005 Leaf Limited TNT Prime Justin Morneau 80 #ed 033/100 (bat-patch)<br>
	2005 Leaf Limited Threads Jersey Prime Justin Morneau 80 #ed 009/100 (patch)<br>

	<br>

	2005 Prime Patches Team Materials Triple Team Logo Patch Doug Mientkiewicz/JC Romero/Joe Mays TM-26 #ed 21/74 (triple patch)<br>

	<br>

	2005 Reflections Fabric Jersey Johan Santana FR-JS (jersey)<br>
	2005 Reflections Fabric Patch Johan Santana FRP-JS (patch)<br>

	<br>

	2005 Sweet Spot Majestic Materials Joe Mauer MM-JM (jersey)<br>

	<br>

	2005 Timeless Treasures Home Road Gamers Dual Tony Oliva G-25 #ed 29/50 (dual jersey)<br>

	<br>

	2005 Topps Printing Plates Magenta Glen Perkins RC 672 #ed 1/1 (printing plate)<br>

	<br>

	2005 Topps Gallery Penmanship Autographs Jason Bartlett GPA-JB (auto)<br>

	<br>

	2005 Topps Total Printing Plates Yellow Shannon Stewart 205  #ed 1/1 (printing plate)<br>

	<br>

	2005 Topps Update All-Star Stitches Joe Nathan ASA-JN (jersey)<br>

	<br>

	2005 Topps Update Signature Moves Glen Perkins SM-GP #ed 034/275 (auto)<br>

	<br>

	2005 Ultimate Collection Ultimate Materials Patch Justin Morneau UG-MO #ed 03/25 (3-color patch)<br>

	<br>

	2005 Ultimate Signature MVP's Dual Autograph Harmon Killebrew/Rod Carew MVP-KC #ed 097/100 (dual auto)<br>

	<br>

	2005 Upper Deck Classics Classic Materials Jack Morris MA-JM (relic)<br>

	<br>

	2005 Upper Deck Pro Sigs Signature Sensations Nick Punto SS-NP (auto)<br>

	<br>

	2005 Zenith Z-Bats Shannon Stewart ZB-22 (bat)</p>

	<hr>

	<!-- -------------------- 2004 -------------------- -->

	<h1>2004</h1><p>

	2004 Bowman Draft Signs of the Future Terry Tiffee SOF-TT (auto)<br>(300)

	<br>

	2004 E-X Clearly Authentics Patch Black Torii Hunter CA-TH2 #ed 06/75 (patch)<br>

	<br>

	2004 Finest Relics Torii Hunter FR-TKH2 (jersey)<br>

	<br>

	2004 Just Minors Autographs Trevor Plouffe 63 (auto, print run 825 but not numbered)<br>

	<br>

	2004 Leaf Certified Materials Mirror White Shannon Stewart 175 #ed 146/200 (jersey)<br>

	<br>

	2004 Reflections Jacque Jones 150 (jersey)<br>
	2004 Reflections Shannon Stewart 169 (jersey)<br>

	<br>

	2004 Skybox Limited Edition History of the Draft Autographs Torii Hunter HDA-TH #ed 058/199 (auto)<br>

	<br>

	2004 Topps Retired Signature Autographs Tom Brunansky TA-TB (auto)<br>

	<br>

	2004 Upper Deck Etching Etched in Time Autographs Jacque Jones ET-JJ #ed 118/375 (auto)</p>

	<hr>

	<!-- -------------------- 2003 -------------------- -->

	<h1>2003</h1><p>

	2003 Bowman Draft Picks & Prospects Fabric of the Future Jersey Relics Joe Mauer FF-JM (jersey)<br>

	<br>

	2003 SPx Young Stars Autograph Jersey Jacque Jones YS-JJ #ed/1260 (auto-relic)<br>

	<br>

	2003 Bowman Jason Kubel RC 246 (IP/TTM auto)<br>

	<br>

	2003 Fleer Authentix Game Jersey Torii Hunter JA-TH (jersey)<br>

	<br>

	2003 Sweet Spot (Sweet Beginnings) Lew Ford 196 #ed 1,049/1,430 (manu. rookie patch)<br>
	2003 Sweet Spot Patches Torii Hunter TH-1 (patch)<br>

	<br>

	2003 Topps Autographs Eric Milton TA-EM (auto)<br>

	<br>

	2003 Topps Pristine Pristine Borders Relics Cristian Guzman PB-CG (bat)<br>

	<br>

	2003 Upper Deck Patch Collection Lew Ford RC 153 (patch)</p>

	<hr>

	<!-- -------------------- 2002 -------------------- -->

	<h1>2002</h1><p>

	2002 Bowman Chrome Joe Mauer 391 (auto)<br>

	<br>

	2002 Bowman Draft Signs of the Future Jake Mauer SOF-JM (auto)<br>
	2002 Bowman Draft Signs of the Future Justin Morneau SOF-JEM (auto)<br>

	<br>

	2002 Bowman Heritage Autographs Joe Mauer BHA-JM (auto)<br>

	<br>

	2002 SP Authentic Prospect Signatures Dustan Mohr P-DM (auto)<br>

	<br>

	2002 Topps 206 Autographs Christian Guzman TA-CG (auto)<br>

	<br>

	2002 Upper Deck 40-Man Super Swatch Eric Milton S-EM #ed 149/250 (jersey)</p>

	<hr>

	<!-- -------------------- 2001 -------------------- -->

	<h1>2001</h1><p>

	2001 Fleer Showcase Brad Radke 49 (on-card auto, non certified)<br>

	<br>

	2001 SP Top Prospects Game Used Bat Michael Cuddyer B-MC (bat)<br>

	<br>

	2001 Topps Archives Autographs Jim Kaat 136 (auto)</p>

	<hr>

	<!-- -------------------- 2000 -------------------- -->

	<h1>2000</h1><p>

	2000 Fleer Club 3,000 Memorabilia Paul Molitor PM-3 #ed 327/975 (jersey)<br>

	<br>

	2000 Team Best Rookies Autographs Chad Allen (auto)<br>

	<br>

	2000 Topps Traded Autographs Ruben Salazar TTA-75 (auto)</p>

	<hr>

	<!-- -------------------- 1999 -------------------- -->

	<h1>1999</h1><p>

	1999 Fleer Mystique Fresh Ink Doug Mientkiewicz hand-#ed 250/500 (auto)<br>

	<br>

	1999 Hillshire Farm Home Run Heroes Harmon Killebrew 2 (auto)<br>

	<br>

	1999 Skybox Premium Autographics Matt Lawton 33 (auto)<br>

	<br>

	1999 SP Authentic Chirography Corey Koskie CK (auto)<br>

	<br>

	1999 Upper Deck HoloGRFX UD Authentics Signatures Corey Koskie CK (auto)<br>

	<br>

	1999 Upper Deck MVP ProSign Corey Koskie CK (auto)</p>

	<hr>

	<!-- -------------------- 1998 -------------------- -->

	<h1>1998</h1><p>

	1996 Donruss Signature Series Significant Signatures Harmon Killebrew NNO #ed 1,046/2,000 (auto)</p>

	<hr>

	<!-- -------------------- 1996 -------------------- -->

	<h1>1996</h1><p>

	1996 Leaf Signature Extended Autographs Eddie Guardado 65 (auto)<br>
	1996 Leaf Signature Extended Autographs Chip Hale 68 (auto)</p>

	<hr>

	<!-- -------------------- 1995 -------------------- -->

	<h1>1995</h1><p>

	1995 Signature Rookies Tetrad Autographs Torii Hunter 50 #ed 4,906/5,000 (auto)</p>

	<hr>

	<!-- -------------------- 1995 -------------------- -->

	<h1>1994</h1><p>

	1994 Signature Rookies Draft Picks Authentic Signatures John Schroeder 85 #ed 116/7750 (auto)</p>

	<hr>

	<!-- -------------------- 1989 -------------------- -->

	<h1>1989</h1><p>

	1989 Topps Kirby Puckett 403 (IP/TTM auto)</p>

	<hr>

	<!-- -------------------- 1984 -------------------- -->

	<h1>1984</h1><p>

	1984 Topps Kent Hrbek, Ken Schrom 11 (dual IP/TTM auto)</p>

	<hr>

</div> <!-- End content tag -->
</body>
</html>