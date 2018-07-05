<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
<div class="page-banner">
			<img src="<?php the_post_thumbnail_url('large') ?>" alt="Page Banner">
		<div class="container">
		<div class="row ">
			<div class="col-md-12 text-<?php echo $text_title_direction; ?>">
				<?php if(empty($custom_title)) : ?>
				<h2><?php the_title(); ?></h2>
			<?php else : ?>
				<div class="restaurant-page-custom-title">
					<?php echo wpautop($custom_title); ?>
				</div>
			<?php endif; ?>
				<?php if(function_exists('bcn_display')){bcn_display(); } ?>
			</div>
		</div>
	</div>
</div>

<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
