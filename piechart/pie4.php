<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/dbconnect.php');
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_pie.php');
require_once ('jpgraph/jpgraph_pie3d.php');
 
 session_start();

		
$SQL = "select uid from user where uname ='".$_SESSION['uname']."'";
$result = mysqli_query($db_handle, $SQL);
$db_field = mysqli_fetch_assoc($result);
$uid = $db_field['uid'];
 
 
$query = "select sum(rating) as edutot from posts where category='edu' AND uid=$uid";
$result = mysqli_query($db_handle, $query);
$db_field = mysqli_fetch_assoc($result);
$edutot = $db_field['edutot'];

$query = "select sum(rating) as enttot from posts where category='ent' AND uid=$uid";
$result = mysqli_query($db_handle, $query);
$db_field = mysqli_fetch_assoc($result);
$enttot = $db_field['enttot'];

$query = "select sum(rating) as spotot from posts where category='spo' AND uid=$uid";
$result = mysqli_query($db_handle, $query);
$db_field = mysqli_fetch_assoc($result);
$spotot = $db_field['spotot'];

$query = "select sum(rating) as soctot from posts where category='soc' AND uid=$uid";
$result = mysqli_query($db_handle, $query);
$db_field = mysqli_fetch_assoc($result);
$soctot = $db_field['soctot'];

$query = "select sum(rating) as mgmttot from posts where category='mgmt' AND uid=$uid";
$result = mysqli_query($db_handle, $query);
$db_field = mysqli_fetch_assoc($result);
$mgmttot = $db_field['mgmttot'];
 
//$data = array(40,60,21,33);

$data = array($edutot,$enttot,$spotot,$soctot,$mgmttot);
 
$graph = new PieGraph(1000,800);
$graph->SetShadow();
 
$p1 = new PiePlot3D($data);
$p1->SetAngle(35);
$p1->SetSize(0.5);
$p1->SetCenter(0.45);
$p1->SetLegends(array('Education','Entertainment','Sports','Social','Management'));
 
$graph->Add($p1);
$graph->StrokeCSIM("pie4.php"); 



 
?>
