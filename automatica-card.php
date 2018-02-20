<?php
/*
Post Template Name: Automatica Card
*/
?>
<?php get_header(); ?>

<main role="main">
	<div id="overlay"></div>
        
    <section class="furnitura-set_wrapper">
        <div class="breadcrumbs wrapper">
             <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
        </div>
    </section>

    <section class="card_automatica_title">
        <div class="automatica_title-container wrapper">
            <div class="main_products-caption">
                <div class="automatica_set-capture">
                    <h3 class="main_products-category dots">Комплект</h3>
                    <h3 class="automatica_set-title"><?php the_title(); ?></h3>
                    <ul class="automatica_set-characteristics">
                        <li class="automatica_set-weight">Максимальный вес ворот &mdash; <b><?php echo get_post_meta( $post->ID, 'weight', true ); ?> кг</b></li>
                        <li class="automatica_set-power">Мощность мотора &mdash; <b><?php echo get_post_meta( $post->ID, 'power', true ); ?> Вт</b></li>
                    </ul>
                    <ul class="automatica_set-characteristics-additional">
                        <li>Страна производитель &mdash; <?php echo get_post_meta( $post->ID, 'country', true ); ?></li>
                        <li>Напряжение питания &mdash; <?php echo get_post_meta( $post->ID, 'voltage', true ); ?>В</li>
                        <li>Рабочая температура &mdash; <?php echo get_post_meta( $post->ID, 'temperature', true ); ?></li>
                    </ul>
                </div>
            </div>
            <img src="<?php the_field('img'); ?>" alt="Автоматика комплект <?php the_title(); ?>">
            <div class="garantee">
                <img src="<?php the_field('img'); ?>" alt="Автоматика комплект <?php the_title(); ?>">
            </div>            
        </div>
    </section>

    <section class="automatica-inset wrapper">
        <h2 class="inset-title">В комплект входит</h2>
        <form action="" id="automatica-form">
            <p class="inset-format">Формат комплекта:</p>
            <span class="toggle">
                    <input id="mini" type="radio" name="toggle" value="mini" checked>
                    <label for="mini">Mini</label>
                    <input id="maxi" type="radio" name="toggle" value="maxi">
                    <label for="maxi">Maxi</label>
            </span>
            <div class="inset-container">
                <div class="inset-items">
                    <div class="inset-item">
                        <div class="inset-img-container">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/products/bitmap4.png" alt="Привод">
                        </div>
                        <p class="inset-item-name">Привод &mdash; 1&nbsp;шт</p>
                    </div>
                    <div class="inset-item">
                            <div class="inset-img-container">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/products/bitmap.png" alt="Пульт 2-х канальный">
                            </div>
                        <p class="inset-item-name">Пульт 2-х канальный &mdash; 2&nbsp;шт</p>
                    </div>
                    <div class="inset-item with-input">
                            <div class="inset-img-container">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/products/bitmap1.png" alt="Стальная оцинкованная зубчатая рейка">
                            </div>
                        <p class="inset-item-name">Стальная оцинкованная зубчатая рейка &mdash; 4&nbsp;м</p>
                        <input type="text" class="item-width" placeholder="Ширина проема ворот" id="automatica-width" oninput="checkInput()">
                        <i class="zmdi zmdi-help showme"></i>
                        <!-- <div class="automatica_help">
                            <img src="img/adjusting_plate.png" alt="Item of the kit">
                            <p>Позволяет правильно выставить уровень ворот при установке, выровнять его при проседании почвы, а также сменить каркас или передвинуть ворота без замены фурнитуры.</p>
                            <i class="zmdi zmdi-close"></i>
                        </div> -->
                    </div>
                    <div class="inset-item maxi">
                            <div class="inset-img-container">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/products/bitmap2.png" alt="Сигнальная лампа">
                            </div>
                        <p class="inset-item-name">Сигнальная лампа &mdash; 1&nbsp;шт</p>
                    </div>
                    <div class="inset-item maxi">
                            <div class="inset-img-container">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/products/bitmap3.png" alt="Комплект фотоэлементов безопасности">
                            </div>
                        <p class="inset-item-name">Комплект фотоэлементов безопасности &mdash; 1&nbsp;шт</p>
                    </div>
                </div>
                <div class="inset-order">
                    <p class="automatica_set-price">
                    <b id="for-mini"> <?php echo get_post_meta( $post->ID, 'price-mini', true ); ?></b>
                    <b id="for-maxi"> <?php echo get_post_meta( $post->ID, 'price-maxi', true ); ?></b>
                     грн
                    </p>
                    <button class="btn buy" data-id="<?php echo $post->ID?>?mini" id="automatica-btn" disabled>
                            Добавить в корзину
                    </button>
                </div>            
            </div>
    </section>

    <section class="automatica-more wrapper">
        <h2 class="automatica-more-title">Подробнее об автоматике Rotelli</h2>
        <ul class="main_benefits_container">
            <li class="main_benefits_single">
                <img class="automatica_benefits_icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/Combined Shape.svg" alt="Own production">
                <h3>Стальные шестерни</h3>
                <p>Наши шестерни из стали, а не полимерные, поэтому вся система в 3 раза устойчивее обычной.</p>
            </li>
            <li class="main_benefits_single">
                <img class="automatica_benefits_icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/Combined Shape3.svg" alt="National rewards">
                <h3>Магнитные выключатели</h3>
                <p>Мы используем только магнитные концевые выключатели. Они не реагируют на морозы и точно не подведут в холодную пору.</p>
            </li>
            <li class="main_benefits_single">
                <img class="automatica_benefits_icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/Combined Shape2.svg" alt="Delivery in 24 hours">
                <h3>Стальная зубчатая рейка</h3>
                <p>Мы используем только металлическую рейку. Это залог дольшей службы автоматики.</p>
            </li>
        </ul>
    </section>

    <section class="automatica-install">
        <p class="automatica-instruction wrapper">
            <span>Как установить автоматику Rotelli своими руками:</span>
            <a class="ghost_btn material-icons" href="<?php the_field('downloadManual', '63'); ?>" target="_blank">Скачать инструкцию  
                <i class="zmdi zmdi-download"></i>
            </a>
        </p>
    </section>

	<?php get_template_part('economy'); ?>

    </main>


<?php get_footer(); ?>