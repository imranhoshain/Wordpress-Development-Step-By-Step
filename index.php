<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rideo
 */

get_header();
?>

<?php	
//Page title condition solve from theme metabox and option
	if(get_post_meta( $post->ID, 'rideo_page_meta', true )){
		$page_meta = get_post_meta( $post->ID, 'rideo_page_meta', true );
	}else{
		$page_meta = array();
	}

//Page title condition
	if(array_key_exists('enable_title', $page_meta)){
		$enable_title = $page_meta['enable_title'];
	}else{
		$enable_title = true;
	}

//Custom Title
	if(array_key_exists('custom_title', $page_meta)){
		$custom_title = $page_meta['custom_title'];
	}else{
		$custom_title = true;
	}

//Text Align Condition
	if(array_key_exists('text_title_direction', $page_meta)){
		$text_title_direction = $page_meta['text_title_direction'];
	}else{
		$text_title_direction = 'left';
	}
?>


<?php if($enable_title == true) : ?> 

<?php endif; ?>

<div class="rideo-page-title">
	<div class="page-banner">
		<img src="<?php the_post_thumbnail_url('large') ?>" alt="Page Banner">
	</div>
	<div class="container">
		<div class="row ">
			<div class="col-md-12 text-<?php //echo esc_html($text_title_direction); ?>">
				<h2><?php //echo esc_html(the_title()); ?></h2>
			</div>
		</div>
	</div>
</div>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<section class="blog-area blog-two blog-margin section-padding">
			<div class="container">
				<div class="row">
					
						<?php
						if ( have_posts() ) :

							if ( is_home() && ! is_front_page() ) :
								?>
								<header>
									<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>
								<?php
							endif;

							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_type() );

							endwhile;

							the_posts_navigation();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>
					
				</div>
			</div>
		</section>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
