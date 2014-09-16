<div class="container-fluid">
	<header class="row">
		<h1 class="col-md-12 page-header"><?php echo $_SESSION['admin']; ?> logged in</h1> 
		<p></p>
	</header>
	<section>
		<!-- loop through edit posts var and add info for this posts ID to the form -->
		<h2>Add a post</h2>				
		<form class="col-md-6 edit-post-form" action="index.php?page=insert_post" method="post" id="add-post-form">
			<input class="input-lg" type="text" name="name" placeholder="Name your post">
			<textarea class="input-lg" name="content" placeholder="Write post here" form="add-post-form">
			</textarea>
			<input class="input-lg" type="submit" name="submit">
		</form>
	<section>
</div>