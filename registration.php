<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<style>
	
	#registration {
		margin: 100px 0px 0px 100px;
	}
	
</style>
</head>
<body>
	<?php
		require_once 'backend/user_functions.php';
		if(isset($_POST['user_name']) AND isset($_POST['user_password']) AND isset($_POST['user_email'])){
			$result = add_user($_POST['user_email'], $_POST['user_id'], $_POST['user_password']);
			if($result === TRUE)
			{
				echo 'ADDED NEW USER';
			} else { echo $result; }
		}
	?>
	<form method="post" id="registration">
		<label for="user_name">ID:</label>
			<input type="text" name="user_id" id="user_name"/><br/>
		<label for="user_password">Password:</label>
			<input type="password" name="user_password" id="user_password"/><br/>
		<label for="user_email">Email:</label>
			<input type="text" name="user_email" id="user_email"/><br/>
		<button type="submit" class="btn btn-success">CREATE</button>
	</form>
<script>
	$(function(){
		// handle the submit event by validating our fields first
		$('#registration').submit(function(){
			var patt_name = /^[A-Za-z0-9]{6,20}$/;
			var patt_email = /^[A-Za-z0-9_\.]+@[A-Za-z0-9]+\.(com|org|net)$/;
			var patt_password = /^[A-Za-z0-9]{6,12}$/;
			var patt_capital = /[A-Z]+/;
			var patt_number = /[0-9]+/;
		
			//the ^ signifies that the beginning, $ <-this defines the end, these ^ $ combined mean it must match from beginning to end
			// is [^~] the ^ is inside the brackets it will EXCLUDE these values
			//[~]{n,m} match min = n , max = m
			//[~]{n,}
			//[~]{n}
			//[~]{,m}
			//[4,10] 4 is minimum(required), 10 is maximum(optional)
			var user_name = $('#user_name').val();
				if(!patt_name.test(user_name)){
					alert('error with username')
					return false;
				}
			
			var user_password = $('#user_password').val();
				if(!patt_password.test(user_password) || !patt_capital.test(user_password) || !patt_number.test(user_password)){
					alert('error with password')
					return false;
				}
				
			var user_email = $('#user_email').val();
				if(!patt_email.test(user_email)){
					alert('error with email')
					return false;
				}	
		});
	});
</script>
</body>
</html>