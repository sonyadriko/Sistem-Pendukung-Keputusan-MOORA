<?php
include '../config/database.php';
session_start();
if (!isset($_SESSION['id_users'])) {
    header('Location: login.php');
}
$id_data = $_GET['GetID'];
$query = mysqli_query($conn, "SELECT * FROM handphone WHERE id_handphone = '".$id_data."'");
while($row = mysqli_fetch_assoc($query)){
    $nama = $row['merk'];
    $harga = $row['harga'];
    $daya = $row['daya_tahan'];
    $sistem = $row['sistem_operasi'];
    $ram = $row['ram'];
    $tahun = $row['tahun_launching'];
    $memori = $row['memori_internal'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Data Handphone</title>
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
                            <div class="card-header">Edit Data Handphone</div>
                            <div class="card-body">
                                <form action="edit_data.php?GetID=<?php echo $id_data; ?>" method="post">
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label" for="merk">Merk Handphone</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="merk" value="<?php echo $nama; ?>"
                                                name="merk" type="text" placeholder="Enter Merk Handphone" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label" for="harga">Harga</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="harga" value="<?php echo $harga; ?>"
                                                name="harga" type="number" placeholder="Enter Harga" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label" for="daya_tahan">Daya Tahan Baterai
                                            (mAH)</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="daya_tahan" value="<?php echo $daya; ?>"
                                                name="daya_tahan" type="number" placeholder="Enter Daya Tahan" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label" for="sistem_operasi">Sistem
                                            Operasi</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="sistem_operasi" name="sistem_operasi"
                                                required>
                                                <option value="Android 8.0"
                                                    <?php if ($sistem == "Android 8.0") echo "selected"; ?>>Android 8.0
                                                </option>
                                                <option value="Android 8.1 (Oreo)"
                                                    <?php if ($sistem == "Android 8.1 (Oreo)") echo "selected"; ?>>
                                                    Android 8.1 (Ore)</option>
                                                <option value="Android 9.0 (Pie)"
                                                    <?php if ($sistem == "Android 9.0 (Pie)") echo "selected"; ?>>
                                                    Android 9.0 (Pie)</option>
                                                <option value="Android 10 (Q)"
                                                    <?php if ($sistem == "Android 10 (Q)") echo "selected"; ?>>Android
                                                    10 (Q)</option>
                                                <option value="Android 11"
                                                    <?php if ($sistem == "Android 11") echo "selected"; ?>>Android 11
                                                </option>
                                                <option value="Android 12"
                                                    <?php if ($sistem == "Android 12") echo "selected"; ?>>Android 12
                                                </option>
                                                <!-- Add more options based on your data -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label" for="ram">RAM</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="ram" name="ram" required>
                                                <option value="2GB/3GB"
                                                    <?php if ($ram == "2GB/3GB") echo "selected"; ?>>2GB/3GB</option>
                                                <option value="3GB/4GB"
                                                    <?php if ($ram == "3GB/4GB") echo "selected"; ?>>3GB/4GB</option>
                                                <option value="4GB/6GB"
                                                    <?php if ($ram == "4GB/6GB") echo "selected"; ?>>4GB/6GB</option>
                                                <option value="6GB/8GB"
                                                    <?php if ($ram == "6GB/8GB") echo "selected"; ?>>6GB/8GB</option>
                                                <option value="8GB/12GB"
                                                    <?php if ($ram == "8GB/12GB") echo "selected"; ?>>8GB/12GB</option>
                                                <!-- Add more options based on your data -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label" for="tahun_launching">Tahun
                                            Launching</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="tahun_launching" name="tahun_launching"
                                                required>
                                                <option value="2014/2015"
                                                    <?php if ($tahun == "2014/2015") echo "selected"; ?>>2014/2015
                                                </option>
                                                <option value="2016/2017"
                                                    <?php if ($tahun == "2016/2017") echo "selected"; ?>>2016/2017
                                                </option>
                                                <option value="2018/2019"
                                                    <?php if ($tahun == "2018/2019") echo "selected"; ?>>2018/2019
                                                </option>
                                                <option value="2020/2021"
                                                    <?php if ($tahun == "2020/2021") echo "selected"; ?>>2020/2021
                                                </option>
                                                <option value="2022/2023"
                                                    <?php if ($tahun == "2022/2023") echo "selected"; ?>>2022/2023
                                                </option>
                                                <!-- Add more options based on your data -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label" for="memori_internal">Memori
                                            Internal</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="memori_internal" name="memori_internal"
                                                required>
                                                <option value="16GB/32GB"
                                                    <?php if ($memori == "16GB/32GB") echo "selected"; ?>>16GB/32GB
                                                </option>
                                                <option value="32GB/64GB"
                                                    <?php if ($memori == "32GB/64GB") echo "selected"; ?>>32GB/64GB
                                                </option>
                                                <option value="64GB/128GB"
                                                    <?php if ($memori == "64GB/128GB") echo "selected"; ?>>64GB/128GB
                                                </option>
                                                <option value="128GB/256GB"
                                                    <?php if ($memori == "128GB/256GB") echo "selected"; ?>>128GB/256GB
                                                </option>
                                                <option value="256GB/512GB"
                                                    <?php if ($memori == "256GB/512GB") echo "selected"; ?>>256GB/512GB
                                                </option>
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

    $updateData = "UPDATE handphone SET 
                   merk = '$merk', 
                   harga = '$harga', 
                   daya_tahan = '$daya_tahan', 
                   sistem_operasi = '$sistem_operasi', 
                   ram = '$ram', 
                   tahun_launching = '$tahun_launching', 
                   memori_internal = '$memori_internal' 
                   WHERE id_handphone = '$id_data'";

    $updateResult = mysqli_query($conn, $updateData);

    if ($updateResult) {
        echo "<script>alert('Berhasil mengedit data handphone.')</script>";
        echo "<script>window.location.href = 'data.php';</script>";
        // Alternatively, you can use: echo "<script>location.reload();</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>