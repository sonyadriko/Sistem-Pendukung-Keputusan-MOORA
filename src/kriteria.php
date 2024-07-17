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
    <title>Kriteria</title>
    <?php include 'scripts.php' ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
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
                            <div class="card-header">Data Kriteria</div>
                            <div class="card-body">
                                <div id="message"></div>
                                <table class="table table-bordered table-striped-columns" id="dataTable">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama Kriteria</th>
                                        <th>Bobot</th>
                                        <th>Tipe Kriteria</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $get_data = mysqli_query($conn, "select * from kriteria");
                                            while($display = mysqli_fetch_array($get_data)) {
                                                $id = $display['id_kriteria'];
                                                $nama = $display['nama_kriteria'];
                                                $bobot = $display['bobot_kriteria'];
                                                $tipe = $display['tipe_kriteria'];
                                        ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $nama ?></td>
                                            <td class="bobot"><?php echo $bobot ?></td>
                                            <td><?php echo $tipe ?></td>
                                            <td>
                                                <a href='edit_kriteria.php?GetID=<?php echo $id; ?>'
                                                    style="text-decoration: none; list-style: none;">
                                                    <input type='submit' value='Ubah' id='editbtn'
                                                        class="btn btn-primary btn-user">
                                                </a>
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
                <!-- /.row-->
                <!-- /.card.mb-4-->
            </div>
        </div>
        <?php include 'footer.php' ?>
    </div>
    <?php include 'js.php' ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#dataTable').DataTable();

        let totalBobot = 0;
        $('.bobot').each(function() {
            totalBobot += parseFloat($(this).text());
        });

        if (totalBobot === 100) {
            $('#message').html(
                '<div class="alert alert-success">Total Bobot berjumlah 100. Tidak ada error</div>');
        } else {
            $('#message').html('<div class="alert alert-warning">Total bobot harus 100. Saat ini: ' +
                totalBobot + '</div>');
        }
    });
    </script>
</body>

</html>