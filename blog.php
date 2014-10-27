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
<script></script>
<form id="registration">
	<label for="username">ID:</label>
	<input type="text" name="user_id" id="username"/><br/>
	<label for="userpass">Password:</label>
	<input type="password" name="user_password" id="userpass"/><br/>
	<label for="useremail">Email:</label>
	<input type="text" name="user_email" id="useremail"/><br/>
	<button type="submit" class="btn btn-success">CREATE</button>
</form>
<script>
	$(function(){
		// handle the submit event by validating our fields first
		$('#registration').submit(function(){
			var usernameinput = /^[A-Za-z0-9]{6,20}$/;
			var useremailinput = /^[A-Za-z0-9_\.]+@[A-Za-z0-9]+\.(com|org|net)$/;
			var userpassinput = /^[A-Za-z0-9]{6,12}$/;
			var Userpassinput = /^[A-Z]+$/;
			var Userpassinput0 = /^[0-9]+$/;
		
		
		
		
		
		
		
			//the ^ signifies that the beginning, $ <-this defines the end, these ^ $ combined mean it must match from beginning to end
			// is [^~] the ^ is inside the brackets it will EXCLUDE these values
			//[~]{n,m} match min = n , max = m
			//[~]{n,}
			//[~]{n}
			//[~]{,m}
			//[4,10] 4 is minimum(required), 10 is maximum(optional)
			var username = $('#username').val();
				if (!usernameinput.test(username)){
					alert('error with username')
					return false;
				}
			
			var userpass = $('#userpass').val();
				if (!userpassinput.test(userpass) || !Userpassinput.test(userpass) || !Userpassinput0.test(userpass)){
					alert('error with password')
					return false;
				}
				
			var useremail = $('#useremail').val();
				if (!useremailinput.test(useremail)){
					alert('error with email')
					return false;
				}	
		});
	});
</script>
</body>
</html>