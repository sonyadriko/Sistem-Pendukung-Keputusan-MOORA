<?php 
	
	include '../config/database.php';

	if (isset($_GET['Del'])) {
		// code...
		$id_alternatif = $_GET['Del'];
		$query = "DELETE FROM handphone WHERE id_handphone = '".$id_alternatif."'";
		$result = mysqli_query($conn, $query);

		if ($result) {
			// code...
			header("Location:data.php");
		}else {
			echo "Please Check Again";
		}
	}
?>