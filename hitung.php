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
    <title>Hitung</title>
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
                            <div class="card-header">Tabel hasil konversi</div>
                            <div class="card-body">
                                <!-- <button class="mb-4">Tambah Data</button> -->
                                <!-- <a href="tambah_kriteria.php" class="btn btn-primary btn-user mb-4">Tambah Kriteria</a> -->
                                <table class="table table-bordered table-striped-columns">
                                    <thead>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        <th>K1</th>
                                        <th>K2</th>
                                        <th>K3</th>
                                        <th>K4</th>
                                        <th>K5</th>
                                        <th>K6</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $value_harga = 0;
                                            $value_daya = 0;
                                            $value_sistem = 0;
                                            $value_ram = 0;
                                            $value_tahun = 0;
                                            $value_memori = 0;
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
                                            <td><?php if ($harga > 100000 && $harga <= 1500000) {
                                                $value_harga = '5';
                                            } elseif ($harga > 1500000 && $harga <= 2000000) {
                                                $value_harga = '4';
                                            } elseif ($harga > 2000000 && $harga <= 2500000) {
                                                $value_harga = '3';
                                            } elseif ($harga > 2500000 && $harga <= 3000000) {
                                                $value_harga = '2';
                                            } elseif ($harga > 3000000) {
                                                $value_harga = '1';
                                            } else {
                                                $value_harga = '0';
                                            }
                                            echo $value_harga;
                                            ?></td>
                                            <td><?php if ($daya > 3000 && $daya <= 4000) {
                                                $value_daya = '5';
                                            } elseif ($daya > 4000 && $daya <= 5020) {
                                                $value_daya = '4';
                                            } elseif ($daya > 5020 && $daya <= 5160) {
                                                $value_daya = '3';
                                            } elseif ($daya > 5160 && $daya <= 6000) {
                                                $value_daya = '2';
                                            } elseif ($daya > 6000 && $daya <= 7000) {
                                                $value_daya = '1';
                                            }
                                            echo $value_daya;
                                            ?></td>
                                            <td><?php if ($sistem == 'Android 8.0' && $sistem == 'Android 8.1 (Ore)') {
                                                $value_sistem = '5';
                                            } elseif ($sistem == 'Android 9.0 (Pie)') {
                                                $value_sistem = '4';
                                            } elseif ($sistem == 'Android 10 (Q)') {
                                                $value_sistem = '3';
                                            } elseif ($sistem == 'Android 11') {
                                                $value_sistem = '2';
                                            } elseif ($sistem == 'Android 12') {
                                                $value_sistem = '1';
                                            }
                                            echo $value_sistem;
                                            ?></td>
                                            <td><?php if ($ram == '2GB/3GB') {
                                                $value_ram = '5';
                                            } elseif ($ram == '3GB/4GB') {
                                                $value_ram = '4';
                                            } elseif ($ram == '4GB/6GB') {
                                                $value_ram = '3';
                                            } elseif ($ram == '6GB/8GB') {
                                                $value_ram = '2';
                                            } elseif ($ram == '8GB/12GB') {
                                                $value_ram = '1';
                                            }
                                            echo $value_ram;
                                            ?></td>
                                            <td><?php if ($tahun == '2014/2015') {
                                                $value_tahun = '5';
                                            } elseif ($tahun == '2016/2017') {
                                                $value_tahun = '4';
                                            } elseif ($tahun == '2018/2019') {
                                                $value_tahun = '3';
                                            } elseif ($tahun == '2020/2021') {
                                                $value_tahun = '2';
                                            } elseif ($tahun == '2022/2023') {
                                                $value_tahun = '1';
                                            }
                                            echo $value_tahun;
                                            ?></td>
                                            <td><?php if ($memori == '16GB/32GB') {
                                                $value_memori = '5';
                                            } elseif ($memori == '32GB/64GB') {
                                                $value_memori = '4';
                                            } elseif ($memori == '64GB/128GB') {
                                                $value_memori = '3';
                                            } elseif ($memori == '128GB/256GB') {
                                                $value_memori = '2';
                                            } elseif ($memori == '256GB/512GB') {
                                                $value_memori = '1';
                                            }
                                            echo $value_memori; ?></td>
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
                <?php
              $no = 1;
              $data_harga = array();
              $data_daya = array();
              $data_sistem = array();
              $data_ram = array();
              $data_tahun = array();
              $data_memori = array();
              
              // Ambil data dari database
              $get_data = mysqli_query($conn, "select * from handphone");
              while ($display = mysqli_fetch_array($get_data)) {
                  $harga = $display['harga'];
                  $daya = $display['daya_tahan'];
                  $sistem = $display['sistem_operasi'];
                  $ram = $display['ram'];
                  $tahun = $display['tahun_launching'];
                  $memori = $display['memori_internal'];
              
                  // Simpan nilai ke dalam array
                  $data_harga[] = $harga;
                  $data_daya[] = $daya;
                  $data_sistem[] = $sistem;
                  $data_ram[] = $ram;
                  $data_tahun[] = $tahun;
                  $data_memori[] = $memori;
              }
              
            
              // Hitung panjang vektor untuk masing-masing kriteria
              $sum_of_squares_harga = 0;
              $sum_of_squares_daya = 0;
              $sum_of_squares_sistem = 0;
              $sum_of_squares_ram = 0;
              $sum_of_squares_tahun = 0;
              $sum_of_squares_memori = 0;
              
              // Hitung sum of squares untuk masing-masing kriteria
              foreach ($data_harga as $val) {
                  $sum_of_squares_harga += $val ** 2;
              }
              
              foreach ($data_daya as $val) {
                  $sum_of_squares_daya += $val ** 2;
              }
              
              foreach ($data_sistem as $val) {
                  $sum_of_squares_sistem += $val ** 2;
              }
              
              foreach ($data_ram as $val) {
                  $sum_of_squares_ram += $val ** 2;
              }
              
              foreach ($data_tahun as $val) {
                  $sum_of_squares_tahun += $val ** 2;
              }
              
              foreach ($data_memori as $val) {
                  $sum_of_squares_memori += $val ** 2;
              }
              
              // Tampilkan sum of squares
              echo "Sum of Squares for Harga: " . $sum_of_squares_harga . "<br>";
              echo "Sum of Squares for Daya: " . $sum_of_squares_daya . "<br>";
              echo "Sum of Squares for Sistem: " . $sum_of_squares_sistem . "<br>";
              echo "Sum of Squares for RAM: " . $sum_of_squares_ram . "<br>";
              echo "Sum of Squares for Tahun: " . $sum_of_squares_tahun . "<br>";
              echo "Sum of Squares for Memori: " . $sum_of_squares_memori . "<br>";
              
              // Hitung panjang vektor untuk masing-masing kriteria
              $panjang_vektor_harga = sqrt($sum_of_squares_harga);
              $panjang_vektor_daya = sqrt($sum_of_squares_daya);
              $panjang_vektor_sistem = sqrt($sum_of_squares_sistem);
              $panjang_vektor_ram = sqrt($sum_of_squares_ram);
              $panjang_vektor_tahun = sqrt($sum_of_squares_tahun);
              $panjang_vektor_memori = sqrt($sum_of_squares_memori);
              
              // Tampilkan panjang vektor
              echo "Panjang Vektor Harga: " . $panjang_vektor_harga . "<br>";
              echo "Panjang Vektor Daya: " . $panjang_vektor_daya . "<br>";
              echo "Panjang Vektor Sistem: " . $panjang_vektor_sistem . "<br>";
              echo "Panjang Vektor RAM: " . $panjang_vektor_ram . "<br>";
              echo "Panjang Vektor Tahun: " . $panjang_vektor_tahun . "<br>";
              echo "Panjang Vektor Memori: " . $panjang_vektor_memori . "<br>";
              
?>
  

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
