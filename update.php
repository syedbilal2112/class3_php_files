<?php 
	include "conn.php";
	
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = "UPDATE `users` SET `name` = '$name', `email` = '$email' , `password` = '$password' WHERE `id` = '$id'";
	$result = mysqli_query($con,$query);

	if($result){
		echo "successfully Updated";
	}
	else{
		echo "failed to Update";
	}

 ?>