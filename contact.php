<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

	<form action="mailer/index.php" method="get">

		<input type="text" name="name" placeholder="Enter your name" class="form-control">
		<input type="email" name="email" placeholder="Enter your email" class="form-control">
		<input type="number" name="phone_no" placeholder="Enter your phone_no" class="form-control">
		<textarea name="comment" placeholder="Enter your comment"></textarea>
		<input type="submit" name="submit" value="Submit" class="btn btn-primary">

	</form>


</body>
</html>