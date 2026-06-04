<?php
/**
 * Plugin Name: Mavo Menu HC
 * Plugin URI:  https://www.mamanvoyage.com/
 * Description: Hardcoded navigation menu for Maman Voyage — replaces UberMenu with zero DB queries and minimal assets.
 * Version:     1.1.0
 * Author:      Maman Voyage
 * License:     GPL-2.0+
 * Text Domain: mavo-menu-hc
 */

defined( 'ABSPATH' ) || exit;

define( 'MAVO_MENU_DIR', plugin_dir_path( __FILE__ ) );
define( 'MAVO_MENU_URL', plugin_dir_url( __FILE__ ) );

// Local overrides (e.g. custom menu items) survive git pulls by living in
// menu-data-local.php, which is never committed to the repository.
$_mavo_data_file = file_exists( MAVO_MENU_DIR . 'includes/menu-data-local.php' )
	? MAVO_MENU_DIR . 'includes/menu-data-local.php'
	: MAVO_MENU_DIR . 'includes/menu-data.php';
require_once $_mavo_data_file;
unset( $_mavo_data_file );

require_once MAVO_MENU_DIR . 'includes/menu-render.php';

add_shortcode( 'mavo_menu', 'mavo_menu_render' );
add_action( 'wp_enqueue_scripts', 'mavo_menu_assets' );

function mavo_menu_assets(): void {
	// Version each asset by its file mtime so any edit changes the ?ver= URL.
	// This self-busts browser/CDN/Autoptimize caches for CSS/JS changes — no
	// manual purge needed for asset edits (page-cache purge still emits the
	// new URLs). Falls back to the plugin version if the file is missing.
	$css = MAVO_MENU_DIR . 'assets/menu.css';
	$js  = MAVO_MENU_DIR . 'assets/menu.js';
	wp_enqueue_style(
		'mavo-menu',
		MAVO_MENU_URL . 'assets/menu.css',
		[],
		file_exists( $css ) ? filemtime( $css ) : '1.1.0'
	);
	wp_enqueue_script(
		'mavo-menu',
		MAVO_MENU_URL . 'assets/menu.js',
		[],
		file_exists( $js ) ? filemtime( $js ) : '1.1.0',
		true
	);
}

/**
 * Detect current language from the request URI.
 * / or anything not prefixed = French (default)
 * /en/ or /en = English
 * /de/ or /de = German
 */
function mavo_get_lang(): string {
	$uri = $_SERVER['REQUEST_URI'] ?? '/';
	if ( str_starts_with( $uri, '/en/' ) || $uri === '/en' ) return 'en';
	if ( str_starts_with( $uri, '/de/' ) || $uri === '/de' ) return 'de';
	return 'fr';
}
