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
                            <div class="card-header">Data History</div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped-columns" id="dataTable">
                                    <thead>
                                        <!-- <th>Pengujian ke</th> -->
                                        <th>Nama Uji</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                $no = 1;
                $get_data = mysqli_query($conn, "select * from hasil");
                while($display = mysqli_fetch_array($get_data)) {
                    $id = $display['id_hasil'];
                    $nama_uji = $display['nama_uji'];
                    $tanggal = $display['tanggal'];
                ?>
                                        <tr>
                                            <!-- <td><?php echo $id ?></td> -->
                                            <td><?php echo $nama_uji ?></td>
                                            <!-- <td><?php echo $tanggal ?></td> -->
                                            <td><?php echo (new DateTime($tanggal))->format('d-m-Y H:i:s'); ?></td>

                                            <td>
                                                <a href='detail_history.php?GetID=<?php echo $id; ?>'
                                                    style="text-decoration: none; list-style: none;"><input
                                                        type='submit' value='Detail' id='editbtn'
                                                        class="btn btn-primary btn-user"></a>
                                                <a href='delete_history.php?Del=<?php echo $id; ?>'
                                                    style="text-decoration: none; color: #ffffff; list-style: none;"><input
                                                        type='submit' value='Hapus' id='delbtn'
                                                        class="btn btn-danger btn-user"></a>
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
    });
    </script>
</body>

</html>