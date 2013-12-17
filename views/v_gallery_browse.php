	<header class="no_of_items">Showing <?=$items ?> pieces</header>	
	<div id='works'>
		<?php foreach($posts as $post): ?>
		<!-- Spouts -->
			<?php if($post['item_type'] == "spout"): ?>
				<figure id="spout" class="<?=$post['color']?> <?=$post['item_type']?> <?=$post['spout_type']?> <?=$post['opacity']?>">
					<a href="/gallery/item/<?=$post['serial_no']?>">
					<div class="img_inner">
						<img src="/uploads/faucets/<?=$post['img_front']?>">
						<div class="fav_control">
							<div class="fav_container">
								<a href="/users/p_favorite/<?=$post['serial_no']?>"><div class="favorite"></div></a>
							</div>
						</div>
					</div>
					</a>
					<figcaption>
						<p class ="color"><?=$post['color']?></p>
						<p class="serial"><?=$post['opacity']?> <?=$post['spout_type']?>-twist <?=$post['serial_no']?></p>
						<p class="sale_price">$<?=$post['price']?> USD</p>
					</figcaption>
				</figure>
			<?php endif; ?>
			<!-- Bowls -->
			<?php if($post['item_type'] == "bowl"): ?>
				<figure id="bowl" class="<?=$post['color']?>">
					<a href="/gallery/item/<?=$post['serial_no']?>">
					<div class="img_inner">
						<div class="fav_control">
							<div class="fav_container">
								<a href="/users/p_favorite/<?=$post['serial_no']?>"><div class="favorite"></div></a>
							</div>
						</div>
						<img src="/uploads/faucets/<?=$post['img_front']?>" class="">
					</div>
					</a>
					<figcaption class="">
						<p class ="color"><?=$post['color']?></p>
						<p class="title"><?=$post['serial_no']?></p>
						<p class="sale_price">Price: <?=$post['price']?> (USD)</p>
					</figcaption>
				</figure>
			<?php endif; ?>
			<!-- Controls-->
			<?php if($post['item_type'] == "control"): ?>
				<figure  id="control" class="<?=$post['color']?>">
					<a href="/gallery/item/<?=$post['serial_no']?>">
					<div class="img_inner">
						<div class="fav_control">
							<div class="fav_container">
								<a href="/users/p_favorite/<?=$post['serial_no']?>"><div class="favorite"></div></a>
							</div>
						</div>
						<img src="/uploads/faucets/<?=$post['img_front']?>" class="">
					</div>
					</a>
					<figcaption class="">
						<p class ="color"><?=$post['color']?></p>
						<p class="title"><?=$post['serial_no']?></p>
						<p class="sale_price">Price: <?=$post['price']?> (USD)</p>
					</figcaption>
				</figure>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
