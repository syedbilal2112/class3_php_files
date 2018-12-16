<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel="stylesheet" href="bootstrap.min.css">
<script src="jquery.js"></script>
<script src="bootstrap.min.js"></script>
</head>
<body>
	<div style="height: 250px;width: 400px;margin:auto;border: 2px solid #eee; padding: 20px ">
		<?php 
		if(isset($_GET['message'])){
			$message = $_GET['message'];
			?>
		<div class="alert alert-danger">
			<?php echo $message;?>
		</div>
	<?php }
	?>
	<form action="verify.php" method="post">

		<input type="email" name="email" placeholder="Enter your email" class="form-control"><br>
		<input type="password" name="password" placeholder="Enter your password" class="form-control"><br>
		<select name="role" class="form-control">
			<option>Select Role</option>
			<option value="admin">Admin</option>
			<option value="user">User</option>
		</select>
		<br>
		<input type="submit" name="submit" value="Login" class="btn btn-primary">

	</form>
	</div>

</body>
</html>