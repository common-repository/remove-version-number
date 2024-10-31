<?php
/*
Plugin Name: Remove Version Number
Plugin URI: https://wordpress.org/plugins/remove-version-number/
Description: A simple plugin that will remove the WordPress version number from all areas of your website.
Version: 1.0.0
Author: Zuziko
Author URI: https://zuziko.com
License: GPLv3
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// remove version from head
remove_action('wp_head', 'wp_generator');

// remove version from rss
add_filter('the_generator', '__return_empty_string');

// remove version from scripts and styles
function rvn_remove_version_scripts_styles($src) {
	if (strpos($src, 'ver=')) {
		$src = remove_query_arg('ver', $src);
	}
	return $src;
}
add_filter('style_loader_src', 'rvn_remove_version_scripts_styles', 9999);
add_filter('script_loader_src', 'rvn_remove_version_scripts_styles', 9999);