		<!-- footer -->
		<footer>
			<div class="footer_wrapper wrapper">
				<nav class="header_menu">
					<ul class="header_menu_main">
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
					</ul>
				</nav>
				<div class="footer_copyright">
					<p>&#169; <?php echo get_theme_mod('blogname', 'Rolling Hi-Tech'); ?>, <?php echo current_time('Y') ?></p>
				</div>
			</div>
		</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->

		<?php 
		global $showOnlyModal;
			if($showOnlyModal == true){
				include(locate_template('callback.php'));
				// unset($showOnlyModal);
			}
		?>
		
		<div class="add-to-cart hidden" id="product-to-cart">
			<div class="add-to-cart-plate">
				<p class="add-to-cart-text">Товар добавлен в корзину</p>
				<i class="add-to-cart-symb zmdi zmdi-check"></i>
			</div>
		</div>

	<script>
		var templateUrl = '<?php echo get_template_directory_uri() ?>';
	</script>
		<?php wp_footer(); ?>

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lightgallery.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lightslider.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lg-video.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/maskedinput.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/smartvalidity.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/ajax_form.js"></script>


	</body>
</html>
