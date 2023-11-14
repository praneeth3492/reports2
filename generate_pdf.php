<?php
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["html_content"])) {
    $htmlContent = $_POST["html_content"];

    $dompdf = new Dompdf();
    $dompdf->loadHtml($htmlContent);
    $dompdf->setPaper('A4', 'portrait'); // Set paper size and orientation
    $dompdf->render();

    // Save the generated PDF on the server
    $pdfFilename = 'client_performance_report_' . time() . '.pdf';
    $pdfFilePath = 'pdf/' . $pdfFilename;
    file_put_contents($pdfFilePath, $dompdf->output());

    echo $pdfFilename; // Send back the generated PDF filename to the client
} else {
    // Handle invalid requests
    header('HTTP/1.0 403 Forbidden');
    exit;
}
