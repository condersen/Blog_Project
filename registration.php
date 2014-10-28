<?php
include 'template/header.php';
?>

<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('img/contact-bg.jpg')">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
				<div class="page-heading">
					<h1>Register</h1>
					<hr class="small">
					<span class="subheading">Have questions? I have answers (maybe).</span>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- Main Content -->
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<p>
				Want to get in touch with me? Fill out the form below to send me a message and I will try to get back to you within 24 hours!
			</p>
			<!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
			<!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
			<!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
			<div id="message-container"></div>
			<form name="sentMessage" id="registration" novalidate method="post">
				<div class="row control-group">
					<div class="form-group col-xs-12 floating-label-form-group controls">
						<label for="user_name">Username</label>
						<input type="text" name="user_name" class="form-control" placeholder="Username" id="user_name" required data-validation-required-message="Please enter a username.">
						<p class="help-block text-danger"></p>
					</div>
				</div>
				<div class="row control-group">
					<div class="form-group col-xs-12 floating-label-form-group controls">
						<label for="user_password">Password</label>
						<input type="password" name="user_password" class="form-control" placeholder="Password" id="user_password" required data-validation-required-message="Please enter a password.">
						<p class="help-block text-danger"></p>
					</div>
				</div>
				<div class="row control-group">
					<div class="form-group col-xs-12 floating-label-form-group controls">
						<label>Email Address</label>
						<input type="email" name="user_email" class="form-control" placeholder="Email Address" id="user_email" required data-validation-required-message="Please enter a valid email address.">
						<p class="help-block text-danger"></p>
					</div>
				</div>
				<br>
				<div id="success"></div>
				<div class="row">
					<div class="form-group col-xs-12">
						<button type="submit" class="btn btn-success">
							Create
						</button>
					</div>
				</div>
			</form>
			<div>
				<h2>OR <a href="login.php">LOG IN</a></h2>
			</div>
		</div>
	</div>
</div>

<hr>

<!-- Footer -->
<?php
include 'template/footerTemplate.php';
?>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/clean-blog.js"></script>

<script>
	$(function() {
		$('username').blur(function() {
			//			alert('Exited username');
			var user_field = $(this);
			var data = {
				'username' : $(this).val()
			}
			$.post('ajax/unique_check.php', data, function(response) {
				if (response == 1) {
					user_field.addClass('alert-success').removeClass('alert-danger');
				} else {
					user_field.addClass('alert-danger').removeClass('alert-success');
				}
			});
		});
		// handle the submit event by validating our fields first
		$('#registration').submit(function() {
			var patt_name = /^[A-Za-z0-9]{4,30}$/;
			var patt_email = /^[A-Za-z0-9_\.]+@[A-Za-z0-9]+\.(com|org|net)$/;
			var patt_password = /^[A-Za-z0-9]{6,12}$/;
			var patt_capital = /[A-Z]+/;
			var patt_number = /[0-9]+/;
			
			
			var user_name = $('#user_name').val();
			if (!patt_name.test(user_name)) {
				return false;
			}

			var user_password = $('#user_password').val();
			if (!patt_password.test(user_password) || !patt_capital.test(user_password) || !patt_number.test(user_password)) {
				return false;
			}

			var user_email = $('#user_email').val();
			if (!patt_email.test(user_email)) {
				return false;
			}

			var data = {
				'user_name' : user_name,
				'user_password' : user_password,
				'user_email' : user_email
			}

			$.post('/ajax/registration.php', data, function(response) {
				if (response == 1) {
					var div = $('<div>').addClass('alert alert-success').html('Account registration successful');
				} else {
					var div = $('<div>').addClass('alert alert-danger').html(response);
				}
				$('#message-container').html(div);
			});

			return false;
		});
	});
</script>

</body>

</html>
