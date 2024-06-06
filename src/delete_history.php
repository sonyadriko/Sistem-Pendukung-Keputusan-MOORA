<?php 
	
	include '../config/database.php';

	if (isset($_GET['Del'])) {
		// code...
		$id_alternatif = $_GET['Del'];
		$query = "DELETE FROM hasil WHERE id_hasil = '".$id_alternatif."'";
		$result = mysqli_query($conn, $query);

		if ($result) {
			// code...
			header("Location:history.php");
		}else {
			echo "Please Check Again";
		}
	}
?>