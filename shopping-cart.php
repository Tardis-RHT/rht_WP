<?php /* Template Name: Page Shopping Cart */ ?>
<?php get_header(); ?>

<main role="main">
		<div id="overlay"></div>
    <?php echo do_shortcode('[woocommerce_cart]'); ?>
    <!-- <section class="shopping-cart wrapper">
        <h2>Корзина</h2>
        <div class="shopping-cart_items">
			<div class="shopping-cart_item-single">
				<img src="<?php echo get_template_directory_uri(); ?>/img/komplekt_standart.jpg" alt="komplekt_standart">
				<div class="shopping-cart_item-single_desc">
					<p>Комплект «Стандарт»</p>
					<ul>
						<li>Ширина проема – <b>до 5 м</b></li>
						<li>Вес ворот – <b>до 500 кг</b></li>
					</ul>
					<span>+ Регулировочная пластина</span>
				</div>
				<div class="shopping-cart_item-single_num-container">
					<form>
						<input type="number" class="shopping-cart_item-single_number" min="0">
						<span>шт.</span>			
					</form>
					<p class="shopping-cart_item-single_price">
							2990 грн	
					</p>
					<p class="shopping-cart_item-single_price-total">
							2990 грн
					</p>
				</div>
				<i class="zmdi zmdi-close"></i>
			</div>
        </div>
		<div class="shopping-cart_price-sum">
			<p>Сумма:</p>
			<p><span>6990</span> грн</p>
		</div>
		<a href="/order/">
			<button class="btn shopping-cart_order">
			Заказать
			</button>
		</a>
    </section> -->

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