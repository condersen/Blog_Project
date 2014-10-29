
<form id="blog_post" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<h1><small>Title</small></h1>
		<input type="text" name="post_title" id="post_title" class="form-control" value="<?php echo $post['title']; ?>"></input>
	</div>
	<div class="form-group">
		<h1><small>Body</small></h1>
		<textarea class="form-control" name="post_body" id="post_content" rows="10"><?php echo $post['body']; ?></textarea>
	</div>
	<div class="form-group">
			<ul style="list-style-type: none;">
					<li><a href="<?php echo $post['picture']; ?>" target="_new"><?php echo $post['picture']; ?></li>
			</ul>
		<div class="col-sm-offset-5 col-sm-2">
			<input type="file" name="photo" class="btn btn-default"/>
		</div>
	</div>
	<br/>
	<hr/>
	<br/>
	<div class="form-group">
		<div class="col-sm-offset-5 col-sm-1">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>
</form>

<!--
$picture = '';

if(isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
{
move_uploaded_file(
	$_files['photo']['tmp_name'],
	$_SERVER['DOCUMENT_ROOT'].'./img/headers/'.$_FILES['photo']['name']
);

//assign
$picture = $_FILES['photo']['name'];
}
-->