<?php
/**
 * Hardcoded menu data for all three language versions.
 *
 * LOCAL OVERRIDES: copy this file to menu-data-local.php (same directory) and
 * edit that copy instead. The plugin loads menu-data-local.php when present,
 * so your changes survive a `git pull` that updates menu-data.php.
 *
 * Structure per item:
 *   type    => 'search' | 'lang'  (special items; omit for normal links)
 *   label   => display text
 *   url     => link href (null = non-linking parent)
 *   sub     => [ ...child items ] (L1 flyout)
 *   mega    => true  (use mega/full-width panel instead of flyout)
 *   cols    => [ ...column definitions ] (only when mega=true)
 *
 * Child items may also have 'type' => 'header' for non-linking section labels,
 * and their own 'sub' array for a second-level flyout.
 *
 * To add/remove a menu item: edit the array below and save. No DB changes needed.
 */

defined( 'ABSPATH' ) || exit;

function mavo_get_menu_data(): array {
	return [

		/* ── FRENCH (default, /) ──────────────────────────────────── */
		'fr' => [
			[
				'type'        => 'search',
				'placeholder' => 'Rechercher...',
				'action'      => '/',
				'align'       => 'left', // first item — flyout opens to the right
			],
			[
				'label' => 'À propos',
				'url'   => '/a-propos/',
				'sub'   => [
					[ 'label' => 'Qui suis-je ?',                     'url' => '/a-propos/' ],
					[ 'label' => 'Cont@ctez-moi',                     'url' => '/a-propos/contactez-moi/' ],
					[ 'label' => 'Destinations',                      'url' => '/nos-voyages/destinations/' ],
					[ 'label' => 'Organiser ses voyages avec enfants', 'url' => '/ma-blogroll/plus-de-liens-par-ici/' ],
					[ 'label' => 'Ma Blogroll',                       'url' => '/ma-blogroll/' ],
				],
			],
			[
				'label' => 'Nos Voyages',
				'url'   => null,
				'sub'   => [
					[ 'type' => 'header', 'label' => 'Destinations' ],
					[
						'label' => 'Europe',
						'url'   => '/tag/europe/',
						'sub'   => [
							[ 'label' => 'France',         'url' => '/france/' ],
							[ 'label' => 'Allemagne',      'url' => '/tag/allemagne/' ],
							[ 'label' => 'Angleterre',     'url' => '/angleterre/' ],
							[ 'label' => 'Autriche',       'url' => '/tag/autriche/' ],
							[ 'label' => 'Belgique',       'url' => '/tag/belgique/' ],
							[ 'label' => 'Bosnie',         'url' => '/tag/bosnie/' ],
							[ 'label' => 'Croatie',        'url' => '/tag/croatie/' ],
							[ 'label' => 'Danemark',       'url' => '/tag/danemark/' ],
							[ 'label' => 'Ecosse',         'url' => '/tag/ecosse/' ],
							[ 'label' => 'Espagne',        'url' => '/espagne/' ],
							[ 'label' => 'Grèce',          'url' => '/tag/grece/' ],
							[ 'label' => 'Irlande',        'url' => '/tag/irlande/' ],
							[ 'label' => 'Italie',         'url' => '/italie/' ],
							[ 'label' => 'Malte',          'url' => '/tag/malte/' ],
							[ 'label' => 'Montenégro',     'url' => '/tag/montenegro/' ],
							[ 'label' => 'Norvège',        'url' => '/tag/norvege/' ],
							[ 'label' => 'Pays-Bas',       'url' => '/tag/pays-bas/' ],
							[ 'label' => 'Pays de Galles', 'url' => '/tag/pays-de-galles/' ],
							[ 'label' => 'Pologne',        'url' => '/tag/pologne/' ],
							[ 'label' => 'Portugal',       'url' => '/tag/portugal/' ],
							[ 'label' => 'Suède',          'url' => '/tag/suede/' ],
							[ 'label' => 'Suisse',         'url' => '/tag/suisse/' ],
						],
					],
					[ 'label' => 'Afrique',   'url' => '/tag/afrique/' ],
					[
						'label' => 'Amériques',
						'url'   => '/tag/ameriques/',
						'sub'   => [
							[ 'label' => 'Argentine',  'url' => '/tag/argentine/' ],
							[ 'label' => 'Bélize',     'url' => '/tag/belize/' ],
							[ 'label' => 'Brésil',     'url' => '/tag/bresil/' ],
							[ 'label' => 'Guadeloupe', 'url' => '/tag/guadeloupe/' ],
							[ 'label' => 'Guatemala',  'url' => '/tag/guatemala/' ],
							[ 'label' => 'Honduras',   'url' => '/tag/honduras/' ],
							[ 'label' => 'Mexique',    'url' => '/tag/mexique/' ],
						],
					],
					[
						'label' => 'Asie',
						'url'   => '/tag/asie/',
						'sub'   => [
							[ 'label' => 'Bali',                'url' => '/2016/05/nos-aventures-en-famille-aux-quatre-coins-de-bali/' ],
							[ 'label' => 'Birmanie',            'url' => '/2016/02/notre-voyage-en-birmanie-avec-enfants-itineraire-et-conseils-pratiques/' ],
							[ 'label' => 'Cambodge',            'url' => '/tag/cambodge/' ],
							[ 'label' => 'Chine',               'url' => '/tag/chine/' ],
							[ 'label' => 'Émirats Arabes Unis', 'url' => '/tag/emirats-arabes-unis/' ],
							[ 'label' => 'Inde',                'url' => '/tag/inde/' ],
							[ 'label' => 'Indonésie',           'url' => '/tag/indonesie/' ],
							[ 'label' => 'Malaisie',            'url' => '/2011/04/derniere-etape-de-notre-voyage-en-malaisie-les-iles-de-tioman-et-rawa/' ],
							[ 'label' => 'Maldives',            'url' => '/tag/maldives/' ],
							[ 'label' => 'Oman',                'url' => '/2014/03/notre-voyage-a-oman-avec-les-enfants/' ],
							[ 'label' => 'Philippines',         'url' => '/tag/philippines/' ],
							[ 'label' => 'Singapour',           'url' => '/2011/03/week-end-a-singapour-quand-ticoeur-decouvre-la-magie-du-zoo/' ],
							[ 'label' => 'Sri Lanka',           'url' => '/2015/03/notre-voyage-itinerant-au-sri-lanka-avec-les-enfants/' ],
							[ 'label' => 'Thaïlande',           'url' => '/tag/thailande/' ],
							[ 'label' => 'Vietnam',             'url' => '/2016/01/notre-voyage-au-vietnam-avec-enfants-itineraire-et-conseils-pratiques/' ],
						],
					],
					[ 'label' => 'Océanie',   'url' => '/tag/oceanie/' ],
					[ 'type' => 'header', 'label' => 'En mode…' ],
					[ 'label' => 'Campervan', 'url' => '/category/en-campervan/' ],
					[ 'label' => 'Vélo',      'url' => '/category/voyages-avec-enfants/a-velo/' ],
					[ 'label' => 'Rando',     'url' => '/category/voyages-avec-enfants/rando-voyages-avec-enfants/' ],
					[ 'label' => 'Plage',     'url' => '/category/voyages-avec-enfants/plages/' ],
					[ 'label' => 'Au Vert',   'url' => '/category/voyages-avec-enfants/au-vert/' ],
					[ 'label' => 'Bateau',    'url' => '/category/voyages-avec-enfants/en-bateau/' ],
					[ 'label' => 'Roadtrip',  'url' => '/category/voyages-avec-enfants/roadtrip/' ],
					[ 'label' => 'Citytrip',  'url' => '/category/voyages-avec-enfants/citytrip/' ],
					[ 'label' => 'Ski',       'url' => '/category/voyages-avec-enfants/ski-voyages-avec-enfants/' ],
				],
			],
			[
				'label' => 'Notre Tour du Monde',
				'url'   => null,
				'mega'  => true,
				'cols'  => [
					[
						'header' => 'Infos utiles',
						'url'    => '#',
						'items'  => [
							[ 'label' => 'Itinéraire',              'url' => '/itineraire-de-notre-tour-du-monde-avec-enfants/' ],
							[ 'label' => 'Nos bagages',             'url' => '/nos-bagages/' ],
							[ 'label' => 'Les préparatifs',         'url' => '/itineraire-de-notre-tour-du-monde-avec-enfants/les-preparatifs/' ],
							[ 'label' => 'Budget Tour du Monde',    'url' => '/itineraire-de-notre-tour-du-monde-avec-enfants/budget-tour-du-monde/' ],
							[ 'label' => 'Pensées avant le départ', 'url' => '/2016/01/pensees-juste-avant-le-depart/' ],
						],
					],
					[
						'header' => 'Les pays',
						'url'    => '#',
						'items'  => [
							[ 'label' => 'Vietnam',          'url' => '/tag/vietnam/' ],
							[ 'label' => 'Myanmar',          'url' => '/tag/myanmar/' ],
							[ 'label' => 'Australie',        'url' => '/tag/australie/' ],
							[ 'label' => 'Nouvelle Zélande', 'url' => '/tag/nouvelle-zelande/' ],
							[ 'label' => 'Bali',             'url' => '/tag/bali/' ],
							[ 'label' => 'Argentine',        'url' => '/tag/argentine/' ],
							[ 'label' => 'Brésil',           'url' => '/tag/bresil/' ],
						],
					],
					[
						'header' => 'Les coulisses',
						'url'    => '#',
						'items'  => [
							[ 'label' => 'Mois 1', 'url' => '/2016/02/les-coulisses-de-notre-tour-du-monde-en-famille-deja-1-mois/' ],
							[ 'label' => 'Mois 2', 'url' => '/2016/03/les-coulisses-de-notre-tour-du-monde-en-famille-deja-2-mois/' ],
							[ 'label' => 'Mois 3', 'url' => '/2016/04/les-coulisses-de-notre-tour-du-monde-en-famille-deja-3-mois/' ],
							[ 'label' => 'Mois 4', 'url' => '/2016/05/les-coulisses-de-notre-tour-du-monde-en-famille-deja-4-mois/' ],
							[ 'label' => 'Mois 5', 'url' => '/2016/06/les-coulisses-de-notre-tour-du-monde-en-famille-deja-5-mois/' ],
							[ 'label' => 'Mois 6', 'url' => '/2016/07/les-coulisses-de-notre-tour-du-monde-en-famille-6-mois/' ],
							[ 'label' => 'Mois 7', 'url' => '/2016/08/les-coulisses-de-notre-tour-du-monde-en-famille-7-mois/' ],
							[ 'label' => 'Mois 8', 'url' => '/2016/08/les-coulisses-de-notre-tour-du-monde-en-famille-8-mois-le-clap-de-fin/' ],
						],
					],
				],
			],
			[
				'label' => 'Expat en Angleterre',
				'url'   => '/notre-vie-en-angleterre/',
			],
			[
				'type'  => 'lang',
				// German link is hidden on FR site (matches original: li.lang-item-de { display:none })
				'items' => [
					[ 'label' => 'English', 'url' => '/en/', 'hreflang' => 'en-GB', 'flag' => 'en' ],
				],
			],
		],

		/* ── ENGLISH (/en/) ──────────────────────────────────────── */
		'en' => [
			[
				'label' => 'About',
				'url'   => '/en/about/',
			],
			[
				'label' => 'Destinations',
				'url'   => null,
				'sub'   => [
					[ 'label' => 'Denmark',     'url' => '/en/tag/denmark/' ],
					[ 'label' => 'France',      'url' => '/en/tag/france-en/' ],
					[ 'label' => 'Greece',      'url' => '/en/tag/greece/' ],
					[ 'label' => 'Italy',       'url' => '/en/tag/italy/' ],
					[ 'label' => 'Malta',       'url' => '/en/tag/malta/' ],
					[ 'label' => 'Netherlands', 'url' => '/en/tag/netherlands/' ],
					[ 'label' => 'Portugal',    'url' => '/en/tag/portugal-en/' ],
					[ 'label' => 'Spain',       'url' => '/en/tag/spain/' ],
					[ 'label' => 'Sri Lanka',   'url' => '/en/tag/sri-lanka-en/' ],
					[ 'label' => 'UK',          'url' => '/en/tag/uk-en/' ],
				],
			],
			[
				'type'  => 'lang',
				'items' => [
					[ 'label' => 'Français', 'url' => '/',    'hreflang' => 'fr-FR', 'flag' => 'fr' ],
					[ 'label' => 'Deutsch',  'url' => '/de/', 'hreflang' => 'de-DE', 'flag' => 'de' ],
				],
			],
			[
				'type'        => 'search',
				'placeholder' => 'Search...',
				'action'      => '/en/',
				'align'       => 'right',
			],
		],

		/* ── GERMAN (/de/) ───────────────────────────────────────── */
		'de' => [
			[
				'type'        => 'search',
				'placeholder' => 'Suchen...',
				'action'      => '/de/',
				'align'       => 'left',
				'hidden_inputs' => [ 'lang' => 'de' ],
			],
			[
				'label' => 'Über mich',
				'url'   => '/de/ueber-mich/',
			],
			[
				'label' => 'Reiseziele',
				'url'   => null,
				'sub'   => [
					[ 'label' => 'England',    'url' => '/de/tag/england-de/' ],
					[ 'label' => 'Italien',    'url' => '/de/tag/italien/' ],
					[ 'label' => 'Portugal',   'url' => '/de/tag/portugal-de/' ],
					[ 'label' => 'Schottland', 'url' => '/de/tag/schottland/' ],
				],
			],
			[
				'type'  => 'lang',
				'items' => [
					[ 'label' => 'Français', 'url' => '/',    'hreflang' => 'fr-FR', 'flag' => 'fr' ],
					[ 'label' => 'English',  'url' => '/en/', 'hreflang' => 'en-GB', 'flag' => 'en' ],
				],
			],
		],

	];
}
