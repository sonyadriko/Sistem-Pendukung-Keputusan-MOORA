<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['id_users'])) {
    header('Location: login.php');
}
$id_data = $_GET['GetID'];
$query = mysqli_query($conn, "SELECT * FROM kriteria WHERE id_kriteria = '".$id_data."'");
while($row = mysqli_fetch_assoc($query)){
    $nama = $row['nama_kriteria'];
    $bobot = $row['bobot_kriteria'];
    $tipe = $row['tipe_kriteria'];
}
?>
<!DOCTYPE html><!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.2
* @link https://coreui.io/product/free-bootstrap-admin-template/
* Copyright (c) 2023 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://github.com/coreui/coreui-free-bootstrap-admin-template/blob/main/LICENSE)
--><!-- Breadcrumb-->
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Edit Data Kriteria</title>
    <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="css/examples.css" rel="stylesheet">
    <link href="vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <?php include 'header.php'; ?>
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">Edit Data Kriteria</div>
                            <div class="card-body">
                                <form action="edit_kriteria.php?GetID=<?php echo $id_data; ?>" method="post">
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="nama">Nama Kriteria</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="nama" value=<?php echo $nama ?> name="nama" type="text"
                                                placeholder="Enter Nama Kriteria">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="bobot">Bobot Kriteria</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="bobot" value=<?php echo $bobot?> name="bobot" type="number"
                                                placeholder="Enter Bobot Kriteria">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="merk">Tipe Kriteria</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="tipe" value=<?php echo $tipe ?> name="tipe" type="text"
                                                placeholder="Enter Tipe Kriteria">
                                        </div>
                                    </div>
                                
                                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.row-->
                <!-- /.card.mb-4-->
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="vendors/simplebar/js/simplebar.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="vendors/chart.js/js/chart.min.js"></script>
    <script src="vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="vendors/@coreui/utils/js/coreui-utils.js"></script>
    <script src="js/main.js"></script>
    <script></script>

</body>

</html>
<?php 
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $bobot = mysqli_real_escape_string($conn, $_POST['bobot']);
    $tipe = mysqli_real_escape_string($conn, $_POST['tipe']);
  
    $updateData = "UPDATE kriteria SET nama_kriteria='$nama', bobot_kriteria='$bobot', tipe_kriteria='$tipe' WHERE id_kriteria='$id_data'";
    $updateResult = mysqli_query($conn, $updateData);

    if ($updateResult) {
        echo "<script>alert('Berhasil mengedit data kriteria.')</script>";
        echo "<script>window.location.href = 'kriteria.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
