		<!-- footer -->
		<footer>
			<div class="footer_wrapper wrapper">
				<nav class="header_menu">
					<ul class="header_menu_main">
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
					</ul>
				</nav>
				<div class="footer_copyright">
					<p>&#169; <?php echo get_theme_mod('contacts_copyright', 'Rolling Hi-Tech, 2017'); ?></p>
				</div>
			</div>
		</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/main-video.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lightgallery.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lightslider.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lg-video.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/maskedinput.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/smartvalidity.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/ajax_form.js"></script>
	</body>
</html>
