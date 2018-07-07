<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rideo_widgets_init() {
	//Blog Right Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Right Sidebar', 'rideo' ),
		'id'            => 'blog_right_sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'rideo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="sidebar-title"><h3>',
		'after_title'   => '</h3></div>',
	) );

	//Blog Left Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Left Sidebar', 'rideo' ),
		'id'            => 'blog_left_sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'rideo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	//Woocommerce Right sidebaar
	register_sidebar( array(
		'name'          => esc_html__( 'WooCommerce Right Sidebar', 'rideo' ),
		'id'            => 'woo_right_sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'rideo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	//Woocommerce left sidebaar
	register_sidebar( array(
		'name'          => esc_html__( 'WooCommerce Left Sidebar', 'rideo' ),
		'id'            => 'woo_left_sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'rideo' ),
		'before_widget' => '<div class="category single-side">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="sidebar-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
    
    //footer Widget
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget One', 'rideo' ),
		'id'            => 'footer_one',
		'description'   => esc_html__( 'Add information, logo, your address.', 'rideo' ),
		'before_widget' => '<div class="s-footer-text">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="footer-title"><h4>',
		'after_title'   => '</h4></div>',
	) );

	 //footer Widget 2
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Two', 'rideo' ),
		'id'            => 'footer_two',
		'description'   => esc_html__( 'Add footer widget Style2 here.', 'rideo' ),
		'before_widget' => '<div class="s-footer-text contact-link">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="footer-title"><h4>',
		'after_title'   => '</h4></div>',
	) );
    
     //footer Widget 3
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Three', 'rideo' ),
		'id'            => 'footer_three',
		'description'   => esc_html__( 'Add Footer Three.', 'rideo' ),
		'before_widget' => '<div class="s-footer-text footer-menu">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="footer-title"><h4>',
		'after_title'   => '</h4></div>',
	) );

	     //footer Widget Four
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Four', 'rideo' ),
		'id'            => 'footer_four',
		'description'   => esc_html__( 'Add Footer Four.', 'rideo' ),
		'before_widget' => '<div class="s-footer-text footer-menu">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="footer-title"><h4>',
		'after_title'   => '</h4></div>',
	) );
}
add_action( 'widgets_init', 'rideo_widgets_init' );


if(!function_exists('spy_get_page_id')) {
	function spy_get_page_id() {
		global $post;

		$page = array(
			'id' => 0,
			'type' => 'page'
		);

		if(isset($post->ID) && is_singular('page')) { 
			$page = array(
				'id' => $post->ID,
				'type' => 'page'
			);
		} else if( is_home() || is_archive('post') || is_search() ) {
			$page = array(
				'id' => $id = get_option( 'page_for_posts' ),
				'type' => 'blog'
			);
		} else if( get_post_type() == 'etheme_portfolio' || is_singular( 'etheme_portfolio' ) ) {
			$page = array(
				'id' => etheme_tpl2id( 'portfolio.php' ),
				'type' => 'portfolio'
			);
		}

		if(class_exists('WooCommerce') && (is_shop() || is_product_category() || is_product_tag() || is_singular( "product" ))) {
			$page = array(
				'id' => get_option('woocommerce_shop_page_id'),
				'type' => 'shop'
			);
		}

		return $page;
	}
}
/**
*   Adding custom sidebar ajax
*/

if(!function_exists('spy_add_sidebar_action')) {
	function spy_add_sidebar_action(){
	    if (!wp_verify_nonce($_GET['_wpnonce_piko_widgets'],'piko-add-sidebar-widgets') ) die( 'Security check' );
	    if($_GET['piko_sidebar_name'] == '') die('Empty Name');
	    $option_name = 'spy_custom_sidebars';
	    if(!get_option($option_name) || get_option($option_name) == '') delete_option($option_name); 
	    
	    $new_sidebar = $_GET['piko_sidebar_name'];

		$result = spy_add_sidebar($new_sidebar);

	    if($result) die($result);
	    else die('error');
	}
}

