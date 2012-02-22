<?php
/**
 * Loads a user-selected theme
 */

elgg_register_event_handler('init', 'system', 'themes_init');

/**
 * Init
 */
function themes_init() {
	themes_register_themes();

	$theme = get_input('theme');
	elgg_load_css($theme);
}

/**
 * Registers themes
 */
function themes_register_themes() {
	$themes = array('red', 'blue');

	foreach($themes as $theme) {
		elgg_register_simplecache_view("css/themes/$theme");
		$url = elgg_get_simplecache_url('css', "themes/$theme");
		elgg_register_css($theme, $url);
	}
}