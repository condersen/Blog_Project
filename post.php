<?php include 'template/headerProtected.php'; ?>
<?php require 'backend/post_functions.php';
$posts = get_post();
?>
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('img/about-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="page-heading">
                    <h1><?php echo $post['post_title']; ?></h1>
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

<!-- Footer -->
<?php include 'template/footerTemplate.php'; ?>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/clean-blog.min.js"></script>

</body>

</html>
