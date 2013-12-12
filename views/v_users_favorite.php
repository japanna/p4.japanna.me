<div id='item'>
    <h4> <?=$no_of_favs ?> favorites</h4> 
    <?php foreach($items as $item): ?>
	<p>
		<a href="/gallery/item/<?=$item['serial_no']?>"><img class="img_front" src="/uploads/faucets/<?=$item['img_front']?>" alt="<?=$item['serial_no']?> <?=$item['color']?> front"></a>
    	<h1><?=$item['color']?></h1>
    	<h2><?=$item['serial_no']?></h2>
    	<p>Overall height: <?=$item['overall_height_in']?> (in) / <?=$item['overall_height_cm']?> (cm)</p>
    	<p>Spout height: <?=$item['spout_height_in']?> (in) / <?=$item['spout_height_cm']?> (cm)</p>
    	<p>Projection: <?=$item['projection_in']?> (in) / <?=$item['projection_cm']?> (cm)</p>
        <p><?=$item['description']?></p>
    	<p>Price: <?=$item['price']?> (USD) </p>
        <a href="/users/p_unfavorite/<?=$item['serial_no']?>">Un-favorite</a>
	</p>
        <?php endforeach; ?>
</div>
