<?php
/**
 * HTML rendering functions for the hardcoded menu.
 * Output is returned (not echoed) so it works as a shortcode.
 */

defined( 'ABSPATH' ) || exit;

/* ── Inline SVG icons ──────────────────────────────────────────────────────── */

function mavo_icon_search(): string {
	return '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" focusable="false"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>';
}

function mavo_icon_bars(): string {
	return '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/></svg>';
}

function mavo_icon_chevron_right(): string {
	return '<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/></svg>';
}

/* ── Flag images (embedded base64 PNGs, 32×22 source shown at 16×11 for 2× HiDPI)
   Soft famfamfam-style palette + a 2px grey (#999) frame so the flags (and their
   white bands) stay separated from a white page background.
   (GoSquared flat flags, MIT-licensed, downscaled.) */

function mavo_flag_img( string $code, string $label ): string {
	$flags = [
		'fr' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAWCAMAAACWh252AAABgFBMVEWZmZkAVaTvQTX+/v4ASZ6rx+H6wLzuNCcAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAApRR7eAAAAgHRSTlP//////////wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAGX9/qoAAAAgSURBVHjaY2CgAmCEAhZWZihgY2eCglEFowpIV0AhAAD2ugTt2uaqggAAAABJRU5ErkJggg==',
		'en' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAWCAMAAACWh252AAABgFBMVEWZmZnHAAAAJpH1p6QDNZr4sa36/P1FeMNVh87iNzEAHIvTZmxrh8MzaLzkdnaSsN3hZWS2y+kCOaP21tYuW7DjXFkpTaPeRkTcVVX1oJz/7eiJh7X7ycWLo9LePTuyg5wYVLXqjo1LarIQTbDD2fIWQJ7TJiekhqbCyeDRHx+pZH7Y7P2/dYamb4v6wb5/i72+2vUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACcG4U6AAAAgHRSTlP/////////////////////////////////////////////////////////////////AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACxQidoAAAEcSURBVHjarZLHksMgEETNII0ECOVkJecc///rlqCyvD5s7cFdOgjq0T0zMJt9QVWGAYCjBD4lhPr2Pw3E3jWAYCtMSvgNgDwMRYMGWLbVYE1egD7OKEY7AwB4VxbiNgduAQ5ywWK8rAEMoPw2bc067EeH9FGzO/aOihodgPP8dhLNMZoTMo/Oyi8pudq3Dp6W9JMwRNQOXZHh05Nm2wCuEaXqozEhMTULKwOQP/Q/wH1luDbCpL1F2CK9J2ZFp4tEDMPEfytSt8PLBEN2tm0eG3G65ZzDNCinxzurH+k46h47VrebaVDrC8ZsIadR51vld/VGh12ElIkgfb8sCDAbqnZpAGyK4SA/r1sVtWLCtrk3xz8fjDapvvEgfwDFJhLf5lpSqwAAAABJRU5ErkJggg==',
		'de' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAWCAMAAACWh252AAABgFBMVEWZmZn/ywD+AAAAAAAqAAD/2QD/PQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACOQ3q0AAAAgHRSTlP/////////AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAE6p8K0AAAAsSURBVHjaY2CgAmDGAwaNAhY8AKyACQ8YNArY8ACwAlY8AKyAEQ8YNAooBAC3xQTtk0PS+wAAAABJRU5ErkJggg==',
	];
	$src = $flags[ $code ] ?? '';
	if ( ! $src ) return '';
	return sprintf(
		'<img src="%s" alt="%s" width="16" height="11" loading="lazy" aria-hidden="true">',
		$src,
		esc_attr( $label )
	);
}

/* ── Locale-aware labels ───────────────────────────────────────────────────── */

function mavo_aria_label( string $lang ): string {
	return match ( $lang ) {
		'en'    => 'Main navigation',
		'de'    => 'Hauptnavigation',
		default => 'Navigation principale',
	};
}

function mavo_toggle_label( string $lang ): string {
	return match ( $lang ) {
		'en'    => 'Menu',
		'de'    => 'Menü',
		default => 'Menu',
	};
}

/* ── Main shortcode entry point ────────────────────────────────────────────── */

