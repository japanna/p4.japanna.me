<div id='item'>
    <?php foreach($items as $item): ?>
        <?php if($item['item_type'] == "Spout"): ?>
            <div class="item_container">
                <img class="img_front" src="/uploads/faucets/<?=$item['img_front']?>" alt="<?=$item['serial_no']?> <?=$item['color']?> front"></a>
                <img class="img_side" src="/uploads/faucets/<?=$item['img_side']?>" alt="<?=$item['serial_no']?> <?=$item['color']?> side"></a>
            <div class="below_item">
                <a href="/users/p_favorite/<?=$item['serial_no']?>"><img src="/img/fav.png"></a>
                <p>FAVORITE</p>
                <?php if($user->name == "Supersecretuser"): ?>
                <a href="/gallery/delete/<?=$item['serial_no']?>">Delete</a>
            <?php endif; ?>
            </div>
            </div>
            
            <div class="info">
                <h1><?=$item['color']?></h1>
                <h2>N° <?=$item['serial_no']?></h2>
                <div class="data">
                    <p>Overall height: <?=$item['overall_height_in']?> (in) / <?=$item['overall_height_cm']?> (cm)</p>
                    <p>Spout height: <?=$item['spout_height_in']?> (in) / <?=$item['spout_height_cm']?> (cm)</p>
                    <p>Projection: <?=$item['projection_in']?> (in) / <?=$item['projection_cm']?> (cm)</p>
                    <p id="item_description"><?=$item['description']?></p>
                    <p id="item_price">Price: <span>$<?=$item['price']?> USD</span></p>
                </div>
                <?php if($user->name != "Supersecretuser"): ?>
                    <a id="contact_gallery_btn" href="/users/contact/<?=$item['serial_no']?>">Contact gallery</a><br>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if($item['item_type'] == "Bowl"): ?>
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
            <a href="/users/p_favorite/<?=$item['serial_no']?>">Favorite</a><br>
            <?php if($user->name == "Supersecretuser"): ?>
            <a href="/gallery/delete/<?=$item['serial_no']?>">Delete</a>
            <?php endif; ?>
        <?php endif; ?>
        <?php if($item['item_type'] == "Control"): ?>
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
            <a href="/users/p_favorite/<?=$item['serial_no']?>">Favorite</a><br>
            <?php if($user->name == "Supersecretuser"): ?>
            <a href="/gallery/delete/<?=$item['serial_no']?>">Delete</a>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
 <script src="/js/item.js"></script>

