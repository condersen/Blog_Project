<form id="blog_post" method="post">
	<div class="form-group">
		<h1><small>Title</small></h1>
		<input type="text" name="post_title" id="post_title" class="form-control" value="<?php echo $post['title']; ?>"></input>
	</div>
	<div class="form-group">
		<h1><small>Body</small></h1>
		<textarea class="form-control" name="post_body" id="post_content" rows="10"><?php echo $post['body']; ?></textarea>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-5 col-sm-10">
			<button type="submit" class="btn btn-default">Submit</button>
		</div>
	</div>
</form>