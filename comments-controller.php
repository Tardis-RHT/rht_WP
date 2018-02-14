<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

// recieving params:
$comment_name = sanitize_text_field($_POST['name']);
$comment_email = sanitize_text_field($_POST['email']);
$comment_product = sanitize_text_field($_POST['product']);
$comment_message = sanitize_text_field($_POST['message']);

if(isset($comment_name)):
    $post_data = array(
        'post_title'    => 'Отзыв о ' . $comment_product,
        'post_content'  => $comment_message,
        'post_status'   => 'draft',
        'post_author'   => 1,
        'post_category' => array(6),
        'post_type'     => 'rht-comment',
    );


    $post_id = wp_insert_post( wp_slash($post_data) );
    print_r($post_id);

    // custom fields:
    update_post_meta($post_id, 'name', $comment_name);
    update_post_meta($post_id, 'email', $comment_email);
    update_post_meta($post_id, 'product', $comment_product);

endif;
?>