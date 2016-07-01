<?php
session_start();
session_destroy();
$msg = "";

include 'dbconnect.php';

if (isset($_POST['register'])) 
{
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$user = $_POST['uname'];
	$pass = $_POST['pwd'];
	$email = $_POST['email'];
   
	
		$SQL = "SELECT * FROM user where uname=.'$user'";
		$result = mysqli_query($db_handle, $SQL);
        if(!mysqli_num_rows($result)>0)
        {
          $SQL = "INSERT INTO user (`fname`, `lname`, `uname`, `pwd`, `email`) VALUES ('$fname', '$lname', '$user', '$pass', '$email')";
				if(mysqli_query($db_handle,$SQL))
                {
                    echo"insert into users";
                    header("Location: suc_signup.html");
                    //mail sender code 
                    
                  /*  echo " <div class=\"alert alert-success\" role=\"alert\">Request Successful , we will reach to you soon</div>";
            //Logic to send mail... Go to Mailsender class, sendmail function.
            include  "MailSender.php";
            include "config.php";
            $mailsender = new MailSender();
             $mailYTextBody = "Dear ". $fname . "  ,". $REGISTRATION_WITHOUT_PAYMENT;
            $$result = $mailsender->sendMail($email,$fname,$REGISTRATION_WITHOUT_PAYMENT_SUBJECT,$mailYTextBody);
            if($result == 1)
            {
                echo"message send successfully";
            }else
            {
                echo"message send  unsuccessfully";
            }
                    
                    
                    
                    
                   */ 
                    
                    
                    
                }
                else
                {
                    echo"Username is not available.";
                     header('location:signup.html');
                    die ("Username is not available.");
                    
                }   
        
        }
        else
        {
           
            die ("Username is not available.");
		}	
		/*while ($db_field = mysqli_fetch_assoc($result)) 
       // while($result)
        {
             echo"i am here";
			$a = $db_field['uname'];
			$b = $db_field['email'];
			if($a == $user AND $b == $email)
            {
				die ("Username is not available.");
			}
			else
            {
				$SQL = "INSERT INTO user (`fname`, `lname`, `uname`, `pwd`, `email`) VALUES ('$fname', '$lname', '$user', '$pass', '$email')";
				if(mysqli_query($db_handle,$SQL))
                {
                    echo"insert into users";
                    header("Location: suc_signup.html");
                }
                else
                {
                    echo"not insert into user";
                }
				
				
			}
		}*/
       
	}

?>

