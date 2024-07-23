<?php
include '../config/database.php';
session_start();
if (!isset($_SESSION['id_users'])) {
    header('Location: login.php');
}
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Check if any checkboxes are selected
    if (!empty($_POST['selected_items'])) {
        // Redirect to hitung1.php with selected id_penilaian values
        $selected_ids = implode(",", $_POST['selected_items']);
        header("Location: hitung1.php?id_handphone=$selected_ids");
        exit;
    }
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
        <!-- </div> -->
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">Data Handphone</div>
                        <div class="card-body">
                            <!-- <a href="tambah_data.php" class="btn btn-primary btn-user mb-4">Tambah
                                Data</a> -->
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

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
                                                    <input type="checkbox" name="selected_items[]"
                                                        value="<?php echo $id ?>" class="action-checkbox">

                                                </td>

                                            </tr>
                                            <?php
                                            $no++;
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <input type="submit" name="submit" value="Hitung" class="btn btn-primary btn-user">
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
    <?php include 'js.php' ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

</body>

</html>