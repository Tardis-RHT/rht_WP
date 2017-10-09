<?php /* Template Name: Page Automatica */ ?>
<?php get_header(); ?>

<main role="main">
    <div id="overlay"></div>
    
    <section class="automatica_title">
            <div class="automatica_title-container wrapper">
                    <div class="main_products-caption">
                        <h3 class="main_products-category dots">Продукция</h3>
                        <h3 class="page_products-title">Автоматика <br>для откатных ворот</h3>
                    </div>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/products/automatica-page.png" alt="Автоматика" class="product-img">
                </div>
    </section>

    <section class="breadcrumbs wrapper">
	    <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
    </section>

    <section class="automatica_benefits wrapper">
        <ul class="main_benefits_container">
            <li class="main_benefits_single">
                <img class="main_benefits_icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/automatica-icon1.png" alt="Own production">
                <h3>Универсальность</h3>
                <p>Автоматика Rotelli и Miller Technics подходит для лююбых откатных ворот</p>
            </li>
            <li class="main_benefits_single">
                <img class="main_benefits_icon automatica-garantee" src="<?php echo get_template_directory_uri(); ?>/img/icons/automatica-icon2.png" alt="14 years of quality">
                <h3>Гарантия</h3>
                <p>3 года для комплекта автоматики Miller Technics и 2 года для Rotelli</p>
            </li>
            <li class="main_benefits_single">
                <img class="main_benefits_icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/automatica-icon3.png" alt="National rewards">
                <h3>Доставка за сутки</h3>
                <p>Доставляем продукцию в течении 24 часов службами САТ, ИнТайм, Деливери и Новой почтой.</p>
            </li>
        </ul>
    </section>
    
    <article class="automatica_sets">
        <h2 class="automatica_sets-title wrapper">
            Подберите автоматику для своих ворот
        </h2>

		<?php
            global $post;
			$args = array('posts_per_page' => 4,
				'post_type' => 'page',
				'order' => 'ASC',
				'post_parent' => $post->ID );
            $myposts = get_posts( $args );
            foreach( $myposts as $post ){ setup_postdata($post);
                ?>
                <section class="automatica_set-single">
				<div class="automatica_set-single-wrapper wrapper">
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
					<p class="automatica_set-price">
                        от <b><?php echo get_post_meta( $post->ID, 'price', true ); ?></b> грн
                    </p>
                    <a href="<?php echo get_permalink(); ?>" class="see-more-mobile">Подробнее ></a>
                    <button class="btn">
                        Добавить в корзину
                    </button>
                    <button class="ghost_btn only_desktop"onClick='location.href="<?php echo get_permalink(); ?>"'> Подробнее
                    </button>
                </div>

                <img src="<?php the_field('img'); ?>" alt="Автоматика комплект">
                <div class="garantee">
                    <img src="<?php the_field('img'); ?>" alt="Автоматика комплект">
                </div>
            </div>
        </section>
        <?php
            }
            wp_reset_postdata();
            ?>
   
    </article>

	<?php get_template_part('feedback'); ?>

    <section class="automatica_offers wrapper">
        <h2 class="automatica_offers-title">Также предлагаем</h2>
        <div class="offers">
            <a class="offer-furnitura" href="/furnitura/">
                <h3>Фурнитура</h3>
        	</a>
            <a class="offer-filenka" href="/panels/">
                <h3>Металлическая <br> филёнка</h3>
        	</a>
        </div>
    </section>
    <?php get_template_part('callback'); ?>
	</main>

<?php get_footer(); ?>
