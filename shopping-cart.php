<?php /* Template Name: Page Shopping Cart */ ?>
<?php get_header(); ?>

<main role="main">
		<div id="overlay"></div>
    
    <section class="shopping-cart wrapper">
        <h2>Корзина</h2>
        <div class="shopping-cart_items">
		<?php
			if (isset($_SESSION['products'])){
				$products = $_SESSION['products'];
				foreach($products as $product ){ 
					$current = $product['id'];?>
					
			<div class="shopping-cart_item-single">
				<img src="<?php the_field('img', $current); ?>" alt="<?php echo get_the_title( $current ); ?>">
				<div class="shopping-cart_item-single_desc">
					<p><?php echo get_the_title( $current ); ?></p>
					<!-- different set fot each category -->
					<?php $template = get_page_template_slug($current);
					//for furniture:
						if ($template == 'furnitura-set.php'):?>
					<ul>
						<li>Ширина проема – <b>до <?php the_field('width', $current); ?> м</b></li>
						<li>Вес ворот – <b>до <?php the_field('weight', $current); ?> кг</b></li>
					</ul>
					<span>+ Регулировочная пластина</span>
					<?php endif; ?>
					
					<!-- for automation: -->
					<?php if ($template == 'automatica-card.php'):?>
					<ul>
						<li class="automatica_set-weight">
							Максимальный вес ворот &mdash; <b>
							<?php echo get_post_meta( $current, 'weight', true ); ?> кг</b>
						</li>
						<li class="automatica_set-power">
							Мощность мотора &mdash; <b>
							<?php echo get_post_meta( $current, 'power', true ); ?> Вт</b>
						</li>
					</ul>
					<?php endif;?>
				</div>
				<div class="shopping-cart_item-single_num-container">
					<form>
						<input type="number" class="shopping-cart_item-single_number" min="0" value="<?php
						echo $product['count'];?>">
						<span>шт.</span>			
					</form>
					<p class="shopping-cart_item-single_price">
					<?php if(!empty(get_post_meta( $current, 'price-mini', true ))){
						$price = get_post_meta( $current, 'price-mini', true );
					} else{
						$price = get_post_meta( $current, 'price', true );
					}
					echo $price ?> грн
					</p>
					<p class="shopping-cart_item-single_price-total">
						<?php echo $price * $product['count']; ?> грн
					</p>
				</div>
				<button class="delete-product" data-id="<?php echo $current ?>">
					<i class="zmdi zmdi-close"></i>
				</button>				
			</div>


				<?php }
					}
                ?>			 	
        </div>
		<div class="shopping-cart_price-sum">
			<p>Сумма:</p>
			<p><span>0</span> грн</p>
		</div>
		<a href="/order/">
			<button class="btn shopping-cart_order">
			Заказать
			</button>
		</a>
    </section>

    <section class="economy">
        <div class="economy-container wrapper">
            <h2 class="economy-title">Экономьте при покупке набора</h2>
            <div class="economy-items">
                <div class="economy-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/products/standart-set.png" alt="Комплект "Стандартный"">
                    <p class="economy-item-title">Комплект 	&laquo;Стандартный&raquo;</p>
                </div>
                <span class="math">+</span>
                <div class="economy-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/products/stand-set.png" alt="Автоматика Miller">
                    <p class="economy-item-title">Автоматика Miller</p>
                </div>
                <span class="math">=</span>
                <div class="economy_deal">
                    <p class="economy-prices">
                        <span class="economy-last-price">3500 грн</span>
                        <span class="economy-price"><b>2990</b> грн</span>
                    </p>
                    <button class="btn">Добавить в корзину</button>
                </div>
            </div>
        </div>  
    </section>	
    </main>


<?php get_footer(); ?>