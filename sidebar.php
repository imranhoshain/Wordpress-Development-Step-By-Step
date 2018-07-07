<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rideo
 */

if ( ! is_active_sidebar( 'blog_right_sidebar' ) ) {
	return;
}
?>
<div class="col-xs-12 col-sm-4 col-md-3">
	<div class="sidebar left-sidebar">
		<aside id="secondary" class="widget-area">
		<?php dynamic_sidebar( 'blog_right_sidebar' ); ?>
		</aside><!-- #secondary -->
	</div>
</div>