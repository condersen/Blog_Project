<?php include 'adminTemplates/headerTemplate.php';
include '../backend/user_functions.php';
$users = get_user();
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
    			<th>User ID</th>
    			<th>Username</th>
    			<th>User Email</th>
    		</tr>
	    	<?php foreach($users as $user) { ?>
	    	<tr>
	    		<td><?php echo $user['user_id']; ?></td>
	    		<td><?php echo $user['username']; ?></td>
	    		<td><?php echo $user['user_email']; ?></td>
	    	</tr>
	    	<?php } ?>
    	</table>
    </div>
</div>
<?php include 'adminTemplates/footerTemplate.php'; ?>