<?php include 'template/headerProtected.php'; ?>
<?php require 'backend/post_functions.php';
require_once 'inc/my_functions.php';
$post_id = $_GET['id'];

$post = $post[o];
	if (isset($_POST['comment'])) {
	$result = add_comment($post_id, $_SESSION['user']['user_id'], $_POST['comment']);
}
$comments = get_post_comments($post_id);
?>
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<?php
require_once 'backend/post_functions.php';
if (isset($_POST['post_title']) AND isset($_POST['post_body'])) {
	$result = update_post($post_id, $_POST['post_title'], $_POST['post_body'], $_SESSION['user']['user_id']);
}

$posts = get_post($post_id);
$post = $posts[0];
if(empty($post['picture'])) {
	$post['picture'] = 'about-bg.jpg';
}
?>
<style>
	.col-md-8 {
		background: #DFDFDF;
		margin-bottom: 10px;
	}
	
	.list-clean, a {
		list-style-type: none;
		text-decoration: none;
		margin: none;
		padding: none;
	}
	
	.username {
		background: #cacaca;
		width: 100%;
	}
	
	
</style>
<header class="intro-header" style="background-image: url('img/headers/<?php echo $post['picture']; ?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="page-heading">
                    <h1><?php echo $post['title']; ?></h1>
                    <hr class="small">
                    <span class="subheading"><?php echo date('Y-m-d h:ia', $post['created_ts']); ?></span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        	<?php echo $post['body']; ?>
        </div>
    </div>
</div>

<hr>

<div id="comment-container">
	<ul class="list-clean list-left">
		<?php foreach($comments as $comment){ ?>
			<div class="comment-box col-md-8">
				<li class="username">
					<p>
						<strong><?php echo $comment['username']; ?></strong>
					
						<?php echo format_time_since($comment['created_ts']).' ago '; ?>
					</p>
				</li>
				<li>
					<p>
						<?php echo addslashes($comment['body']); ?>
					</p>
				</li>
			</div>
		<?php } ?>
	</ul>
</div>

<hr>
<?php
	
?>

<form id="blog_post" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<h1><small>Leave a Comment</small></h1>
		<textarea class="col-xs-4" name="comment" id="post_content" rows="5"></textarea>
	</div>
	<br><br><br><br><br><br>
	<div class="form-group">
		<div class="col-sm-offset-1 col-sm-1">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>
</form>
<!--
<div id="comment-section">
	<h3>Comment</h3>
	<form class="col-md-4" id="comment-form">
		<textarea class="form-control col-xs-4"></textarea><br/><br/>
		<input class="btn btn-default" type="button" value="Submit"/>
	</form>
</div>


<script>
	var post_id = <?php echo $_GET['id']; ?>;
	var user_id = <?php echo $_SESSION['user']['user_id']; ?>;
	var comment;
	
	$(function(){
		$('comment-from').submit(function() {
			//Populate comment variable
			comment = $('comment').val();
			
			//run the AJAX call
			var data = {
				'post_id': post_id,
				'user_id': user_id,
				'comment_id': comment,
			}
			$.post('/ajax/add_comment.php', data, cuntion());
		});
	});
</script>
-->


<!-- Footer -->
<?php include 'template/footerTemplate.php'; ?>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/clean-blog.js"></script>

</body>

</html>
