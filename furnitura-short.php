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
			<img class="" src="<?php the_field('img'); ?>" alt="<?php the_title() ?>">
		</div>
	</div>
</div>