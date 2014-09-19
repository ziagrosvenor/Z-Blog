<div class="container-fluid">
	<header class="row">
		<h1 class="col-md-12 page-header">Blog</h1> 
	</header>
	<section class="row post-row">
		<?php foreach ($posts as $post): ?>
			<h2 class="page-header col-md-12"><?php echo $post['name'];?></h2>
			<div class="post-image col-md-4">
				<img src="./view/images/post_image.png">
			</div>
			<p class="col-md-8"><?php echo $post['post']?></p>
		<?php endforeach; ?>
	</section>
</div>
