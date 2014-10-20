<div class="container-fluid">
	<header class="row">
		<h1 class="col-md-12 page-header"><?php echo $_SESSION['admin']; ?> logged in</h1> 
		<p></p>
	</header>
	<section>
		<!-- loop through edit posts var and add info for this posts ID to the form -->
		<?php foreach ($posts as $post): ?>
		<h2>Edit <?php echo $post["name"];?></h2>				
		<form class="col-md-6 edit-post-form" action="index.php?page=update_post&post_id=<?php echo $id; ?>" method="post" id="edit-post-form">
			<input class="input-lg" type="text" name="name" value=<?php echo $post["name"];?>>
			<textarea class="input-lg" name="content" form="edit-post-form">
			<?php echo $post["post"];?>
			</textarea>
			<input class="input-lg" type="submit" name="submit">
		</form>
		<?php endforeach; ?>
	<section>
</div>