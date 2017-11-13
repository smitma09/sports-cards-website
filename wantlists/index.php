<?php
	include_once("./../php/navbar.php");
?>

<html>
<head>
	<link href="/css/siteTheme.css" rel="stylesheet">
	<style>
		.triple {
			border-spacing: .5rem; /* Adds spacing between columns */
			padding-bottom: 1rem;
		}
		.tri {
			width: 33%; /* Divides into 3 columns */
			min-width: 100px;
			max-height: 50%;
			display: table-cell;
			position: relative;
			border: 1px solid black;
			padding-left: 1rem; /* Adds spacing between border and column text */
			padding-right: 1rem; /* Adds spacing between border and column text */
		}
	</style>
</head>
<body>
<div class="content">
	<h1>Wantlists home</h1>

	<div class="triple">
		<div class="tri" id="one">
			<h3><a href="./twins_pc">Twins PC</a></h3>
			<p>Browse through my personal collections and see what I have. Choose filters, such as a specific year, set, or player, choose to look at just autographs or relics, and more!</p>
		</div>
		<div class="tri" id="two">
			<h3><a href="./chris_herrmann">Chris Herrmann PC</a></h3>
			<p>Take a look at my want lists and see if you can help me improve my collection. I have complete lists of everything I'm looking for available in my want lists section.</p>
		</div>
	</div>

</div>
</body>
</html>
