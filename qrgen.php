<?php
require_once 'vendor/autoload.php';

use chillerlan\QRCode\{QRCode, QROptions};

// Check if a URL is provided via command line argument
if ($argc !== 2) {
    echo "Usage: php script.php [url]\n";
    exit(1);
}

// The URL to encode in the QR code
$url = $argv[1];

// Set options for the QR code
$options = new QROptions([
    'version'          => 5,
    'outputType'       => QRCode::OUTPUT_IMAGE_PNG,
    'eccLevel'         => QRCode::ECC_L,
    'scale'            => 3,
    'imageBase64'      => false,
    'imageTransparent' => false, // Ensure transparency is turned off
    'backColor'        => 0xFFFFFFFF, // White background
    'foreColor'        => 0xFF000000, // Black foreground
]);

// Create a new instance of QRCode with the options
$qrcode = new QRCode($options);

// Generate the QR code and save it to a file
$qrOutputFile = "qr_code.png";
$qrcode->render($url, $qrOutputFile);

echo "QR Code generated: " . $qrOutputFile . "\n";