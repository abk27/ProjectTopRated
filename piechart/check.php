
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Top Rated</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/lightbox.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="images/favicon.ico">
  
 
</head><!--/head-->

<body>



  <header id="home">
 <!--/#home-slider-->
    <div class="main-nav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index1.html">
				<div class="dropdown">
					<h2 class="dropbtn" style="color:white; font-family: 'Open Sans', sans-serif;font-size: 25px;">
					<b>VIEW PROFILE</b></h2>
					
						<div class="dropdown-content">
							<li><img src="images/user1.png" style="width:128px;height:128px;">
							<li></li>
							<li>Rating:*****</li>
						</div>
					</div>
          </a>
		
        </div>
			
		
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">

            <li class="scroll"><a href="../home.php">Home</a></li>
			<li class="scroll"><a href="../sel_profile.html">Profile</a></li>
            <li class="scroll"><a href="../leaderboard.html">LeaderBoard</a></li>
            <li class="scroll"><a href="piechart/check.php">Swot</a></li>
            <li class="scroll"><a href="../contact.html">Contact</a></li>
            <li class="scroll"><a href="../index.html">Logout</a></li>
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->
<center>
<?php
echo"<h2>SWOT RESULTS</h2>";
include "pie4.php"; // containing the graph code
?>
</center>
</body>
</html>