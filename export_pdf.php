<?php
<<<<<<< HEAD
include('lib/mpdf/mpdf.php');
session_start();
$user_info=$_SESSION['user_info'];
$screen_name=$_POST['screen_name'];
$content=$_POST['content'];
$user_image=$_POST['user_image'];
$file_name="TimelineAppTweets".time().".pdf";

$mpdf=new mPDF();
$mpdf->SetWatermarkText('For RTCamps',0.1);
$mpdf->showWatermarkText = true;
$html =
  '<html>
  
  <body><center>
  	<h1><img src="http://twitterapp.6te.net/img/twitter_bird_icon.png">Twitter Timeline App</h1>
	
  <table><tr><td><img src="'.$user_image.'" ></td><td><h2>'.$screen_name.'\'s';

	  $html=$html.' Timeline</h2></td></tr></table></center>'
	  .$content.'</body></html>';
  
$mpdf->WriteHTML($html);
$mpdf->Output($file_name,'D');
exit;

?>
=======
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
>>>>>>> d8fe19af109ad4ec95b16e6ecf868fe11ddbdf3a
