<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: rht.com | @rht
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');
    
    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 80, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Localisation Support
    load_theme_textdomain('rht', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// rht Blank navigation
function rht_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load rht Blank conditional scripts
function rht_conditional_scripts()
{
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js','','', true);
    wp_enqueue_script('jquery');
    wp_register_script('rht_dropzone_script', get_template_directory_uri() . '/js/dropzone.js','','', true);
    if (is_page_template( 'comment.php' )) {
        wp_enqueue_script('rht_dropzone_script');
    }
    wp_register_script('rht_main_script', get_template_directory_uri() . '/js/main.js','','', true);
    wp_enqueue_script('rht_main_script');

    wp_register_script('rht_furnitura_script', get_template_directory_uri() . '/js/furnitura.js','','', true);
    if (is_page_template( $furnitura ) || (is_page_template( $set ))) {
        wp_enqueue_script('rht_furnitura_script');
    }
}

// Load rht Blank styles
function rht_styles()
{
    wp_register_style('rht_main_css', get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all');
    wp_enqueue_style('rht_main_css'); // Enqueue it!
}

// Register rht Blank Navigation
function register_rht_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'rht'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'rht'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'rht') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Remove Admin bar
// function remove_admin_bar()
// {
//     return false;
// }

// Remove 'text/css' from our enqueued stylesheet
function rht_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function rhtgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Remove comments from admin panel
function remove_menus(){
    remove_menu_page( 'edit-comments.php' );          
}

//Adding bubble for new comments posts
function add_user_menu_bubble(){
    global $menu;
    $count = wp_count_posts('rht-comment')->pending;
    if( $count ){
        foreach( $menu as $key => $value ){
            if( $menu[$key][2] == 'edit.php?post_type=rht-comment' ){
                $menu[$key][0] .= ' <span class="awaiting-mod"><span class="pending-count">' . $count . '</span></span>';
                break;
            }
        }
    }
}

//receiving image id from its url:
function get_attachment_id_by_url( $url ) {
    global $wpdb;

    $table  = $wpdb->prefix . 'posts';
    $attachment_id = $wpdb->get_var( 
        $wpdb->prepare( "SELECT ID FROM $table WHERE guid RLIKE %s", $url ) 
    );
    return $attachment_id;
}

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('wp_print_scripts', 'rht_conditional_scripts'); // Add Conditional Page Scripts
// add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'rht_styles'); // Add Theme Stylesheet
add_action('init', 'register_rht_menu'); // Add rht Blank Menu
add_action('init', 'create_post_type_comment'); // Add custom post type for comments
add_action('init', 'create_post_type_economy'); // Add custom post type for comments
add_action( 'admin_menu', 'remove_menus' ); //Remove comments from admin panel
add_action( 'admin_menu', 'add_user_menu_bubble' ); //Add bubble for new comments

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'rhtgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'rht_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('style_loader_tag', 'rht_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('rht_shortcode_demo', 'rht_shortcode_demo'); // You can place [rht_shortcode_demo] in Pages, Posts now.
add_shortcode('rht_shortcode_demo_2', 'rht_shortcode_demo_2'); // Place [rht_shortcode_demo_2] in Pages, Posts now.


/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

function create_post_type_comment()
{
    register_post_type('rht-comment', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Комментарии', 'comments'), // Rename these to suit
            'singular_name' => __('Комментарий', 'comments'),
            'add_new' => __('Добавить', 'comments'),
            'add_new_item' => __('Добавить комметарий', 'comments'),
            'edit' => __('Редактировать', 'comments'),
            'edit_item' => __('Редактировать комментарий', 'comments'),
            'new_item' => __('Новый комментарий', 'comments'),
            'view' => __('Просмотреть комментарий', 'comments'),
            'view_item' => __('Просмотреть комментарий', 'comments'),
            'search_items' => __('Поиск комментария', 'comments'),
            'not_found' => __('Комментарии не найдены', 'comments'),
            'not_found_in_trash' => __('Комменатрии не найдены в корзине', 'comments')
        ),
        'public' => true,        
        'publicly_queryable' => false,
        'exclude_from_search' => true,
        'supports' => array(
            'title',
            'editor',
            // 'excerpt',
            // 'thumbnail',
            'custom-fields'
        ), // Go to Dashboard Custom rht Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
        ),
		'menu_icon' => 'dashicons-admin-comments' 
    ));
}

function create_post_type_economy()
{
    register_post_type('rht-economy', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Скидки', 'economy'), // Rename these to suit
            'singular_name' => __('Скидку', 'economy'),
            'add_new' => __('Добавить новую', 'economy'),
            'add_new_item' => __('Добавить скидку', 'economy'),
            'edit' => __('Редактировать', 'economy'),
            'edit_item' => __('Редактировать скидку', 'economy'),
            'new_item' => __('Новая скидка', 'economy'),
            'view' => __('Просмотреть скидку', 'economy'),
            'view_item' => __('Просмотреть скидку', 'economy'),
            'search_items' => __('Поиск скидки', 'economy'),
            'not_found' => __('Скидки не найдены', 'economy'),
            'not_found_in_trash' => __('Скидки не найдены в корзине', 'economy')
        ),
        'public' => true,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 21,
        'supports' => array(
            'title',
            // 'editor'
        ), // Go to Dashboard Custom rht Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
        ),
		'menu_icon' => 'dashicons-cart' 
    ));
}
/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function rht_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function rht_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}