if( ! function_exists('spy_add_sidebar') ) {
	function spy_add_sidebar($name) {
		$option_name = 'spy_custom_sidebars';
		if(get_option($option_name)) {
			$custom_sidebars = spy_get_stored_sidebar();
			$custom_sidebars[] = trim($name);
			$result = update_option($option_name, $custom_sidebars);
		}else{
			$custom_sidebars[] = $name;
			$result2 = add_option($option_name, $custom_sidebars);
		}
		if($result) return 'Updated';
		elseif($result2) return 'added';
		else die('error');
	}
}


/**
*   deleting custom sidebar in ajax 
*/

if(!function_exists('spy_delete_sidebar')) {
	function spy_delete_sidebar(){
	    $option_name = 'spy_custom_sidebars';
	    $del_sidebar = trim($_GET['piko_sidebar_name']);
	        
	    if(get_option($option_name)) {
	        $custom_sidebars = spy_get_stored_sidebar();
	        
	        foreach($custom_sidebars as $key => $value){
	            if($value == $del_sidebar)
	                unset($custom_sidebars[$key]);
	        }
	        
	        
	        $result = update_option($option_name, $custom_sidebars);
	    }
	    
	    if($result) die('Deleted');
	    else die('error');
	}
}


/**
*   detault registering sidebars similar custom sidebar
*/

if(!function_exists('spy_register_stored_sidebar')) {
	function spy_register_stored_sidebar(){
	    $custom_sidebars = spy_get_stored_sidebar();
	    if(is_array($custom_sidebars)) {
	        foreach($custom_sidebars as $name){
	            register_sidebar( array(
	                'name' => ''.$name.'',
	                'id' => str_replace(' ','',strtolower ($name)),
	                'class' => 'piko_custom_sidebar',
	                'before_widget' => '<section id="%1$s" class="widget %2$s">',
	                'after_widget' => '</section>',
	                'before_title' => '<h2 class="widget-title">',
	                'after_title' => '</h2>',
	            ) );
	        }
	    }
	}
}

/**
*   Stored all sidebar in array
*/

if(!function_exists('spy_get_stored_sidebar')) {
	function spy_get_stored_sidebar(){
	    $option_name = 'spy_custom_sidebars';
	    return get_option($option_name);
	}
}


/**
*   Add form custom widgets
*/

if(!function_exists('spy_sidebar_form')) {
	function spy_sidebar_form(){
	    ?>
	    
	    <form action="<?php echo admin_url( 'widgets.php' ); ?>" method="post" id="piko_add_sidebar_form">
	        <h2>Custom Sidebar</h2>
	        <?php wp_nonce_field( 'piko-add-sidebar-widgets', '_wpnonce_piko_widgets', false ); ?>
	        <input type="text" name="piko_sidebar_name" id="piko_sidebar_name" />
	        <button type="submit" class="button-primary" value="add-sidebar">Add Sidebar</button>
	    </form>
	    <script type="text/javascript">
	        var sidebarForm = jQuery('#piko_add_sidebar_form');
	        var sidebarFormNew = sidebarForm.clone();
	        sidebarForm.remove();
	        jQuery('#widgets-right').append('<div style="clear:both;"></div>');
	        jQuery('#widgets-right').append(sidebarFormNew);
	        
	        sidebarFormNew.submit(function(e){
	            e.preventDefault();
	            var data =  {
	                'action':'spy_add_sidebar',
	                '_wpnonce_piko_widgets': jQuery('#_wpnonce_piko_widgets').val(),
	                'piko_sidebar_name': jQuery('#piko_sidebar_name').val(),
	            };
	            //console.log(data);
	            jQuery.ajax({
	                url: ajaxurl,
	                data: data,
	                success: function(response){
	                    console.log(response);
	                    window.location.reload(true);
	                    
	                },
	                error: function(data) {
	                    console.log('error');
	                    
	                }
	            });
	        });
	        
	    </script>
	    <?php
	}
}
add_action( 'sidebar_admin_page', 'spy_sidebar_form', 30 );
add_action('wp_ajax_spy_add_sidebar', 'spy_add_sidebar_action');
add_action('wp_ajax_spy_delete_sidebar', 'spy_delete_sidebar');
add_action( 'widgets_init', 'spy_register_stored_sidebar' );