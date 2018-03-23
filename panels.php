<?php /* Template Name: Page Panels */ ?>
<?php get_header(); ?>

<main role="main">
	<div id="overlay"></div>
    
    <section class="filenka_title">
            <div class="filenka_title-container">
                    <div class="filenka-caption wrapper">
                        <h3 class="main_products-category dots">Продукция</h3>
                        <h3 class="page_products-title">Металлические филёнки <br>для зашивки ворот и калиток</h3>
                    </div>
                </div>
    </section>

    <section class="breadcrumbs wrapper">
        <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
    </section>

    <section class="automatica_benefits wrapper">
        <ul class="main_benefits_container">
            <li class="main_benefits_single">
                <img class="main_benefits_icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/production.svg" alt="Own production">
                <h3>Собственное производство</h3>
                <p>Мы изготавливаем надежные комплекты фурнитуры для откатных ворот, а также металлические филенки для зашивки ворот и калиток.</p>
            </li>
            <li class="main_benefits_single">
                <img class="main_benefits_icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/rewards.svg" alt="National rewards">
                <h3>Национальные награды</h3>
                <p>Мы  — лучшее предприятие 2016 по версии Национального рейтинга качества товаров и услуг «Звезда качества».</p>
            </li>
            <li class="main_benefits_single">
                <img class="main_benefits_icon filenka-delivery" src="<?php echo get_template_directory_uri(); ?>/img/icons/delivery.svg" alt="Delivery in 24 hours">
                <h3>Доставка за сутки</h3>
                <p>Доставляем продукцию в течении 24 часов службами САТ, ИнТайм, Деливери и Новой почтой. </p>
            </li>
        </ul>
    </section>

    <section class="furnitura_video panels_video">

        <img class="furnitura_video_pic" src="<?php echo get_template_directory_uri(); ?>/img/furnitura_video_bg.png">
        <div class="furnitura_video_wrapper wrapper">
            <h3 class="furnitura_video_h3">Подробнее о филёнке <span>ROLLING HI-TECH</span></h3>
            <!-- Hidden video div -->
            <div style="display:none;" id="video_panels">
                <video class="lg-video-object lg-html5" controls preload="none">
                    <source src="<?php echo get_template_directory_uri(); ?>/video/video.mp4" type="video/mp4">
                        Your browser does not support HTML5 video.
                </video>
                <a data-sub-html="#video_panels"href="<?php echo home_url(); ?>" class="video-fullscreen_logo toShow" id="video-fullscreen_logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo-transparent.png" alt="RHT logo">
                </a>
            </div>
            <!-- data-src should not be provided when you use html5 videos -->
            <ul id="videoFurnitura">
                <li data-html="#video_panels" >
                    <a class="main-page_video-more">
                        <div class="video_btn"></div>
                        <div class="main-page_video-link video">Посмотреть видео</div>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <section class="page_filenka_catalog wrapper">
        <h2 class="page_filenka_catalog-title">Каталог</h2>
        <div class="catalog-container">
        <?php global $post;
			$args = array('posts_per_page' => -1,
				'post_type' => 'page',
				'order' => 'ASC',
				'post_parent' => $post->ID );
            $myposts = get_posts( $args );
            foreach( $myposts as $post ){ setup_postdata($post);
        ?>
            <div class="catalog-item">
                <div class="catalog-item-info">
                    <div class="catalog-item-info-top">
                        <h5 class="catalog-item-title"><?php the_title() ?></h5>
                        <p class="catalog-item-size"><?php the_field('sizes'); ?></p>
                    </div>
                    <div class="catalog-item-info-bottom">
                        <p class="catalog-item-price"><b><?php the_field('price'); ?></b>грн/шт</p>
                        <button class="btn buy" data-id="<?php echo $post->ID?>">Добавить в корзину</button>
                    </div>
                </div>
                <img src="<?php the_field('img'); ?>" alt="<?php the_title()?>" class="catalog-item-img">
            </div>

            <?php
            }
            wp_reset_postdata();
            ?>
            
            <!-- <div class="catalog-item">
                <div class="catalog-item-info">
                    <div class="catalog-item-info-top">
                        <h5 class="catalog-item-title">Филёнка</h5>
                        <p class="catalog-item-size">480 х 280 х 1,5 мм</p>
                    </div>
                    <div class="catalog-item-info-bottom">
                        <p class="catalog-item-price"><b>199</b>грн/шт</p>
                        <button class="btn">Добавить в корзину</button>
                    </div>
                </div>
                <img src="<?php echo get_template_directory_uri(); ?>/img/products/panel_2.png" alt="Филёнка" class="catalog-item-img">
            </div>
            <div class="catalog-item">
                <div class="catalog-item-info">
                    <div class="catalog-item-info-top">
                        <h5 class="catalog-item-title">Филёнка</h5>
                        <p class="catalog-item-size">480 х 280 х 1,5 мм</p>
                    </div>
                    <div class="catalog-item-info-bottom">
                        <p class="catalog-item-price"><b>199</b>грн/шт</p>
                        <button class="btn">Добавить в корзину</button>
                    </div>
                </div>
                <img src="<?php echo get_template_directory_uri(); ?>/img/products/panel_3.png" alt="Филёнка" class="catalog-item-img">
            </div>
            <div class="catalog-item">
                <div class="catalog-item-info">
                    <div class="catalog-item-info-top">
                        <h5 class="catalog-item-title">Филёнка</h5>
                        <p class="catalog-item-size">480 х 280 х 1,5 мм</p>
                    </div>
                    <div class="catalog-item-info-bottom">
                        <p class="catalog-item-price"><b>199</b>грн/шт</p>
                        <button class="btn">Добавить в корзину</button>
                    </div>
                </div>
                <img src="<?php echo get_template_directory_uri(); ?>/img/products/panel_4.png" alt="Филёнка" class="catalog-item-img">
            </div> -->
        </div>
    </section>

    <section class="page_filenka_slider-container wrapper">
        <h2 class="page_filenka_slider-title">
            Примеры ворот из нашей филёнки
        </h2>
        <ul class="filenka-slider" id="lightSlider_filenka">
            <li class="filenka-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/img/products/panel-slider.png" alt="Пример ворот из нашей филёнки">
            </li>
            <li class="filenka-slide">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/products/panel-slider.png" alt="Пример ворот из нашей филёнки">        </li>
            <li class="filenka-slide">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/products/panel-slider.png" alt="Пример ворот из нашей филёнки">        </li>
            <li class="filenka-slide">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/products/panel-slider.png" alt="Пример ворот из нашей филёнки">        </li>
            <li class="filenka-slide">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/products/panel-slider.png" alt="Пример ворот из нашей филёнки">        </li>
            <li class="filenka-slide">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/products/panel-slider.png" alt="Пример ворот из нашей филёнки">        </li>
        </ul>
    </section>

	<?php get_template_part('feedback'); ?>

    <section class="automatica_offers wrapper">
        <h2 class="automatica_offers-title">Также предлагаем</h2>
        <div class="offers">
            <a class="offer-furnitura" href="/furnitura/">
                <h3>Фурнитура</h3>
            </a>
            <a class="offer-automatica" href="/automatica/">
                <h3>Автоматика</h3>
            </a>
        </div>
    </section>
    <?php get_template_part('callback'); ?>
	</main>


<?php get_footer(); ?>