/*
 * "Хлебные крошки" для WordPress
 * автор: Dimox
 * версия: 2017.01.21
 * лицензия: MIT
*/
function dimox_breadcrumbs() {

  /* === ОПЦИИ === */
  $text['home'] = 'Главная'; // текст ссылки "Главная"
  $text['category'] = '%s'; // текст для страницы рубрики
  $text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
  $text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
  $text['author'] = 'Статьи автора %s'; // текст для страницы автора
  $text['404'] = 'Ошибка 404'; // текст для страницы 404
  $text['page'] = 'Страница %s'; // текст 'Страница N'
  $text['cpage'] = 'Страница комментариев %s'; // текст 'Страница комментариев N'

  // $wrap_before = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; // открывающий тег обертки
  // $wrap_after = '</div><!-- .breadcrumbs -->'; // закрывающий тег обертки
  $sep = '<i class="zmdi zmdi-long-arrow-right"></i>'; // разделитель между "крошками"
  $sep_before = '<span class="sep">'; // тег перед разделителем
  $sep_after = '</span>'; // тег после разделителя
  $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
  $show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
  $show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
  $before = '<span>'; // тег перед текущей "крошкой"
  $after = '</span>'; // тег после текущей "крошки"
  /* === КОНЕЦ ОПЦИЙ === */

  global $post;
  $home_url = home_url('/');
  $link_before = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
  $link_after = '</span>';
  $link_attr = ' itemprop="item"';
  $link_in_before = '<span itemprop="name">';
  $link_in_after = '</span>';
  $link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
  $frontpage_id = get_option('page_on_front');
  $parent_id = ($post) ? $post->post_parent : '';
  $sep = ' ' . $sep_before . $sep . $sep_after . ' ';
  $home_link = $link_before . '<a href="' . $home_url . '"' . $link_attr . '>' . $link_in_before . $text['home'] . $link_in_after . '</a>' . $link_after;

  if (is_home() || is_front_page()) {

    if ($show_on_home) echo $wrap_before . $home_link . $wrap_after;

  } else {

    echo $wrap_before;
    if ($show_home_link) echo $home_link;

    if ( is_category() ) {
      $cat = get_category(get_query_var('cat'), false);
      if ($cat->parent != 0) {
        $cats = get_category_parents($cat->parent, TRUE, $sep);
        $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        if ($show_home_link) echo $sep;
        echo $cats;
      }
      if ( get_query_var('paged') ) {
        $cat = $cat->cat_ID;
        echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
      }

    } elseif ( is_search() ) {
      if (have_posts()) {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
      } else {
        if ($show_home_link) echo $sep;
        echo $before . sprintf($text['search'], get_search_query()) . $after;
      }

    } elseif ( is_day() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
      echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
      if ($show_current) echo $sep . $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
      if ($show_current) echo $sep . $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ($show_home_link) echo $sep;
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        printf($link, $home_url . $slug['slug'] . '/', $post_type->labels->singular_name);
        if ($show_current) echo $sep . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, $sep);
        if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
        if ( get_query_var('cpage') ) {
          echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
        } else {
          if ($show_current) echo $before . get_the_title() . $after;
        }
      }

    // custom post type
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      if ( get_query_var('paged') ) {
        echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . $post_type->label . $after;
      }

    } elseif ( is_attachment() ) {
      if ($show_home_link) echo $sep;
      $parent = get_post($parent_id);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      if ($cat) {
        $cats = get_category_parents($cat, TRUE, $sep);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
      }
      printf($link, get_permalink($parent), $parent->post_title);
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && !$parent_id ) {
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && $parent_id ) {
      if ($show_home_link) echo $sep;
      if ($parent_id != $frontpage_id) {
        $breadcrumbs = array();
        while ($parent_id) {
          $page = get_page($parent_id);
          if ($parent_id != $frontpage_id) {
            $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
          }
          $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        for ($i = 0; $i < count($breadcrumbs); $i++) {
          echo $breadcrumbs[$i];
          if ($i != count($breadcrumbs)-1) echo $sep;
        }
      }
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_tag() ) {
      if ( get_query_var('paged') ) {
        $tag_id = get_queried_object_id();
        $tag = get_tag($tag_id);
        echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
      }

    } elseif ( is_author() ) {
      global $author;
      $author = get_userdata($author);
      if ( get_query_var('paged') ) {
        if ($show_home_link) echo $sep;
        echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
      }

    } elseif ( is_404() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . $text['404'] . $after;

    } elseif ( has_post_format() && !is_singular() ) {
      if ($show_home_link) echo $sep;
      echo get_post_format_string( get_post_format() );
    }

    echo $wrap_after;

  }
} // end of dimox_breadcrumbs()

/*------------------------------------*\
	Customizer
\*------------------------------------*/

