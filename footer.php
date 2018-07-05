<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rideo
 */

?>

</div><!-- #content -->

<?php 
$copyright_text = cs_get_option('footer_copyright_text');
$copyright_link =cs_get_option('footer_copyright_link');
$footer_payment_options = cs_get_option('footer_bottom_right');
?>

	<footer id="colophon" class="site-footer">
		<!-- footer section start -->
			<!-- footer top start -->
			<div class="footer-top section-padding">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-4">
							<?php dynamic_sidebar('footer_one'); ?>														
						</div>						
						<div class="col-xs-12 col-sm-4 col-md-3">
							<?php dynamic_sidebar('footer_two'); ?>							
						</div>
						<div class="col-xs-12 col-sm-2 col-md-2">
							<?php dynamic_sidebar('footer_three'); ?>
						</div>
						<div class="col-xs-12 col-sm-2 col-md-3">
							<?php dynamic_sidebar('footer_four'); ?>
						</div>
					</div>
				</div>
			</div>			
			<!-- footer top end -->
			<!-- footer bottom start -->
			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="left floatleft">
								<p><?php echo $copyright_text; ?> <a href="<?php echo $copyright_link; ?>">RIDEO</a></p>
							</div>
							<div class="right mayment-card floatright">
								<ul>
								<?php					
								
								  if (!empty($footer_payment_options)) {
								 	 foreach ( $footer_payment_options as $footer_payment ) {				
									$footer_payment_img_array = wp_get_attachment_image_src($footer_payment['payment_card_image'], 'thumbnail');									
								  	?>
										<li>
											<a href="<?php echo $footer_payment['payment_card_link']; ?>"><img src="<?php echo $footer_payment_img_array[0];  ?>" alt="Brand Logo" /></a>
										</li>
									<?php
									  }

									}
									?>		

									
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- footer bottom end -->		
		<!-- footer section end -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
