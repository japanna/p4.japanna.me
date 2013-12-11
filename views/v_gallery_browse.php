<div id='faucets'>
	<h4>Showing <?=$items ?> works</h4>	
	<?php foreach($posts as $post): ?>
	<p>
		<a href="/gallery/item/<?=$post['serial_no']?>"><img class="img_front" src="/uploads/faucets/<?=$post['img_front']?>" alt="<?=$post['serial_no']?> <?=$post['color']?> front"></a>
    	<a href="/gallery/item/<?=$post['serial_no']?>"><img class="img_side" src="/uploads/faucets/<?=$post['img_side']?>" alt="<?=$post['serial_no']?> <?=$post['color']?> side"></a>
    	<h1><?=$post['color']?></h1>
    	<h2><?=$post['serial_no']?></h2>
    	<p>Overall height: <?=$post['overall_height_in']?> (in) / <?=$post['overall_height_cm']?> (cm)</p>
    	<p>Spout height: <?=$post['spout_height_in']?> (in) / <?=$post['spout_height_cm']?> (cm)</p>
    	<p>Projection: <?=$post['projection_in']?> (in) / <?=$post['projection_cm']?> (cm)</p>
    	<p>Price: <?=$post['price']?> (USD) </p>
    	<a href="/users/p_favorite/<?=$post['serial_no']?>">Favorite</a>
	</p>
	<?php endforeach; ?>
</div>

