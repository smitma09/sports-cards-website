<?php
	include_once("./php/navbar.php");
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
		#banner {
			width: 100%;
			margin-bottom: 1rem;
		}

	</style>
</head>
<body>
<div class="content">

	<h1>Welcome</h1>

	<p>Welcome to my sports cards website! This is a project I've been working on for quite some time, and something I'm pretty proud of. I've combined two of my biggest interests (computer science/coding, and sports cards collecting) and created this site from scratch. Given the nature of coding and web development, this is pretty much always a work in progress and never truly "complete". That said, I've gotten to a point where I'm pretty happy with everything and can keep working on improvements and new content rather than big subprojects. Here's a final summary sentence to put a bit of a wrap but invite people to explore the rest of the site.</p>

	<hr>

	<div class="triple">
		<div class="tri" id="one">
			<h3><a href="./galleries">Galleries</a></h3>
			<p>Browse through my personal collections and see what I have. Choose filters, such as a specific year, set, or player, choose to look at just autographs or relics, and more!</p>
		</div>
		<div class="tri" id="two">
			<h3><a href="./wantlists">Want Lists</a></h3>
			<p>Take a look at my want lists and see if you can help me improve my collection. I have complete lists of everything I'm looking for available in my want lists section.</p>
		</div>
		<div class="tri" id="three">
			<h3><a href="./about">About</a></h3>
			<p>Interested in learning more about this me and my site? Read an quick introduction to myself and a more detailed description of this site and how it was made.</p>
		</div>
	</div>

	<p>This is a short little paragraph with some text to help see how things line up. This is a short little paragraph with some text to help see how things line up. This is a short little paragraph with some text to help see how things line up. This is a short little paragraph with some text to help see how things line up. This is a short little paragraph with some text to help see how things line up.</p>


</div>
</body>
</html>