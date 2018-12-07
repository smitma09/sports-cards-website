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
			<p>Take a look at my complete want lists for my Minnesota Twins collection and see if you have anything I need!</p>
		</div>
		<div class="tri" id="two">
			<h3><a href="./chris_herrmann">Chris Herrmann PC</a></h3>
			<p>Can you help me with my Chris Herrmann PC? Check out my needs here.</p>
		</div>
		<div class="tri" id="three">
			<h3><a href="./paul_molitor">Paul Molitor PC</a></h3>
			<p>Browse through my want lists for a Paul Molitor project I started.</p>
		</div>
	</div>
	<div class="triple">
		<div class="tri" id="one">
			<h3><a href="./sets">Sets</a></h3>
			<p>I also enjoy building some sets here and there! Take a look at what I'm working on.</p>
		</div>
		<!--<div class="tri" id="two">
			<h3><a href="./chris_herrmann">Chris Herrmann PC</a></h3>
			<p>Can you help me with my Chris Herrmann PC? Check out my needs here.</p>
		</div>
		<div class="tri" id="three">
			<h3><a href="./paul_molitor">Paul Molitor PC</a></h3>
			<p>Browse through my want lists for a Paul Molitor project I started.</p>
		</div>-->
	</div>

</div>
</body>
</html>
