<?php include 'adminTemplates/headerTemplate.php';
include '../backend/post_functions.php';
$posts = get_post();
?>
    <h1 class="page-header">
        Blank Page
        <small>Subheading</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
        </li>
        <li class="active">
            <i class="fa fa-files-o"></i> List Posts
        </li>
    </ol>
    <div>
    	<table class="table table-striped">
    		<tr>
    			<th>Post #</th>
    			<th>Title</th>
    			<th>Posted</th>
    			<th>options</th>
    		</tr>
	    	<?php foreach($posts as $post) { ?>
	    	<tr>
	    		<td><?php echo $post['post_id']; ?></td>
	    		<td><a href="post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></td>
	    		<td><?php echo date('Y-m-d h:ia', $post['created_ts']); ?></td>
	    		<td><span data-id="<?php echo $post['post_id']; ?>" onClick="remove_post" class="glyphicon glyphicon-remove remove-post"></span> | options</td>
	    	</tr>
	    	<?php } ?>
    	</table>
    </div>
</div>
<?php include 'adminTemplates/footerTemplate.php'; ?>