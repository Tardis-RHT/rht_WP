<?php /* Template Name: Page Furnitura */ ?>
<?php get_header(); ?>

<main role="main">
<div id="overlay"></div>

    <section class="furnitura_title">
        <div class="furnitura_title_wrapper">
            <div class="furnitura_title_wrapper-small wrapper">
                    <h3 class="furnitura_h3_product dots">Продукция</h3>
                    <h3 class="furnitura_products-title">Усиленная фурнитура для откатных ворот</h3>
            </div>
        </div>
	</section>
	
	<section class="breadcrumbs wrapper">
            <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
    </section>
    
    <section class="main_benefits">
        <ul class="main_benefits_container">
            <li class="main_benefits_single">
                <img class="main_benefits_icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/production.svg" alt="Own production">
                <h3>Собственное производство</h3>
                <p>Мы изготавливаем надежные комплекты фурнитуры для откатных ворот, а также металлические филенки для зашивки ворот и калиток.</p>
            </li>
            <li class="main_benefits_single">
                <img class="main_benefits_icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/quality.svg" alt="14 years of quality">
                <h3>14 лет качества</h3>
                <p>За 14 лет ни у кого не возникло проблем, чтобы обратиться с гарантией.</p>
            </li>
            <li class="main_benefits_single">
                <img class="main_benefits_icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/rewards.svg" alt="National rewards">
                <h3>Национальные награды</h3>
                <p>Мы  — лучшее предприятие 2016 по версии Национального рейтинга качества товаров и услуг «Звезда качества».</p>
            </li>
            <li class="main_benefits_single">
                <img class="main_benefits_icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/warranty.svg" alt="International experience">
                <h3>Гарантия 5 лет</h3>
                <p>В течении 5 лет бесплатно заменим любую деталь.</p>
            </li>
            <li class="main_benefits_single">
                <img class="main_benefits_icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/wholesale.svg" alt="Wholesale proces">
                <h3>Оптовые цены</h3>
                <p>Для партнеров и тех, кто заказывает от 10 комплектов фурнитуры, действуют оптовые цены.</p>
            </li>
            <li class="main_benefits_single">
                <img class="main_benefits_icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/delivery.svg" alt="Delivery in 24 hours">
                <h3>Доставка за сутки</h3>
                <p>Доставляем продукцию в течении 24 часов службами САТ, ИнТайм, Деливери и Новой почтой. </p>
            </li>
        </ul>
    </section>

	<section class="furnitura_video">
		<img class="furnitura_video_pic" src="<?php echo get_template_directory_uri(); ?>/img/furnitura_video_bg.png">
		<div class="furnitura_video_wrapper wrapper">
			<h3 class="furnitura_video_h3">Детальнее об усиленной фурнитуре <span>ROLLING HI-TECH</span></h3>
			<!-- Hidden video div -->
			<div style="display:none;" id="video_furnitura">
				<video class="lg-video-object lg-html5" controls preload="none">
					<source src="<?php echo get_template_directory_uri(); ?>/video/video.mp4" type="video/mp4">
						Your browser does not support HTML5 video.
				</video>
			</div>
			<!-- data-src should not be provided when you use html5 videos -->
			<ul id="videoFurnitura">
				<li data-html="#video_furnitura" >
					<a class="main-page_video-more">
						<div class="video_btn"></div>
						<div class="main-page_video-link video">Посмотреть видео</div>
					</a>
				</li>
			</ul>
		</div>
	</section>

	<section class="furnitura_download">
		<div class="furnitura_wrapper wrapper">
			<p>Собираетесь установить ворота своими руками?</p>
			<a class="ghost_btn material-icons" href="<?php the_field('downloadManual'); ?>" target="_blank">Скачать инструкцию <i class="zmdi zmdi-download"></i>
			</a>
		</div>
	</section>

	<section class="furnitura_choose">
		<div class="choose_wrapper wrapper">
			<h2>Подобрать фурнитуру</h2>
			<p>Укажите материал ваших ворот и их высоту. Выберете ширину ворот и нажмите «Применить». Готово! Вы увидите комплеты фурнитуры для ваших ворот.</p>
			<div class="furnitura_choose_options">
				<div class="furnitura_choose_material">
					<span class="furnitura_choose_title">Материал зашивки ворот</span>
					<div class="furnitura_choose_dropdown dropdown">
						<!-- <button onclick="myFunction()" class="dropbtn">Любой</button>
						<div id="myDropdown" class="dropdown-content">
						<a href="#">Профнастил</a>
						<a href="#">Легкая ковка</a>
						<a href="#">Легкие породы дерева</a>
						<a href="#">Другая легкая зашивка</a>
						<a href="#">Металлическая филенка</a>
						<a href="#">Массивная ковка</a>
						<a href="#">Другая тяжелая зашивка</a>
						</div> -->
						<select id="fur_material" class="dropbtn js-array" name="material" required>
							<option selected="selected" disabled="disabled">Выберите материал</option>
							<option value="Профнастил">Профнастил</option>
							<option value="Легкая ковка">Легкая ковка</option>
							<option value="Легкие породы дерева">Легкие породы дерева</option>
							<option value="Другая легкая зашивка">Другая легкая зашивка</option>
							<option value="Металлическая филенка">Металлическая филенка</option>
							<option value="Массивная ковка">Массивная ковка</option>
							<option value="Другая тяжелая зашивка">Другая тяжелая зашивка</option>
						</select>
					</div>
				</div>
				<div class="furnitura_choose_height">
					<span class="furnitura_choose_title">Высота, м</span>
					<div class="range-slider">
						<span class="">0</span>							
						<input id="fur_height" class="range-slider__range js-array" type="range" name="height" min="0" max="4" step="0.1" value="0" disabled> 
						<span class="range-slider__value">0</span>
					</div>									
				</div>
				<div class="furnitura_choose_width">
					<span class="furnitura_choose_title">Ширина проема, м</span>
					<div class="range-slider">
						<span class="">0</span>							
						<input id="fur_width" class="range-slider__range js-array" type="range" name="width" min="0" max="8.5" step="0.1" value="0" disabled> 
						<span class="range-slider__value">0</span>
					</div>
				</div>
				<button id="fur_submit" class="furnitura_choose_btn btn" disabled type="submit">Применить</button>
			</div>
		</div>
	</section>

	<section class="furnitura_products">
		<!-- START OF THE SET BLOCK -->
		<?php
            global $post;
			$args = array('posts_per_page' => -1,
				'post_type' => 'page',
				'order' => 'ASC',
				'post_parent' => $post->ID );
            $myposts = get_posts( $args );
            foreach( $myposts as $post ){ setup_postdata($post);
                ?>
		<div class="furnitura_products_wrapper">
			<div class="furnitura_products_single wrapper">
				<div class="furnitura_products_chars">
					<h3 class="furnitura_chars_set dots">Комплект</h3>
					<h3 class="furnitura_chars_title"><?php the_title() ?></h3>
					<ul class="furnitura_chars_main">
						<li class="furnitura_chars_main-width">Ширина проема — <b>до <?php the_field('width'); ?> м</b></li>
						<li class="furnitura_chars_main-weight">Вес ворот — <b>до <?php the_field('weight'); ?> кг</b></li>
					</ul>
					<ul class="furnitura_chars_additional">
						<li>Направляющий профиль <span><?php the_field('profil'); ?></span></li>
						<li>Верхний ограничитель — <span><?php the_field('limiter'); ?></span> шт</li>
						<li>Роликовая опора <span><?php the_field('pillar'); ?></span> шт</li>
						<li>Нижний улавливатель — 1 шт</li>
						<li>Верхний улавливатель — 1 шт</li>
						<li>Накатной ролик — 1 шт</li>
						<li>Заглушка — 1 шт</li>
					</ul>
					<p class="furnitura_chars_price"><?php the_field('price'); ?> <span class="furnitura_hrn">грн</span></p>
					<div class="furnitura_chars_buttons">
						<a class="ghost_link" href="furnitura-set.html">Подробнее ></a>
						<button class="btn buy" data-id="<?php echo $post->ID?>">Добавить в корзину</button>
						<button class="ghost_btn" onClick='location.href="<?php echo get_permalink();?>"'>Подробнее</button>
					</div>
				</div>
				<div class="furnitura_products_img">
					<img class="" src="<?php the_field('img'); ?>" alt="Фурнитура комплект">
				</div>
			</div>
		</div>

		<?php
            }
            wp_reset_postdata();
            ?>
		<!-- END OF THE SET BLOCK -->
		<div class="furnitura_products_end"><button class="furnitura_products_more ghost_btn">Загрузить больше</button></div>
	</section>

	<?php get_template_part('feedback'); ?>

	<section class="furnitura_offer wrapper">
		<h2>Также предлагаем</h2>
		<div class="offers">
			<a class="offer-automatica" href="/automatica/">
				<div>
					<h3>Автоматика</h3>
					<div class="offer_btn">Подробнее</div>
				</div>
			</a>
			<a class="offer-filenka2" href="/panels/">
				<div>
					<h3>Металлическая<br>филёнка</h3>
					<div class="offer_btn">Подробнее</div>
				</div>
			</a>
		</div>
	</section>

	<?php 
		global $showOnlyModal;
		$showOnlyModal = false; 
		get_template_part('callback'); 
	?>
	</main>


<?php get_footer(); ?>