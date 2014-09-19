<div class="container-fluid">
	<div class="row header-row">
		<h1 class="col-md-12 page-header">Blog</h1> 
	</div>
	<section>
		<h2>List of posts</h2>
		<!-- creates new array $post for each item in $posts array -->
		<?php foreach ($posts as $post): ?>
		<div class="row post-row">
			<div class="name col-xs-12">
				<h2><?php echo $post['name']; ?></h2>
			</div>
			<div class="post-image col-md-4">
				<img src="./view/images/post_image.png">
			</div>
			<div class="post col-md-8">
				<p><?php echo $post['post']; ?></p>
				<button type="button" class="btn btn-lg btn-primary">
					<a href="index.php?page=blog_view&post_id=<?php echo $post['id']; ?>">View</a>
				</button>	
			</div>	
		</div>
		<?php endforeach; ?>
	</section>
</div>