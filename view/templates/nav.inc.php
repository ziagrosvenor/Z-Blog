<div class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="./" class="navbar-brand">Blog</a>
			</div>
			<div class="navbar-collapse collapse" style="height: 1px;">
         		<ul class="nav navbar-nav">
           		<li class="active"><a href="./">Posts</a></li>
           		<?php if (!isset($_SESSION['admin']) || !$_SESSION['admin']) : ?>
           		<li><a href="./login_form">Admin</a></li>
           	<?php else: ?>
           		<li class="dropdown">
              	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
              	<li><a href="./admin">Admin Home</a></li>
                <li><a href="./create_post">Add a Post</a></li>
                <li><a href="./logout">Logout</a></li>
              </ul>
            </li>
        	<?php endif; ?>
         		</ul>
       		</div>
		</div>
</div>