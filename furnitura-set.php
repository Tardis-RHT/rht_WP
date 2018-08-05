<?php /*
Post Template Name: Furnitura Set 
*/ ?>

<?php get_header(); ?>
<main role="main">
    
    <div id="overlay"></div>

    <section class="furnitura-set_wrapper">
        <div class="breadcrumbs wrapper">
	        <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
        </div>
    </section>

    <section class="furnitura-set_title furnitura-set_wrapper">
		<div class="furnitura_products_wrapper">
                <div class="furnitura_set_single wrapper">
                    <div class="furnitura-set_chars">
                        <h3 class="furnitura_chars_set dots">Комплект</h3>
                        <h3 class="furnitura_chars_title"><?php the_title() ?></h3>
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
							<p id="furnitura_chars_price" class="furnitura_chars_price"><?php the_field('price'); ?> <span class="furnitura_hrn">грн</span></p>
							<p id="furnitura_chars_price_add" class="furnitura_chars_price_add"><?php the_field('price_plus'); ?> <span class="furnitura_hrn">грн</span></p>	
                        <div class="furnitura_chars_buttons">
                            <button id="furnitura_buy" class="btn buy" data-id="<?php echo $post->ID?>">Добавить в корзину</button>
                        </div>
                    </div>
                    <div class="furnitura-set_img">
                        <img class="" src="<?php the_field('img'); ?>" alt="Фурнитура комплект">
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
					<img src="<?php echo get_template_directory_uri(); ?>/img/furnitura/rol_opora@1x.png" srcset="<?php echo get_template_directory_uri(); ?>/img/furnitura/rol_opora@1x.png 1x, <?php echo get_template_directory_uri(); ?>/img/furnitura/rol_opora@2x.png 2x" alt="Item of the kit">
				</div>
				<p>Роликовая опора <span><?php the_field('pillar'); ?></span> шт</p>
			</li>
			<li class="furnitura-set_kit_single">
				<div class="furnitura-set_kit_img">
					<img src="<?php echo get_template_directory_uri(); ?>/img/furnitura/fur_benefit2@1x.png" srcset="<?php echo get_template_directory_uri(); ?>/img/furnitura/fur_benefit2@1x.png 1x, <?php echo get_template_directory_uri(); ?>/img/furnitura/fur_benefit2@2x.png 2x" alt="Item of the kit">
				</div>
				<p>Направляющий профиль <span><?php the_field('profil'); ?></span></p>
			</li>
			<li class="furnitura-set_kit_single">
				<div class="furnitura-set_kit_img">
					<img src="<?php echo get_template_directory_uri(); ?>/img/furnitura/ogranich_verh@1x.png" srcset="<?php echo get_template_directory_uri(); ?>/img/furnitura/ogranich_verh@1x.png 1x, <?php echo get_template_directory_uri(); ?>/img/furnitura/ogranich_verh@2x.png 2x" alt="Item of the kit">
				</div>
				<p>Верхний ограничитель — <span><?php the_field('limiter'); ?></span> шт</p>
			</li>
			<li class="furnitura-set_kit_single">
				<div class="furnitura-set_kit_img">
					<img src="<?php echo get_template_directory_uri(); ?>/img/furnitura/rolik_nakat@1x.png" srcset="<?php echo get_template_directory_uri(); ?>/img/furnitura/rolik_nakat@1x.png 1x, <?php echo get_template_directory_uri(); ?>/img/furnitura/rolik_nakat@2x.png 2x" alt="Item of the kit">
				</div>
				<p>Накатной (концевой) ролик – 1 шт</p>
			</li>
			<li class="furnitura-set_kit_single">
				<div class="furnitura-set_kit_img">
					<img src="<?php echo get_template_directory_uri(); ?>/img/furnitura/ulavl_niz@1x.png" srcset="<?php echo get_template_directory_uri(); ?>/img/furnitura/ulavl_niz@1x.png 1x, <?php echo get_template_directory_uri(); ?>/img/furnitura/ulavl_niz@2x.png 2x" alt="Item of the kit">
				</div>
				<p>Нижний улавливатель – 1 шт </p>
			</li>
			<li class="furnitura-set_kit_single">
				<div class="furnitura-set_kit_img">
					<img src="<?php echo get_template_directory_uri(); ?>/img/furnitura/ulavl_verh@1x.png" srcset="<?php echo get_template_directory_uri(); ?>/img/furnitura/ulavl_verh@1x.png 1x, <?php echo get_template_directory_uri(); ?>/img/furnitura/ulavl_verh@2x.png 2x" alt="Item of the kit">
				</div>
				<p>Верхний улавливатель – 1 шт</p>
			</li>
			<li class="furnitura-set_kit_single">
				<div class="furnitura-set_kit_img">
					<img src="<?php echo get_template_directory_uri(); ?>/img/furnitura/zaglushka@1x.png" srcset="<?php echo get_template_directory_uri(); ?>/img/furnitura/zaglushka@1x.png 1x, <?php echo get_template_directory_uri(); ?>/img/furnitura/zaglushka@2x.png 2x" alt="Item of the kit">
				</div>
				<p>Заглушка – 1 шт</p>
			</li>
			<li id="adjusting-plate" class="furnitura-set_kit_single">
				<div class="furnitura-set_kit_img">
					<img src="<?php echo get_template_directory_uri(); ?>/img/furnitura/regul_pastina@1x.png"  srcset="<?php echo get_template_directory_uri(); ?>/img/furnitura/regul_plastina@1x.png 1x, <?php echo get_template_directory_uri(); ?>/img/furnitura/regul_plastina@2x.png 2x" alt="Item of the kit">
				</div>
				<p>Регулировочная пластина</p>
			</li>
		</ul>
	</section>

	<?php get_template_part('economy'); ?>

</main>
<?php get_footer(); ?>