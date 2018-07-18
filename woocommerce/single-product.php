<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

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

		<?php
			/**
			 * woocommerce_before_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			 * @hooked woocommerce_breadcrumb - 20
			 */
			do_action( 'woocommerce_before_main_content' );
		?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php wc_get_template_part( 'content', 'single-product' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php
			/**
			 * woocommerce_after_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
		?>
	

		<?php
			/**
			 * woocommerce_sidebar hook.
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			do_action( 'woocommerce_sidebar' );
		?>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
