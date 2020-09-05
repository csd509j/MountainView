<?php 
/*
 * Theme update checker
 *
 * @since Mt. View 1.0
 */
require WP_CONTENT_DIR . '/plugins/plugin-update-checker-master/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/csd509j/MountainView',
	__FILE__,
	'MountainView'
);

$myUpdateChecker->setBranch('master'); 

/*
 * Setup style sheets
 *
 * @since Mt. View 1.0
 */
function mtview_theme_enqueue_styles() {
    
	$parent_style = 'csdschools';
	$child_theme = wp_get_theme();
	$parent_theme_version = $child_theme->parent();
	
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css', '', $parent_theme_version->version );
	wp_enqueue_style( 'mtview-style',
	    get_stylesheet_directory_uri() . '/style.css',
	    array( $parent_style ),
	    wp_get_theme()->get('Version')
	);

}
add_action( 'wp_enqueue_scripts', 'mtview_theme_enqueue_styles' );