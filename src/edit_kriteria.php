<?php
include '../config/database.php';
session_start();
if (!isset($_SESSION['id_users'])) {
    header('Location: login.php');
}
$id_data = $_GET['GetID'];
$query = mysqli_query($conn, "SELECT * FROM kriteria WHERE id_kriteria = '".$id_data."'");
while($row = mysqli_fetch_assoc($query)){
    $nama = $row['nama_kriteria'];
    $bobot = $row['bobot_kriteria'];
    $tipe = $row['tipe_kriteria'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Data Kriteria</title>
    <?php include 'scripts.php' ?>
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <div class=" wrapper d-flex flex-column min-vh-100 bg-light">
        <?php include 'header.php'; ?>
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">Edit Data Kriteria</div>
                            <div class="card-body">
                                <form action="edit_kriteria.php?GetID=<?php echo $id_data; ?>" method="post">
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="nama">Nama Kriteria</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="nama" value="<?php echo $nama ?>"
                                                name="nama" type="text" placeholder="Enter Nama Kriteria">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="bobot">Bobot Kriteria</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="bobot" value="<?php echo $bobot?>"
                                                name="bobot" type="number" placeholder="Enter Bobot Kriteria">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="merk">Tipe Kriteria</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="tipe" value="<?php echo $tipe ?>"
                                                name="tipe" type="text" placeholder="Enter Tipe Kriteria">
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
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $bobot = mysqli_real_escape_string($conn, $_POST['bobot']);
    $tipe = mysqli_real_escape_string($conn, $_POST['tipe']);
  
    $updateData = "UPDATE kriteria SET nama_kriteria='$nama', bobot_kriteria='$bobot', tipe_kriteria='$tipe' WHERE id_kriteria='$id_data'";
    $updateResult = mysqli_query($conn, $updateData);

    if ($updateResult) {
        echo "<script>alert('Berhasil mengedit data kriteria.')</script>";
        echo "<script>window.location.href = 'kriteria.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>