<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<div class="categ-tag">
	<ul class="clearfix">
		<?php do_action( 'woocommerce_product_meta_start' ); ?>

		<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

			<li><span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span></li>

		<?php endif; ?>

		<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<li><span class="posted_in">' . _n( 'CATEGORIES:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span></li>' ); ?>

		<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<li><span class="tagged_as">' . _n( 'Tag:', 'TAGS:', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '</span></li>' ); ?>

		<?php do_action( 'woocommerce_product_meta_end' ); ?>
	</ul>
</div>

<div class="specific-pro">
	<ul>
		<li class="specific-pro-title">
			Product Specifications
		</li>
		<li>
			<span>Frame</span>
			<p>Optimized Construction carbon frame with 130mm travel.</p>
		</li>
		<li>
			<span>Fork</span>
			<p>RockShox Revelation RLT 27.5, 130mm, 15mm thru</p>
		</li>
		<li>
			<span>Rear Shock</span>
			<p>Fox Float CTD Boost Valve rear shock with Coat</p>
		</li>
		<li>
			<span>Headset</span>
			<p>Cane Creek 40</p>
		</li>
		<li>
			<span>Shifters</span>
			<p>SRAM GX 11 Speed Trigger Shifter</p>
		</li>
		<li>
			<span>Front Derailleur</span>
			<p>n\a</p>
		</li>
	</ul>
</div>
