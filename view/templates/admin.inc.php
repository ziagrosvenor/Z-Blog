<div class="container-fluid">			
	<div class="row">
		<h1 class="col-md-12 page-header"><?php echo $_SESSION['admin'] ?> logged in</h1> 
		<div class="alert alert-info col-md-12">
			<?php 
			// Checks for number of session updates and notifies user
			if ($updates_counter === 0) {
				echo "No current updates";
			}
			else {
				echo "Update success, you have made " . $updates_counter . " updates";
			}
			?>
		</div>
	</div>
		<section>
		<h2 class="page-header">Current Posts</h2>
		<!-- creates new array $post for each item in $posts array -->
		<?php foreach ($posts as $post): ?>
		<div class="row post-row">
			<div class="name col-xs-12">
				<h2 class="col-md-12"><?php echo $post['name']; ?></h2>
			</div>		
			<div class="post-image col-md-4">
				<img src="view/images/post_image.png">
			</div>
			<div class="post col-md-8">
				<p><?php echo $post['post']; ?></p>
				<button type="button" class="btn btn-lg btn-primary">
					<a href="index.php?page=edit_post&post_id=<?php echo $post['id'];?>">Edit</a>
				</button>
			</div>		
		</div>
		<?php endforeach; ?>
	</section>
</div>