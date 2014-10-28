<?php
if (isset($_POST['username']) OR isset($_POST['email'])) {
	include '../backend/user_functions.php';

	if (isset($_POST['username]']) AND !empty($_POST['username']))
		;
} else {
	if (isset($_POST['email']) AND !empty($_POST['email']))
		;
}
?>