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
    <title>Handphone</title>
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
    <?php include 'sidebar.php' ?>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <?php include 'header.php' ?>
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="row">
                <div class="col-md-12">
              <div class="card mb-4">
                <div class="card-header">Data Handphone</div>
                <div class="card-body">
                    <!-- <button class="mb-4">Tambah Data</button> -->
                    <a href="tambah_data.php" class="btn btn-primary btn-user mb-4">Tambah Data</a>
                <table class="table table-bordered table-striped-columns">
                        <thead>
                            <th>No</th>
                            <th>Merk</th>
                            <th>Harga</th>
                            <th>Daya Tahan</th>
                            <th>Sistem</th>
                            <th>Ram</th>
                            <th>Tahun</th>
                            <th>Memori</th>
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
                                <td><?php echo $no ?></td>
                                <td><?php echo $merk ?></td>
                                <td><?php echo $harga ?></td>
                                <td><?php echo $daya ?></td>
                                <td><?php echo $sistem ?></td>
                                <td><?php echo $ram ?></td>
                                <td><?php echo $tahun ?></td>
                                <td><?php echo $memori ?></td>
                                
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
                <!-- /.row-->
                <!-- /.card.mb-4-->
            </div>
        </div>
       <?php include 'footer.php' ?>
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
