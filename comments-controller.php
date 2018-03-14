<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

// recieving params:
$comment_name = sanitize_text_field($_POST['name']);
$comment_email = sanitize_text_field($_POST['email']);
$comment_product = sanitize_text_field($_POST['product']);
$comment_message = sanitize_text_field($_POST['message']);
$comment_photo = $_POST['photo'];
$comment_photo = base64_decode($comment_photo);
// $im = imagecreatefromstring($comment_photo);
// if ($im !== false) {
//     header('Content-Type: image/png');
//     imagepng($im);
//     imagedestroy($im);
// }

if(isset($comment_name)):
    $post_data = array(
        'post_title'    => 'Отзыв о ' . $comment_product,
        'post_content'  => $comment_message,
        'post_status'   => 'pending',
        'post_author'   => 1,
        'post_type'     => 'rht-comment',
    );


    $post_id = wp_insert_post( wp_slash($post_data) );
    print_r($post_id);

    $upload = wp_upload_bits( 'image.jpg', null, $comment_photo );
    // custom fields:
    update_post_meta($post_id, 'name', $comment_name);
    update_post_meta($post_id, 'email', $comment_email);
    update_post_meta($post_id, 'product', $comment_product);


   
    // echo 'file';
    // print_r($_FILES["photo"]);
    // print_r($_POST['data']);
    // echo $comment_photo;
    print_r($upload['url']);

    update_field( 'field_5a8702b2e2cf3', $upload['url'], $post_id );
    update_post_meta($post_id, 'img2', $upload['url']);
endif;
?>