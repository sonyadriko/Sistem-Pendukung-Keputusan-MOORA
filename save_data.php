<?php
include 'koneksi.php';

$data = json_decode(file_get_contents("php://input"), true);

// Inisialisasi array respons
$response = [];

try {
    if (empty($data['tanggal'])) {
        throw new Exception("Tanggal is empty");
    }

    $tanggal = $data['tanggal'];
    $nama_uji = $data['nama_uji'];
    
    // Convert the date string to a format recognized by MySQL
    $dateObj = new DateTime($tanggal);
    $formattedDate = $dateObj->format('Y-m-d H:i:s');

    // Using prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO hasil (`nama_uji`,`tanggal`) VALUES (?, ?)");
    if (!$stmt) {
        throw new Exception("Prepare failed: (" . $conn->errno . ") " . $conn->error);
    }

    $stmt->bind_param("ss", $nama_uji,$formattedDate);

    if (!$stmt->execute()) {
        throw new Exception("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
    }

    $last_id = $conn->insert_id;
    $response = ['last_id' => $last_id];
} catch (Exception $e) {
    $response = ['error' => $e->getMessage()];
    error_log('Error in save_data.php: ' . $e->getMessage());
}

// Convert the response array to JSON and print it
echo json_encode($response);

// Close the statement and database connection
if (isset($stmt)) {
    $stmt->close();
}
$conn->close();
?>
