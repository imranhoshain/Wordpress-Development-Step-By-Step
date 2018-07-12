<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rideo
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if(has_post_thumbnail()) : ?>
		<div class="rideo-feature-content">
			<?php //the_post_thumbnail('industry-blog-thumbnail'); ?>
		</div>
	<?php endif; ?>

<div class="<?php if( is_single() ) : ?>single-blog-page<?php else : ?>col-sm-4<?php endif; ?>">
	<div class="blog-item">
	<div class="blog-img">
		<?php rideo_post_thumbnail('full'); ?>
	</div>
<div class="blog-text clearfix">
	
		<?php
		if ( is_singular() ) :
			the_title( '<h3 class="entry-title">', '</h3>' );
		else :
			the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			
				<p class="date-com">
					<?php					
					rideo_posted_by();
					rideo_posted_on();
					rideo_entry_footer();
					?>
				</p>
			<!-- .entry-meta -->
		<?php endif; ?>
	<!-- .entry-header -->	
	<hr class="line">
	<div class="entry-content">
		<?php

			if (is_single()) { //New add for read more button
			    
			    the_content(sprintf(wp_kses( /* translators: %s: Name of current post. Only visible to screen readers */ __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'rideo'), array(
			        'span' => array(
			            'class' => array()
			        )
			    )), get_the_title()));
			} else {
			    the_excerpt(); //Blog page add
			    echo '<div class="view-more">
						<a class="shop-btn" href="' . esc_url(get_permalink()) . '">Read More</a>
									
					</div>';
			} //End if condition

			wp_link_pages(array(
			    '1' => '<div class="page-links">' . esc_html__('Pages:', 'rideo'),
			    '2' => '</div>'
			));

			
			?>
	</div><!-- .entry-content -->
</div>
</div>

</div>
	<footer class="entry-footer">
		<?php //rideo_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
