<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

$furnituraObj = $_POST['options'];
$material = $furnituraObj['material'];
$width = $furnituraObj['width'];
$height = $furnituraObj['height'];

$heavy_arr = array ();
    $heavy_arr['3.6'] = array (
        '2' => 277,
        '2.5' => 277,
        '3' => 279,
        '3.5' => 279,
        '4' => 279
    );
    $heavy_arr['4.3'] = array (
        '2' => 279,
        '2.5' => 279,
        '3' => 279,
        '3.5' => 279,
        '4' => 279
    );
    $heavy_arr['5'] = array (
        '2' => 283,
        '2.5' => 283,
        '3' => 283,
        '3.5' => 283,
        '4' => 292
    );
    $heavy_arr['5.7'] = array (
        '2' => 286,
        '2.5' => 286,
        '3' => 286,
        '3.5' => 293,
        '4' => 293
    );
    $heavy_arr['6.4'] = array (
        '2' => 278,
        '2.5' => 287,
        '3' => 294,
        '3.5' => 297,
        '4' => 295
    );
    $heavy_arr['7.1'] = array (
        '2' => 296,
        '2.5' => 296,
        '3' => 296,
        '3.5' => 298,
        '4' => 0
    );
    $heavy_arr['7.8'] = array (
        '2' => 297,
        '2.5' => 297,
        '3' => 298,
        '3.5' => 0,
        '4' => 0
    );
    $heavy_arr['8.5'] = array (
        '2' => 298,
        '2.5' => 298,
        '3' => 0,
        '3.5' => 0,
        '4' => 0
    );

$light_arr = array ();
    $light_arr['3.6'] = array (
        '2' => '271,277',
        '2.5' => '271,277',
        '3' => 277,
        '3.5' => 277,
        '4' => 279
    );
    $light_arr['4.3'] = array (
        '2' => 277,
        '2.5' => 277,
        '3' => 277,
        '3.5' => 277,
        '4' => 279
    );
    $light_arr['5'] = array (
        '2' => 282,
        '2.5' => 282,
        '3' => 282,
        '3.5' => 282,
        '4' => 283
    );
    $light_arr['5.7'] = array (
        '2' => 286,
        '2.5' => 286,
        '3' => 286,
        '3.5' => 286,
        '4' => 293
    );
    $light_arr['6.4'] = array (
        '2' => 287,
        '2.5' => 287,
        '3' => 287,
        '3.5' => 287,
        '4' => 294
    );
    $light_arr['7.1'] = array (
        '2' => 288,
        '2.5' => 288,
        '3' => 288,
        '3.5' => 288,
        '4' => 0
    );
    $light_arr['7.8'] = array (
        '2' => 289,
        '2.5' => 289,
        '3' => 291,
        '3.5' => 0,
        '4' => 0
    );
    $light_arr['8.5'] = array (
        '2' => 291,
        '2.5' => 291,
        '3' => 0,
        '3.5' => 0,
        '4' => 0
    );


function convW4arr ($w) {
    if ($w <= 3.6) {
        $w = '3.6';
    } else

    if ($w <= 4.3) {
        $w = '4.3';
    } else

    if ($w <= 5) {
        $w = '5';
    } else

    if ($w <= 5.7) {
        $w = '5.7';
    } else

    if ($w <= 6.4) {
        $w = '6.4';
    } else

    if ($w <= 7.1) {
        $w = '7.1';
    } else

    if ($w <= 7.8) {
        $w = '7.8';
    } else {

        $w = '8.5';
    }
    return $w;
}

function convH4arr ($h) {
    if ($h <= 2) {
        $h = '2';
    } else

    if ($h <= 2.5) {
        $h = '2.5';
    } else

    if ($h <= 3) {
        $h = '3';
    } else

    if ($h <= 3.5) {
        $h = '3.5';
    } else {

        $h = '4';
    }
    return $h;
}

// function getHeavy ($w, $h) {
//     return $heavy_arr[convW4arr($w)][convH4arr($h)];
// }

$w2 = convW4arr($width);
$h2 = convH4arr($height);

if ($material == 'light'){
    $komplektID = $light_arr[$w2][$h2];
} else {
    $komplektID = $heavy_arr[$w2][$h2];
}

$arrayIDs = explode(',', $komplektID);

// print_r($arrayIDs);

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
<<<<<<< HEAD
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
			'compare' 	=> 'LIKE',
		),
    ), 
=======
    'include' => $arrayIDs,
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
>>>>>>> master
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