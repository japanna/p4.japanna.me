<script src="/js/profile.js"></script>

<div id="profile">
	<h1><?=$user->name?></h1>
	<div class="profile_icon_container">
		<div class="profile_icon"></div>
		
	</div>
	<div class="profile_actions">
			<a href="/users/delete/<?=$user->user_id?>">DELETE ACCOUNT</a>
		</div>
</div>