<!--
    Would like to add dropdown support for database entry and gallery pages
    Hover on database tab in bar, can pick from which database you want to enter data into
    Hover on gallery page, can pick which gallery you want to view (which database to read from)
	May requre polishing and figuring out exactly which nav class is right/should be used
-->

<html>

<head>
    <link href="/css/bootstrap.css" rel="stylesheet"> <!-- Link relative to home dir of website -->
    <link href="/css/logo-nav.css" rel="stylesheet">
	<style>
	.nav li {
		display: inline-block;
		position: relative;
	}
	.dropdown-content {
		display: none;
		position: absolute;
	}
	.dropdown-content {
		list-style: none;
		padding-left: 0;
		min-width: 100%;
	}
	.dropdown-content li {
		width: 100%;
	}
	.dropdown-content a {
		display: block;
		padding-top: 15px;
		padding-bottom: 15px;
		border-top: 1px solid black;
		background-color: #999999;
		width: 100%;
		text-decoration: none;
		text-align: center;
		color: black;
	}
	.dropdown-content a:hover {
		color: red;
		background-color: #b7b7b7;
	}
	.dropdown:hover .dropdown-content {
		display: block;
	}
	</style>
<!--    <style>
	.dropdown ul { /* Removes bullets on dropdown items */
		list-style: none;
	}
	.dropdown-content { /* Dropdown area as a whole */
		display: none; /* Hides downdown content when not hovering on parent */
		position: absolute; /* Don't expand black area */
		background-color: #e6e6e6;
	}
	.dropdown-content li { /* Each specific li in dropdown */
		display: block;
		color: #147aaf;
		padding-top: 15px;
		padding-bottom: 15px;
		background-color: #e6e6e6;
	}
	.dropdown-content li:hover {
		background-color: yellow;
	}
	.dropdown-content a:hover { /* Changes link color on hover- Want color and link to be for entire box tho */
		color: black;
	}
	.dropdown-content:hover { /* Changes entire ul background on hover- Change so only hover element background changes */
		background-color: blue;
	}
	.dropdown:hover .dropdown-content { /* Show dropdown content on hover */
		display: block;
	}
    </style>
-->
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar-fixed-top" role="navigation"> <!-- Removing navbar and navbar-inverse -->
	<!-- Removing "navbar-inverse" from the class list keeps the items in the right spot, but takes away the black background.
		Maybe go to navbar or navbar-fixed-top class and see how to add the background, make it not fixed -->
	<!-- Removing "navbar" from class list just moves everything in the nav to the right a little bit, doesn't have a large impact -->
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="/">
                    <img src="/images/logos/logoNavbar.png" alt="Hollywood42_logo"> <!-- Link relative to home dir of website -->
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="/">Home</a></li>
                    <li><a href="/galleries">Galleries</a></li>
		    <li><a href="/pull-info.php">Have lists</a></li>
		    <li class="dropdown"><a href="/wantlists">Wantlists</a>
			<ul class="dropdown-content">
			    <li><a href="/wantlists/twins_pc">Twins PC</a></li>
			    <li><a href="/wantlists/chris_herrmann">Chris Herrmann</a></li>
			</ul>
		   </li> <!-- End dropdown parent -->
                </ul>
            </div>       <!-- /.navbar-collapse -->
        </div>   <!-- /.container -->
    </nav>

</body>

</html>
