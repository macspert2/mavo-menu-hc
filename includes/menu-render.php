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

/* ── Flag images (embedded base64 PNGs, 16×11 px) ─────────────────────────── */

function mavo_flag_img( string $code, string $label ): string {
	$flags = [
		'fr' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAMAAABBPP0LAAAAbFBMVEVzldTg4ODS0tLxDwDtAwDjAADD0uz39/fy8vL3k4nzgna4yOixwuXu7u7s6+zn5+fyd2rvcGPtZljYAABrjNCpvOHrWkxegsqfs93NAADpUUFRd8THAABBa7wnVbERRKa8vLyxsLCoqKigoKClCvcsAAAAXklEQVR4AS3JxUEAQQAEwZo13Mk/R9w5/7UERJCIGIgj5qfRJZEpPyNfCgJTjMR1eRRnJiExFJz5Mf1PokWr/UztIjRGQ3V486u0HO55m634U6dMcf0RNPfkVCTvKjO16xHA8miowAAAAABJRU5ErkJggg==',
		'en' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAMAAABBPP0LAAAAt1BMVEWSmb66z+18msdig8La3u+tYX9IaLc7W7BagbmcUW+kqMr/q6n+//+hsNv/lIr/jIGMnNLJyOP9/fyQttT/wb3/////aWn+YWF5kNT0oqz0i4ueqtIZNJjhvt/8gn//WVr/6+rN1+o9RKZwgcMPJpX/VFT9UEn+RUX8Ozv2Ly+FGzdYZrfU1e/8LS/lQkG/mbVUX60AE231hHtcdMb0mp3qYFTFwNu3w9prcqSURGNDaaIUMX5FNW5wYt7AAAAAjklEQVR4AR3HNUJEMQCGwf+L8RR36ajR+1+CEuvRdd8kK9MNAiRQNgJmVDAt1yM6kSzYVJUsPNssAk5N7ZFKjVNFAY4co6TAOI+kyQm+LFUEBEKKzuWUNB7rSH/rSnvOulOGk+QlXTBqMIrfYX4tSe2nP3iRa/KNK7uTmWJ5a9+erZ3d+18od4ytiZdvZyuKWy8o3UpTVAAAAABJRU5ErkJggg==',
		'de' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAIAAAD5gJpuAAABLElEQVR4AY2QgUZEQRSGz9ydmzbYkBWABBJYABHEFhJ6m0WP0DMEQNIr9AKrN8ne2Tt3Zs7MOdOZmRBEv+v34Tvub9R6fdNlAzU+snSME/wdjbjbbJ6EiEg6BA8102QbjKNpoMzw8v6qD/sOALbbT2MC1NgaAWOKOgxf5czY+4dbAX2G/THzcozLrvPV85IQyqVz0rvg2p9Pei4HjzSsiFbV4JgyhhxCjpGdZ0RhdikLB9/b8Qig7MkpSovR7Cp59q6CazaNFiTt4J82o6uvdMVwTsztKTXZod4jgOJJuqNAjFyGrBR8gM6XwKfIC4KanBSTZ0rClKh08D9DFh3egW7ebH7NcRDQWrz9rM2Ne+mDOXB2mZJ8agL19nwxR2iZXGm1gDbQKhDjd4yHb2oW/KR8xHicAAAAAElFTkSuQmCC',
	];
	$src = $flags[ $code ] ?? '';
	if ( ! $src ) return '';
	return sprintf(
		'<img src="%s" alt="%s" width="16" height="11" loading="lazy">',
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

function mavo_render_lang_item( array $item ): string {
	$links = '';
	foreach ( $item['items'] as $lang_item ) {
		$links .= sprintf(
			'<a href="%s" hreflang="%s" lang="%s" class="mavo-lang-link">%s %s</a>',
			esc_url( $lang_item['url'] ),
			esc_attr( $lang_item['hreflang'] ),
			esc_attr( $lang_item['hreflang'] ),
			mavo_flag_img( $lang_item['flag'], $lang_item['label'] ),
			esc_html( $lang_item['label'] )
		);
	}
	return '<li class="mavo-item mavo-item-lang">' . $links . '</li>';
}
