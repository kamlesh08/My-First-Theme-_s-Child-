<?php
/**
 * _s-child functions and definitions
 *
 * This is the functions.php file of the child theme of _s
 *
 * @since 0.0.1
 */
if (!function_exists('_s_child_register_tasks')) {

	/**
	 * Register tasks custom post type
	 *
	 * @since 0.0.1
	 */
	function _s_child_register_tasks() {
		// all the labels & strings for post type
		$labels = array(
			'name' => _x('Tasks', 'Post Type General Name', '_s-child theme'),
			'singular_name' => _x('Task', 'Post Type Singular Name', '_s-child theme'),
			'menu_name' => __('Task Types', '_s-child theme'),
			'name_admin_bar' => __('Task Types', '_s-child theme'),
			'archives' => __('Task Archives', '_s-child theme'),
			'attributes' => __('Task Attributes', '_s-child theme'),
			'parent_item_colon' => __('Parent Task', '_s-child theme'),
			'all_items' => __('All Tasks', '_s-child theme'),
			'add_new_item' => __('Add New Tasks', '_s-child theme'),
			'add_new' => __('Add New Task', '_s-child theme'),
			'new_item' => __('New Task', '_s-child theme'),
			'edit_item' => __('Edit Task', '_s-child theme'),
			'update_item' => __('Update Task', '_s-child theme'),
			'view_item' => __('View Task', '_s-child theme'),
			'view_items' => __('View Task', '_s-child theme'),
			'search_items' => __('Search Task', '_s-child theme'),
			'not_found' => __('Not found', '_s-child theme'),
			'not_found_in_trash' => __('Not found in Trash', '_s-child theme'),
			'featured_image' => __('Featured Image', '_s-child theme'),
			'set_featured_image' => __('Set featured image', '_s-child theme'),
			'remove_featured_image' => __('Remove featured image', '_s-child theme'),
			'use_featured_image' => __('Use as featured image', '_s-child theme'),
			'insert_into_item' => __('Insert into Task', '_s-child theme'),
			'uploaded_to_this_item' => __('Uploaded to this task', '_s-child theme'),
			'items_list' => __('Tasks list', '_s-child theme'),
			'items_list_navigation' => __('Task list navigation', '_s-child theme'),
			'filter_items_list' => __('Filter items task', '_s-child theme'),
		);
		// parameters for task custom post type
		$args = array(
			'label' => __('Task', '_s-child theme'),
			'description' => __('Register task as post type', '_s-child theme'),
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

	// hook registration into init
	add_action('init', '_s_child_register_tasks', 0);
}

/**
 * Registers task status metabox
 */
function _s_child_register_task_status_meta_box() {
	add_meta_box('_s_child_task_status', __('Task Status', '_s-child theme'), '_s_child_task_status_metabox_ui', 'task');
}

// hook tasks metabox registration into add_meta_boxes hook
add_action('add_meta_boxes', '_s_child_register_task_status_meta_box');

/**
 * Displays the task status metabox UI
 *
 * @param object $post
 */
function _s_child_task_status_metabox_ui($post) {
	(int) $task_status = get_post_meta($post->ID, '_s_child_task_status', true);
	?>
	<input type="checkbox" name="_s_child_task_status" id="_s_child_task_status" value="1" <?php checked($task_status); ?> >
	<label for="_s_child_task_status"> Is the task completed? </label>
	<?php
}

// hook into task's post type save action
add_action('save_post_task', '_s_child_save_task_status');

/**
 * Save Task Status in Post meta
 *
 * @param int $post_id Post ID
 */
function _s_child_save_task_status($post_id) {

	$task_status = $_POST['_s_child_task_status'];

	update_post_meta($post_id, '_s_child_task_status', $task_status);
}
