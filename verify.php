<?php

	include 'conn.php';
	$email = $_POST['email'];
	$password = $_POST['password'];
   $role = $_POST['role'];
	$query="SELECT password FROM `users` WHERE `email`='$email' AND `role` = '$role'";
	session_start();
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_row($result);
   	$user_given_password=$row[0];
   	if(password_verify($password, $user_given_password)){
   		$_SESSION[$email]=$email; 
   		header("location: index.php?email=$email");
         // echo "success";
   	}
   else{
   	$message="password or email address incorrect";
   		header("location: login.php?message=$message");
      // echo "failed";
   	
   }
   	
   	
?>