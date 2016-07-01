<?php
$query=mysql_connect("localhost","root","");
mysql_select_db('swotanalysis',$query);
if(isset($_POST['game']))
{
    echo '$choice';
$choice=$_POST['game'];
if(mysql_query("insert into posts (ratings) values('$choice')"))
{
    echo"success";
}
    else
    {
        echo"failed";
    }
    
}
?>