add_action('customize_register', function($customizer){
    $customizer->add_section(
        'contacts',
        array(
            'title' => 'Контакты',
            'description' => 'Настройки контактов для всего сайта',
            'priority' => 11,
        )
    );
    $customizer->add_setting(
        'contacts_tel',
        array('default' => '800 210 257')
    );
    $customizer->add_control(
        'contacts_tel',
        array(
            'label' => 'Телефон',
            'section' => 'contacts',
            'type' => 'text',
        )
    );
    $customizer->add_setting(
        'contacts_email',
        array('default' => 'rollinghitech@gmail.com')
    );
    $customizer->add_control(
        'contacts_email',
        array(
            'label' => 'Email',
            'section' => 'contacts',
            'type' => 'text',
        )
    );
    $customizer->add_setting(
        'contacts_email_to_mail',
        array('default' => 'rollinghitech@gmail.com')
    );
    $customizer->add_control(
        'contacts_email_to_mail',
        array(
            'label' => 'Email для отправки сообщений с сайта',
            'section' => 'contacts',
            'type' => 'text',
        )
    );
    $customizer->add_setting(
        'contacts_address',
        array('default' => '69000, Украина, Запорожье, ул. Новостроек, дом 7')
    );
    $customizer->add_control(
        'contacts_address',
        array(
            'label' => 'Адрес',
            'section' => 'contacts',
            'type' => 'text',
        )
    );
});


// CUSTOMIZING THE LOGIN FORM
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png);
        width:100%;
        background-size: auto;
        background-repeat: no-repeat;
        background-position: center;
        padding-bottom: 30px;
        margin: 0 auto;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Roling Hi-Tech';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/css/login.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
// END OF CUSTOMIZING THE LOGIN FORM

/*------------------------------------*\
	Advanced Custom Fields
\*------------------------------------*/

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_%d0%ba%d0%be%d0%bc%d0%bc%d0%b5%d0%bd%d1%82%d0%b0%d1%80%d0%b8%d0%b9',
		'title' => '[:en]Комментарий[:]',
		'fields' => array (
			array (
				'key' => 'field_5a845cda31bd5',
				'label' => 'Имя и фамилия',
				'name' => 'name',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5a845e0ac0f23',
				'label' => 'E-mail',
				'name' => 'email',
				'type' => 'email',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array (
				'key' => 'field_5a845e1fc0f24',
				'label' => 'Товар',
				'name' => 'product',
				'type' => 'select',
				'choices' => array (
					'Фурнитура' => 'Фурнитура',
					'Автоматика' => 'Автоматика',
					'Металлическая филёнка' => 'Металлическая филёнка',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5a8702b2e2cf3',
				'label' => 'Фотография',
				'name' => 'img1',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5a8702ece2cf4',
				'label' => 'Фотография',
				'name' => 'img2',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5a8702fee2cf5',
				'label' => 'Фотография',
				'name' => 'img3',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'rht-comment',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
    ));
    register_field_group(array (
		'id' => 'acf_economy',
		'title' => 'Economy',
		'fields' => array (
            array (
				'key' => 'field_5ab5899d9cc4e',
				'label' => 'Название для корзины',
				'name' => 'title',
				'type' => 'text',
				'default_value' => 'Акционный комплект',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5ab422903d72a',
				'label' => 'Входят в набор',
				'name' => 'economy_ids',
				'type' => 'relationship',
				'instructions' => 'Выберите товары, входящие в акционный набор',
				'required' => 1,
				'return_format' => 'id',
				'post_type' => array (
					0 => 'page',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'featured_image',
					1 => 'post_type',
					2 => 'post_title',
				),
				'max' => 2,
			),
			array (
				'key' => 'field_5ab425d03d72b',
				'label' => 'Скидка',
				'name' => 'discount',
				'type' => 'number',
				'default_value' => 10,
				'placeholder' => '',
				'prepend' => '',
				'append' => '%',
				'min' => 0,
				'max' => 100,
				'step' => '',
            ),
            array (
				'key' => 'field_5ab58a3af2c7a',
				'label' => 'Изображение для козрины',
				'name' => 'img',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'rht-economy',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

function true_loadmore_scripts() {
 	wp_enqueue_script( 'true_loadmore', get_stylesheet_directory_uri() . '/js/loadmore.js', array('jquery') );
}
 
add_action( 'wp_enqueue_scripts', 'true_loadmore_scripts' );


function true_load_posts(){
 
	// $args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1; // следующая страница
    // $args['post_status'] = 'publish';
    $args['posts_per_page'] = 4;
    $args['post_parent'] = 63;
    $args['post_type'] = 'page';
    $args['order'] = 'ASC';

	// обычно лучше использовать WP_Query, но не здесь
	query_posts( $args );
	// если посты есть
	if( have_posts() ) :
 
		// запускаем цикл
		while( have_posts() ): the_post();
 
        get_template_part('furnitura-short');
 
		endwhile;
 
	endif;
	die();
}
 
 
add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');


// Полностью отключим Гутенберг на сайте (новый редактор)
add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );

?>