<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
					
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	

	<div id='menu'>

        <a href='/'>Home</a>

        <!-- Menu for superuser who is logged in -->
        <?php if($user->name == "Supersecretuser"): ?>
        	<a href='/gallery/upload'>Upload</a>
        	<a href='/gallery/browse'>Browse</a>
        	<a href='/gallery/about'>About</a>
        	<a href='/gallery/specs'>Specs</a>
        	<a href='/users/favorite'>Favorites</a>
            <a href='/users/profile'>Profile</a>
        <?php else: ?>
        	<!-- Menu for other users who are logged in --> 
	        <?php if($user): ?>
	        	<a href='/gallery/browse'>Browse</a>
	        	<a href='/gallery/about'>About</a>
	        	<a href='/gallery/specs'>Specs</a>
	        	<a href='/users/favorite'>Favorites</a>
	            <a href='/users/profile'>Profile</a>

	        <!-- Menu options for users who are not logged in -->
	        <?php else: ?>
	        	<a href='/gallery/browse'>Browse</a>
	        	<a href='/gallery/about'>About</a>
	        	<a href='/gallery/specs'>Specs</a>
	        	<a href='/users/login'>Log in</a>
	            <a href='/users/signup'>Sign up</a>
            

        <?php endif; ?>
        <?php endif; ?>

    </div>

	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>
</body>
</html>