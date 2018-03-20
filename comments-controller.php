<?php 
//setting enviroment:
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';


// recieving params:
$comment_name = sanitize_text_field($_POST['name']);
$comment_email = sanitize_text_field($_POST['email']);
$comment_product = sanitize_text_field($_POST['product']);
$comment_message = sanitize_text_field($_POST['message']);
$comment_photos = $_POST['photo'];


//setting the values of the comment post:
if(isset($comment_name) && isset($comment_email) && isset($comment_product) && isset($comment_message)):
    $post_data = array(
        'post_title'    => 'Отзыв о товаре ' . $comment_product,
        'post_content'  => $comment_message,
        'post_status'   => 'pending',
        'post_author'   => 1,
        'post_type'     => 'rht-comment',
    );

    //creating new comment post:
    $post_id = wp_insert_post( wp_slash($post_data) );
    // print_r($post_id);

    //updating custom fields:
    update_post_meta($post_id, 'name', $comment_name);
    update_post_meta($post_id, 'email', $comment_email);
    update_post_meta($post_id, 'product', $comment_product);

    $i=1;
    //creating image from base64:
    if(!empty($comment_photos)):
        foreach($comment_photos as $photo_name => $photo_dataURL ){
            $extension = strrpos($photo_name, '.');
            $photo_name = substr($photo_name, 0, $extension);

            if (preg_match('/^data:image\/(\w+);base64,/', $photo_dataURL, $type)) {
                $photo_dataURL = substr($photo_dataURL, strpos($photo_dataURL, ',') + 1);
                $type = strtolower($type[1]);
                if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ])) {
                    throw new \Exception('invalid image type');
                }
                $photo_dataURL = base64_decode($photo_dataURL);
            
                if ($photo_dataURL === false) {
                    throw new \Exception('base64_decode failed');
                }
            } else {
                throw new \Exception('did not match data URI with image data');
            }
            
            //uploading new image to wp-uploads:
            $upload = wp_upload_bits( "{$photo_name}.{$type}", null, $photo_dataURL, '' );

            //upload images ot media library:
            $newFileUrl = $upload['url'];
            $file_array = array();
            $tmp = download_url( $newFileUrl );
            preg_match('/[^\?]+\.(jpg|jpe|jpeg|gif|png)/i', $newFileUrl, $matches );
            $file_array['name'] = basename( $matches[0] );
            $file_array['tmp_name'] = $tmp;

            $fileId = media_handle_sideload( $file_array, $post_id, $desc );
            if( is_wp_error( $fileId ) ) {
                @unlink($file_array['tmp_name']);
                return $fileId->get_error_messages();
            }
            @unlink( $file_array['tmp_name'] );

            //updating images:
            update_field( "img{$i}", $fileId, $post_id );
            
            $i++;
        }
    endif;
    echo $post_id;
endif;
?>