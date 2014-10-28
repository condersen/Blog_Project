<?php
	$response = '';
	
	if(isset($_POST['user_name']) AND isset($_POST['user_password']) AND isset($_POST['user_email']))
{
		include '../backend/user_functions.php';
		$result = add_user($_POST['user_email'], $_POST['user_name'], $_POST['user_password']);
	
		$response = $result;
	}
	else
	{
		$response = 'Required fields are missing';
	}
	echo $response;
?>