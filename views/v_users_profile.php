<div id="profile">
	<h1><?=$user->name?></h1>
	<div class="profile_icon_container">
		<div class="profile_icon"></div>
	</div>
	<div class="profile_actions">
		<button class="profile_edit_icon_button"><a href="/users/delete/<?=$user->user_id?>">DELETE ACCOUNT</a></button>
		<a href="#" class="delete_action">Delete Icon</a>
	</div>
</div>


<a href="/users/delete/<?=$user->user_id?>">DELETE ACCOUNT</a>