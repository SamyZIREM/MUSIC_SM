<?php
  require_once ("./jpgraph/src/jpgraph.php");
  require_once ("./jpgraph/src/jpgraph_bar.php");
  if (($handle = fopen("histogramme.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $artist[] =$data[0];
        $hit[] = $data[1];
    }
    fclose($handle);
  }

  $artiste=$artist;
  $datay=$hit;
  $graph = new Graph(900,400);
  $graph->SetScale('intlin','0','30');
  $graph->SetShadow(true);
  $graph->SetMargin(60,30,40,80);
  $graph->xaxis->SetTickLabels($artiste);
  $bplot = new BarPlot($datay);
  $bplot->SetFillColor('vert');
  $graph->Add($bplot);
  $graph->title->Set('Histogramme des artistes les plus vus du site');
  $graph->xaxis->title->Set('Artistes');
  $graph->yaxis->title->Set('Nombre de consultations');
  $graph->title->SetFont(FF_FONT2,FS_BOLD);
  $graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
  $graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
  $graph->Stroke();


?>