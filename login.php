<?php include 'template/header.php'; ?>

<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('img/contact-bg.jpg')">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
				<div class="page-heading">
					<h1>Log In</h1>
					<hr class="small">
					<span class="subheading"></span>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- Main Content -->
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			
			<!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
			<!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
			<!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
			<?php
			require_once 'backend/user_functions.php';
			if (isset($_POST['user_name']) AND isset($_POST['user_password'])) {
				$result = login_user($_POST['user_name'], $_POST['user_password']);
				if (is_array($result)) {
					header('Location: ' . $_GET{'url'});
				} else {
					header('Location: /');
				}
				exit ;
			} else {
				$message = '<div class="alert alert-danger">' . $result . '</div>';
			}
			?>
			<form name="sentMessage" id="registration" novalidate method="post">
				<div class="row control-group">
					<div class="form-group col-xs-12 floating-label-form-group controls">
						<label for="user_name">Username: </label>
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
				<h2>OR <a href="registration.php">REGISTER</a></h2>
			</div>
		</div>
	</div>
</div>

<hr>

<!-- Footer -->
<?php include 'template/footerTemplate.php'; ?>

