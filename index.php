<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';

use mikehaertl\pdftk\Pdf;

try {
    $inputFile = __DIR__ . '/SPRAVATO_REMS_Patient_Monitoring_Form_Test_Server.pdf';

    if (!file_exists($inputFile)) {
        die("Error: The input file does not exist.");
    }

    if (mime_content_type($inputFile) !== 'application/pdf') {
        die("Error: The file is not a valid PDF.");
    }

    $pdf = new Pdf($inputFile);

    $pdf->fillForm([
        'Patient_First_Name_1' => 'Mohit',
        'Patient_MI_1' => 'C',
        'Patient_Last_Name_1' => 'Jotaniya',
        'Patient_DOB_1' => '09/06/2000',
        'Patient_Sex_1' => 'Patient_Sex_Male',
        'Medication_Benzo' => 'Medication_Benzo_No',
    ])
    ->needAppearances() // Ensure field appearances are set
    ->saveAs(__DIR__ . '/filled_template.pdf');

    if (!$pdf->saveAs(__DIR__ . '/filled_template.pdf')) {
        throw new Exception($pdf->getError());
    }

    echo "PDF created successfully.";
} catch (Exception $e) {
    echo 'An error occurred: ' . $e->getMessage();
}