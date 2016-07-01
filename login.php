<?php
session_start();
$user = "";
$pass = "";
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	include 'dbconnect.php';

	$user = $_POST['uname'];
	$pass = $_POST['pwd'];
		
	//unwanted HTML (scripting attacks)
	$user = htmlspecialchars($user);
	$pass = htmlspecialchars($pass);
	
	$SQL = "SELECT * FROM user";
	$result = mysqli_query($db_handle, $SQL);
	while ($db_field = mysqli_fetch_assoc($result)) 
    {
		$a = $db_field['uname'];
		$b = $db_field['pwd'];
		
		if(($user == $a) AND ($pass == $b))
			{
				session_start();
				$_SESSION['uname'] = $user;
               //echo $_SESSION['uname'];
				//mysqli_close($db_handle);
			header("Location: home.php");
			}
       
      
		}
        
	
	$msg = "Check username and/or password.";
	mysqli_close($db_handle);
}
?>


