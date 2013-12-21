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
	<link rel="shortcut icon" href="/img/favicon.ico" />
</head>

<body>
  <div id="content">
	<header>
		<div id="header_left">
			<p>Bringing art out of the gallery</p>
			<p>and into the daily lives of people</p>
		</div>
		<div id="header_center">
			<a href="/"><img src="/img/logo.png" alt="logo"></a>
		</div>
	</header>
	<nav>
		<ul id="nav_left">
		  <li><a href='/'>HOME</a></li>
		  <!-- Menu for superuser who is logged in -->
		  <?php if($user->name == "Supersecretuser"): ?>
		  	<li id="upload"><a href='/gallery/upload'>UPLOAD</a></li>
		  <?php endif; ?>
		</ul>
		<ul id="nav_right">
        	<!-- Menu for other users who are logged in --> 
	        <?php if($user): ?>
	        	<li><a href='/gallery/browse'>GALLERY</a></li>
	        	<li><a href='/gallery/about'>ABOUT</a></li>
	        	<li><a href='/gallery/specs'>DOCUMENTS</a></li>
	        	<li><a href='/users/favorite'>FAVORITES</a></li>
	            <li><a href='/users/profile'>PROFILE</a></li>
	            <li><a href='/users/logout'>LOG OUT</a></li>
	        <!-- Menu options for users who are not logged in -->
	        <?php else: ?>
	        	<li><a href='/gallery/browse'>GALLERY</a></li>
	        	<li><a href='/gallery/about'>ABOUT</a></li>
	        	<li><a href='/gallery/specs'>DOCUMENTS</a></li>
	        	<li><a href='/users/login'>LOG IN</a></li>
	            <li><a href='/users/signup'>SIGN UP</a></li>
        <?php endif; ?>
    	</ul>
	</nav>
	<div class="frame" id="browse">
		<div id="gallery">
			<div id="filter_options">
				<a class="back_to_gallery" href="/gallery/browse"><h2><img src="/img/chevron_left.png" alt="chevron_left"> Back to gallery</h2></a>
				<ul id="filter_list">	
					<li class="drop_filter">
						<h2 class="category"><span>►</span>Product </h2>
						<ul class="options">
							<li class="Spout">Faucets <a href="" class="clear_filter">Clear all</a></li>
							<li class="Bowl">Sinks <a href="" class="clear_filter">Clear all</a></li>
							<li class="Control">Controls <a href="" class="clear_filter">Clear all</a></li>
						</ul>
					</li>
					<li class="drop_filter">
						<h2 class="category"><span>►</span>Color </h2>
						<ul class="options">
							<li class="Amber">Amber <a href="" class="clear_filter">Clear all</a></li>
							<li class="Amethyst">Amethyst <a href="" class="clear_filter">Clear all</a></li>
							<li class="Cobalt">Cobalt <a href="" class="clear_filter">Clear all</a></li>
							<li class="Ebony">Ebony <a href="" class="clear_filter">Clear all</a></li>
							<li class="Emerald">Emerald <a href="" class="clear_filter">Clear all</a></li>
							<li class="Gold">Gold <a href="" class="clear_filter">Clear all</a></li>
							<li class="Ruby">Ruby <a href="" class="clear_filter">Clear all</a></li>
							<li class="White">White <a href="" class="clear_filter">Clear all</a></li>
							<li class="Custom">Custom <a href="" class="clear_filter">Clear all</a></li>
						</ul>
					</li>
					<li class="drop_filter">
						<h2 class="category"><span>►</span> Twist </h2>
						<ul class="options">
							<li class="single">Single <a href="" class="clear_filter">Clear all</a></li>
							<li class="double">Double <a href="" class="clear_filter">Clear all</a></li>
						</ul>
					</li>
					<li class="drop_filter">
						<h2 class="category"><span>►</span> Opacity </h2>
						<ul class="options">
							<li class="Transparent">Transparent <a href="" class="clear_filter">Clear all</a></li>
							<li class="Opaque">Opaque <a href="" class="clear_filter">Clear all</a></li>
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
  <footer>
  	<p>© Glass Faucet 2013</p>

	<p>Tel: +1 (314) 517-4555</p>
	<p><a href="mailto:CustomerSupport@glassfaucet.com?Subject=Inquiry" target="_top">CustomerSupport@glassfaucet.com</a></p>
</footer>
  <script src="/js/main.js"></script>
</body>
</html>