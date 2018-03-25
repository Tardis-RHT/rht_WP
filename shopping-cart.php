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
				foreach($products as $productData => $quantity ){ 

					if(strrpos($productData, "?") !== false){
						$product = stristr($productData, '?', true);
					} else{
						$product = $productData;
					}
		?>
					
			<div class="shopping-cart_item-single">
				<img src="<?php the_field('img', $product); ?>" alt="<?php echo get_the_title( $product ); ?>" class="shopping-cart_item-single_img">
				<div class="shopping-cart_item-single_desc">
					<!-- different set fot each category -->
					<?php $template = get_page_template_slug($product);
					//for furniture:
						if ($template == 'furnitura_set.php'):?>
						<p>Комплект &laquo;<?php echo get_the_title( $product ); ?>&raquo;</p>
					<ul>
						<li>Ширина проема – <b>до <?php the_field('width', $product); ?> м</b></li>
						<li>Вес ворот – <b>до <?php the_field('weight', $product); ?> кг</b></li>
					</ul>
					
					<?php if(strrpos($productData, "?plate") !== false){ ?>
					<span>+ Регулировочная пластина</span>
					<?php } ?>

					<?php endif; ?>
					
					<!-- for automation: -->
					<?php if ($template == 'automatica-card.php'):?>
					<p>Автоматика &laquo;<?php echo get_the_title( $product ); ?>&raquo;</p>
					<ul>
						<li class="automatica_set-weight">
							Максимальный вес ворот &mdash; <b>
							<?php echo get_post_meta( $product, 'weight', true ); ?> кг</b>
						</li>
						<li class="automatica_set-power">
							Мощность мотора &mdash; <b>
							<?php echo get_post_meta( $product, 'power', true ); ?> Вт</b>
						</li>
						<?php if(strrpos($productData, "?mini") !== false){ ?>
						<li class="automatica_set-power">
							Формат комплекта - <b>mini</b>
						</li>
						<?php } elseif(strrpos($productData, "?maxi") !== false){?>
						<li class="automatica_set-power">
							Формат комплекта - <b>maxi</b>
						</li>
						<?php } ?>
						<li class="automatica_set-power">
							Ширина ворот &mdash; <b>
							<?php $pos = strpos($productData, '?w=') + 3;
							echo substr ($productData, $pos) ?> м</b>
						</li>
					</ul>
					<?php endif;?>

					<!-- for panels: -->
					<?php if ($template == 'panels.php'):?>
					<p><?php echo get_the_title( $product ); ?></p>
					<ul>
						<li class="automatica_set-weight">
							<?php echo get_post_meta( $product, 'sizes', true ); ?>
						</li>
					</ul>
					<?php endif;?>
				</div>
				<div class="shopping-cart_item-single_num-container">
					<form>
						<input type="number" class="shopping-cart_item-single_number" min="0" value="<?php
						echo $quantity;?>" data-id="<?php echo $productData;?>">
						<span>шт.</span>			
					</form>
					<p class="shopping-cart_item-single_price">
					<?php 
					if(strrpos($productData, "?plate") !== false){ 
						$price = get_post_meta( $product, 'price_plus', true );
					} elseif(strrpos($productData, "?mini") !== false){
						$price = get_post_meta( $product, 'price-mini', true );
					} elseif(strrpos($productData, "?maxi") !== false){
						$price = get_post_meta( $product, 'price-maxi', true );
					} else{
						$price = get_post_meta( $product, 'price', true );
					}
					echo $price ?> грн
					</p>
					<p class="shopping-cart_item-single_price-total">
						<?php echo $price * $quantity ?> грн
					</p>
				</div>
				<button class="delete-product" data-id="<?php echo $productData ?>">
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