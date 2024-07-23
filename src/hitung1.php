<?php
include '../config/database.php';
session_start();
if (!isset($_SESSION['id_users'])) {
    header('Location: login.php');
}

$query = "SELECT SUM(bobot_kriteria) as totalBobot FROM kriteria";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$totalBobot = $row['totalBobot'];

$totalData = 0;
$selected_ids = isset($_GET['id_handphone']) ? $_GET['id_handphone'] : null;
var_dump($selected_ids);
if ($selected_ids) {
    $query = "SELECT COUNT(*) AS total FROM handphone WHERE id_handphone IN ($selected_ids)";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $totalData = $row['total'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hitung</title>
    <?php include 'scripts.php'; ?>
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- jQuery Library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <?php include 'header.php'; ?>
        <div class="body flex-grow-1 px-3">
            <?php if ($totalBobot == 100) { ?>
            <?php if ($totalData > 1) { ?>
            <div class="container-lg">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">Tabel Hasil Konversi</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <!-- <button class="mb-4">Tambah Data</button> -->
                                    <!-- <a href="tambah_kriteria.php" class="btn btn-primary btn-user mb-4">Tambah Kriteria</a> -->
                                    <table class="table table-bordered table-striped-columns" id="dataTable">
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
                                            $get_data = mysqli_query($conn, "SELECT * FROM handphone WHERE id_handphone IN ($selected_ids)");
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
                                                <td><?php if ($harga > 100000 && $harga < 1500000) {
                                                    $value_harga = '5';
                                                } elseif ($harga >= 1500000 && $harga < 2000000) {
                                                    $value_harga = '4';
                                                } elseif ($harga >= 2000000 && $harga < 2500000) {
                                                    $value_harga = '3';
                                                } elseif ($harga >= 2500000 && $harga < 3000000) {
                                                    $value_harga = '2';
                                                } elseif ($harga >= 3000000) {
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
                                                <td><?php if ($ram == '2GB') {
                                                    $value_ram = '5';
                                                } elseif ($ram == '3GB') {
                                                    $value_ram = '4';
                                                } elseif ($ram == '4GB') {
                                                    $value_ram = '3';
                                                } elseif ($ram == '6GB') {
                                                    $value_ram = '2';
                                                } elseif ($ram == '8GB') {
                                                    $value_ram = '1';
                                                }
                                                echo $value_ram;
                                                ?></td>
                                                <td><?php if ($tahun == '2019') {
                                                    $value_tahun = '5';
                                                } elseif ($tahun == '2020') {
                                                    $value_tahun = '4';
                                                } elseif ($tahun == '2021') {
                                                    $value_tahun = '3';
                                                } elseif ($tahun == '2022') {
                                                    $value_tahun = '2';
                                                } elseif ($tahun == '2023') {
                                                    $value_tahun = '1';
                                                }
                                                echo $value_tahun;
                                                ?></td>
                                                <td><?php if ($memori == '16GB') {
                                                    $value_memori = '5';
                                                } elseif ($memori == '32GB') {
                                                    $value_memori = '4';
                                                } elseif ($memori == '64GB') {
                                                    $value_memori = '3';
                                                } elseif ($memori == '128GB') {
                                                    $value_memori = '2';
                                                } elseif ($memori == '256GB') {
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
                </div>
                <!-- /.row-->
                <!-- /.card.mb-4-->
                <?php
                $no = 1;
                $data_harga = [];
                $data_daya = [];
                $data_sistem = [];
                $data_ram = [];
                $data_tahun = [];
                $data_memori = [];
                
                // Ambil data dari database
                $get_data = mysqli_query($conn, "SELECT * FROM handphone WHERE id_handphone IN ($selected_ids)");
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
                
                foreach ($data_harga as $harga) {
                    if ($harga > 100000 && $harga < 1500000) {
                        $value_harga = '5';
                    } elseif ($harga >= 1500000 && $harga < 2000000) {
                        $value_harga = '4';
                    } elseif ($harga >= 2000000 && $harga < 2500000) {
                        $value_harga = '3';
                    } elseif ($harga >= 2500000 && $harga < 3000000) {
                        $value_harga = '2';
                    } elseif ($harga >= 3000000) {
                        $value_harga = '1';
                    } else {
                        $value_harga = '0';
                    }
                
                    $sum_of_squares_harga += pow($value_harga, 2);
                    // echo $sum_of_squares_harga . '<br>';
                }
                
                foreach ($data_daya as $val) {
                    if ($val > 3000 && $val <= 4000) {
                        $value_daya = '5';
                    } elseif ($val > 4000 && $val <= 5020) {
                        $value_daya = '4';
                    } elseif ($val > 5020 && $val <= 5160) {
                        $value_daya = '3';
                    } elseif ($val > 5160 && $val <= 6000) {
                        $value_daya = '2';
                    } elseif ($val > 6000 && $val <= 7000) {
                        $value_daya = '1';
                    }
                    $sum_of_squares_daya += pow($value_daya, 2);
                    // echo $sum_of_squares_daya . '<br>';
                }
                
                foreach ($data_sistem as $sistem) {
                    if ($sistem == 'Android 8.0' && $sistem == 'Android 8.1 (Ore)') {
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
                    $sum_of_squares_sistem += pow($value_sistem, 2);
                    // echo $sum_of_squares_sistem . '<br>';
                }
                
                foreach ($data_ram as $ram) {
                    if ($ram == '2GB') {
                        $value_ram = '5';
                    } elseif ($ram == '3GB') {
                        $value_ram = '4';
                    } elseif ($ram == '4GB') {
                        $value_ram = '3';
                    } elseif ($ram == '6GB') {
                        $value_ram = '2';
                    } elseif ($ram == '8GB') {
                        $value_ram = '1';
                    }
                    $sum_of_squares_ram += pow($value_ram, 2);
                    // echo $sum_of_squares_ram . '<br>';
                }
                
                foreach ($data_tahun as $tahun) {
                    if ($tahun == '2019') {
                        $value_tahun = '5';
                    } elseif ($tahun == '2020') {
                        $value_tahun = '4';
                    } elseif ($tahun == '2021') {
                        $value_tahun = '3';
                    } elseif ($tahun == '2022') {
                        $value_tahun = '2';
                    } elseif ($tahun == '2023') {
                        $value_tahun = '1';
                    }
                    $sum_of_squares_tahun += pow($value_tahun, 2);
                    // echo $sum_of_squares_tahun . '<br>';
                }
                
                foreach ($data_memori as $memori) {
                    if ($memori == '16GB') {
                        $value_memori = '5';
                    } elseif ($memori == '32GB') {
                        $value_memori = '4';
                    } elseif ($memori == '64GB') {
                        $value_memori = '3';
                    } elseif ($memori == '128GB') {
                        $value_memori = '2';
                    } elseif ($memori == '256GB') {
                        $value_memori = '1';
                    }
                    $sum_of_squares_memori += pow($value_memori, 2);
                    // echo $sum_of_squares_memori . '<br>';
                }
                
                // Hitung panjang vektor untuk masing-masing kriteria
                $panjang_vektor_harga = sqrt($sum_of_squares_harga);
                $panjang_vektor_daya = sqrt($sum_of_squares_daya);
                $panjang_vektor_sistem = sqrt($sum_of_squares_sistem);
                $panjang_vektor_ram = sqrt($sum_of_squares_ram);
                $panjang_vektor_tahun = sqrt($sum_of_squares_tahun);
                $panjang_vektor_memori = sqrt($sum_of_squares_memori);
                ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kriteria</th>
                            <th>Hasil Normalisasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>K1</td>
                            <td><?php echo $panjang_vektor_harga; ?></td>
                        </tr>
                        <tr>
                            <td>K2</td>
                            <td><?php echo $panjang_vektor_daya; ?></td>
                        </tr>
                        <tr>
                            <td>K3</td>
                            <td><?php echo $panjang_vektor_sistem; ?></td>
                        </tr>
                        <tr>
                            <td>K4</td>
                            <td><?php echo $panjang_vektor_ram; ?></td>
                        </tr>
                        <tr>
                            <td>K5</td>
                            <td><?php echo $panjang_vektor_tahun; ?></td>
                        </tr>
                        <tr>
                            <td>K6</td>
                            <td><?php echo $panjang_vektor_memori; ?></td>
                        </tr>
                    </tbody>
                </table>


                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">Tabel Nilai Normalisasi</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped-columns" id="dataTable2">
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

                                            $normalizedValues = [];
                                            $normalisasi_harga_arr = array();
                                            $normalisasi_daya_arr = array();
                                            $normalisasi_sistem_arr = array();
                                            $normalisasi_ram_arr = array();
                                            $normalisasi_tahun_arr = array();
                                            $normalisasi_memori_arr = array();

                                            $get_data = mysqli_query($conn, "SELECT * FROM handphone WHERE id_handphone IN ($selected_ids)");
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
                                                <td><?php if ($harga > 100000 && $harga < 1500000) {
                                                    $value_harga = '5';
                                                } elseif ($harga >= 1500000 && $harga < 2000000) {
                                                    $value_harga = '4';
                                                } elseif ($harga >= 2000000 && $harga < 2500000) {
                                                    $value_harga = '3';
                                                } elseif ($harga >= 2500000 && $harga < 3000000) {
                                                    $value_harga = '2';
                                                } elseif ($harga >= 3000000) {
                                                    $value_harga = '1';
                                                } else {
                                                    $value_harga = '0';
                                                }
                                                $normalisasi_harga = $value_harga / $panjang_vektor_harga;
                                                echo $normalisasi_harga;
                                                $normalisasi_harga_arr[] = $normalisasi_harga;
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
                                                $normalisasi_daya = $value_daya / $panjang_vektor_daya;
                                                echo $normalisasi_daya;
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
                                                $normalisasi_sistem = $value_sistem / $panjang_vektor_sistem;
                                                echo $normalisasi_sistem;
                                                ?></td>
                                                <td><?php if ($ram == '2GB') {
                                                    $value_ram = '5';
                                                } elseif ($ram == '3GB') {
                                                    $value_ram = '4';
                                                } elseif ($ram == '4GB') {
                                                    $value_ram = '3';
                                                } elseif ($ram == '6GB') {
                                                    $value_ram = '2';
                                                } elseif ($ram == '8GB') {
                                                    $value_ram = '1';
                                                }
                                                $normalisasi_ram = $value_ram / $panjang_vektor_ram;
                                                echo $normalisasi_ram;
                                                ?></td>
                                                <td><?php if ($tahun == '2019') {
                                                    $value_tahun = '5';
                                                } elseif ($tahun == '2020') {
                                                    $value_tahun = '4';
                                                } elseif ($tahun == '2021') {
                                                    $value_tahun = '3';
                                                } elseif ($tahun == '2022') {
                                                    $value_tahun = '2';
                                                } elseif ($tahun == '2023') {
                                                    $value_tahun = '1';
                                                }
                                                $normalisasi_tahun = $value_tahun / $panjang_vektor_tahun;
                                                echo $normalisasi_tahun;
                                                ?></td>
                                                <td><?php if ($memori == '16GB') {
                                                    $value_memori = '5';
                                                } elseif ($memori == '32GB') {
                                                    $value_memori = '4';
                                                } elseif ($memori == '64GB') {
                                                    $value_memori = '3';
                                                } elseif ($memori == '128GB') {
                                                    $value_memori = '2';
                                                } elseif ($memori == '256GB') {
                                                    $value_memori = '1';
                                                }
                                                $normalisasi_memori = $value_memori / $panjang_vektor_memori;
                                                echo $normalisasi_memori; ?></td>

                                                <?php $normalizedValues[] = [
                                                    'merk' => $merk,
                                                    'n1' => $normalisasi_harga,
                                                    'n2' => $normalisasi_daya,
                                                    'n3' => $normalisasi_sistem,
                                                    'n4' => $normalisasi_ram,
                                                    'n5' => $normalisasi_tahun,
                                                    'n6' => $normalisasi_memori,
                                                ]; ?>
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
                </div>


                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">Tabel Nilai Optimasi</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped-columns" id="dataTable">
                                        <thead>
                                            <th>No</th>
                                            <th>Merk</th>
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
                                            
                                            $bobot_kriteria = [];
                                            
                                            $q = mysqli_query($conn, 'SELECT bobot_kriteria FROM kriteria ORDER BY id_kriteria');
                                            while ($row = mysqli_fetch_assoc($q)) {
                                                $bobot_kriteria[] = floatval($row['bobot_kriteria']); // Cast to float to ensure the values are numerical
                                            }
                                            
                                            foreach ($normalizedValues as $data) {
                                                echo '<tr>';
                                                echo '<td class="text-truncate">' . $no . '</td>';
                                                echo '<td class="text-truncate">' . $data['merk'] . '</td>';
                                                echo '<td class="text-truncate">' . $data['n1'] * $bobot_kriteria[0] . '</td>';
                                                echo '<td class="text-truncate">' . $data['n2'] * $bobot_kriteria[1] . '</td>';
                                                echo '<td class="text-truncate">' . $data['n3'] * $bobot_kriteria[2] . '</td>';
                                                echo '<td class="text-truncate">' . $data['n4'] * $bobot_kriteria[3] . '</td>';
                                                echo '<td class="text-truncate">' . $data['n5'] * $bobot_kriteria[4] . '</td>';
                                                echo '<td class="text-truncate">' . $data['n6'] * $bobot_kriteria[5] . '</td>';
                                                echo '</tr>';
                                                $no++; // Increment $no here
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">Tabel Nilai Optimasi</div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped-columns">
                                    <thead>
                                        <th>No</th>
                                        <th>Merk</th>
                                        <th>Total</th>
                                        <th>Ranking</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rankedData = [];
                                        
                                        foreach ($normalizedValues as $data) {
                                            $total = $data['n1'] * $bobot_kriteria[0] + $data['n2'] * $bobot_kriteria[1] + $data['n3'] * $bobot_kriteria[2] + $data['n4'] * $bobot_kriteria[3] + $data['n5'] * $bobot_kriteria[4] + $data['n6'] * $bobot_kriteria[5];
                                        
                                            $rankedData[] = [
                                                'merk' => $data['merk'],
                                                'total' => $total,
                                            ];
                                        }
                                        
                                        // Sorting array based on 'total' in descending order
                                        usort($rankedData, function ($a, $b) {
                                            return $b['total'] <=> $a['total'];
                                        });
                                        
                                        $alternatif_nilai_akhir_encoded = [];
                                        
                                        $rank = 1;
                                        foreach ($rankedData as $ranked) {
                                            echo '<tr>';
                                            echo '<td class="text-truncate">' . $rank . '</td>';
                                            echo '<td class="text-truncate">' . $ranked['merk'] . '</td>';
                                            echo '<td class="text-truncate">' . $ranked['total'] . '</td>';
                                            echo '<td class="text-truncate">' . $rank . '</td>';
                                            echo '</tr>';
                                            $rank++;
                                        
                                            $item = [
                                                'nama' => $ranked['merk'],
                                                'nilai_akhir' => $ranked['total'],
                                                'ranking' => $rank - 1,
                                            ];
                                        
                                            $alternatif_nilai_akhir_encoded[] = $item;
                                        }
                                        
                                        // Convert the array to JSON
                                        $alternatif_nilai_akhir_json = json_encode($alternatif_nilai_akhir_encoded);
                                        // echo $alternatif_nilai_akhir_json;
                                        // console.log($alternatif_nilai_akhir_json);
                                        ?>
                                    </tbody>
                                </table>
                                <script>
                                var hasilhitungjson = <?php echo json_encode($alternatif_nilai_akhir_encoded); ?>;
                                console.log(hasilhitungjson);
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">Input Nama Uji</div>
                            <div class="card-body">
                                <label>Nama Uji : </label>
                                <input type="text" id="nama_uji" placeholder="Masukkan Nama Uji">
                            </div>
                        </div>
                    </div>
                </div>
                <button id="saveButton" style="color: white;" class="btn btn-success mb-4"
                    onclick="saveData()">Save</button>
                <?php } else { ?>
                <div class="alert alert-danger d-flex justify-content-between align-items-center" role="alert">
                    <span>Pilih lebih dari satu handphone untuk melakukan perhitungan.</span>
                    <a href="cek_hitung.php" class="btn btn-primary btn-sm">Kembali</a>
                </div>

                <?php } ?>
                <?php } else { ?>
                <div class="alert alert-danger d-flex justify-content-between align-items-center" role="alert">
                    Bobot kriteria harus sama dengan 100.
                    <a href="kriteria.php" class="btn btn-primary btn-sm">Kembali</a>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </div>
    <?php include 'js.php' ?>
    <script>
    $(document).ready(function() {
        $('.table').DataTable();
    });
    $(document).ready(function() {
        $('.table2').DataTable();
    });
    </script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var hasilhitung = [];
        const saveButton = document.getElementById('saveButton');
        if (saveButton) {
            console.log('Button Disabled:', saveButton.disabled);
        }

        document.addEventListener("submit", function(event) {
            event.preventDefault();
            saveData(); //Pass hasilhitung
        });

    });

    async function saveData() {
        const nama_uji = document.getElementById('nama_uji').value;
        if (!nama_uji) {
            swal("Error!", "Nama Uji harus diisi.", "error");
            return; // Menghentikan proses pengiriman data jika input tidak diisi
        }
        const date = new Date();
        date.setUTCHours(date.getUTCHours() + 7);
        var data = {
            nama_uji: nama_uji,
            tanggal: date
        };
        try {
            const response = await fetch('save_data.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            });

            if (!response.ok) {
                throw new Error('Network response wasn\'t ok');
            }

            const textData = await response.text();
            console.log('Data hasil dari server: ', textData);

            if (textData.trim() == '') {
                console.error('Empty response from server.');
                return;
            }

            const parsedData = JSON.parse(textData);
            console.log('Data hasil berhasil di-parse:', parsedData);

            var hasilhitung = hasilhitungjson || [];
            document.getElementById('saveButton').disabled = true;
            saveDataDetail(parsedData.last_id, hasilhitung);

            swal("Success!", "Data berhasil disimpan.", "success");

        } catch (error) {
            console.error('Error:', error);
            swal("Error!", "Terjadi kesalahan saat menyimpan data.", "error");
        }
    }

    function saveDataDetail(idHasil, hasilhitung) {
        var detailDataArray = [];

        hasilhitung.forEach(rule => {
            var detailData = {
                id_hasil: idHasil,
                nama_alternatif: rule.nama,
                number: rule.nilai_akhir,
                rank: rule.ranking,
            };
            detailDataArray.push(detailData);

        })
        console.log(detailDataArray);

        fetch('save_data_detail.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    detailDataArray
                }),
            })
            .then(response => response.json())
            .then(data => {
                console.log('Data detail hasil successfully saved:', data);
                setTimeout(function() {
                    document.getElementById('saveButton').disabled = true;
                }, 100);
            })
            .catch(error => {
                console.error('Error:', error);
            })
    }
    </script>
</body>

</html>