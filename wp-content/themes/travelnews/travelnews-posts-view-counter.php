<?php

function add_custom_field_to_wp_posts_table() {
	global $wpdb;

	$table_name = $wpdb->prefix . 'posts';
	$column_name = 'post_view';

	if ($wpdb->get_var("SHOW COLUMNS FROM $table_name LIKE '$column_name'") !== $column_name) {
		$wpdb->query("ALTER TABLE $table_name ADD COLUMN $column_name BIGINT(20) NOT NULL DEFAULT 0");
	}
}

add_action('admin_init', 'add_custom_field_to_wp_posts_table');

function travelnews_posts_view_counter() {
	if (is_singular()) {
		$post_id = get_the_ID();
		$count_view = (int)get_post_meta($post_id, 'post_view', true);
		$count_view++;

		update_post_meta( $post_id, 'post_view', $count_view );
	}
}
add_action( 'wp_head', 'travelnews_posts_view_counter' );

function travelnews_custom_columns_head($defaults) {
	$defaults['post_view'] = 'View';
	return $defaults;
}
add_filter('manage_posts_columns', 'travelnews_custom_columns_head');
add_filter('manage_edit-post_sortable_columns', 'travelnews_custom_columns_head');

function travelnews_add_column_view_val($key, $post_id) {
	switch ($key) {
		case 'post_view':
			$travelnews_post_view = (int)get_post_meta($post_id, 'post_view', true);
			echo esc_html($travelnews_post_view);
			break;
		default:
			echo 0;
			break;
	}
}
add_action( 'manage_posts_custom_column', 'travelnews_add_column_view_val', 10, 4 );

function custom_column_sorting($query) {
	if (!is_admin() || !$query->is_main_query()) {
		return;
	}
	
	$orderby = $query->get('orderby');
	if ($orderby === 'post_view') {
		$query->set('meta_key', 'post_view');
		$query->set('orderby', 'meta_value_num');
	}
}
add_action('pre_get_posts', 'custom_column_sorting');
