<?php
/*
Post Template Name: Automatica Card Ukr
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
                        <li class="automatica_set-weight">Максимальна вага воріт &mdash; <b><?php echo get_post_meta( $post->ID, 'weight', true ); ?> кг</b></li>
                        <li class="automatica_set-power">Потужність мотору &mdash; <b><?php echo get_post_meta( $post->ID, 'power', true ); ?> Вт</b></li>
                    </ul>
                    <ul class="automatica_set-characteristics-additional">
                        <li>Країна виробник &mdash; <?php echo get_post_meta( $post->ID, 'country', true ); ?></li>
                        <li>Напруга живлення &mdash; <?php echo get_post_meta( $post->ID, 'voltage', true ); ?>В</li>
                        <li>Робоча температура &mdash; <?php echo get_post_meta( $post->ID, 'temperature', true ); ?></li>
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
        <h2 class="inset-title">У комплект входить</h2>
        <form action="" id="automatica-form">
            <p class="inset-format">Формат комплекту:</p>
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
                        <p class="inset-item-name">Привід &mdash; 1&nbsp;шт</p>
                    </div>
                    <div class="inset-item">
                            <div class="inset-img-container">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/products/bitmap.png" alt="Пульт 2-х канальный">
                            </div>
                        <p class="inset-item-name">Пульт 2-х канальний &mdash; 2&nbsp;шт</p>
                    </div>
                    <div class="inset-item with-input">
                            <div class="inset-img-container">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/products/bitmap1.png" alt="Стальная оцинкованная зубчатая рейка">
                            </div>
                        <p class="inset-item-name">Сталева оцинкована зубчата рейка &mdash; 4&nbsp;м</p>
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
                        <p class="inset-item-name">Сигнальна лампа &mdash; 1&nbsp;шт</p>
                    </div>
                    <div class="inset-item maxi">
                            <div class="inset-img-container">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/products/bitmap3.png" alt="Комплект фотоэлементов безопасности">
                            </div>
                        <p class="inset-item-name">Комплект фотоелементів безпеки &mdash; 1&nbsp;шт</p>
                    </div>
                </div>
                <div class="inset-order">
                    <p class="automatica_set-price">
                    <b id="for-mini"> <?php echo get_post_meta( $post->ID, 'price-mini', true ); ?></b>
                    <b id="for-maxi"> <?php echo get_post_meta( $post->ID, 'price-maxi', true ); ?></b>
                     грн
                    </p>
                    <button class="btn" id="automatica-btn" disabled>
                            Додати у корзину
                    </button>
                </div>            
            </div>
    </section>

    <section class="automatica-more wrapper">
        <h2 class="automatica-more-title">Детальніше про автоматику Rotelli</h2>
        <ul class="main_benefits_container">
            <li class="main_benefits_single">
                <img class="automatica_benefits_icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/Combined Shape.svg" alt="Own production">
                <h3>Сталеві шестерні</h3>
                <p>Наші шестерні зі сталі, а не полімерні, тому вся система у 3 раза стійкіша, ніж звичайна.</p>
            </li>
            <li class="main_benefits_single">
                <img class="automatica_benefits_icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/Combined Shape3.svg" alt="National rewards">
                <h3>Магнітні вимикачі</h3>
                <p>Ми використовуємо тільки магнітні кінцеві вимикачі. Вони не реагують на морози та точно не підведуть у холодну пору.</p>
            </li>
            <li class="main_benefits_single">
                <img class="automatica_benefits_icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/Combined Shape2.svg" alt="Delivery in 24 hours">
                <h3>Сталева зубчаста рейка</h3>
                <p>Ми використовуємо тільки металеву рейку. Це запорука довшої служби автоматики.</p>
            </li>
        </ul>
    </section>

    <section class="automatica-install">
        <p class="automatica-instruction wrapper">
            <span>Як встановити автоматику Rotelli своїми руками:</span>
            <a class="ghost_btn material-icons" href="<?php the_field('downloadManual', '63'); ?>" target="_blank">Скачати інструкцію  
                <i class="zmdi zmdi-download"></i>
            </a>
        </p>
    </section>

	<?php get_template_part('economy'); ?>

    </main>


<?php get_footer(); ?>