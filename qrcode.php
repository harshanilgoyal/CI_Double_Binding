<?php 
// Include the QRCode generator library
require_once __DIR__ . '/vendor/autoload.php';

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;


if(isset($_GET['text'])){
// Create a basic QR code
$qrCode = new QrCode($_GET['text']);
$qrCode->setSize(300);

// Set advanced options
$qrCode->setWriterByName('png');
$qrCode->setMargin(10);
$qrCode->setEncoding('UTF-8');
$qrCode->setErrorCorrectionLevel(new ErrorCorrectionLevel(ErrorCorrectionLevel::HIGH));
$qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
$qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
$qrCode->setLabel('Coal India Private Ltd', 16,'css/Numans-Regular.ttf', LabelAlignment::CENTER);
$qrCode->setLogoPath('login\img\logo.png');
$qrCode->setLogoSize(150, 200);
$qrCode->setRoundBlockSize(true);
$qrCode->setValidateResult(false);
$qrCode->setWriterOptions(['exclude_xml_declaration' => true]);

// Directly output the QR code
header('Content-Type: ' . $qrCode->getContentType());
echo $qrCode->writeString();

// Save it to a file
$qrCode->writeFile(__DIR__ . '/qrcode.png');

// Create a response object
//$response = new QrCodeResponse($qrCode);
}

?>