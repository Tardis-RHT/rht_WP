<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
<main role="main">
    
    <div id="overlay"></div>

    <section class="furnitura-set_wrapper">
        <div class="breadcrumbs wrapper">
	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
</div>
    </section>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php 
			// wc_get_template_part( 'content', 'single-product' ); 
			?>

		
		<section class="furnitura-set_title furnitura-set_wrapper">
		<div class="furnitura_products_wrapper">
                <div class="furnitura_set_single wrapper">
                    <div class="furnitura-set_chars">
                        <h3 class="furnitura_chars_set dots">Комплект</h3>
                        <h3 class="furnitura_chars_title">&laquo;<?php the_title() ?>&raquo;</h3>
                        <ul class="furnitura_chars_main">
                            <li class="furnitura_chars_main-width">Ширина проема — <b>до <?php the_field('width'); ?> м</b></li>
                            <li class="furnitura_chars_main-weight">Вес ворот — <b>до <?php the_field('weight'); ?> кг</b></li>
                        </ul>
                        <div class="furnitura-set_checkbox">
                            <input class="adjusting-plate_checkbox" type="checkbox" id="adjusting-plate_checkbox" name="adjusting-plate_checkbox" value="0">
							<label for="adjusting-plate_checkbox">Регулировочная пластина</label><i class="zmdi zmdi-help showme"></i>
							<div class="furnitura_help">
									<img src="<?php echo get_template_directory_uri(); ?>/img/adjusting_plate.png" alt="Item of the kit">
									<p>Позволяет правильно выставить уровень ворот при установке, выровнять его при проседании почвы, а также сменить каркас или передвинуть ворота без замены фурнитуры.</p>
									<i class="zmdi zmdi-close"></i>
							</div>
                        </div>
							<p id="furnitura_chars_price" class="furnitura_chars_price">
								<!-- <?php the_field('price'); ?> -->
								<?php 
								$sale_price = get_post_meta( get_the_ID(), '_price', true);
								echo $sale_price;
								// echo var_dump($product); 
								?>
								 <span class="furnitura_hrn">грн</span></p>
							<p id="furnitura_chars_price_add" class="furnitura_chars_price_add">
							<!-- <?php the_field('price_plus'); ?> -->
							<?php 
								$regular_price = get_post_meta( get_the_ID(), '_regular_price', true);
								echo $regular_price;
								?>
							 <span class="furnitura_hrn">грн</span></p>	
                        <div class="furnitura_chars_buttons">
                            <!-- <button class="btn">Добавить в корзину</button> -->
							<a href="<?php echo home_url(); ?>/?add-to-cart=<?php echo $product->id ?>" class="btn">Добавить в корзину</a>
							<?php
							// echo $product->id;'[wc_quick_buy_link product=" '. $product->id .' "]
							echo do_shortcode('[wc_quick_buy_link product=" '. $product->id .' " label="Hurry UP!!" qty="100" type="button"]');
						  	// echo do_shortcode('[add_to_cart id=" '. $product->id .' " style="0"]');
						  ?>
                        </div>
                    </div>
                    <div class="furnitura-set_img">
                        <img class="" src="<?php the_field('set_img'); ?>" alt="Фурнитура комплект">
                    </div>
                </div>
            </div>
    </section>

    <?php get_template_part('furnitura-benefits-slider'); ?>

    <section class="furnitura-set_kit wrapper">
		<h2>В комплект входит</h2>
		<ul class="furnitura-set_fullkit">
			<li class="furnitura-set_kit_single">
				<div class="furnitura-set_kit_img">
					<img src="<?php echo get_template_directory_uri(); ?>/img/furnitura/rol_opora.jpg" alt="Item of the kit">
				</div>
				<p>Роликовая опора (металл) – 2 шт</p>
			</li>
			<li class="furnitura-set_kit_single">
				<div class="furnitura-set_kit_img">
					<img src="<?php echo get_template_directory_uri(); ?>/img/fur_benefit2.png" alt="Item of the kit">
				</div>
				<p>Направляющий профиль (86х94х5мм) – 6 м</p>
			</li>
			<li class="furnitura-set_kit_single">
				<div class="furnitura-set_kit_img">
					<img src="<?php echo get_template_directory_uri(); ?>/img/furnitura/ogranich_verh.jpg" alt="Item of the kit">
				</div>
				<p>Верхний ограничитель (2 ролика) – 1 шт</p>
			</li>
			<li class="furnitura-set_kit_single">
				<div class="furnitura-set_kit_img">
					<img src="<?php echo get_template_directory_uri(); ?>/img/furnitura/rolik_nakat.jpg" alt="Item of the kit">
				</div>
				<p>Накатной (концевой) ролик – 1 шт</p>
			</li>
			<li class="furnitura-set_kit_single">
				<div class="furnitura-set_kit_img">
					<img src="<?php echo get_template_directory_uri(); ?>/img/furnitura/ulavl_niz.jpg" alt="Item of the kit">
				</div>
				<p>Нижний улавливатель – 1 шт </p>
			</li>
			<li class="furnitura-set_kit_single">
				<div class="furnitura-set_kit_img">
					<img src="<?php echo get_template_directory_uri(); ?>/img/furnitura/ulavl_verh.jpg" alt="Item of the kit">
				</div>
				<p>Верхний улавливатель – 1 шт</p>
			</li>
			<li class="furnitura-set_kit_single">
				<div class="furnitura-set_kit_img">
					<img src="<?php echo get_template_directory_uri(); ?>/img/furnitura/zaglushka.jpg" alt="Item of the kit">
				</div>
				<p>Заглушка – 1 шт</p>
			</li>
			<li id="adjusting-plate" class="furnitura-set_kit_single">
				<div class="furnitura-set_kit_img">
					<img src="<?php echo get_template_directory_uri(); ?>/img/furnitura/regul_pastina.jpg" alt="Item of the kit">
				</div>
				<p>Регулировочная пластина</p>
			</li>
		</ul>
	</section>

	<?php get_template_part('economy'); ?>
</main>
	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		// do_action( 'woocommerce_after_main_content' );
	?>
<?php endwhile; // end of the loop. ?>
	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		// do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
