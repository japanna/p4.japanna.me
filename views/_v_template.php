<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">	
<!--	<link href="http://m.glassfaucet.com" media="only screen and (max-width: 640px)" rel="alternate"> -->
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	<script src="//use.edgefonts.net/open-sans:n4,n7,n8.js"></script>
	<link rel="stylesheet" href="/css/style.css">
	<script src="/js/jquery-1.9.1.min.js"></script>

</head>

<body>
  <div id="content">
	<header>
		<div id="header_left">
			LOREM IPSUM DOLOR SIT<br>AMET INDO FULUR SET.
		</div>
		<div id="header_center">
			<img src="/img/logo.png">
		</div>
	</header>
	<nav>
		<ul id="nav_left">
		  <li><a href='/'>HOME</a></li>
		</ul>
		<ul id="nav_right">
		<!-- Menu for superuser who is logged in -->
        <?php if($user->name == "Supersecretuser"): ?>
        	<li><a href='/gallery/upload'>UPLOAD</a></li>
        	<li><a href='/gallery/browse'>BROWSE</a></li>
        	<li><a href='/gallery/about'>ABOUT</a></li>
        	<li><a href='/gallery/specs'>SPECS</a></li>
        	<li><a href='/users/favorite'>FAVORITES</a></li>
            <li><a href='/users/profile'>PROFILE</a></li>
            <li><a href='/users/logout'>LOG OUT</a></li>
        <?php else: ?>
        	<!-- Menu for other users who are logged in --> 
	        <?php if($user): ?>
	        	<li><a href='/gallery/browse'>BROWSE</a></li>
	        	<li><a href='/gallery/about'>ABOUT</a></li>
	        	<li><a href='/gallery/specs'>SPECS</a></li>
	        	<li><a href='/users/favorite'>FAVORITES</a></li>
	            <li><a href='/users/profile'>PROFILE</a></li>
	            <li><a href='/users/logout'>LOG OUT</a></li>
	        <!-- Menu options for users who are not logged in -->
	        <?php else: ?>
	        	<li><a href='/gallery/browse'>BROWSE</a></li>
	        	<li><a href='/gallery/about'>ABOUT</a></li>
	        	<li><a href='/gallery/specs'>SPECS</a></li>
	        	<li><a href='/users/login'>LOG IN</a></li>
	            <li><a href='/users/signup'>SIGN UP</a></li>
	       	<?php endif; ?>
        <?php endif; ?>
    	</ul>
	</nav>
	<div class="frame" id="browse">
		<div id="gallery">
			<div id="filter_options">
				<ul id="filter_list">
					<li class="drop_filter">
						<h2 id="filter_product" class="category"><span>►</span> Product </h2>
						<ul class="options">
							<li>Faucets <a href="" class="clear_filter">Clear</a></li>
							<li>Sinks <a href="" class="clear_filter">Clear</a></li>
							<li>Controls <a href="" class="clear_filter">Clear</a></li>
						</ul>
					</li>
					<li class="drop_filter">
						<h2 class="category"><span>►</span> Color </h2>
						<ul id="filter_color" class="options">
							<li>Amber</li>
							<li>Amethyst</li>
							<li>Cobalt</li>
							<li>Ebony</li>
							<li>Emerald</li>
							<li>Gold</li>
							<li>Ruby</li>
							<li>White</li>
							<li>Custom</li>
						</ul>
					</li>
					<li class="drop_filter">
						<h2 class="category"><span>►</span> Twist </h2>
						<ul id="filter_twist" class="options">
							<li>Single</li>
							<li>Double</li>
						</ul>
					</li>
					<li class="drop_filter">
						<h2 class="category"><span>►</span> Opacity </h2>
						<ul id="filter_price" class="options">
							<li>Transparent</li>
							<li>Opaque</li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="results">

				<?php if(isset($content)) echo $content; ?>

				<?php if(isset($client_files_body)) echo $client_files_body; ?>
			</div>
		</div>
	</div>
  </div>
  <footer></footer>
  <script src="/js/main.js"></script>
</body>
</html>