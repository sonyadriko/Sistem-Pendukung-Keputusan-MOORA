<?php
include '../config/database.php';
session_start();
if (!isset($_SESSION['id_users'])) {
    header('Location: login.php');
}

include '../config/database.php';

require '../vendor/autoload.php'; // Make sure this path is correct

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Row;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['import'])) {
        // Process the uploaded Excel file for import
        if (isset($_FILES['excelFile'])) {
            $fileError = $_FILES['excelFile']['error'];
            if ($fileError == UPLOAD_ERR_OK) {
                $excelFile = $_FILES['excelFile']['tmp_name'];

                try {
                    // Load the Excel file
                    $spreadsheet = IOFactory::load($excelFile);
                    $worksheet = $spreadsheet->getActiveSheet();

                    // Prepare the statement for inserting data into the 'handphone' table
                    $stmtInsert = $conn->prepare('INSERT INTO handphone (merk, harga, daya_tahan, sistem_operasi, ram, tahun_launching, memori_internal) VALUES (?, ?, ?, ?, ?, ?, ?)');

                    // Initialize variable for counting successful inserts
                    $successCount = 0;

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
                            if ($stmtInsert->execute()) {
                                $successCount++; // Increment the count of successful inserts
                            }
                        }
                    }

                    // Check if any data was successfully inserted
                    if ($successCount > 0) {
                        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                        echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Import successful!',
                                    text: 'Total $successCount rows inserted.',
                                    showConfirmButton: true
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = 'data.php';
                                    }
                                });
                              </script>";
                    } else {
                        echo '<script>alert("No data inserted.");</script>';
                    }

                    // exit();
                } catch (Exception $e) {
                    echo '<script>alert("Error processing the file: ' . $e->getMessage() . '");</script>';
                }
            } else {
                echo '<script>alert("Error uploading the file.");</script>';
            }
        } else {
            echo '<script>alert("No file uploaded.");</script>';
        }
    }
}

// Helper function to parse harga
function parseHarga($hargaString)
{
    // Menghapus "Rp." dan titik dari string harga
    $hargaClean = str_replace(array('Rp.', '.'), '', $hargaString);

    // Mengonversi string harga yang sudah dibersihkan menjadi angka
    $harga = (float) $hargaClean;

    return $harga;
}


// Helper function to parse daya tahan
function parseDayaTahan($dayaTahanString)
{
    $dayaTahan = (int) filter_var($dayaTahanString, FILTER_SANITIZE_NUMBER_INT);
    return $dayaTahan;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Handphone</title>
    <?php include 'scripts.php' ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <?php include 'header.php'; ?>
        <!-- <div class="body flex-grow-1 px-3"> -->
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">Upload Excel File</div>
                        <div class="card-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                                enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="excelFile" class="form-label">Choose Excel File</label>
                                    <input type="file" class="form-control" id="excelFile" name="excelFile"
                                        accept=".xls, .xlsx" required>
                                    <div id="fileError" class="invalid-feedback"></div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="import">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">Data Handphone</div>
                        <div class="card-body">
                            <!-- <a href="tambah_data.php" class="btn btn-primary btn-user mb-4">Tambah
                                Data</a> -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped-columns" id="dataTable">
                                    <thead>
                                        <th>No</th>
                                        <th>Merk</th>
                                        <th>Harga</th>
                                        <th>Daya Tahan</th>
                                        <th>Sistem</th>
                                        <th>Ram</th>
                                        <th>Tahun</th>
                                        <th>Memori</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $get_data = mysqli_query($conn, "select * from handphone");
                                            while($display = mysqli_fetch_array($get_data)) {
                                                $id = $display['id_handphone'];
                                                $merk = $display['merk'];
                                                $harga = $display['harga'];
                                                $daya = $display['daya_tahan'];
                                                $sistem = $display['sistem_operasi'];
                                                $ram = $display['ram'];
                                                $tahun = $display['tahun_launching'];
                                                $memori = $display['memori_internal'];
                                            ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $merk; ?></td>
                                            <td><?php echo $harga; ?></td>
                                            <td><?php echo $daya . 'mAH'; ?></td>
                                            <td><?php echo $sistem; ?></td>
                                            <td><?php echo $ram; ?></td>
                                            <td><?php echo $tahun; ?></td>
                                            <td><?php echo $memori; ?></td>
                                            <td>
                                                <a href='edit_data.php?GetID=<?php echo $id; ?>'
                                                    style="text-decoration: none; list-style: none;"><input
                                                        type='submit' value='Ubah' id='editbtn'
                                                        class="btn btn-primary btn-user"></a>
                                                <a href='delete_data.php?Del=<?php echo $id; ?>'
                                                    style="text-decoration: none; list-style: none;"><input
                                                        type='submit' value='Hapus' id='delbtn'
                                                        class="btn btn-primary btn-user"></a>
                                            </td>

                                        </tr>
                                        <?php
                                            $no++;
                                                }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.row-->
            <!-- /.card.mb-4-->
        </div>
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">Delete All Data</div>
                        <div class="card-body">
                            <!-- <button type="submit" class="btn btn-danger" style="color: white;">Delete</button> -->
                            <button type="button" class="btn btn-danger" style="color: white;"
                                onclick="confirmDelete()">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    </div>
    <?php include 'js.php' ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
    document.getElementById("uploadForm").addEventListener("submit", function(event) {
        var fileInput = document.getElementById("excelFile");
        var fileError = document.getElementById("fileError");

        if (fileInput.files.length === 0) {
            fileError.textContent = "Please select a file.";
            fileError.style.display = "block";
            event.preventDefault();
        } else {
            var file = fileInput.files[0];
            var fileName = file.name;
            var fileSize = file.size;
            var fileType = file.type;

            if (fileType !== "application/vnd.ms-excel" && fileType !==
                "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
                fileError.textContent = "Invalid file format. Please select a valid Excel file.";
                fileError.style.display = "block";
                event.preventDefault();
            } else if (fileSize > 5242880) {
                fileError.textContent = "File size exceeds the maximum limit of 5MB.";
                fileError.style.display = "block";
                event.preventDefault();
            } else {
                fileError.style.display = "none";
            }
        }
    });

    $(document).ready(function() {
        $('#dataTable').DataTable();
    });

    function confirmDelete() {
        // Tampilkan kotak dialog konfirmasi SweetAlert
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    // Jika pengguna menekan tombol "OK", kirim permintaan hapus ke server
                    deleteData();
                } else {
                    // Jika pengguna menekan tombol "Cancel", tampilkan pesan bahwa penghapusan dibatalkan
                    swal("Your data is safe!", {
                        icon: "info",
                    });
                }
            });
    }

    function deleteData() {
        // Membuat permintaan HTTP ke server untuk menghapus semua data
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "delete_all_data.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Menghapus semua data pada tabel setelah berhasil dihapus dari server
                // document.getElementById("handphoneTable").innerHTML = "";
                // Tampilkan pesan sukses menggunakan SweetAlert
                swal("Success!", "All data has been deleted.", "success")
                    .then(() => {
                        // Memuat ulang halaman setelah tombol "OK" ditekan
                        window.location.reload();
                    });
            } else if (xhr.readyState === 4 && xhr.status !== 200) {
                // Tampilkan pesan gagal jika terjadi kesalahan pada server
                swal("Error!", "Failed to delete data.", "error");
            }
        };
        xhr.send();
    }
    </script>

</body>

</html>