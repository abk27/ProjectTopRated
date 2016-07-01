<?php // content="text/plain; charset=utf-8"
require ('jpgraph/dbconnect.php');
require ('jpgraph/jpgraph.php');
require ('jpgraph/jpgraph_pie.php');
require('jpgraph/jpgraph_pie3d.php');


 session_start();

$edutot = 0;
$enttot = 0;
$spotot = 0;
$soctot = 0;
$mgmttot =0;

$SQL = "select uid from user where uname ='".$_SESSION['uname']."'";
$result = mysqli_query($db_handle, $SQL);
$db_field = mysqli_fetch_assoc($result);
$uid = $db_field['uid'];

echo"uid",$uid;


$query = "select sum(rating) as edutot from posts where category='edu' AND uid=$uid";
$result = mysqli_query($db_handle, $query);
$db_field = mysqli_fetch_assoc($result);
$edutot = $db_field['edutot'];

echo $edutot;

$query = "select sum(rating) as spotot from posts where category='spo' AND uid=$uid";
$result = mysqli_query($db_handle, $query);
$db_field = mysqli_fetch_assoc($result);
$spotot = $db_field['spotot'];

echo $spotot;


$query = "select sum(rating) as mgmttot from posts where category='mgmt' AND uid=$uid";
$result = mysqli_query($db_handle, $query);
$db_field = mysqli_fetch_assoc($result);
$mgmttot = $db_field['mgmttot'];
echo $mgmttot;


$query = "select sum(rating) as soctot from posts where category='soc' AND uid=$uid";
$result = mysqli_query($db_handle, $query);
$db_field = mysqli_fetch_assoc($result);
$soctot = $db_field['soctot'];
echo $soctot;


//$data = array(20,30,40,11);
$data = array(20,50,50,80);


$graph = new PieGraph(800,600);
$graph->SetShadow();
 
$graph->title->Set("A simple Pie plot");
$graph->title->SetFont(FF_FONT1,FS_BOLD);

$p1 = new PiePlot3D($data);
$p1->SetAngle(35);
$p1->SetSize(0.5);
$p1->SetCenter(0.45);
$p1->SetLegends(array('Education','Entertainment','Sports','Social','Management'));

$graph->Add($p1);
$graph->Stroke();
 
?>