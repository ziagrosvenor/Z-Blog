<div class="container-fluid">
	<div class="row">
		<h1 class="col-md-12 page-header">Login</h1>
		<!-- shows if the login details are incorrect -->
		<?php if (isset($_GET['login'])) : ?> 
		<div class="alert alert-warning col-md-12">
			Incorrect details
		</div>
		<?php endif; ?>
	</div>
	<div class="login-form">
	<form action="index.php?page=login_form" method="post">
		<label class="input-lg" for="username">User Name</label>
		<input class="input-lg" type="text" name="username">
		<label class="input-lg" for="password">Password</label>
		<input class="input-lg" type="password" name="password">
		<input class="input-lg" type="submit" name="submit">
	</form>
</div>