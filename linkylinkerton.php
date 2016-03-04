<?php
/**
 * Plugin Name: Linkylinkerton
 * Version: 0.1
 * Description: Adds a column that displays all links for a post
 * Author: Gary Kovar
 * Author URI: http://binarygary.com
 * Text Domain: linkylinkerton
 * Domain Path: /languages
 * @package Linkylinkerton
 */


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_filter('manage_posts_columns', 'linky_columns');
function linky_columns($columns) {
    $columns['linky'] = 'Linky';
    return $columns;
}


add_filter('manage_posts_custom_column', 'linkylinkerton_columns_links');
function linkylinkerton_columns_links($name) {
    global $post;
	switch($name) {
		case 'linky':
			$links=get_post_meta($post->ID, '_wp_old_slug',false);
			$permalink=get_permalink($post->ID, false);
			$slug=get_post_field('post_name',$post->ID);
			echo "<a href=$permanlink>$permalink</a><BR />";
			$address=str_replace("/$slug",'',$permalink);
			if (count($links)==0) {
				echo "<a href=";
				echo "$address$post->ID";
				echo ">$address$post->ID</a><BR />";
			}
			foreach ($links as $link) {
				echo "<a href=";
				echo "$address$link";
				echo ">$address$link</a><BR />";
			}
			
	}
	
}