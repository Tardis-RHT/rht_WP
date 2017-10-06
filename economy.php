<section class="economy">
		<div class="economy-container wrapper">
			<h2 class="economy-title">Экономьте при покупке набора</h2>
			<div class="economy-items">
				<div class="economy-item">
					<img src="<?php echo get_template_directory_uri(); ?>/img/products/standart-set.png" alt="Комплект "Стандартный"">
					<p class="economy-item-title">Комплект "Стандартный"</p>
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
						$a = get_field('price', 148); //The price of the Standart set
						$b = get_field('price', 167); // The price of the Miller
						$c = $a + $b;
						echo $c;
						 ?> грн</span>
						<span class="economy-price">
                        <b>
                        <?php 
                        $a = get_field('price', 148); //The price of the Standart set
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