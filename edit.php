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
		$id  = $_GET['id'];
		include "conn.php";
		$query="SELECT * FROM `users` WHERE `id` = $id";
		$result=mysqli_query($con,$query);
		while($row=mysqli_fetch_assoc($result)){
			$name=$row['name'];
			$email=$row['email'];
			$password=$row['password'];
			$profile_pic=$row['profile_pic'];
		}
	?>
	<form>
		<input type="hidden" name="id" value="<?php echo $id;?>" id="id">
		<input type="text" name="name" placeholder="Enter your name" class="form-control" id="name" value="<?php echo $name;?>">
		<input type="email" name="email" placeholder="Enter your email" class="form-control" id="email" value="<?php echo $email;?>">
		<img src="<?php echo $profile_pic;?>" id="profile_pic" style="border-radius: 50%" height="200px" width="200px">
		<input type="file" name="files[]" id="file" accept="*" required>
		<input type="button" name="update" value="Update Profile Pic" id="upload_profile_pic" class="btn">
		<br><br>
		<input type="button" name="submit" value="Update" class="btn btn-primary" id="button">
		

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
	$(function(){

                $('#file').on('change', function () {
                    var file_data = $('#file').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('file', file_data);
                    $.ajax({
                        url: 'upload.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                        
                            alert(response)
                            document.getElementById("profile_pic").src=response;
                            x=response;

                           
                        },
                        error: function (response) {
                          
                           alert(response);
                        }
                    });
                });
		    $('#upload_profile_pic').on('click', function () {
				var id=$("#id").val();
                var profile=x;
                   
                $.ajax({
                    url:"update_profile_pic.php",
                    type:"post",
                    data:{
                        "id":id,
                        "profile":profile
                    },
                    success:function(data){
                      alert(data);
                     // window.reload();   
                      },
                      error:function(){
                        alert(';hi');
                      }
                }); 
      		});


		$('#button').click(function(){
			var id = $('#id').val()
			var name = $('#name').val()
			var email = $('#email').val()
			var password = $('#password').val()
			$.ajax({
				url:"update.php",
				type:"post",
				data:{
					name:name,
					email:email,
					password:password,
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