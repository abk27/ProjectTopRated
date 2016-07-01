
<?php
include 'dbconnect.php';
session_start();
?>


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
  
  <style>
table {
    border-collapse: collapse;
    width: 50%;
	margin-left:25%;
	margin-top:5%;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	

	
}

th, td {
    text-align: left;
    padding: 8px;
}

td{color:black;}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #028FCC;
    color: white;
	width:25%;
}
      #imgclass
      {
          align-content: center;
          
      }
</style>
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
							<li><?php     
                                
                             $SQL = "select uid from user where uname ='".$_SESSION['uname']."'";
		$result = mysqli_query($db_handle, $SQL);
		$db_field = mysqli_fetch_assoc($result);
		$uid = $db_field['uid'];   
                                
                                echo"<tr>";
			$sql = "SELECT * FROM profile WHERE uid = $uid";
			$sth = $db_handle->query($sql);
			$result2=mysqli_fetch_array($sth);
			echo '<img src="data:pro_pic/jpg;base64,'.base64_encode( $result2['pro_pic'] ).'" class="img-circle" style="width:150px;height:150px; "/>';
			echo "<br>";
			echo"</tr>";
                                
                                
                                ?>
							<li><?php
                                
                                $name=$_SESSION['uname'];
                                 echo $name  ?></li>
							<li>Rating:*****</li>
						</div>
					</div>
          </a>
		
        </div>
			
		
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">

            <li class="scroll"><a href="home.php">Home</a></li>
			<li class="scroll"><a href="sel_profile.php">Profile</a></li>
            <li class="scroll"><a href="leaderboard.html">LeaderBoard</a></li>
            <li class="scroll"><a href="swot.html">Swot</a></li>
            <li class="scroll"><a href="contact.html">Contact</a></li>
            <li class="scroll"><a href="index1.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->
<body>
        <?php
		
		//session_start();
		
		$SQL = "select uid from user where uname ='".$_SESSION['uname']."'";
		$result = mysqli_query($db_handle, $SQL);
		$db_field = mysqli_fetch_assoc($result);
		$uid = $db_field['uid'];
		
		$SQL1 = "select * from user where uid =$uid";
		$result1 = mysqli_query($db_handle, $SQL1);
		$db_field1 = mysqli_fetch_assoc($result1);
		
		
		
		echo"<table >";
		$SQL = "select * from profile where uid=$uid";
		$row = mysqli_query($db_handle, $SQL);
		$db_field = mysqli_fetch_assoc($row);
		
                           
		echo"<tr>";
			$sql = "SELECT * FROM profile WHERE uid = $uid";
			$sth = $db_handle->query($sql);
			$result2=mysqli_fetch_array($sth);
			echo '<center><img src="data:pro_pic/jpg;base64,'.base64_encode( $result2['pro_pic'] ).'" class="img-circle" style="width:300px;height:250px; "/></center>';
			echo "<br>";
			echo"</tr>";
		
		 
		
			echo"<tr>";
			echo" <th>Name</th>";
            echo "<td>" .$db_field1['fname']   . $db_field1['lname']."</td>";
			echo"</tr>";
		
		    echo"<tr>";
			echo" <th>Age</th>";
            echo "<td>" .$db_field['age'] . "</td>";
			echo"</tr>";
			 
			echo"<tr>";
			echo"<th>Date of Birth</th>";
            echo "<td>" .$db_field['dob'] . "</td>";
			echo"</tr>";
			 
			echo"<tr>";
			echo"<th>Gender</th>";
            echo "<td>" .$db_field['gender']. "</td>";
			echo"</tr>";
			
			echo"<tr>";
			echo"<th>Hometown</th>";
            echo "<td>" .$db_field['h_town']. "</td>";
			echo"</tr>";
			
			echo"<tr>";
			echo"<th>Current City</th>";
            echo "<td>" .$db_field['c_city']. "</td>";
			echo"</tr>";
			
			echo"<tr>";
			echo"<th>Interests</th>";
            echo "<td>" .$db_field['interest']. "</td>";
			echo"</tr>";
			
			echo"<tr>";
			echo"<th>About You</th>";
			echo "<td>" .$db_field['abt_u']. "</td>";
            echo"</tr>";
          
        
      
    echo"</table>";
?>
