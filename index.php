<?php get_header(); ?>

	<main role="main">
	<div id="overlay"></div>
	
	<section class="furnitura_video main-page_video" id="main_video">
		<img src="<?php echo get_template_directory_uri(); ?>/img/Video_bg.png" alt="Rolling Hi-tech" class="video-alt-img">
		<video poster="<?php echo get_template_directory_uri(); ?>/img/Video_bg.png" class="main-page_video-video" preload="auto" muted="" autoplay="autoplay" loop="loop">
			<source src="<?php echo get_template_directory_uri(); ?>/video/video.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
		</video>
		<div class="furnitura_video_wrapper wrapper">
				<h1 class="main-page_video-title" id="title">Rolling Hi-tech</h1>
				<h3 class="main-page_video-about">производитель усиленных комплектующих <br> для откатных ворот</h3>
			<!-- Hidden video div & logo -->
			<div style="display:none;" id="main_video-video">
				<video class="lg-video-object lg-html5" controls preload="none">
					<source src="<?php echo get_template_directory_uri(); ?>/video/video_fullscreen.mp4" type="video/mp4">
						Your browser does not support HTML5 video.
				</video>
				<a data-sub-html="#main_video-video" href="<?php echo home_url(); ?>" class="video-fullscreen_logo toShow" id="video-fullscreen_logo">
					<img src="<?php echo get_template_directory_uri(); ?>/img/logo-transparent.png" alt="RHT logo">
				</a>
			<!-- End of hidden video div & logo -->
			</div>
			<ul id="videoFurnitura">
				<li data-html="#main_video-video" >
					<a class="main-page_video-more">
						<div class="video_btn"></div>
						<div class="main-page_video-link video">Подробнее о компании</div>
					</a>
				</li>
			</ul>
		</div>
		<a href="#benefits" class="main_page_video-scroll toHide">
			<i class="zmdi zmdi-chevron-down"></i>
		</a>
	</section>

	<section class="main_benefits" id="benefits">
			<ul class="main_benefits_container">
			<li class="main_benefits_single">
				<img class="main_benefits_icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/production.svg" alt="Own production">
				<h3>Собственное производство</h3>
				<p>Мы изготавливаем надежные комплекты фурнитуры для откатных ворот, а также металлические филенки для зашивки ворот и калиток.</p>
			</li>
			<li class="main_benefits_single">
				<img class="main_benefits_icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/quality.svg" alt="14 years of quality">
				<h3>14 лет качества</h3>
				<p>За 14 лет ни у кого не возникло проблем, чтобы обратиться с гарантией.</p>
			</li>
			<li class="main_benefits_single">
				<img class="main_benefits_icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/rewards.svg" alt="National rewards">
				<h3>Национальные награды</h3>
				<p>Мы  — лучшее предприятие 2016 по версии Национального рейтинга качества товаров и услуг «Звезда качества».</p>
			</li>
			<li class="main_benefits_single">
				<img class="main_benefits_icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/experience.svg" alt="International experience">
				<h3>Международный опыт</h3>
				<p>Наша продукция продается в Литве и России. В наших планах — расширить географию продаж.</p>
			</li>
			<li class="main_benefits_single">
				<img class="main_benefits_icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/wholesale.svg" alt="Wholesale proces">
				<h3>Оптовые цены</h3>
				<p>Для партнеров и тех, кто заказывает от 10 комплектов фурнитуры, действуют оптовые цены.</p>
			</li>
			<li class="main_benefits_single">
				<img class="main_benefits_icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/delivery.svg" alt="Delivery in 24 hours">
				<h3>Доставка за сутки</h3>
				<p>Доставляем продукцию в течении 24 часов службами САТ, ИнТайм, Деливери и Новой почтой. </p>
			</li>
		</ul>
	</section>

	<section class="main_products">
		<div class="main_products-single">
			<div class="main_products-caption wrapper">
				<h3 class="main_products-category dots">Продукция</h3>
				<h3 class="main_products-title">Усиленная фурнитура <br>для откатных ворот</h3>
				<button class="main_products-btn btn" onClick='location.href="/furnitura/"'>Перейти в каталог фурнитуры</button>
			</div>
		</div>
		<div class="main_products-single">
			<div class="main_products-caption wrapper">
				<h3 class="main_products-category dots">Продукция</h3>
				<h3 class="main_products-title">Автоматика <br>для откатных ворот</h3>
				<button class="main_products-btn btn" onClick='location.href="/automatica/"'>Перейти в каталог автоматики</button>
			</div>
		</div>
		<div class="main_products-single">
			<div class="main_products-caption wrapper">
				<h3 class="main_products-category dots">Продукция</h3>
				<h3 class="main_products-title">Металлические филёнки <br>для зашивки ворот и калиток</h3>
				<button class="main_products-btn btn" onClick='location.href="/panels/"'>Перейти в каталог филенок</button>
			</div>
		</div>
	</section>

	<section class="main_partners">
		<div class="main_partners_wrapper wrapper">
			<h2>Наши партнеры</h2>
		</div>
		<ul class="main_partenrs_container">
			<li class="main_partners_single">
				<img src="<?php echo get_template_directory_uri(); ?>/img/partners/sizam.png" alt="Sizam">
			</li>
			<li class="main_partners_single">
				<img src="<?php echo get_template_directory_uri(); ?>/img/partners/europlast.png" alt="EuroPlast">
			</li>
			<li class="main_partners_single">
				<img src="<?php echo get_template_directory_uri(); ?>/img/partners/interior.png" alt="InteriorPlus">
			</li>
			<li class="main_partners_single">
				<img src="<?php echo get_template_directory_uri(); ?>/img/partners/poltava.png" alt="Poltava">
			</li>
			<li class="main_partners_single">
				<img src="<?php echo get_template_directory_uri(); ?>/img/partners/kaskad.png" alt="Kaskad">
			</li>
			<li class="main_partners_single">
					<img src="<?php echo get_template_directory_uri(); ?>/img/partners/sizam.png" alt="Sizam">
			</li>
			<li class="main_partners_single">
					<img src="<?php echo get_template_directory_uri(); ?>/img/partners/europlast.png" alt="EuroPlast">
			</li>
		</ul>
	</section>

	<section class="main-page_certificates">
		<h2 class="main-page_certificates_title wrapper">Сертификаты и патенты</h2>
		<div class="slider">
    		<ul class="slides" id="lightSlider_certificates">
      			<li class="slide">
					  <img src="<?php echo get_template_directory_uri(); ?>/img/certificates/1.jpg" alt="Наши сертификаты">
      			</li>
      			<li class="slide">
					  <img src="<?php echo get_template_directory_uri(); ?>/img/certificates/2.jpg" alt="Наши сертификаты">
      			</li>
      			<li class="slide">
					  <img src="<?php echo get_template_directory_uri(); ?>/img/certificates/3.jpg" alt="Наши сертификаты">
			    </li>
      			<li class="slide">
					  <img src="<?php echo get_template_directory_uri(); ?>/img/certificates/4.jpg" alt="Наши сертификаты">
      			</li>
				<li class="slide">
					  <img src="<?php echo get_template_directory_uri(); ?>/img/certificates/5.jpg" alt="Наши сертификаты">
      			</li>
      			<li class="slide">
					  <img src="<?php echo get_template_directory_uri(); ?>/img/certificates/6.jpg" alt="Наши сертификаты">
			    </li>
      			<li class="slide">
					  <img src="<?php echo get_template_directory_uri(); ?>/img/certificates/7.jpg" alt="Наши сертификаты">
      			</li>
			</ul>
		</div>
  
		<div class="main-page_certificates_slider wrapper">
			<div class="fur-set_slider-controls">
				<button id="prevSlide" class="pointer_left"></button>
				<img src="<?php echo get_template_directory_uri(); ?>/img/icons/separator.svg" alt="#">
				<button id="nextSlide" class="pointer_right"></button>								
			</div>
		</div>
	</section>

	<?php get_template_part('feedback'); ?>

	<?php get_template_part('callback'); ?>
	</main>


<?php get_footer(); ?>
