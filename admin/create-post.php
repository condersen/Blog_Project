<?php include 'adminTemplates/headerTemplate.php'; ?>
<div class="col-lg-12">
    <h1 class="page-header">
        Create Post
        <small>Subheading</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
        </li>
        <li class="active">
            <i class="fa fa-file"></i> Create Post
        </li>
    </ol>
    <div>
    	<?php
			require_once '../backend/post_functions.php';
			if(isset($_POST['post_title']) AND isset($_POST['post_body'])){
				$result = add_post($_POST['post_title'], $_POST['post_body'], $_SESSION['user']['user_id']);
				if(is_array($result))
				{
					echo '<h1><small>Post succesfully added!</small></h1>';
				} else { echo $result; }
			}
		?>
    	<?php include 'adminTemplates/postForm.php'; ?>
    </div>
</div>
<?php include 'adminTemplates/footerTemplate.php'; ?>
<script>
	$(function(){
		$('#blog_post').submit(function(){
			var post_title = $('#post_title').val();
			var post_content = $('#post_content').val();
		});
	});
</script>
</body>
</html>