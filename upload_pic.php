<?php
	include 'dbconnect.php';
	$target_dir = "test_upload/";
 
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
 
	if($upd)
	{
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 
if($imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "mov" && $imageFileType != "3gp" && $imageFileType != "mpeg")
{
    echo "File Format Not Suppoted";
} 
 
else
{
 
$video_path=$_FILES['fileToUpload']['name'];
 
mysql_query("insert into posts(upload) values('$video_path')");
 
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file);
 
echo "uploaded ";
 
}
 
}
 