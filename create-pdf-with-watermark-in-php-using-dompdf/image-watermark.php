<?php 
// Include autoloader 
require 'vendor/autoload.php';

// Reference the Dompdf namespace 
use Dompdf\Dompdf; 
// Reference the Options namespace 
use Dompdf\Options; 
 
// Set options to enable embedded PHP 
$options = new Options(); 
$options->set('isPhpEnabled', 'true'); 
 
// Instantiate dompdf class 
$dompdf = new Dompdf($options); 
 
// Load HTML content 
$dompdf->loadHtml('<h1>Welcome to CodexWorld.com</h1>'); 
 
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'landscape'); 
 
// Render the HTML as PDF 
$dompdf->render(); 
 
// Instantiate canvas instance 
$canvas = $dompdf->getCanvas(); 
 
// Get height and width of page 
$w = $canvas->get_width(); 
$h = $canvas->get_height(); 
 
// Specify watermark image 
$imageURL = 'images/codexworld-logo.png'; 
$imgWidth = 200; 
$imgHeight = 20; 
 
// Set image opacity 
$canvas->set_opacity(.5); 
 
// Specify horizontal and vertical position 
$x = (($w-$imgWidth)/2); 
$y = (($h-$imgHeight)/2); 
 
// Add an image to the pdf 
$canvas->image($imageURL, $x, $y, $imgWidth, $imgHeight); 
 
// Output the generated PDF (1 = download and 0 = preview) 
$dompdf->stream('document.pdf', array("Attachment" => 0));

?>
