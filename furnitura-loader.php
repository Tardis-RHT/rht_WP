<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

$furnituraObj = $_POST['options'];
$material = $furnituraObj['material'];
$width = $furnituraObj['width'];
$height = $furnituraObj['height'];

$heavy_arr = array ();
$heavy_arr[3.6] = array (
    2 => 277,
    2.5 => 277,
    3 => 0,
    3.5 => 0,
    4 => 0
);
$heavy_arr[4.3] = array (
    2 => 279,
    2.5 => 279,
    3 => 279,
    3.5 => 279,
    4 => 279
);


function convW4arr ($w) {
    if ($w <= 3.6) {
        $w = 3.6;
    } else

    if ($w <= 4.3) {
        $w = 4.3;
    } else

    if ($w <= 5) {
        $w = 5;
    } else

    if ($w <= 5.7) {
        $w = 5.7;
    } else

    if ($w <= 6.4) {
        $w = 6.4;
    } else

    if ($w <= 7.1) {
        $w = 7.1;
    } else

    if ($w <= 7.8) {
        $w = 7.8;
    } else {

        $w = 8.5;
    }
    return $w;
}

function convH4arr ($h) {
    if ($h <= 2) {
        $h = 2;
    } else

    if ($h <= 2.5) {
        $h = 2.5;
    } else

    if ($h <= 3) {
        $h = 3;
    } else

    if ($h <= 3.5) {
        $h = 3.5;
    } else {

        $h = 4;
    }
    return $h;
}

// function getHeavy ($w, $h) {
//     return $heavy_arr[convW4arr($w)][convH4arr($h)];
    
// }
$w2 = convW4arr($width);
$h2 = convH4arr($height);

$komplektID = $heavy_arr[$w2][$h2];
print_r($komplektID);


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
    'include' => array($komplektID),
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