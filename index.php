<?php include 'template/header.php'; ?>
<?php include 'backend/post_functions.php';
$posts = get_post(); ?>

<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('img/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Not Clean Blog</h1>
                    <hr class="small">
                    <span class="subheading"></span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<?php foreach($posts as $post) { ?>
		    	<ul class="list-clean list-left" style="text-decoration: none; list-style-type: none;">	
		    		<li><h2><a href="/post.php?id=<?php echo $post['post_id']; ?>"><?php echo $post['title']; ?></a></h2></li>
		    		<li><?php echo 'posted on '. date('Y-m-d', $post['created_ts']) .' by '. $post['username']; ?></li>
		    	</ul>
		    	<hr/>
		    <?php } ?>
        </div>
    </div>
</div>

<hr>

<!-- Footer -->
<?php include 'template/footerTemplate.php'; ?>
