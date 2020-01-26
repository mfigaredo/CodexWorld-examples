<?php 
// Include autoloader 
require_once 'dompdf/autoload.inc.php'; 
 
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 
 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();

// Load HTML content 
// $dompdf->loadHtml('<h1>Welcome to CodexWorld.com</h1>'); 
 // Load content from html file 
$html = file_get_contents("pdf-content.html"); 
$dompdf->loadHtml($html); 

// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('letter', 'landscape'); 
 
// Render the HTML as PDF 
$dompdf->render(); 
 
// Output the generated PDF to Browser 
$dompdf->stream('document.pdf', array("Attachment" => 0));
# 'document.pdf', array("Attachment" => 0)
?>
