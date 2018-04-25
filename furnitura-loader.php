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
    'include' => array(298),
    // 'meta_query'	=> array(
	// 	'relation'		=> 'AND',
	// 	array(
	// 		'key'	 	=> 'width',
	// 		'value'	  	=> $width,
	// 		'compare' 	=> '>',
	// 	),
	// 	array(
	// 		'key'	  	=> 'height',
	// 		'value'	  	=> $height,
	// 		'compare' 	=> '>',
    //     ),
    //     array(
	// 		'key'	  	=> 'matherial',
	// 		'value'	  	=> $material,
	// 		'compare' 	=> '=',
	// 	),
    // ), 
);
$myposts = get_posts( $args );

foreach( $myposts as $post ){ setup_postdata($post);
    ?>
<div class="furnitura_products_wrapper">
    <?php get_template_part('furnitura-short'); ?>
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