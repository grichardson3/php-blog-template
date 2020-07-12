<header class="navHeader">
	<div class="desktopHeader">
		<div class="logoContainer">
			<a href="index.php">
				<?php
					if ($logoAsTitle === true) {
						echo "<img src=\"" . $logo . "\" alt=\"logo\" class=\"logo\"/>";
					} else {
						echo "<h3 class=\"siteTitle\">" . $headerTitle . "</h3>";
					}
				?>
			</a>
		</div>
		<nav class="navContainer">
			<ul>
				<li><a class="navText" href="index.php">Home</a></li>
				<li><a class="navText" href="about.php">About</a></li>
				<li><a class="navText" href="blog.php">Blog</a></li>
				<li><a class="navText" href="contact.php">Contact</a></li>
			</ul>
		</nav>
	</div>
	<div class="mobileHeader">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="home.php">
				<img id="logoMobile" src="img/icon/gr-media-square-white-xs.png" alt="GR Media Logo">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="home.php"><h3>HOME</h3></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="recent.php"><h3>RECENT</h3></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="about.php"><h3>ABOUT ME</h3></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contact.php"><h3>CONTACT</h3></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contact.php"><h3>CONTACT</h3></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contact.php"><h3>CONTACT</h3></a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</header>