function mavo_menu_render( $atts ): string {
	$lang  = mavo_get_lang();
	$data  = mavo_get_menu_data();
	$items = $data[ $lang ] ?? $data['fr'];

	ob_start();
	?>
	<button class="mavo-toggle" aria-label="Toggle Menu" aria-expanded="false" aria-controls="mavo-nav">
		<?= mavo_icon_bars() ?><span><?= esc_html( mavo_toggle_label( $lang ) ) ?></span>
	</button>
	<nav id="mavo-nav" class="mavo-nav" role="navigation" aria-label="<?= esc_attr( mavo_aria_label( $lang ) ) ?>">
		<ul class="mavo-bar">
			<?php foreach ( $items as $item ) : ?>
				<?= mavo_render_bar_item( $item ) ?>
			<?php endforeach; ?>
		</ul>
	</nav>
	<?php
	return ob_get_clean();
}

/* ── Top-level (bar) item dispatcher ───────────────────────────────────────── */

function mavo_render_bar_item( array $item ): string {
	$type = $item['type'] ?? '';

	if ( $type === 'search' ) {
		return mavo_render_search_item( $item );
	}

	if ( $type === 'lang' ) {
		return mavo_render_lang_item( $item );
	}

	if ( ! empty( $item['mega'] ) ) {
		return mavo_render_mega_item( $item );
	}

	if ( ! empty( $item['sub'] ) ) {
		return mavo_render_flyout_item( $item );
	}

	return mavo_render_link_item( $item );
}

/* ── Simple direct-link item ───────────────────────────────────────────────── */

function mavo_render_link_item( array $item ): string {
	return sprintf(
		'<li class="mavo-item"><a class="mavo-link" href="%s">%s</a></li>',
		esc_url( $item['url'] ),
		esc_html( $item['label'] )
	);
}

/* ── Flyout item (L0 → L1, and optionally L1 → L2) ────────────────────────── */

function mavo_render_flyout_item( array $item ): string {
	$link = $item['url']
		? sprintf( '<a class="mavo-link" href="%s">%s</a>', esc_url( $item['url'] ), esc_html( $item['label'] ) )
		: sprintf( '<span class="mavo-link mavo-nolink">%s</span>', esc_html( $item['label'] ) );

	$sub = mavo_render_sub_list( $item['sub'] );

	return sprintf(
		'<li class="mavo-item mavo-has-fly">%s%s</li>',
		$link,
		$sub
	);
}

function mavo_render_sub_list( array $children ): string {
	$out = '<ul class="mavo-sub">';
	foreach ( $children as $child ) {
		$type = $child['type'] ?? '';

		if ( $type === 'header' ) {
			$out .= sprintf( '<li class="mavo-sub-header"><span>%s</span></li>', esc_html( $child['label'] ) );
			continue;
		}

		if ( ! empty( $child['sub'] ) ) {
			// Level-2 flyout
			$out .= sprintf(
				'<li class="mavo-sub-item mavo-has-fly2"><a href="%s">%s%s</a><ul class="mavo-sub2">%s</ul></li>',
				esc_url( $child['url'] ),
				esc_html( $child['label'] ),
				mavo_icon_chevron_right(),
				mavo_render_sub2_items( $child['sub'] )
			);
			continue;
		}

		$out .= sprintf(
			'<li class="mavo-sub-item"><a href="%s">%s</a></li>',
			esc_url( $child['url'] ),
			esc_html( $child['label'] )
		);
	}
	$out .= '</ul>';
	return $out;
}

function mavo_render_sub2_items( array $children ): string {
	$out = '';
	foreach ( $children as $child ) {
		$out .= sprintf(
			'<li><a href="%s">%s</a></li>',
			esc_url( $child['url'] ),
			esc_html( $child['label'] )
		);
	}
	return $out;
}

/* ── Mega-menu item (full-width panel, columns) ─────────────────────────────── */

function mavo_render_mega_item( array $item ): string {
	$link = $item['url']
		? sprintf( '<a class="mavo-link" href="%s">%s</a>', esc_url( $item['url'] ), esc_html( $item['label'] ) )
		: sprintf( '<span class="mavo-link mavo-nolink">%s</span>', esc_html( $item['label'] ) );

	$cols = '';
	foreach ( $item['cols'] as $col ) {
		$header_tag = $col['url'] && $col['url'] !== '#'
			? sprintf( '<a class="mavo-mega-header" href="%s">%s</a>', esc_url( $col['url'] ), esc_html( $col['header'] ) )
			: sprintf( '<span class="mavo-mega-header">%s</span>', esc_html( $col['header'] ) );

		$links = '';
		foreach ( $col['items'] as $ci ) {
			$links .= sprintf(
				'<li><a href="%s">%s</a></li>',
				esc_url( $ci['url'] ),
				esc_html( $ci['label'] )
			);
		}

		$cols .= sprintf( '<div class="mavo-mega-col">%s<ul>%s</ul></div>', $header_tag, $links );
	}

	return sprintf(
		'<li class="mavo-item mavo-has-mega">%s<div class="mavo-mega"><div class="mavo-mega-inner">%s</div></div></li>',
		$link,
		$cols
	);
}

