<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package rideo
 */

get_header();
?>
<?php while ( have_posts() ) : the_post(); ?>

<div class="rideo-page-title">
	<div class="page-banner">
		<img src="<?php the_post_thumbnail_url('large') ?>" alt="Page Banner">
		<!-- Use breadcamp for this function
		<div class="container">
			<div class="row ">
				<div class="col-md-12 text-<?php echo $text_title_direction; ?>">
					<?php if(empty($custom_title)) : ?>
					<h2><?php the_title(); ?></h2>
					<?php else : ?>
					<div class="rideo-page-custom-title">
						<?php echo wpautop($custom_title); ?>
					</div>
					<?php endif; ?>
					<?php if(function_exists('bcn_display')){bcn_display(); } //Install Breadcamp Next plugin?>
					<div class="entry-meta">
					<?php
						//industry_demo_posted_on();
						//industry_demo_posted_by();
					?>
					</div>.entry-meta
				</div>
			</div>
		</div> 
	-->
	</div>
</div>

<div id="primary" class="content-area blog-area sigle-blog blog-margin section-padding">
	<main id="main" class="site-main">
		<!-- blog content section start -->
		<div class="container">
			<div class="row">
					<div class="<?php if( is_single() ) : ?>col-xs-12 col-sm-8 col-md-9<?php else : ?>col-sm-4<?php endif; ?>">
				
						<?php						
							get_template_part( 'template-parts/content', get_post_type() );
							
							$single_post_pagenation = cs_get_option('enable_single_post_pagination');

							if($single_post_pagenation != false) {the_post_navigation(); }

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;								
						?>
					
				</div>
				<?php get_sidebar(); ?>	
			</div>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php endwhile; ?> <!--End of the loop.--> 

<?php
get_footer();
