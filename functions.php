<?php

define('MBN_DIR_URI', get_template_directory_uri());
define('MBN_DIR_PATH', get_template_directory());
define('MBN_ASSETS_URI', MBN_DIR_URI.'/resources');
define('MBN_MAP_API_KEY',"AIzaSyCdKe1vw-cidSaFEvaEcuesAI7sLkfda-4");

/**
 * Theme setup
**/
function mbn_theme_setup(){

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_editor_style('editor.css');
    
    // add_theme_support( 'woocommerce');
    // show_admin_bar(false);
    // set_post_thumbnail_size(1568, 9999);
    // add_image_size('small-thumbnail', '150', '100');

    // add_theme_support('custom-logo',array(
    //     'height'      => 190,
    //     'width'       => 190,
    //     'flex-width'  => false,
    //     'flex-height' => false
    // ));

    // add_theme_support('customize-selective-refresh-widgets');
    // add_theme_support('wp-block-styles');
    

    register_nav_menus(array(
        'main-menu'   => 'Main Menu',
    ));

}
add_action('after_setup_theme', 'mbn_theme_setup');


/**
 * Enqeueue stylesheets and scripts
**/
function mbn_enqueue_scripts(){
    global $wp_version;
    global $template;

    // Global CSS
    wp_enqueue_style('mbn-style', get_stylesheet_uri());    

    // unneccessary scripts
    wp_deregister_script('wp-embed');
    wp_deregister_style('wp-block-library');


    // dummy handler - for using inline-css
    wp_register_style('inlinecss-handle', false);
    wp_enqueue_style('inlinecss-handle');

    wp_enqueue_style('font-opensans', 'https://fonts.googleapis.com/css?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,600;1,700&display=swap', [], $wp_version);

	//Global JS
	wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', MBN_ASSETS_URI.'/vendor/jquery-3.4.1.min.js', [], $wp_version);
    wp_enqueue_script( 'jquery' );

    wp_deregister_script( 'jquery-migrate' );
    wp_register_script( 'jquery-migrate', MBN_ASSETS_URI.'/vendor/jquery-migrate-3.min.js', [], $wp_version);
    wp_enqueue_script( 'jquery-migrate' );
    

    // Foundation JS
    wp_enqueue_script('foundation', MBN_ASSETS_URI.'/vendor/foundation/js/foundation.min.js', [], $wp_version);

    // slick
    wp_enqueue_style('slick', MBN_ASSETS_URI.'/vendor/slick/slick.css', [], $wp_version);
    wp_enqueue_script('slick', MBN_ASSETS_URI.'/vendor/slick/slick.min.js', [], false);

    // Isotope
    wp_enqueue_script('nicescroll', MBN_ASSETS_URI.'/vendor/isotope/isotope.min.js', [], $wp_version);

    // Nicescroll
    // wp_enqueue_script('nicescroll', MBN_ASSETS_URI.'/vendor/jquery.nicescroll.min.js', [], $wp_version);

    // Fancybox
    //wp_enqueue_style('fancybox', MBN_ASSETS_URI.'/vendor/fancybox/jquery.fancybox.min.css', [], $wp_version);
    //wp_enqueue_script('fancybox', MBN_ASSETS_URI.'/vendor/fancybox/jquery.fancybox.min.js', [], $wp_version);

    //wp_register_script('google-maps', 'https://maps.googleapis.com/maps/api/js?&key='. MBN_MAP_API_KEY.'&callback=initMap', array(), '', true);

        
    // google maps
    wp_enqueue_script(
        'google-maps',
        'https://maps.googleapis.com/maps/api/js?' . http_build_query( array(
            'key'         => MBN_MAP_API_KEY,
            'v'         => '3',
            'libraries' => 'places',
            'language'  => substr( get_locale(), 0, 2 ),
        ) ),
        array(),
        '3',
        false
    );



    // Fonts
    wp_enqueue_style('custom-fonts', 'https://use.typekit.net/zrx8khr.css', [], $wp_version);
    
    // App
    wp_enqueue_style('app', MBN_ASSETS_URI.'/css/app.css', [], $wp_version);
    wp_enqueue_script('app', MBN_ASSETS_URI.'/js/app.js', [], $wp_version, true);

    wp_localize_script('app', 'wpGlobals', array(
        'mapOptions' => file_get_contents( MBN_ASSETS_URI.'/js/map_style.json')
      ) );
    

    // localize objects
    wp_localize_script('app', 'main_obj', array(
        'ajax_url'  => admin_url('admin-ajax.php'),
        'home_url'  => home_url(),
        'theme_url' => MBN_DIR_URI,
        'nonce'     => wp_create_nonce('mbn-nonce')
    ));
}
add_action('wp_enqueue_scripts', 'mbn_enqueue_scripts', 20);


