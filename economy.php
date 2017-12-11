<section class="economy">
		<div class="economy-container wrapper">
			<h2 class="economy-title">Экономьте при покупке набора</h2>
			<div class="economy-items">
				<div class="economy-item">
					<img src="<?php echo get_template_directory_uri(); ?>/img/products/standart-set.png" alt="Комплект "Стандартный"">
					<p class="economy-item-title">Комплект &laquo;<?php the_title() ?>&raquo;</p>
				</div>
				<span class="math">+</span>
				<div class="economy-item">
					<img src="<?php echo get_template_directory_uri(); ?>/img/products/stand-set.png" alt="Автоматика Miller">
					<p class="economy-item-title">Автоматика Miller</p>
				</div>
				<span class="math">=</span>
				<div class="economy_deal">
					<p class="economy-prices">
						<span class="economy-last-price"> <?php 
						// $a = get_field('price', 148); //The price of the Standart set
						$a = get_post_meta( get_the_ID(), '_price', true); //The price of current set
						$b = get_field('price', 167); // The price of the Miller
						$c = $a + $b;
						echo $a;
						 ?> грн</span>
						<span class="economy-price">
                        <b>
                        <?php 
						// $a = get_field('price', 148); //The price of the Standart set
						$a = get_post_meta( get_the_ID(), '_price', true); //The price of current set
						$b = get_field('price', 167); // The price of the Miller
                        $c = ($a + $b) - (($a + $b) * 10 / 100); // 10% discount
                        echo $c;
                        ?>
                        </b> грн</span>
					</p>
					<button class="btn">Добавить в корзину</button>
				</div>
			</div>
		</div>  
	</section>