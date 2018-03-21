<section class="main_feedback">
		<div class="main_feedback_wrapper wrapper">
			<h2>Отзывы</h2>
			<div class="main_feedback_number-container">
				<img src="<?php echo get_template_directory_uri(); ?>/img/icons/feedback_stripes.svg" alt="DecorativeArrows">
				<div class="feedback_slider_counter">
					<span id="current" class="main_feedback_number-big">1</span><span> / </span><span id="total" class="main_feedback_number">/ 11</span>
				</div>
			</div>
			<div class="feedback_slider_container">
				<div id="goToPrevSlideFeedback" class="pointer_left feedback_pointer"></div>	
				<div class="main_feedback_container">		
					<ul id="feedbacksl" class="cs-hidden">
						<?php
							global $post;
							$args = array('posts_per_page' => 20,'post_type' => 'rht-comment', 'order' => 'ASC' );
							$myposts = get_posts( $args );
							foreach( $myposts as $post ){ setup_postdata($post);
						?>
						<li>
							<div class="feedback_slide_container">
								<p class="main_feedback_text">
									<?php echo strip_tags(get_the_content()); ?>
								</p>
								<div class="main_feedback_nameanddate">
									<p class="main_feedback_name">
										<?php echo get_post_meta( $post->ID, 'name', true ); ?>
									</p>
									<p class="main_feedback_date">
										<?php echo get_the_date('j.m.Y') ?>
									</p>
								</div>
								<div class="main_feedback_gallery">
									<div class="main_feedback_gallery-cont feedbacklg">
										<?php for($j=1; $j<=3; $j++){
											$fieldName = "img{$j}";
											$imgUrl = get_field($fieldName);
											if(!empty($imgUrl)){
												echo '<a class="main_feedback_gallery-img" href="';
												echo $imgUrl . '">';
												$imgId = get_attachment_id_by_url($imgUrl);
												echo wp_get_attachment_image($imgId, 'small');
												echo '</a>';
											}
										}
										?>
									</div>
								</div>
							</div>
						</li>
						<?php
							}
							wp_reset_postdata();
						?>
						<!-- <li>
							<div class="feedback_slide_container">
								<p class="main_feedback_text">Спасибо компании «Rolling Hi-Tech» за отличную работу 
										и продукцию. Всё отправили вовремя, без косяков и за 
										вполне доступные деньги. Всем рекомендую!
								</p>
								<div class="main_feedback_nameanddate">
									<p class="main_feedback_name">
										Константин Сергеев
									</p>
									<p class="main_feedback_date">
										07.09.2017
									</p>
								</div>
								<div class="main_feedback_gallery">
									<div class="main_feedback_gallery-cont feedbacklg">
										<a class="main_feedback_gallery-img" href='<?php echo get_template_directory_uri(); ?>/img/vorota1.jpeg'><img src="<?php echo get_template_directory_uri(); ?>/img/vorota1.jpeg" alt="Feedback Gallery"></a>
										<a class="main_feedback_gallery-img" href='<?php echo get_template_directory_uri(); ?>/img/vorota2.jpeg'><img src="<?php echo get_template_directory_uri(); ?>/img/vorota2.jpeg" alt="Feedback Gallery"></a>
										<a class="main_feedback_gallery-img" href='<?php echo get_template_directory_uri(); ?>/img/vorota3.jpeg'><img src="<?php echo get_template_directory_uri(); ?>/img/vorota3.jpeg" alt="Feedback Gallery"></a>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="feedback_slide_container">
								<p class="main_feedback_text">Спасибо компании «Rolling Hi-Tech» за отличную работу 
										и продукцию. Всё отправили вовремя, без косяков и за 
										вполне доступные деньги. Всем рекомендую!
								</p>
								<div class="main_feedback_nameanddate">
									<p class="main_feedback_name">
										КСергеев
									</p>
									<p class="main_feedback_date">
										07.09.2217
									</p>
								</div>
								<div class="main_feedback_gallery">
									<div class="main_feedback_gallery-cont feedbacklg">
										<a class="main_feedback_gallery-img" href='<?php echo get_template_directory_uri(); ?>/img/vorota1.jpeg'><img src="<?php echo get_template_directory_uri(); ?>/img/vorota1.jpeg" alt="Feedback Gallery"></a>
										<a class="main_feedback_gallery-img" href='<?php echo get_template_directory_uri(); ?>/img/vorota2.jpeg'><img src="<?php echo get_template_directory_uri(); ?>/img/vorota2.jpeg" alt="Feedback Gallery"></a>
										<a class="main_feedback_gallery-img" href='<?php echo get_template_directory_uri(); ?>/img/vorota3.jpeg'><img src="<?php echo get_template_directory_uri(); ?>/img/vorota3.jpeg" alt="Feedback Gallery"></a>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="feedback_slide_container">
								<p class="main_feedback_text">Спасибо компании «Rolling Hi-Tech» за отличную работу 
										и продукцию. Всё отправили вовремя, без косяков и за 
										вполне доступные деньги. Всем рекомендую!
								</p>
								<div class="main_feedback_nameanddate">
									<p class="main_feedback_name">
										Конст Сер
									</p>
									<p class="main_feedback_date">
										07.09.2317
									</p>
								</div>
								<div class="main_feedback_gallery">
									<div class="main_feedback_gallery-cont feedbacklg">
										<a class="main_feedback_gallery-img" href='<?php echo get_template_directory_uri(); ?>/img/vorota1.jpeg'><img src="<?php echo get_template_directory_uri(); ?>/img/vorota1.jpeg" alt="Feedback Gallery"></a>
										<a class="main_feedback_gallery-img" href='<?php echo get_template_directory_uri(); ?>/img/vorota2.jpeg'><img src="<?php echo get_template_directory_uri(); ?>/img/vorota2.jpeg" alt="Feedback Gallery"></a>
										<a class="main_feedback_gallery-img" href='<?php echo get_template_directory_uri(); ?>/img/vorota3.jpeg'><img src="<?php echo get_template_directory_uri(); ?>/img/vorota3.jpeg" alt="Feedback Gallery"></a>
									</div>
								</div>
							</div>
						</li> -->
					</ul>
				</div>
				<div id="goToNextSlideFeedback" class="pointer_right feedback_pointer"></div>				
			</div>
			<button class="main_feedback_feedback btn" onClick='location.href="/comment/"'>
				Оставить Отзыв
			</button>
		</div>
	</section>