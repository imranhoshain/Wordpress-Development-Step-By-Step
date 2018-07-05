<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rideo
 */

get_header();
?>
<div class="error-header">

</div>

<div class="rideo-page-title-area sp-60">
	<div class="container">
		<div class="row ">
			<div class="col-md-12 text-center">				
				<?php
					the_archive_title( '<h2 class="page-title">', '</h2>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>			
			</div>
		</div>
	</div>
</div>

<div id="primary" class="content-area section-padding-bottom">
	<main id="main" class="site-main">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="rideo-article-list">
						<?php
						if ( have_posts() ) : ?>
						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();
							/*
							* Include the Post-Format-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Format name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content', get_post_format() );
						endwhile;
						the_posts_navigation();
						else :
						get_template_part( 'template-parts/content', 'none' );
						endif; ?>
					</div>
				</div>
					
				<!-- Blog Sidebar -->
				<?php get_sidebar(); ?>	

			</div>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();