<?php
include 'dbconnect.php';
session_start();



$msg = "";
$uage;
$dob;
$gender = "";
$h_town = "";
$c_city = "";
$interest ="";
$abt_u = "";
$flg=0;

$oage;
$odob;
$ogender="";
$oh_town="";
$oc_city="";
$ointerest="";
$oabt_u="";
$oimg_name="";

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["myimage"]["name"]);
$uploadOk = 1;
	
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	
	$SQL = "select uid from user where uname ='".$_SESSION['uname']."'";
	$result = mysqli_query($db_handle, $SQL);
	$db_field = mysqli_fetch_assoc($result);
	$uid = $db_field['uid'];

	
	$uage = $_POST['age'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$h_town = $_POST['h_town'];
	$c_city = $_POST['c_city'];
	$interest = $_POST['interest'];
	$abt_u = $_POST['abt_u'];
	
	
	//unwanted HTML (scripting attacks)
	$uage = htmlspecialchars($uage);
	$dob = htmlspecialchars($dob);
	$gender = htmlspecialchars($gender);
	$h_town = htmlspecialchars($h_town);
	$c_city = htmlspecialchars($c_city);
	$interest = htmlspecialchars($interest);
	$abt_u = htmlspecialchars($abt_u);
	
	
	$imagename=$_FILES["myimage"]["name"]; 
	//Get the content of the image and then add slashes to it 
	$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));
	if ($_FILES["myimage"]["size"] > 500000) 
    {
    $uploadOk = 0;
	}
	else
	{
		move_uploaded_file($_FILES["myimage"]["tmp_name"], $target_file);
	}
	



	
	
	$SQL = "SELECT * FROM profile";
	$result = mysqli_query($db_handle, $SQL);
	while ($db_field = mysqli_fetch_assoc($result))
    {
		$a = $db_field['uid'];
		
	       if($a==$uid)
			{
				$flg=1;
				
				
					/*$oage = $db_field['age'];
					$odob=  $db_field['dob'];
					$ogender=  $db_field['gender'];
					$oh_town=  $db_field['h_town'];
					$oc_city=  $db_field['c_city'];
					$ointerest=  $db_field['interest'];
					$oabt_u=$db_field['abt_u'];
					$oimg_name=$db_field['img_name'];
					*/
					if($uage!=null)
					{
						$SQL="update profile set age=$uage where uid=$uid";
						$results = mysqli_query($db_handle, $SQL);
					}

					if($dob!=null)
					{
						$SQL="update profile set dob='$dob' where uid=$uid";
						$results = mysqli_query($db_handle, $SQL);
					}
					
					if($gender!="")
					{
						$SQL="update profile set gender='$gender' where uid=$uid";
						$results = mysqli_query($db_handle, $SQL);
					}
					
					if($h_town!="")
					{
						$SQL="update profile set h_town='$h_town' where uid=$uid";
						$results = mysqli_query($db_handle, $SQL);
					}
					
					if($c_city!="")
					{
						$SQL="update profile set c_city='$c_city' where uid=$uid";
						$results = mysqli_query($db_handle, $SQL);
					}
					
					if($interest!="")
					{
						$SQL="update profile set interest='$interest' where uid=$uid";
						$results = mysqli_query($db_handle, $SQL);
					}
					
					if($abt_u!="")
					{
						$SQL="update profile set abt_u='$abt_u' where uid=$uid";
						$results = mysqli_query($db_handle, $SQL);
					}
						
					if($imagename!="")
					{
						$SQL="update profile set img_name='$imagename' , pro_pic='$imagetmp' where uid=$uid";
						$results = mysqli_query($db_handle, $SQL);
						
						/*$SQL = "UPDATE profile
 SET img_name = :imagename,
 pro_pic=:imagetmp;
 
 $stmt = $this->db_handle->prepare($SQL);
 
 $stmt->bindParam(':mime',$mime);
 $stmt->bindParam(':data',$blob,PDO::PARAM_LOB);
 $stmt->bindParam(':id',$id);*/
					}
                  
				
			}
	}
			
			if($flg==0){
				$query="INSERT INTO profile(uid, age, dob, gender, h_town, c_city, interest, abt_u, pro_pic, img_name) VALUES ('$uid', '$uage', '$dob','$gender','$h_town','$c_city','$interest','$abt_u','$imagetmp','$imagename')";
				$result = mysqli_query($db_handle, $query);
			}
	
	
	header("Location: sel_profile.php");
	

}

?>