/* ── Search item ───────────────────────────────────────────────────────────── */

function mavo_render_search_item( array $item ): string {
	$align_class = ( $item['align'] ?? 'left' ) === 'right' ? ' mavo-search-rtl' : '';

	// Sanitize action URL into a safe HTML id (strip non-alphanumeric)
	$field_id = 'mavo-s-' . preg_replace( '/[^a-z0-9]/', '', $item['action'] );
	if ( $field_id === 'mavo-s-' ) $field_id = 'mavo-s-root';

	// Label for the search icon button (language-aware, from placeholder without ellipsis)
	$icon_label = rtrim( $item['placeholder'], '.' );

	// Extra hidden inputs (e.g. WPML lang param for German)
	$hidden = '';
	foreach ( $item['hidden_inputs'] ?? [] as $name => $value ) {
		$hidden .= sprintf(
			'<input type="hidden" name="%s" value="%s">',
			esc_attr( $name ),
			esc_attr( $value )
		);
	}

	return sprintf(
		'<li class="mavo-item mavo-item-search%s">
			<span class="mavo-link mavo-link-icon" tabindex="0" role="button" aria-haspopup="true" aria-expanded="false" aria-label="%s">%s</span>
			<div class="mavo-sub mavo-search-drop">
				<form role="search" method="get" action="%s" class="mavo-search-form">
					<label for="%s" class="mavo-sr-only">%s</label>
					%s
					<input type="text" name="s" id="%s" class="mavo-search-input" placeholder="%s" autocomplete="off">
					<button type="submit" class="mavo-search-btn" aria-label="%s">%s</button>
				</form>
			</div>
		</li>',
		esc_attr( $align_class ),
		esc_attr( $icon_label ),
		mavo_icon_search(),
		esc_url( $item['action'] ),
		esc_attr( $field_id ),
		esc_html( $item['placeholder'] ),
		$hidden,
		esc_attr( $field_id ),
		esc_attr( $item['placeholder'] ),
		esc_attr( $icon_label ),
		mavo_icon_search()
	);
}

/* ── Language switcher item ────────────────────────────────────────────────── */

/**
 * Resolve the best URL for a language switcher link.
 *
 * On singular posts/pages, tries to find the translated version via Polylang
 * (pll_get_post). Falls back to the static homepage URL for that language
 * if Polylang is unavailable, the post type isn't translated, or no
 * translation exists yet.
 *
 * @param string $pll_lang   Two-letter Polylang language slug, e.g. 'fr', 'en', 'de'.
 * @param string $fallback   Static URL from menu-data.php (e.g. '/en/').
 */
function mavo_get_lang_url( string $pll_lang, string $fallback ): string {
	// Only attempt on single posts / pages
	if ( ! is_singular() ) return $fallback;
	if ( ! function_exists( 'pll_get_post' ) ) return $fallback;

	$current_id    = get_queried_object_id();
	$translated_id = $current_id ? pll_get_post( $current_id, $pll_lang ) : 0;

	if ( ! $translated_id ) return $fallback;

	$url = get_permalink( $translated_id );
	return $url ?: $fallback;
}

function mavo_render_lang_item( array $item ): string {
	$links = '';
	foreach ( $item['items'] as $lang_item ) {
		// $lang_item['flag'] holds the two-letter Polylang language slug ('fr','en','de')
		$url = mavo_get_lang_url( $lang_item['flag'], $lang_item['url'] );

		// Flag only for sighted users; the language name lives in aria-label,
		// which doubles as the accessible name (the flag image stays decorative,
		// empty alt) and as the on-hover/-focus tooltip text (CSS attr(aria-label)).
		$links .= sprintf(
			'<a href="%s" hreflang="%s" lang="%s" class="mavo-lang-link" aria-label="%s">%s</a>',
			esc_url( $url ),
			esc_attr( $lang_item['hreflang'] ),
			esc_attr( $lang_item['hreflang'] ),
			esc_attr( $lang_item['label'] ),
			mavo_flag_img( $lang_item['flag'], '' )
		);
	}
	return '<li class="mavo-item mavo-item-lang">' . $links . '</li>';
}
