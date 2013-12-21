	<?php if($no_of_favs == 1): ?>
		<header class="no_of_items"><?=$no_of_favs ?> favorite</header>	
	<?php else: ?>
		<header class="no_of_items"><?=$no_of_favs ?> favorites</header>
	<?php endif; ?>
	<div id='works'>
		<?php foreach($items as $item): ?>
		<!-- Spouts -->
			<?php if($item['item_type'] == "Spout"): ?>
				<figure id="spout" class="<?=$item['color']?> <?=$item['item_type']?> <?=$item['spout_type']?> <?=$item['opacity']?>">
					<a href="/gallery/item/<?=$item['serial_no']?>">
					<div class="img_inner">
						<img src="/uploads/faucets/<?=$item['img_front']?>.jpg">
						<div class="fav_control">
							<div class="fav_container">
								<a href="/users/p_unfavorite/<?=$item['serial_no']?>"><div class="unfavorite"></div></a>
							</div>
						</div>
					</div>
					</a>
					<figcaption>
						<p class ="color"><?=$item['color']?></p>
						<p class="serial"><?=$item['opacity']?> <?=$item['spout_type']?>-twist, N°<?=$item['serial_no']?></p>
						<p class="sale_price">$<?=$item['price']?> USD</p>
					</figcaption>
				</figure>
			<?php endif; ?>
			<!-- Bowls -->
			<?php if($item['item_type'] == "Bowl"): ?>
				<figure id="bowl" class="<?=$item['color']?>">
					<a href="/gallery/item/<?=$item['serial_no']?>">
					<div class="img_inner">
						<img class="gallery_bowl_img" src="/uploads/faucets/<?=$item['img_front']?>.jpg" class="">
						<div class="fav_control">
							<div class="fav_container">
								<a href="/users/p_unfavorite/<?=$item['serial_no']?>"><div class="unfavorite"></div></a>
							</div>
						</div>
					</div>
					</a>
					<figcaption class="">
						<p class ="color"><?=$item['color']?></p>
						<p class="serial"><?=$item['item_type']?>, N°<?=$item['serial_no']?></p>
						<p class="sale_price">$<?=$item['price']?> USD</p>
					</figcaption>
				</figure>
			<?php endif; ?>
			<!-- Controls-->
			<?php if($item['item_type'] == "Control"): ?>
				<figure  id="control" class="<?=$item['color']?>">
					<a href="/gallery/item/<?=$item['serial_no']?>">
					<div class="img_inner">
						<img src="/uploads/faucets/<?=$item['img_front']?>.jpg" class="">
						<div class="fav_control">
							<div class="fav_container">
								<a href="/users/p_unfavorite/<?=$item['serial_no']?>"><div class="unfavorite"></div></a>
							</div>
						</div>
					</div>
					</a>
					<figcaption class="">
						<p class ="color"><?=$item['color']?></p>
						<p class="serial"><?=$item['item_type']?>, N°<?=$item['serial_no']?></p>
						<p class="sale_price">$<?=$item['price']?> USD</p>
					</figcaption>
				</figure>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
<script src="/js/favorite.js"></script>