<div id='favorites'>
    <h4> <?=$no_of_favs ?> favorites</h4> 
    <?php foreach($items as $item): ?>
	<p>
         <?php if($item['item_type'] == "spout"): ?>
            <img class="img_front" src="/uploads/faucets/<?=$item['img_front']?>" alt="<?=$item['serial_no']?> <?=$item['color']?> front"></a>
            <img class="img_side" src="/uploads/faucets/<?=$item['img_side']?>" alt="<?=$item['serial_no']?> <?=$item['color']?> side"></a>
            <h1><?=$item['color']?></h1>
            <h2><?=$item['serial_no']?></h2>
            <p>Overall height: <?=$item['overall_height_in']?> (in) / <?=$item['overall_height_cm']?> (cm)</p>
            <p>Spout height: <?=$item['spout_height_in']?> (in) / <?=$item['spout_height_cm']?> (cm)</p>
            <p>Projection: <?=$item['projection_in']?> (in) / <?=$item['projection_cm']?> (cm)</p>
            <p><?=$item['description']?></p>
            <p>Price: <?=$item['price']?> (USD) </p>
            <?php if($user->name != "Supersecretuser"): ?>
            <a href="/users/contact/<?=$item['serial_no']?>">Contact gallery</a><br>
            <?php endif; ?>
            <a href="/users/p_unfavorite/<?=$item['serial_no']?>">Un-favorite</a>
        <?php endif; ?>
        <?php if($item['item_type'] == "bowl"): ?>
            <a href="/gallery/item/<?=$item['serial_no']?>"><img class="img_front" src="/uploads/faucets/<?=$item['img_front']?>" alt="<?=$item['serial_no']?> <?=$item['color']?> front"></a>
            <h1><?=$item['color']?></h1>
            <h2><?=$item['serial_no']?></h2>
            <p>Overall height: <?=$item['overall_height_in']?> (in) / <?=$item['overall_height_cm']?> (cm)</p>
            <p>Major diameter: <?=$item['major_diameter_in']?> (in) / <?=$item['major_diameter_cm']?> (cm)</p>
            <p>Minor diameter: <?=$item['minor_diameter_in']?> (in) / <?=$item['minor_diameter_cm']?> (cm)</p>
            <p><?=$item['description']?></p>
            <p>Price: <?=$item['price']?> (USD) </p>
            <?php if($user->name != "Supersecretuser"): ?>
            <a href="/users/contact/<?=$item['serial_no']?>">Contact gallery</a><br>
            <?php endif; ?>
            <a href="/users/p_unfavorite/<?=$item['serial_no']?>">Un-favorite</a>
        <?php endif; ?>
        <?php if($item['item_type'] == "control"): ?>
            <a href="/gallery/item/<?=$item['serial_no']?>"><img class="img_front" src="/uploads/faucets/<?=$item['img_front']?>" alt="<?=$item['serial_no']?> <?=$item['color']?> front"></a>
            <h1><?=$item['color']?></h1>
            <h2><?=$item['serial_no']?></h2>
            <p>Overall height: <?=$item['overall_height_in']?> (in) / <?=$item['overall_height_cm']?> (cm)</p>
            <p>Hardware finish: <?=$item['hardware_finish']?></p>
            <p><?=$item['description']?></p>
            <p>Price: <?=$item['price']?> (USD) </p>
            <?php if($user->name != "Supersecretuser"): ?>
            <a href="/users/contact/<?=$item['serial_no']?>">Contact gallery</a><br>
            <?php endif; ?>
            <a href="/users/p_unfavorite/<?=$item['serial_no']?>">Un-favorite</a>
        <?php endif; ?>
    </p>
    <?php endforeach; ?>
</div>
