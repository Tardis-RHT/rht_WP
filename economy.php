<section class="economy">
	<div class="economy-container wrapper">
	<?php
		global $post;
		$args = array('posts_per_page' => 1,'post_type' => 'rht-economy', 'order' => 'ASC' );
		$myposts = get_posts( $args );
		foreach( $myposts as $post ){ setup_postdata($post);
	?>
		<h2 class="economy-title"><?php the_title() ?></h2>
		<div class="economy-items">
		
		<?php 
		$economyProducts = get_field('economy_ids');
		$economyPoduct1 = $economyProducts[0];
		$economyPoduct2 = $economyProducts[1];
		?>

			<div class="economy-item">
				<img src="<?php echo get_field('img', $economyPoduct1 ); ?>" alt="<?php echo get_the_title( $economyPoduct1 ); ?>">
				<p class="economy-item-title">
				<?php 
					if(get_page_template_slug($economyPoduct1) == 'furnitura-set'){
						echo 'Комплект' . get_the_title( $economyPoduct1 );
					} else{
						echo 'Автоматика '. strtok(get_the_title( $economyPoduct1 ), " ");
					}
				?>
				</p>
			</div>
			<span class="math">+</span>
			<div class="economy-item">
			<img src="<?php echo get_field('img', $economyPoduct2 ); ?>" alt="<?php echo get_the_title( $economyPoduct2 ); ?>">
				<p class="economy-item-title">
				<?php 
					if(get_page_template_slug($economyPoduct2) == 'furnitura-set'){
						echo 'Комплект' .get_the_title( $economyPoduct2 );
					} else{
						echo 'Автоматика "'. strtok(get_the_title( $economyPoduct2 ), " ") .'"';
					}
				?>
				</p>
			</div>
			<span class="math">=</span>
			<div class="economy_deal">
				<p class="economy-prices">
					<span class="economy-last-price"> <?php 
					$a = get_field('price', $economyPoduct1); //The price of the Standart set
					$b = get_field('price', $economyPoduct2); // The price of the Miller
					$c = $a + $b;
					echo $c;
						?> грн</span>
					<span class="economy-price">
					<b>
					<?php 
					// $a = get_field('price', 148); //The price of the Standart set
					// $b = get_field('price', 167); // The price of the Miller
					$d = $c - $c * 10 / 100; // 10% discount
					echo $d;
					?>
					</b> грн</span>
				</p>
				<button class="btn buy" data-id="<?php echo $post->ID?>?economy=<?php echo $d; ?>">Добавить в корзину</button>
				<?php
					}
					wp_reset_postdata();
				?>
			</div>
		</div>
	</div>  
</section>