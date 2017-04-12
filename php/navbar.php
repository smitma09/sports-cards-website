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
                    <li><a href="/databaseForms/twins_pcForm.php">Database entry</a></li>
                    <li><a href="/galleries/tempGalleryHome.html">Galleries</a></li>
		    <li><a href="/pull-info.php">Have lists</a></li>
		    <li><a href="/wantlists">Wantlists</a></li>
<!--		    <div class="dropdown">
			<li>Dropdown test</li>
			    <div class="dropdown-content">
			       <a href="#">Link 1</a>
			       <a href="#">Link 2</a>
			    </div>
		    </div> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

</body>

</html>
