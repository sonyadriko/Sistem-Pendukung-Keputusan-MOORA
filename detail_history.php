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
    <title>History</title>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

</head>

<body>
<div class="sidebar no-print">
<?php include 'sidebar.php' ?>
</div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
    <div class="print-header no-print">
        <?php include 'header.php' ?>
    </div>
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="row">
                <div class="col-md-12">
              <div class="card mb-4">
                
                <div class="card-header">Data Detail History</div>
                <div class="card-body">
                <!-- <a href="print_halaman.php" target="_blank" class="btn btn-primary btn-user mb-4">Print</a> -->
                <!-- <a href="#" class="btn btn-primary btn-user mb-4" onclick="printPage()">Print</a> -->
                <button class="btn btn-primary btn-user mb-4" onclick="printIn()">Print</button>
                <table class="table table-bordered table-striped-columns" id="dataTable">
                        <thead>
                            <th>No</th>
                            <th>Handphone</th>
                            <th>Hasil</th>
                            <th>Ranking</th>
                        </thead>
                        <tbody>
                        <?php 
                $no = 1;
                $id_hasil = $_GET['GetID'];
                $get_data = mysqli_query($conn, "select * from detail_hasil where id_hasil = '".$id_hasil."'");
                while($display = mysqli_fetch_array($get_data)) {
                    $id = $display['id_detail_hasil'];
                    $hp = $display['nama_alternatif'];
                    $hasil = $display['hasil_akhir'];
                    $rank = $display['ranking'];
                   
                
                ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $hp ?></td>
                                <td><?php echo $hasil ?></td>
                                <td><?php echo $rank ?></td>
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
        <div class="print-footer no-print">

       <?php include 'footer.php' ?>
</div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="vendors/simplebar/js/simplebar.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="vendors/chart.js/js/chart.min.js"></script>
    <script src="vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="vendors/@coreui/utils/js/coreui-utils.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
       function printIn(){
        var id_hasil = '<?php echo $_GET["GetID"]; ?>';
        window.open('print_halaman.php?GetID=' + id_hasil, '_blank');
       }
    </script>

<script>
    function printPage() {
        window.open('print_halaman.php', '_blank');
    }
</script>
</body>

</html>
<style media="print">
    /* Include styles for printing */
    @page {
        size: auto;
        margin: 20mm; /* Adjust the margin as needed */
    }

    body {
        margin: 0;
        padding: 0;
    }

    .no-print {
        display: none !important;
    }

    /* .print-header,
    .print-sidebar,
    .print-footer {
        display: block !important;
    } */

    /* .no-print {
        display: none !important;
    } */
</style>