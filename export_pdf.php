<?php
$content=$_POST['content'];
$file_name="TimelineAppTweets".time().".pdf";
require_once("lib/dompdf/dompdf_config.inc.php");

$html =
  '<html><body><center>'.
  $content
  .'</center></body></html>';

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream($file_name);

?>