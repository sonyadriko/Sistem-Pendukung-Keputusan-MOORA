<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['id_users'])) {
    header('Location: login.php');
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
    <title>Tambah Data Handphone</title>
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
                            <div class="card-header">Tambah Data Handphone</div>
                            <div class="card-body">
                                <form action="tambah_data.php" method="post">
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="merk">Merk Handphone</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="merk" name="merk" type="text"
                                                placeholder="Enter Merk Handphone">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="harga">Harga</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="harga" name="harga" type="number"
                                                placeholder="Enter Harga">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="daya_tahan">Daya Tahan Baterai (mAH)</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="daya_tahan" name="daya_tahan" type="number"
                                                placeholder="Enter Daya Tahan">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="sistem_operasi">Sistem Operasi</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="sistem_operasi" name="sistem_operasi">
                                                <option value="Android 8.0">Android 8.0</option>
                                                <option value="Android 8.1 (Oreo)">Android 8.1 (Ore)</option>
                                                <option value="Android 9.0 (Pie)">Android 9.0 (Pie)</option>
                                                <option value="Android 10 (Q)">Android 10 (Q)</option>
                                                <option value="Android 11">Android 11</option>
                                                <option value="Android 12">Android 12</option>
                                                <!-- Add more options based on your data -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="harga">RAM</label>
                                        <div class="col-sm-10">
                                        <select class="form-control" id="ram" name="ram">
                                            <option value="2GB/3GB">2GB/3GB</option>
                                            <option value="3GB/4GB">3GB/4GB</option>
                                            <option value="4GB/6GB">4GB/6GB</option>
                                            <option value="6GB/8GB">6GB/8GB</option>
                                            <option value="8GB/12GB">8GB/12GB</option>
                                            <!-- Add more options based on your data -->
                                        </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="tahun_launching">Tahun Launching</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="tahun_launching" name="tahun_launching">
                                                <option value="2014/2015">2014/2015</option>
                                                <option value="2016/2017">2016/2017</option>
                                                <option value="2018/2019">2018/2019</option>
                                                <option value="2020/2021">2020/2021</option>
                                                <option value="2022/2023">2022/2023</option>
                                                <!-- Add more options based on your data -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="memori_internal">Memori Internal</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="memori_internal" name="memori_internal">
                                                <option value="16GB/32GB">16GB/32GB</option>
                                                <option value="32GB/64GB">32GB/64GB</option>
                                                <option value="64GB/128GB">64GB/128GB</option>
                                                <option value="128GB/256GB">128GB/256GB</option>
                                                <option value="256GB/512GB">256GB/512GB</option>
                                                <!-- Add more options based on your data -->
                                            </select>
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
        $merk = mysqli_real_escape_string($conn, $_POST['merk']);
        $harga = mysqli_real_escape_string($conn, $_POST['harga']);
        $daya_tahan = mysqli_real_escape_string($conn, $_POST['daya_tahan']);
        $sistem_operasi = $_POST['sistem_operasi'];
        $ram = $_POST['ram'];
        $tahun_launching = $_POST['tahun_launching'];
        $memori_internal = $_POST['memori_internal'];
    
        $insertData = "INSERT INTO handphone (`id_handphone`,`merk`, `harga`, `daya_tahan`, `sistem_operasi`, `ram`, `tahun_launching`, `memori_internal`) 
                       VALUES (NULL, '$merk', '$harga', '$daya_tahan', '$sistem_operasi', '$ram', '$tahun_launching', '$memori_internal')";
    
        $insertResult = mysqli_query($conn, $insertData);
    
        if ($insertResult) {
            echo "<script>alert('Berhasil menambah data handphone.')</script>";
            echo "<script>window.location.href = 'data.php';</script>";
            // Alternatively, you can use: echo "<script>location.reload();</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    
?>