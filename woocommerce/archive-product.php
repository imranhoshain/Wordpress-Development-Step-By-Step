<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

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

<section class="product-content section-padding">
	<div class="container">

		<div class="row">
			<div class="col-xs-12">
				<div class="shop-menu clearfix">
					<div class="left floatleft">
					    <div class="tab-menu view-mode">
							<a class="grid active" data-toggle="tab" href="#grid"><i class="fa fa-th"></i></a>
							<a class="list" data-toggle="tab" href="#list"><i class="fa fa-bars"></i></a>
						</div>
					</div>
					<div class="right floatright">
						<ul>
							<li>
								<div class="custom-select">
									<?php rideo_woocommerce_catalog_page_ordering(); ?>
								</div>
								<p class="show-per-page">Showing</p>			
							</li>
							<li>
								<div class="custom-select">
									<?php woocommerce_catalog_ordering(); ?>
								</div>
								<p>Short By</p>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="tab-content">				
				<div class="single-products">
					<header class="woocommerce-products-header">
						<?php if ( apply_filters( 'woocommerce_show_page_title', false ) ) : ?>
							<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
						<?php endif; ?>

						<?php
						/**
						 * Hook: woocommerce_archive_description.
						 *
						 * @hooked woocommerce_taxonomy_archive_description - 10
						 * @hooked woocommerce_product_archive_description - 10
						 */
						do_action( 'woocommerce_archive_description' );
						?>
					</header>

					<?php
					if ( woocommerce_product_loop() ) {

						/**
						 * Hook: woocommerce_before_shop_loop.
						 *
						 * @hooked wc_print_notices - 10
						 * @hooked woocommerce_result_count - 20
						 * @hooked woocommerce_catalog_ordering - 30
						 */
						do_action( 'woocommerce_before_shop_loop' );

						woocommerce_product_loop_start();

						if ( wc_get_loop_prop( 'total' ) ) {
							while ( have_posts() ) {
								the_post();

								/**
								 * Hook: woocommerce_shop_loop.
								 *
								 * @hooked WC_Structured_Data::generate_product_data() - 10
								 */
								do_action( 'woocommerce_shop_loop' );

								wc_get_template_part( 'content', 'product' );
							}
						}

						woocommerce_product_loop_end();

						/**
						 * Hook: woocommerce_after_shop_loop.
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action( 'woocommerce_after_shop_loop' );
					} else {
						/**
						 * Hook: woocommerce_no_products_found.
						 *
						 * @hooked wc_no_products_found - 10
						 */
						do_action( 'woocommerce_no_products_found' );
					}
					?>
				</div>				
			</div>
		</div>		
		<div class="row">
			<div class="col-xs-12">
				<div class="shop-menu clearfix margin-close">
					<div class="left floatleft">
						<div class="tab-menu view-mode">
							<a class="grid active" data-toggle="tab" href="#grid"><i class="fa fa-th"></i></a>
							<a class="list" data-toggle="tab" href="#list"><i class="fa fa-bars"></i></a>
						</div>
					</div>
					<div class="right floatright text-center">						
						<?php rideo_product_pagination(); ?>						
					</div>
				</div>
			</div>
		</div>
	

			<?php
			/**
			 * Hook: woocommerce_after_main_content.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );

			/**
			 * Hook: woocommerce_sidebar.
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			do_action( 'woocommerce_sidebar' );

			?>
	</div>
</section>

<?php
get_footer( 'shop' );
