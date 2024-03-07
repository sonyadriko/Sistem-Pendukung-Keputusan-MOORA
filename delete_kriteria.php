<?php 
	
	include 'koneksi.php';

	if (isset($_GET['Del'])) {
		// code...
		$id_alternatif = $_GET['Del'];
		$query = "DELETE FROM kriteria WHERE id_kriteria = '".$id_alternatif."'";
		$result = mysqli_query($conn, $query);

		if ($result) {
			// code...
			header("Location:kriteria.php");
		}else {
			echo "Please Check Again";
		}
	}
?>