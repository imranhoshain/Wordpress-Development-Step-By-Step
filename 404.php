<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package rideo
 */

get_header();
?>

<!-- 404 content section start -->
<div class="error-header">
	
</div>

<div class="error-content section-padding-bottom">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="error-img">
					<img src="<?php echo get_template_directory_uri() .'/assets/img/error.jpg';?>" alt="404 Page" />
				</div>
				<div class="error-text text-center">
					<h3><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'rideo' ); ?></h3>
					<p><?php esc_html_e( 'Please try one of the following page.', 'rideo' ); ?></p>
					<a href="index.html">Return home</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- 404 content section end -->


<?php
get_footer();
