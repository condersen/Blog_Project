<?php
include 'adminTemplates/headerTemplate.php';
?>
<?php
	include '../backend/post_functions.php';
	$posts = get_post();
?>
<div class="col-lg-12">
	<h1 class="page-header"> Create Post <small>Subheading</small></h1>
	<ol class="breadcrumb">
		<li>
			<i class="fa fa-dashboard"></i><a href="index.php">Dashboard</a>
		</li>
		<li class="active">
			<i class="fa fa-file"></i> Create Post
		</li>
	</ol>
	<div>
		<?php
		
		require_once '../backend/post_functions.php';
		if (isset($_POST['post_title']) AND isset($_POST['post_body'])) {
			
			$picture = '';
			//check that $_FILES['photo'] is set and there are no errors
			if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0) {
				
				//move the temporary file to the final location
				move_uploaded_file($_FILES['photo']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . './img/headers/' . $_FILES['photo']['name']);
				//assign the filename to $picture
				$picture = $_FILES['photo']['name'];
			}

			$result = add_post($_POST['post_title'], $_POST['post_body'], $_SESSION['user']['user_id'], $picture);
			if (is_array($result)) {
				echo '<h1><small>Post succesfully added!</small></h1>';
			} else { echo $result;
			}
		}
		?>
		<?php
			include 'adminTemplates/postForm.php';
		?>
	</div>
</div>
<?php
	include 'adminTemplates/footerTemplate.php';
?>
<script>
	$(function() {
		$('#blog_post').submit(function() {
			var post_title = $('#post_title').val();
			var post_content = $('#post_content').val();
		});
	}); 
</script>
</body>
</html>