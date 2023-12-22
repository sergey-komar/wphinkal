<?php
/**
 * Quick view content.
 *
 * @author  YITH <plugins@yithemes.com>
 * @package YITH WooCommerce Quick View
 * @version 1.0.0
 */

defined( 'YITH_WCQV' ) || exit; // Exit if accessed directly.

while ( have_posts() ) :
	the_post();
	?>

	<div class="product">

		<div id="product-<?php the_ID(); ?>" <?php post_class( 'product' ); ?>>

			<!-- <?php do_action( 'yith_wcqv_product_image' ); ?>

			<div class="summary entry-summary">
				<div class="summary-content">
					<?php do_action( 'yith_wcqv_product_summary' ); ?>
				</div>
			</div> -->
			 <div class="modal">
				<?php global $product;?>
				<div class="container">
					<div class="modal-block">
						<div class="modal-block__inner">
							<div class="modal-block__img">
								<img src="<?php the_post_thumbnail_url()?>" alt="img">
							</div>
							<div class="modal-block__content">
								<div class="modal-block__top">
									<div class="modal-block__content-title">
										<?php echo $product->name;?>
									</div>
									
									<span class="modal-block__content-price">
									<?php echo $product->get_price_html();?>
									</span>
								</div>
								<span class="modal-block__content-weight">180 гр</span>
								<p class="modal-block__content-text">
									<?php echo $product->description?>
								</p>
							</div>
						</div>
			

						<div class="modal-block__close">
							<img src="<?php echo get_template_directory_uri()?>./assets/img/modal-close.png" alt="img">
						</div>


			
					</div>
				</div>
			</div> 

		</div>

	</div>
	<?php
endwhile; // end of the loop.
