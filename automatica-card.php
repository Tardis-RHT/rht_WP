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
                        <li class="automatica_set-weight">Максимальный вес ворот &mdash; <b><?php echo get_post_meta( $post->ID, 'weight', true ); ?> кг</b></li>
                        <li class="automatica_set-power">Мощность мотора &mdash; <b><?php echo get_post_meta( $post->ID, 'power', true ); ?> Вт</b></li>
                    </ul>
                    <ul class="automatica_set-characteristics-additional">
                        <li>Страна производитель &mdash; Италия</li>
                        <li>Напряжение питания &mdash; 220В</li>
                        <li>Рабочая температура &mdash; -20С ... +60С</li>
                    </ul>
                </div>
            </div>
            <img src="img/products/automatica-set_2.png" alt="Автоматика комплект Rotelli Premium 1100">
            <img src="img/products/automatica-garantee_2y.png" alt="Гарантия 2 года" class="garantee">
        </div>
    </section>

    <section class="automatica-inset wrapper">
        <h2 class="inset-title">В комплект входит</h2>
        <p class="inset-format">Формат комплекта:</p>
        <span class="toggle">
                <input id="mini" type="radio" name="toggle" value="mini" checked onclick="maximize()">
                <label for="mini">Mini</label>
                <input id="maxi" type="radio" name="toggle" value="maxi" onclick="maximize()">
                <label for="maxi">Maxi</label>
        </span>
        <div class="inset-container">
            <div class="inset-items">
                <div class="inset-item">
                    <div class="inset-img-container">
                        <img src="../img/products/bitmap4.png" alt="Привод">
                    </div>
                    <p class="inset-item-name">Привод &mdash; 1&nbsp;шт</p>
                </div>
                <div class="inset-item">
                        <div class="inset-img-container">
                            <img src="../img/products/bitmap.png" alt="Пульт 2-х канальный">
                        </div>
                    <p class="inset-item-name">Пульт 2-х канальный &mdash; 2&nbsp;шт</p>
                </div>
                <div class="inset-item with-input">
                        <div class="inset-img-container">
                            <img src="../img/products/bitmap1.png" alt="Стальная оцинкованная зубчатая рейка">
                        </div>
                    <p class="inset-item-name">Стальная оцинкованная зубчатая рейка &mdash; 4&nbsp;м</p>
                    <input type="text" class="item-width" placeholder="Ширина проема ворот">
                    <i class="zmdi zmdi-help showme"></i>
                    <!-- <div class="automatica_help">
                        <img src="img/adjusting_plate.png" alt="Item of the kit">
                        <p>Позволяет правильно выставить уровень ворот при установке, выровнять его при проседании почвы, а также сменить каркас или передвинуть ворота без замены фурнитуры.</p>
                        <i class="zmdi zmdi-close"></i>
                    </div> -->
                </div>
                <div class="inset-item maxi">
                        <div class="inset-img-container">
                            <img src="../img/products/bitmap2.png" alt="Сигнальная лампа">
                        </div>
                    <p class="inset-item-name">Сигнальная лампа &mdash; 1&nbsp;шт</p>
                </div>
                <div class="inset-item maxi">
                        <div class="inset-img-container">
                            <img src="../img/products/bitmap3.png" alt="Комплект фотоэлементов безопасности">
                        </div>
                    <p class="inset-item-name">Комплект фотоэлементов безопасности &mdash; 1&nbsp;шт</p>
                </div>
            </div>
            <div class="inset-order">
                <p class="automatica_set-price">
                    <b>2990</b> грн
                </p>
                <button class="btn">
                        Добавить в корзину
                </button>
            </div>            
        </div>
    </section>

    <section class="automatica-more wrapper">
        <h2 class="automatica-more-title">Подробнее об автоматике Rotelli</h2>
        <ul class="main_benefits_container">
            <li class="main_benefits_single">
                <img class="automatica_benefits_icon" src="img/icons/Combined Shape.svg" alt="Own production">
                <h3>Стальные шестерни</h3>
                <p>Наши шестерни из стали, а не полимерные, поэтому вся система в 3 раза устойчивее обычной.</p>
            </li>
            <li class="main_benefits_single">
                <img class="automatica_benefits_icon" src="img/icons/Combined Shape3.svg" alt="National rewards">
                <h3>Магнитные выключатели</h3>
                <p>Мы используем только магнитные концевые выключатели. Они не реагируют на морозы и точно не подведут в холодную пору.</p>
            </li>
            <li class="main_benefits_single">
                <img class="automatica_benefits_icon" src="img/icons/Combined Shape2.svg" alt="Delivery in 24 hours">
                <h3>Стальная зубчатая рейка</h3>
                <p>Мы используем только металлическую рейку. Это залог дольшей службы автоматики.</p>
            </li>
        </ul>
    </section>

    <section class="automatica-install">
        <p class="automatica-instruction wrapper">
            <span>Как установить автоматику Rotelli своими руками:</span>
            <button class="ghost_btn material-icons">Скачать инструкцию  
                <i class="zmdi zmdi-download"></i>
            </button>
        </p>
    </section>

    <section class="economy">
        <div class="economy-container wrapper">
            <h2 class="economy-title">Экономьте при покупке набора</h2>
            <div class="economy-items">
                <div class="economy-item">
                    <img src="../img/products/standart-set.png" alt="Комплект "Стандартный"">
                    <p class="economy-item-title">Комплект 	&laquo;Стандартный&raquo;</p>
                </div>
                <span class="math">+</span>
                <div class="economy-item">
                    <img src="../img/products/stand-set.png" alt="Автоматика Miller">
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