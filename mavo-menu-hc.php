<?php
/**
 * Plugin Name: Mavo Menu HC
 * Plugin URI:  https://www.mamanvoyage.com/
 * Description: Hardcoded navigation menu for Maman Voyage — replaces UberMenu with zero DB queries and minimal assets.
 * Version:     1.1.2
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
		file_exists( $css ) ? filemtime( $css ) : '1.1.2'
	);
	wp_enqueue_script(
		'mavo-menu',
		MAVO_MENU_URL . 'assets/menu.js',
		[],
		file_exists( $js ) ? filemtime( $js ) : '1.1.2',
		true
	);
}

/**
 * Which language's menu to show.
 *
 * Polylang first, because it is the authority and this plugin already trusts
 * it for the language switcher's links (see mavo_get_lang_url()). Deciding the
 * menu language a second, different way meant the two could disagree: the URI
 * test only recognises a language by its /en/ or /de/ prefix, so any URL
 * without one fell back to French. A post preview — /?p=123&preview=true —
 * is the case that actually showed it, rendering the French menu over an
 * English article.
 *
 * The URI test stays as the fallback for when Polylang is not loaded, and is
 * still what answers on every ordinary pretty-permalink URL if it is not.
 *
 * / or anything not prefixed = French (default)
 * /en/ or /en = English
 * /de/ or /de = German
 */
function mavo_get_lang(): string {
	if ( function_exists( 'pll_current_language' ) ) {
		$lang = (string) pll_current_language( 'slug' );

		if ( in_array( $lang, [ 'fr', 'en', 'de' ], true ) ) {
			return $lang;
		}
	}

	$uri = isset( $_SERVER['REQUEST_URI'] )
		? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) )
		: '/';

	if ( str_starts_with( $uri, '/en/' ) || $uri === '/en' ) return 'en';
	if ( str_starts_with( $uri, '/de/' ) || $uri === '/de' ) return 'de';
	return 'fr';
}
