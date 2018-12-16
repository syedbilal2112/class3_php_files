<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="bootstrap.min.css">
<script src="jquery.js"></script>
<script src="bootstrap.min.js"></script>
</head>
<body>
	<?php 
		$email = $_GET['email'];
		session_start();
		if(!isset($_SESSION[$email])) { 
		   header("location: login.php");
		   exit; 
		}
	?>

	<form>

		<input type="text" name="name" placeholder="Enter your name" class="form-control" id="name">
		<input type="email" name="email" placeholder="Enter your email" class="form-control" id="email">
		<input type="password" name="password" placeholder="Enter your password" class="form-control" id="password">
		<input type="button" name="submit" value="Register" class="btn btn-primary" id="button">

	</form>

<table class="table" id="history_display">
    <thead>
     <th>ID</th>
      <th>Name</th>
      <th>email</th>
      <th>Password</th>
      <th>Action</th>
    </thead>
</table>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Details</h4>
        </div>
        <div class="modal-body">
          <label> Name</label>
          <input  class="form-control" disabled type="text" id="name1" name="name"><br>
	<label> Email</label>
	<input  class="form-control" disabled type="email" id="email1" name="email"><br>
	<label> Password</label><input  class="form-control" disabled type="password" id="password1" name="password"><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<script type="text/javascript">
function dele(id){
		$.ajax({
				url:"delete.php",
				type:"post",
				data:{
					id:id
				},
				success:function(response){
					alert(response)
					call()
				},
				error:function(response){
					alert(response)
				}
			})
	}
	function view(id){
	$.ajax({
        url:'view1.php',
        type:'post',
        data:{
			"id":id
		},
		success: function(data){
			var obj=JSON.parse(data);

               $.each(obj,function(index,value){
			 $('#name1').val(value.name);
			 $('#email1').val(value.email);
			 $('#password1').val(value.password);
			$('#myModal').modal('show');
		});
		},
		error:function(){
			alert('not right')
		}
      })
	}
	$(function(){

		$('#button').click(function(){
			var name = $('#name').val()
			var email = $('#email').val()
			var password = $('#password').val()
			$.ajax({
				url:"insert.php",
				type:"post",
				data:{
					name:name,
					email:email,
					password:password
				},
				success:function(response){
					alert(response)
					call()
				},
				error:function(response){
					alert(response)
				}
			})
		})

		function call(){
			$.ajax({
				url:'view.php',
				type:'get',
				data:{

				},
				success: function(response){
					
					var obj=JSON.parse(response);

                        var table_content=""
                        $('#history_display').find( 'tr:not(:first)' ).remove();
                        $.each(obj,function(index,value){
                            table_content+="<tr>";
                            table_content+="<td>"+value.id+"</td>";
                            table_content+="<td>"+value.name+"</td>";
                            table_content+="<td>"+value.email+"</td>";
                            table_content+="<td>"+value.password+"</td>";
		// }
  table_content+="<td><a class='btn btn-primary' href='edit.php?id="+value.id+"'>Edit</a><button class='btn btn-danger' onclick='dele("+value.id+")'>Delete</button><button class='btn btn-primary' onclick='view("+value.id+")'>View</button></td>";
                            table_content+="</tr>";
                        });
                        $("#history_display").append(table_content);
				},
				error: function(){
					alert('Something went wrong');
				}
			})
		}
		call()
	})
</script>
</body>
</html>
