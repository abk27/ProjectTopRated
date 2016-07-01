<?php

include'dbconnect.php';

if(isset($_POST['search']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    echo"".$fname;
    $SQL="SELECT uid from user where fname='".$fname ."'";
     $SQL1="SELECT uid from user where lname='".$lname ."'";
    
    $result = mysqli_query($db_handle, $SQL);
    $result1 = mysqli_query($db_handle, $SQL1);
		$db_field = mysqli_fetch_assoc($result);
    $db_field1 = mysqli_fetch_assoc($result1);
		$uid = $db_field['uid'];   
        $uid1 = $db_field1['uid']; 
    
    if($uid == $uid1)
    {
  
    
     echo"<tr>";
			$sql = "SELECT * FROM profile WHERE uid = $uid";
			$sth = $db_handle->query($sql);
			$result2=mysqli_fetch_array($sth);
			echo '<img src="data:pro_pic/jpg;base64,'.base64_encode( $result2['pro_pic'] ).'" class="img-circle" style="width:150px;height:150px; "/>';
			echo "<br>";
			echo"</tr>";
                                
                                
    
    
      $query="SELECT upload from posts where uid='".$uid ."'";; 
                                
            $idquery="SELECT pid FROM posts ORDER BY pid DESC";
                                
        
                                
                                
            if($query_run=mysqli_query($db_handle,$query) AND $id_run=mysqli_query($db_handle,$idquery))
             {
            
                while($query_row=mysqli_fetch_assoc($query_run) AND   $query_row_id=mysqli_fetch_assoc($id_run))
                {
                    $postpath=$query_row['upload'];
                    
                    $tmpid=$query_row_id['pid'];
                    
                    
                    
                    
                        
                    $a=$postpath;
                        if (strpos($a, 'jpg') !== false ||strpos($a, 'png') !== false|| strpos($a, 'JPG') !== false ||strpos($a, 'PNG') !== false||
                           strpos($a, 'gif') !== false)
                        {
                            echo "<p><img src='$postpath' height='40%' width='40%' align='middle'>\n"
                                            ."<br/></p>\n"; 
                            echo"".$tmpid;
                                    
                        }
                        else if(strpos($a,'mp4'))
                        {
                            echo "<p><video width='40%' height='40%' controls > <source src='$postpath' type='video/mp4'></video>\n"
                                    ."\n";
                            
                 
                               echo"".$tmpid; 
                        }
                    else
                    {
                         echo "<p><audio width='40%' height='40%' controls > <source src='$postpath' type='audio/mp3'></audio>\n"
                                    ."\n";
                        echo"".$tmpid;
                     
                    }
                    
          
                }
            }
            else
            {
                echo"not well";
            }
    }
}




?>
<html>
    <body>
<form method="post" action="Searchfriend.php">
         <input type="search" name="fname">
                 <input type="search" name="lname">

         <input type="submit" name="search" value="search"><br>
       
 
        
        </form>
</body>    
    </html>