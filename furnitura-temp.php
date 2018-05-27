<?php /* Template Name: Page Furnitura Temp */ ?>
<?php get_header(); ?>

<main role="main">
<div id="overlay"></div>

    <section class="furnitura_title">
        <div class="furnitura_title_wrapper">
            <div class="furnitura_title_wrapper-small wrapper">
                    <h3 class="furnitura_h3_product dots">Продукция</h3>
                    <h3 class="furnitura_products-title">Усиленная фурнитура для откатных ворот</h3>
            </div>
        </div>
	</section>
	
	<section class="breadcrumbs wrapper">
            <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
    </section>
    
	<section class="furnitura_products">
		<!-- START OF THE SET BLOCK -->
		
		<div class="furnitura_products_wrapper">
			<div class="furnitura_products_single wrapper">
				<div class="furnitura_products_chars">
					<table>
						<thead>
							<tr>
								<th>Post Title</th>
								<th>Post ID</th>
							</tr>
						</thead>
						<tbody>
						<?php
            global $post;
			$args = array('posts_per_page' => -1,
				'post_type' => 'page',
				'order' => 'ASC',
				'post_parent' => 63 );
            $myposts = get_posts( $args );
            foreach( $myposts as $post ){ setup_postdata($post);
                ?>
							<tr>
								<td><?php echo the_title() ?></td>
								<td><?php echo get_the_ID() ?></td>
							</tr>


							<?php
            }
            wp_reset_postdata();
            ?>

			
						</tbody>
					</table>
				</div>
			</div>
		</div>


		<!-- END OF THE SET BLOCK -->
	</section>


<?php get_footer(); ?>