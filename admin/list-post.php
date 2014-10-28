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
	    		<td><span data_id="<?php echo $post['post_id']; ?>" onClick="" class="glyphicon glyphicon-remove remove-post"></span> | options</td>
			</tr>
	    	<?php } ?>
    	</table>
    </div>
    <?php include '../ajax/delete_post.php'; ?>
    <script>
    	$('.remove-post').onClick(function(){
    		var confirm_result = confirm('delete?');
    		if(confirm_result) {
				var post_select = $(this);
				var data ={id: post_select.attr('data_id')}
				$.post('/ajax/delete_post.php', data,
					function(response) {
						if(response == 1){
							post_select.parent().parent().remove();
						}
					}
    			)
    		}
		});
	</script>
</div>
<?php include 'adminTemplates/footerTemplate.php'; ?>