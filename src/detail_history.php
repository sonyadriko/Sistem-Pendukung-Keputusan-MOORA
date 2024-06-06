<?php
include '../config/database.php';
session_start();
if (!isset($_SESSION['id_users'])) {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>History</title>
    <?php include 'scripts.php' ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- jQuery Library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <div class="sidebar no-print">
        <?php include 'sidebar.php'; ?>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <div class="print-header no-print">
            <?php include 'header.php'; ?>
        </div>
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">

                            <div class="card-header">Data Detail History</div>
                            <div class="card-body">
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
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $hp; ?></td>
                                            <td><?php echo $hasil; ?></td>
                                            <td><?php echo $rank; ?></td>
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

            <?php include 'footer.php'; ?>
        </div>
    </div>
    <?php include 'js.php' ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
    function printIn() {
        var id_hasil = '<?php echo $_GET['GetID']; ?>';
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
    margin: 20mm;
    /* Adjust the margin as needed */
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