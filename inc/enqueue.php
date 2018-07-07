<?php
/**
 * Enqueue scripts and styles.
 */
function rideo_scripts() {


// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'animate-style', get_template_directory_uri().'/assets/css/animate.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'font-awesome-style', get_template_directory_uri().'/assets/css/font-awesome.min.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'pe-icon-7-stroke-style', get_template_directory_uri().'/assets/css/pe-icon-7-stroke.min.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'meanmenu-style', get_template_directory_uri().'/assets/css/meanmenu.min.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'magnific-popup-style', get_template_directory_uri().'/assets/css/magnific-popup.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'slick-style', get_template_directory_uri().'/assets/css/slick.min.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'camera-style', get_template_directory_uri().'/assets/css/camera.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'jquery-ui-style', get_template_directory_uri().'/assets/css/jquery-ui.min.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'rideo-default-style', get_template_directory_uri().'/assets/css/default.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'rideo-style', get_template_directory_uri().'/assets/css/style.css', array(), '1.0', 'all' );
	//wp_enqueue_style( 'rideo-woo-style', get_template_directory_uri().'/woocommerce.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'rideo-responsive', get_template_directory_uri().'/assets/css/responsive.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'rideo-theme-file', get_stylesheet_uri() );

	//All JS File
	wp_enqueue_script( 'modernizr', get_template_directory_uri().'/assets/js/vendor/modernizr-2.8.3.min.js', array('jquery'), '3.3.7', true );
	

	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
	//camera slider JS
    wp_enqueue_script( 'camera', get_template_directory_uri().'/assets/js/camera.min.js', array('jquery'), '3.3.7', true );	
	//jquery.easing js
    wp_enqueue_script( 'jquery-easing', get_template_directory_uri().'/assets/js/jquery.easing.1.3.js', array('jquery'), '3.3.7', true );
	//slick slider js
    wp_enqueue_script( 'slick-min', get_template_directory_uri().'/assets/js/slick.min.js', array('jquery'), '3.3.7', true );
	//jquery-ui js
    wp_enqueue_script( 'jquery-ui', get_template_directory_uri().'/assets/js/jquery-ui.min.js', array('jquery'), '3.3.7', true );
	//magnific-popup js
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri().'/assets/js/magnific-popup.min.js', array('jquery'), '3.3.7', true );
	//countdown js
    wp_enqueue_script( 'countdown', get_template_directory_uri().'/assets/js/countdown.js', array('jquery'), '3.3.7', true );
	//meanmenu js
    wp_enqueue_script( 'jquery-meanmenu', get_template_directory_uri().'/assets/js/jquery.meanmenu.js', array('jquery'), '3.3.7', true );
	//plugins js
    wp_enqueue_script( 'plugins', get_template_directory_uri().'/assets/js/plugins.js', array('jquery'), '3.3.7', true );	
	//main js    
	wp_enqueue_script( 'main', get_template_directory_uri().'/assets/js/main.js', array('jquery'), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}    
    
}
add_action( 'wp_enqueue_scripts', 'rideo_scripts' );
