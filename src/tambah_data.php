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
    <title>Tambah Data Handphone</title>
    <?php include 'scripts.php' ?>
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
                                        <label class="col-sm-2 col-form-label" for="daya_tahan">Daya Tahan Baterai
                                            (mAH)</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="daya_tahan" name="daya_tahan" type="number"
                                                placeholder="Enter Daya Tahan">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="sistem_operasi">Sistem
                                            Operasi</label>
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
                                                <option value="2GB">2GB</option>
                                                <option value="3GB">3GB</option>
                                                <option value="4GB">4GB</option>
                                                <option value="6GB">6GB</option>
                                                <option value="8GB">8GB</option>
                                                <!-- Add more options based on your data -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="tahun_launching">Tahun
                                            Launching</label>
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
                                        <label class="col-sm-2 col-form-label" for="memori_internal">Memori
                                            Internal</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="memori_internal" name="memori_internal">
                                                <option value="16GB">16GB</option>
                                                <option value="32GB">32GB</option>
                                                <option value="64GB">64GB</option>
                                                <option value="128GB">128GBB</option>
                                                <option value="256GB">256GB</option>
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
    <?php include 'js.php' ?>





</body>

</html>
<?php 
    include '../config/database.php';

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