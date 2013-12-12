<div id='item'>
    <?php foreach($items as $item): ?>
	<p>
		<img class="img_front" src="/uploads/faucets/<?=$item['img_front']?>" alt="<?=$item['serial_no']?> <?=$item['color']?> front"></a>
        <img class="img_side" src="/uploads/faucets/<?=$item['img_side']?>" alt="<?=$item['serial_no']?> <?=$item['color']?> side"></a>
    	<h1><?=$item['color']?></h1>
    	<h2><?=$item['serial_no']?></h2>
    	<p>Overall height: <?=$item['overall_height_in']?> (in) / <?=$item['overall_height_cm']?> (cm)</p>
    	<p>Spout height: <?=$item['spout_height_in']?> (in) / <?=$item['spout_height_cm']?> (cm)</p>
    	<p>Projection: <?=$item['projection_in']?> (in) / <?=$item['projection_cm']?> (cm)</p>
        <p><?=$item['description']?></p>
    	<p>Price: <?=$item['price']?> (USD) </p>
        <a href="/users/p_favorite/<?=$item['serial_no']?>">Favorite</a>
        <?php if($user->name == "Supersecretuser"): ?>
        <a href="/gallery/delete/<?=$item['serial_no']?>">Delete</a>
        <?php endif; ?>
	</p>
        <?php endforeach; ?>
</div>

