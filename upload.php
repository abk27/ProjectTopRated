


<html>
<body>

    
    
    
    
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
  <!--[if lt IE 9]-->
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="images/favicon.ico">
</head>



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
          <a class="navbar-brand" href="#">
				<div class="dropdown">
					<h1 class="dropbtn"><img class="img-responsive" src="images/logo2.png" alt="logo"></h1>
						<div class="dropdown-content">
							<li><img src="images/user1.png" style="width:128px;height:128px;"></img></li>
								
							<li><?php
                                session_start();
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
            <li class="scroll"><a href="leaderboard.html">LeaderBoard</a></li>
            <li class="scroll"><a href="swot.html">Swot</a></li>
            <li class="scroll"><a href="contact.html">Contact</a></li>
            <li class="scroll"><a href="index1.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>

  <center>
<section id="services">
    <div class="container">
      <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="row">
          <div class="text-center col-sm-8 col-sm-offset-2">
            <h2>Upload Your Photo/Video/Audio</h2>
            <p>Expose the hidden talent in you....</p>
          </div>
        </div> 
      </div>
        <?php
			include 'dbconnect.php';
		
    
        if(isset($_POST['submit']))
        {
            
        
        $allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma","JPG","PNG","png");
        $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

        if ((($_FILES["file"]["type"] == "video/mp4")
             || ($_FILES["file"]["type"] == "audio/mp3")
            || ($_FILES["file"]["type"] == "audio/wma")
              || ($_FILES["file"]["type"] == "image/PNG")
              || ($_FILES["file"]["type"] == "image/png")
              || ($_FILES["file"]["type"] == "image/JPG")
             || ($_FILES["file"]["type"] == "image/pjpeg")
                || ($_FILES["file"]["type"] == "image/gif")
             || ($_FILES["file"]["type"] == "image/jpeg"))

//&& ($_FILES["file"]["size"] < 20000)
            && in_array($extension, $allowedExts))

        {
            if ($_FILES["file"]["error"] > 0)
            {
                echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
            }
            else
            {
                echo "Upload: " . $_FILES["file"]["name"] . "<br />";
                echo "Type: " . $_FILES["file"]["type"] . "<br />";
                echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
                echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
                move_uploaded_file($_FILES["file"]["tmp_name"],
                            "upload/" . $_FILES["file"]["name"]);
                echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
                
                $path="upload/" . $_FILES["file"]["name"];
                if(isset($_POST['cat']))
                {
                    $category= $_POST['cat'];
                }
                
                //ser session id from user id
                $SQL = "select uid from user where uname ='".$_SESSION['uname']."'";
                
	           $result = mysqli_query($db_handle, $SQL);
	           $db_field = mysqli_fetch_assoc($result);
	           $uid = $db_field['uid'];
            $rating1=isset($rating);
               
                $link= mysqli_connect("localhost","root","","swotanalysis") or die("could nt connetcd to social database");
                if(mysqli_query($link,"insert into posts(uid,category,upload,rating,time) VALUES('$uid','$category','$path','$rating1',NOW())"))
                        {
                            echo "<br/>Your File Successfully Added<br/>";
                        }
                        else
                        {
                            echo "<br/>Sorry Could Not Add Your File<br/>";
                        }
                    
 }
  }
else
  {
  echo "Invalid file";
  }

}

		
			
		
		
?>
      <div class="text-center our-services">
        <div class="row">  

        
        
		<form action="upload.php" method="post" enctype="multipart/form-data">
		  
          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="550ms">
            <center><img src="images/p1.png" style="width:70%;height:50%";><center/><br/>
				<b>Select Category</b></br>
    					Entertainment<input type='radio' name='cat' value='ent' >
						Education<input type='radio' name='cat' value='edu' >
						Sports<input type='radio' name='cat' value='spo'>
						Social<input type='radio' name='cat' value='soc'>
						Management<input type='radio' name='cat' value='mgmt'><br/><br/>
				
		<input type="file" name="file" >
		<input type="submit" name="submit" value="SUBMIT">
		</form>
		</div>
		</div>
		</section>
		 </center>
		</body>
		</html>









             
           
          
        </div>
      </div>
    </div>
  </section>
  </body>
  </html>