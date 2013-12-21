	 <script src="/js/browse.js"></script>
	<header class="no_of_items"><?=$items ?> pieces in gallery</header>	
	<div id='works'>
		<?php foreach($posts as $post): ?>
		<!-- Spouts -->
			<?php if($post['item_type'] == "Spout"): ?>
				<figure class="<?=$post['color']?> <?=$post['item_type']?> <?=$post['spout_type']?> <?=$post['opacity']?>">
					<a href="/gallery/item/<?=$post['serial_no']?>">
					<div class="img_inner">
						<img src="/uploads/faucets/<?=$post['img_front']?>.jpg"></a>
						<div class="fav_control">
							<div class="fav_container">
								<a href="/users/p_favorite/<?=$post['serial_no']?>"><div class="favorite"></div></a>
							</div>
						</div>
					</div>
					
					<figcaption>
						<p class ="color"><?=$post['color']?></p>
						<p class="serial"><?=$post['opacity']?> <?=$post['spout_type']?>-twist</p>
						<p class="serial">N°<?=$post['serial_no']?></p>
						<p class="sale_price">$<?=$post['price']?> USD</p>
					</figcaption>
				</figure>
			<?php endif; ?>
			<!-- Bowls -->
			<?php if($post['item_type'] == "Bowl"): ?>
				<figure id="bowl" class="<?=$post['color']?> <?=$post['item_type']?>">
					<a href="/gallery/item/<?=$post['serial_no']?>">
					<div class="img_inner">
						<img class="gallery_bowl_img" src="/uploads/faucets/<?=$post['img_front']?>.jpg">
						<div class="fav_control">
							<div class="fav_container">
								<a href="/users/p_favorite/<?=$post['serial_no']?>"><div class="favorite"></div></a>
							</div>
						</div>
					</div>
					</a>
					<figcaption class="">
						<p class ="color"><?=$post['color']?></p>
						<p class="serial"><?=$post['item_type']?>, N°<?=$post['serial_no']?></p>
						<p class="sale_price">$<?=$post['price']?> USD</p>
					</figcaption>
				</figure>
			<?php endif; ?>
			<!-- Controls-->
			<?php if($post['item_type'] == "Control"): ?>
				<figure  id="control" class="<?=$post['color']?> <?=$post['item_type']?>">
					<a href="/gallery/item/<?=$post['serial_no']?>">
					<div class="img_inner">
						<img src="/uploads/faucets/<?=$post['img_front']?>.jpg">
						<div class="fav_control">
							<div class="fav_container">
								<a href="/users/p_favorite/<?=$post['serial_no']?>"><div class="favorite"></div></a>
							</div>
						</div>
					</div>
					</a>
					<figcaption class="">
						<p class ="color"><?=$post['color']?></p>
						<p class="serial"><?=$post['item_type']?>, N°<?=$post['serial_no']?></p>
						<p class="sale_price">$<?=$post['price']?> USD</p>
					</figcaption>
				</figure>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
