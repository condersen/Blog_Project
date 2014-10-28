<?php include 'adminTemplates/headerTemplate.php';
include '../backend/post_functions.php';
$post_id = $_GET['id'];
$message = '';

?>
    <h1 class="page-header">
        Blank Page
        <small>Subheading</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i><a href="index.php"> Dashboard</a>
        </li>
        <li class="active">
            <i class="fa fa-files-o"></i><a href="list-post.php"> List Posts</a>
        </li>
        <li class="active">
            <i class="fa fa-file-o"></i> Post
        </li>
    </ol>
    <div>
    	<?php
			require_once '../backend/post_functions.php';
			if(isset($_POST['post_title']) AND isset($_POST['post_body'])){
				$result = update_post( $post_id, $_POST['post_title'], $_POST['post_body'], $_SESSION['user']['user_id']);
				if(is_array($result))
				{
					echo '<h1><small>Post succesfully Changed!</small></h1>';
				} else { echo $result; }
			}
			
			$posts = get_post($post_id);
			$post = $posts[0];
		?>
    	<?php include 'adminTemplates/postForm.php'; ?>
    </div>
</div>
<?php include 'adminTemplates/footerTemplate.php'; ?>