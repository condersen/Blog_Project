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
				$result = add_post($_POST['post_title'], $_POST['post_body'], $_SESSION['user_id']);
				if(is_array($result))
				{
					echo '<h1><small>Post succesfully added!</small></h1>';
				} else { echo $result; }
			}
		?>
    	<form id="blog_post" method="post">
    		<div class="form-group">
    			<h1><small>Title</small></h1>
    			<input type="text" name="post_title" id="post_title" class="form-control"></input>
    		</div>
    		<div class="form-group">
    			<h1><small>Write it out</small></h1>
    			<textarea class="form-control" name="post_body" id="post_content" rows="10"></textarea>
    		</div>
    		<div class="form-group">
    			<div class="col-sm-offset-5 col-sm-10">
    				<button type="submit" class="btn btn-default">Submit</button>
    			</div>
    		</div>
    	</form>
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