<?php
$host = "localhost";
$user = "root";
$passwd = "";
$database = "swotanalysis";
$conn = new mysqli($host, $user, $passwd, $database);
if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            } 
if(isset($_POST["submit"]))
{

$allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma");
$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

if ((($_FILES["file"]["type"] == "video/mp4")
|| ($_FILES["file"]["type"] == "audio/mp3")
|| ($_FILES["file"]["type"] == "audio/wma")
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
            $path= "upload/" . $_FILES["file"]["name"];
           
// Check connection
            

            $sql = "INSERT INTO profile (pro_pic) VALUES ('$path')";
            if ($conn->query($sql) === TRUE)
            {
                echo "New record created successfully";
            }
            else
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }    
            
           //display 
           
              $sqla = "SELECT pro_pic FROM profile ORDER BY RAND() LIMIT 5";
            $mq = mysqli_query($conn,$sqla) or die ("not working query");
            $row = mysqli_fetch_array($mq) or die("line 44 not working");
           $s=$row['pro_pic'];
            echo "path->",$row['pro_pic'];
            echo '<img src="'.$s.'" alt="HTML5 Icon" style="width:128px;height:128px">';
        
    }
  }
  else
  {
    echo "Invalid file";
  }
}
?>