// remove wp emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');


/**
 * Register sidebars
**/
function mbn_register_sidebars(){
    // footer menus
    for($i=1;$i<=5;$i++){
        register_sidebar(array(
            'name'          => __('Footer Column '.$i),
            'id'            => 'footer-col-'.$i,
            'before_widget' => false,
            'after_widget'  => false,
            'before_title'  => false,
            'after_title'   => false,
        ));
    }
}
//add_action('widgets_init', 'mbn_register_sidebars');


/**
 * Allow SVG
**/
function mbn_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}
add_filter('upload_mimes', 'mbn_myme_types');


require MBN_DIR_PATH."/mbn-login/setup.php";
require MBN_DIR_PATH.'/includes/post-types.php';
require MBN_DIR_PATH.'/includes/shortcodes.php';
require MBN_DIR_PATH.'/includes/public-hooks.php';
require MBN_DIR_PATH.'/includes/admin-hooks.php';


add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
    return "<button class='button hollow primary gform_button' id='gform_submit_button_{$form['id']}'>{$form['button']['text']}</button>";
}

/**
 * Register font hook.
 *
 * @return string
 */
if ( ! function_exists( 'google_fonts_url' ) ) :
	/**
	 * Register Google fonts.
	 *
	 * @return string Google fonts URL for the theme.
	 */
	/**
	 * @return string
	 */
	function google_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = '';

		/* translators: If there are characters in your language that are not supported by this font, translate this to 'off'. Do not translate into your own language. */
		if ( 'on' !== esc_html_x( 'on', 'Open Sans font: on or off', 'mbn_theme' ) ) {
			$fonts[] = 'Open+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,600;1,700&display=swap';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css2' );
		}

		return $fonts_url;
	}
endif;


//add_action( 'wp_head', 'preload_fonts' ); 
function preload_fonts() { 
    $url = google_fonts_url(); 
    ?> 
<link rel="dns-prefetch" href="https://fonts.gstatic.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous"> 
<link rel="preload" href="<?php echo esc_url( $url ); ?>" as="fetch" crossorigin="anonymous"> 
<script type="text/javascript"> 
!function(e,n,t){"use strict";var o="<?php echo esc_url( $url ); ?>",r="__3perf_googleFontsStylesheet";function c(e){(n.head||n.body).appendChild(e)}function a(){var e=n.createElement("link");e.href=o,e.rel="stylesheet",c(e)}function f(e){if(!n.getElementById(r)){var t=n.createElement("style");t.id=r,c(t)}n.getElementById(r).innerHTML=e}e.FontFace&&e.FontFace.prototype.hasOwnProperty("display")?(t[r]&&f(t[r]),fetch(o).then(function(e){return e.text()}).then(function(e){return e.replace(/@font-face {/g,"@font-face{font-display:swap;")}).then(function(e){return t[r]=e}).then(f).catch(a)):a()}(window,document,localStorage); 
</script>
    <?php
} 



/** Get page type, eg. for customizer option */
function mbn_page_type() {
	global $template;

	if ( strpos( $template, 'company.php' ) ) {
		return 'company';
	}

	if ( strpos( $template, 'services.php' ) ) {
		return 'services';
	}
	if ( strpos( $template, 'portfolio.php' ) ) {
		return 'portfolio';
	}
	if ( strpos( $template, 'contact.php' ) ) {
		return 'contact';
	}
	if ( strpos( $template, 'single-projects_type.php' ) ) {
		return 'single-portfolio';
	}
	if ( is_single() ) {
		return 'single';
	}
	if ( is_404() ) {
		return '404';
	}
	if ( is_page() ) {
		return 'single_page';
	}
	if ( is_search() ) {
		return 'blog';
	}
}
