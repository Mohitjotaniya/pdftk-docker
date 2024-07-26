<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// require_once __DIR__ . '/vendor/autoload.php';

// use mikehaertl\pdftk\Pdf;

// try {
//     $inputFile = __DIR__ . '/SPRAVATO_REMS_Patient_Monitoring_Form_Test_Server.pdf';

//     if (mime_content_type($inputFile) !== 'application/pdf') {
//         die("Error: The file is not a valid PDF.");
//     }

//     // Verify input file exists
//     if (!file_exists($inputFile)) {
//         throw new Exception("Input file does not exist: " . $inputFile);
//     }

//     // Create a new Pdf instance
//     $pdf = new Pdf($inputFile);

//     // Fill the form fields
//     $pdf->fillForm([
//         'Patient_First_Name_1' => 'Mohit',
//         'Patient_MI_1' => 'C',
//         'Patient_Last_Name_1' => 'Jotaniya',
//         'Patient_DOB_1' => '09/06/2000',
//         'Patient_Sex_1' => 'Patient_Sex_Male',
//         'Medication_Benzo' => 'Medication_Benzo_No',
//     ]);

//     if ($pdf->getError()) {
//         throw new Exception("Error adding file: " . $pdf->getError());
//     }


//     $outputFile = '/var/www/html/1_output.pdf';

//     if (file_exists($outputFile)) {
//         echo "File exists and is of size " . filesize($outputFile) . " bytes.";
//     } else {
//         echo "File does not exist.";
//     }

//     $result = $pdf->saveAs($outputFile);

//     file_put_contents($outputFile ,'dsad');

//     // Save to the output file
//     if (!$pdf->saveAs($outputFile)) {
//         throw new Exception("Error saving file: " . $pdf->getError());
//     }

//     echo "PDF created successfully.";
// } catch (Exception $e) {
//     echo 'An error occurred: ' . $e->getMessage();
// }


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';

use mikehaertl\pdftk\Pdf;

// try {

//     $pdf = new Pdf();
    
//     $inputFile = __DIR__ . '/SPRAVATO_REMS_Patient_Monitoring_Form_Test_Server.pdf';

//     if (mime_content_type($inputFile) !== 'application/pdf') {
//         die("Error: The file is not a valid PDF.");
//     }

//     if (mime_content_type($inputFile) !== 'application/pdf') {
//         die("Error: The file is not a valid PDF.");
//     }
//     $pdf->addFile($inputFile, 'C', 'secret*password');


//     $pdf->fillForm([
//         'Patient_First_Name_1' => 'Mohit',
//         'Patient_MI_1' => 'C',
//         'Patient_Last_Name_1' => 'Jotaniya',
//         'Patient_DOB_1' => '09/06/2000',
//         'Patient_Sex_1' => 'Patient_Sex_Male',
//         'Medication_Benzo' => 'Medication_Benzo_No',
//     ]);


//     $outputPdfPath = '/var/www/html/1_output.pdf';
//     $result = $pdf->saveAs($outputPdfPath);

//     file_put_contents($outputPdfPath, 'This is a test.');
//     echo 'File created successfully.';


//     // $result = $pdf->saveAs(__DIR__ . '/filled_template.pdf');

//     if ($result === false) {
//         throw new Exception($pdf->getError());
//     }

//     echo "PDF created successfully.";
// } catch (Exception $e) {
//     echo 'An error occurred: ' . $e->getMessage();
// }

$pdf = new Pdf();
$inputFile = __DIR__ . '/SPRAVATO_REMS_Patient_Monitoring_Form_Test_Server.pdf';

// Debugging output
// echo "Input file: $inputFile\n";

if (!file_exists($inputFile)) {
    die("Error: Input file does not exist.");
}

if (mime_content_type($inputFile) !== 'application/pdf') {
    die("Error: The file is not a valid PDF.");
}

$pdf->addFile($inputFile, 'C', 'secret*password');
$pdf->fillForm([
    'Patient_First_Name_1' => 'Mohit',
    'Patient_MI_1' => 'C',
    'Patient_Last_Name_1' => 'Jotaniya',
    'Patient_DOB_1' => '09/06/2000',
    'Patient_Sex_1' => 'Patient_Sex_Male',
    'Medication_Benzo' => 'Medication_Benzo_No',
]);

$outputPdfPath = '/var/www/html/1_output.pdf';
$result = $pdf->saveAs($outputPdfPath);

file_put_contents($outputPdfPath, 'Test content');

// Check if file was created and is a valid PDF
if ($result === false) {
    throw new Exception($pdf->getError());
}

if (!file_exists($outputPdfPath)) {
    throw new Exception("Output file was not created.");
}

$fileSize = filesize($outputPdfPath);
$fileType = mime_content_type($outputPdfPath);


// print_r($fileType)
// ;
// exit;
if ($fileSize === 0 || $fileType !== 'application/pdf') {
    throw new Exception("The generated file is not a valid PDF.");
}

echo 'PDF created successfully.';
