<?php 
	include "conn.php";

	$id = $_POST['id'];
	

	$query = "DELETE from `users` WHERE `id` = '$id'";
	$result = mysqli_query($con,$query);

	if($result){
		echo "Successfully Deteted";
	}
	else{
		echo "Failed to Detete";
	}

 ?>