<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_pie.php');
require_once ('jpgraph/jpgraph_pie3d.php');
 
$data = array(20,50,50,80);
 
$graph = new PieGraph(600,500);
$graph->SetShadow();
 
$graph->title->Set("A simple Pie plot");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
 
$p1 = new PiePlot3D($data);
$p1->SetAngle(35);
$p1->SetSize(0.5);
$p1->SetCenter(0.45);
$p1->SetLegends($gDateLocale->GetShortMonth());
 
$graph->Add($p1);
$graph->Stroke();
 
?>