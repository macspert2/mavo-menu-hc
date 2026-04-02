<?php
/**
 * Plugin Name: Mavo Menu HC
 * Plugin URI:  https://www.mamanvoyage.com/
 * Description: Hardcoded navigation menu for Maman Voyage — replaces UberMenu with zero DB queries and minimal assets.
 * Version:     1.0.0
 * Author:      Maman Voyage
 * License:     GPL-2.0+
 * Text Domain: mavo-menu-hc
 */

defined( 'ABSPATH' ) || exit;

define( 'MAVO_MENU_DIR', plugin_dir_path( __FILE__ ) );
define( 'MAVO_MENU_URL', plugin_dir_url( __FILE__ ) );

require_once MAVO_MENU_DIR . 'includes/menu-data.php';
require_once MAVO_MENU_DIR . 'includes/menu-render.php';

add_shortcode( 'mavo_menu', 'mavo_menu_render' );
add_action( 'wp_enqueue_scripts', 'mavo_menu_assets' );

function mavo_menu_assets(): void {
	wp_enqueue_style(
		'mavo-menu',
		MAVO_MENU_URL . 'assets/menu.css',
		[],
		'1.0.0'
	);
	wp_enqueue_script(
		'mavo-menu',
		MAVO_MENU_URL . 'assets/menu.js',
		[],
		'1.0.0',
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
