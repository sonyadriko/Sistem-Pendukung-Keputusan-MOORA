<?php
// save_data_detail.php
include 'koneksi.php';

// Retrieve data from the request
$data = json_decode(file_get_contents("php://input"), true);

$detailDataArray = $data['detailDataArray'];

// Initialize the response array
$response = [];

foreach ($detailDataArray as $detailData) {
    $id_hasil = mysqli_real_escape_string($conn, $detailData['id_hasil']);
    $id_rule = mysqli_real_escape_string($conn, $detailData['nama_alternatif']);
    $support = mysqli_real_escape_string($conn, $detailData['number']);
    $confidence = mysqli_real_escape_string($conn, $detailData['rank']);

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO detail_hasil (`id_hasil`, `nama_alternatif`, `hasil_akhir`, `ranking`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $id_hasil, $id_rule, $support, $confidence);

    if ($stmt->execute()) {
        $response[] = ['success' => true, 'message' => 'Data successfully saved.'];
    } else {
        $response[] = ['success' => false, 'error' => 'Error: ' . $stmt->error];
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
mysqli_close($conn);

// Set the proper Content-Type header for JSON response
header('Content-Type: application/json');

// Convert the response array to JSON and print it
echo json_encode($response);
?>
