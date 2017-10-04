<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/lightslider.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/lightgallery.css">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body>
			<!-- header -->
		<header>
			<!-- MOBILE MENU -->
			<div class="header_mobile stickytop">
				<div class="header_mobile_burger"><i id='burger' class="zmdi zmdi-menu zmdi-hc-2x"></i>
				</div>
				<a class="header_mobile_logo" href="<?php echo home_url(); ?>">RHT</a>
				<a href="/shopping-cart/" class="header_mobile_cart">
					<i class="zmdi zmdi-shopping-cart icon_cart"></i>
					<div class="shopping-cart_number">2</div>
				</a>
			</div>
			<div class="mobile_menu">
				<ul class="mobile_menu_main">
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>				
				</ul>
				<button class="mobile_callus-btn" onclick="superPopup()">Перезвоните мне</button>
				<div class="mobile_callus">
					<img class="mobile_icon_phone" src="<?php echo get_template_directory_uri(); ?>/img/phone.svg" alt="call us">&#32;
					<a class="mobile_callus-tel" href="tel:<?php the_field('telMainLink', 72); ?>"><?php the_field('telMain', 72); ?></a>
					<span class="mobile_callus-text">Бесплатно по Украине</span>
				</div>
			</div>
			<!-- END OF MOBILE MENU -->
	
			<!-- HIDING PART OF MENU -->
			<div class="header_wrapper_hidebig">
				<div class="header_wrapper_hidesmall wrapper">
					<div class="header_lang">
						<a class="header_lang_main" href="#">Рус <i id="header_shevron" class="zmdi zmdi-chevron-down"></i>
						</a>
						<div class="header_lang_content invisible">
							<a class="header_lang_drop" href="#">Укр</a>
							<a class="header_lang_drop" href="#">Англ</a>
						</div>
					</div>
					<div class="header_callus">
						<a class="header_callus_tel" href="tel:<?php the_field('telMainLink', 72); ?>"><i class="zmdi zmdi-phone"></i>&#32;<?php the_field('telMain', 72); ?></a>
						<span class="header_callus_text">Бесплатно по Украине</span>
						
					</div>
				</div>
			</div>
			<!-- END OF HIDING PART OF MENU -->
	
			<!-- MAIN MENU -->
			<div class="header_wrapper_big">
				<div class="header_wrapper_small wrapper">
					<a href="<?php echo home_url(); ?>"><img class="header_logo" src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="RHT logo"></a>
					<nav class="header_menu">
						<ul class="header_menu_main">
							<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
						</ul>
					</nav>
					<div class="header_cart">
						<div class="header_cart_call invisible">
							<button class="header_cart_call-button" onclick="superPopup()">Перезвоните мне</button>
							<span class="header_cart_call-tel">Или звоните <a href="tel:<?php echo the_field('telMainLink', 72); ?>"><?php echo the_field('telMain', 72); ?></a></span>
						</div>
						<a href="/shopping-cart/">
							<button class="header_cart_buy">
								<i class="zmdi zmdi-shopping-cart icon_cart"></i>
								<div class="shopping-cart_number">1</div>
								<span class="header_cart_bye-text">Корзина</span>
							</button>
						</a>
					</div>
				</div>
			</div>
			<!-- END OF MAIN MENU -->
		</header>
			<!-- /header -->
