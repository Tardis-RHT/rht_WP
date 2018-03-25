<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

$furnituraObj = $_POST['options'];
$material = $furnituraObj['material'];
$width = $furnituraObj['width'];
$height = $furnituraObj['height'];


global $post;
$pages = get_pages(array(
    'meta_key' => '_wp_page_template',
    'meta_value' => 'furnitura.php'
));

$parentId = $pages[0]->ID;
$args = array('posts_per_page' => -1,
    'post_type' => 'page',
    'order' => 'ASC',
    'post_parent' => $parentId,
    'meta_query'	=> array(
		'relation'		=> 'AND',
		array(
			'key'	 	=> 'width',
			'value'	  	=> $width,
			'compare' 	=> '>',
		),
		array(
			'key'	  	=> 'height',
			'value'	  	=> $height,
			'compare' 	=> '>',
        ),
        array(
			'key'	  	=> 'matherial',
			'value'	  	=> $material,
			'compare' 	=> '=',
		),
    ), 
);
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
            <img src="<?php echo get_field('img', $post->ID); ?>" alt="Фурнитура комплект">
        </div>
    </div>
</div>

<?php
    }
    wp_reset_postdata();
    
if(empty($myposts)){ ?>

<div class="furnitura_products_wrapper">
    <div class="furnitura_products_single wrapper">
        <h3 class="furnitura_chars_set">Ничего не найдено</h3>
    </div>
</div>
<?php }
?>