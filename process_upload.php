<?php

include 'koneksi.php';

require 'vendor/autoload.php'; // Make sure this path is correct

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Row;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['import'])) {
        // Process the uploaded Excel file for import
        if (isset($_FILES['excelFile']) && $_FILES['excelFile']['error'] == UPLOAD_ERR_OK) {
            $excelFile = $_FILES['excelFile']['tmp_name'];

            // Load the Excel file
            try {
                $spreadsheet = IOFactory::load($excelFile);
            } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
                echo '<script>alert("Error loading the Excel file: ' . $e->getMessage() . '");</script>';
                exit;
            }

            // Get the active sheet
            $worksheet = $spreadsheet->getActiveSheet();

            // Prepare the statement for inserting data into the 'handphone' table
            $stmtInsert = $conn->prepare('INSERT INTO handphone (merk, harga, daya_tahan, sistem_operasi, ram, tahun_launching, memori_internal) VALUES (?, ?, ?, ?, ?, ?, ?)');

            // Iterate through rows and insert data into the 'handphone' table
            foreach ($worksheet->getRowIterator() as $row) {
                $rowData = [];
                foreach ($row->getCellIterator() as $cell) {
                    $rowData[] = $cell->getValue();
                }

                // Assuming the Excel columns are in the order specified
                if (count($rowData) == 7) {
                    // Extracting values
                    $merk = $rowData[0];
                    $harga = parseHarga($rowData[1]);
                    $daya_tahan = parseDayaTahan($rowData[2]);
                    $sistem_operasi = $rowData[3];
                    $ram = $rowData[4];
                    $tahun_launching = $rowData[5];
                    $memori_internal = $rowData[6];

                    // Insert data into the 'handphone' table
                    $stmtInsert->bind_param('sssssss', $merk, $harga, $daya_tahan, $sistem_operasi, $ram, $tahun_launching, $memori_internal);

                    if (!$stmtInsert->execute()) {
                        echo '<script>alert("Error inserting data into the database: ' . $stmtInsert->error . '");</script>';
                        exit;
                    }
                }
            }

            echo '<script>alert("Import successful!");</script>';
        } else {
            echo '<script>alert("Error uploading the file.");</script>';
        }
    }
}

// Helper function to parse harga
function parseHarga($hargaString)
{
    $harga = (float)filter_var($hargaString, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    return $harga;
}

// Helper function to parse daya tahan
function parseDayaTahan($dayaTahanString)
{
    $dayaTahan = (int)filter_var($dayaTahanString, FILTER_SANITIZE_NUMBER_INT);
    return $dayaTahan;
}
?>
