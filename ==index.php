<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// require_once __DIR__ . '/vendor/autoload.php';

// use mikehaertl\pdftk\Pdf;

// try {
//     $pdf = new Pdf();

//     // Add the input file
//     $pdf->addFile(__DIR__ . '/SPRAVATO_REMS_Patient_Monitoring_Form_Test_Server.pdf', 'C', 'secret*password');

//     if ($pdf->getError()) {
//         throw new Exception("Error adding file: " . $pdf->getError());
//     }

//     $pdf->fillForm([
//         'Patient_First_Name_1' => 'Mohit',
//         'Patient_MI_1' => 'C',
//         'Patient_Last_Name_1' => 'Jotaniya',
//         'Patient_DOB_1' => '09/06/2000',
//         'Patient_Sex_1' => 'Patient_Sex_Male',
//         'Medication_Benzo' => 'Medication_Benzo_No',
//         // Add more fields as needed
//     ]);

//     // Define the output path
//     $outputPdfPath = '/var/www/html/1_output.pdf';
//     $result = $pdf->saveAs($outputPdfPath);

//     file_put_contents($outputPdfPath, 'This is a test.');
//     echo 'File created successfully.';


//     if ($result === false) {
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

try {

    $pdf = new Pdf();
    
    $pdf->addFile('SPRAVATO_REMS_Patient_Monitoring_Form_Test_Server.pdf', 'C', 'secret*password');
    // echo "<pre>";
    // print_r($pdf);
    // exit;

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

    file_put_contents($outputPdfPath, 'This is a test.');
    echo 'File created successfully.';


    // $result = $pdf->saveAs(__DIR__ . '/filled_template.pdf');

    if ($result === false) {
        throw new Exception($pdf->getError());
    }

    echo "PDF created successfully.";
} catch (Exception $e) {
    echo 'An error occurred: ' . $e->getMessage();
}
