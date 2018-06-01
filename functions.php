<?php

/**
 * _s-child functions and definitions
 *
 * This is the functions.php file of the child theme of _s
 *
 * @link https://github.com/kamlesh08/My-First-Theme-_s-Child-
 *
 * @package _s-child
 * @since 0.0.1
 */
if (!function_exists('_s_child_register_tasks')) {

/**
 * Summary.
 *
 * Description.
 *
 * @since x.x.x
 *
 * @see Function/method/class relied on
 * @link URL
 * @global type $varname Description.
 * @global type $varname Description.
 *
 * @param type $var Description.
 * @param type $var Optional. Description. Default.
 * @return type Description.
 */
// Register Custom Post Type
	function _s_child_register_tasks() {

		$labels = array(
			'name' => _x('Tasks', 'Post Type General Name', 'text_domain'),
			'singular_name' => _x('Task', 'Post Type Singular Name', 'text_domain'),
			'menu_name' => __('Task', 'text_domain'),
			'name_admin_bar' => __('Task', 'text_domain'),
			'archives' => __('Task Archives', 'text_domain'),
			'attributes' => __('Task Attributes', 'text_domain'),
			'parent_item_colon' => __('Parent Task', 'text_domain'),
			'all_items' => __('All Tasks', 'text_domain'),
			'add_new_item' => __('Add New Tasks', 'text_domain'),
			'add_new' => __('Task', 'text_domain'),
			'new_item' => __('New Task', 'text_domain'),
			'edit_item' => __('Edit Task', 'text_domain'),
			'update_item' => __('Update Task', 'text_domain'),
			'view_item' => __('View Task', 'text_domain'),
			'view_items' => __('View Task', 'text_domain'),
			'search_items' => __('Search Task', 'text_domain'),
			'not_found' => __('Not found', 'text_domain'),
			'not_found_in_trash' => __('Not found in Trash', 'text_domain'),
			'featured_image' => __('Featured Image', 'text_domain'),
			'set_featured_image' => __('Set featured image', 'text_domain'),
			'remove_featured_image' => __('Remove featured image', 'text_domain'),
			'use_featured_image' => __('Use as featured image', 'text_domain'),
			'insert_into_item' => __('Insert into Task', 'text_domain'),
			'uploaded_to_this_item' => __('Uploaded to this task', 'text_domain'),
			'items_list' => __('Tasks list', 'text_domain'),
			'items_list_navigation' => __('Task list navigation', 'text_domain'),
			'filter_items_list' => __('Filter task list', 'text_domain'),
		);
		$args = array(
			'label' => __('Task', 'text_domain'),
			'description' => __('Register task as post type', 'text_domain'),
			'labels' => $labels,
			'supports' => array('title', 'editor'),
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 5,
			'show_in_admin_bar' => true,
			'show_in_nav_menus' => true,
			'can_export' => true,
			'has_archive' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'capability_type' => 'page',
		);
		register_post_type('task', $args);
	}

	add_action('init', '_s_child_register_tasks', 0);
}
/**
 * Register meta box(es).
 */
function wpdocs_register_meta_boxes() {
	add_meta_box('meta-box-id', __('My Meta Box', 'textdomain'), 'wpdocs_my_display_callback', 'task');
}

add_action('add_meta_boxes', 'wpdocs_register_meta_boxes');
