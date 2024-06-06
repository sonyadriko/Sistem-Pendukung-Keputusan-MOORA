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
    <title>Dashboard</title>
    <?php include 'scripts.php' ?>
</head>

<body>
    <?php include 'sidebar.php' ?>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <?php include 'header.php' ?>
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="row">
                    <h2><u>MOORA (Multi-Objective Optimization by Ratio Analysis)</u></h2>
                    <p class="mt-2">Selamat Datang, <?php echo $_SESSION['nama'] ?>!</p>
                    <p>Selamat datang di Sistem Pendukung Keputusan Pemilihan Handphone yang akan dicuci
                        gudangkan
                        dengan menggunakan Metode MOORA. MOORA adalah sebuah metode dalam multi-kriteria pengambilan
                        keputusan yang digunakan untuk menyelesaikan masalah yang melibatkan berbagai tujuan atau
                        kriteria. MOORA dikembangkan untuk memberikan solusi optimal dengan membandingkan rasio-rasio
                        dari kriteria yang telah dinormalisasi.</p>
                    <!-- <div class="col-sm-6 col-lg-3">
                        <div class="card mb-4 text-white bg-primary">
                            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="fs-4 fw-semibold">
                                        <?php // Query to get total items
                                            $sql = "SELECT COUNT(*) AS jumlah FROM handphone";
                                            $resultBarang = $conn->query($sql); 
                                            $hasilBarang = mysqli_fetch_array($resultBarang);
                                            echo "{$hasilBarang['jumlah']}";?>
                                    </div>
                                    <div>Handphone</div>
                                </div>

                            </div>
                            <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                            </div>
                        </div>
                    </div> -->
                    <!-- /.col-->
                    <!-- <div class="col-sm-6 col-lg-3">
                        <div class="card mb-4 text-white bg-info">
                            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="fs-4 fw-semibold">
                                        <?php // Query to get total items
                                            $sql = "SELECT COUNT(*) AS jumlah FROM kriteria";
                                            $resultBarang = $conn->query($sql); 
                                            $hasilBarang = mysqli_fetch_array($resultBarang);
                                            echo "{$hasilBarang['jumlah']}";?>
                                    </div>
                                    <div>Kriteria</div>
                                </div>
                            </div>
                            <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                </div>
            </div>
        </div> -->
                    <!-- /.col-->
                </div>
                <!-- /.row-->
                <!-- /.card.mb-4-->
            </div>
        </div>
        <?php include 'footer.php' ?>
    </div>
    <?php include 'js.php'?>

</body>

</html>