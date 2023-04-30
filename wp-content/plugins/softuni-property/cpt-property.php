<?php

/**
 * Register a custom post type called "property".
 * 'init'  is a hook
 * @see get_post_type_labels() for label keys.
 */
function softuni_properties_cpt() {
	$labels = array(
		'name'                  => _x( 'Properties', 'Post type general name', 'softuni' ),
		'singular_name'         => _x( 'Property', 'Post type singular name', 'softuni' ),
		'menu_name'             => _x( 'Properties', 'Admin Menu text', 'softuni' ),
		'name_admin_bar'        => _x( 'Property', 'Add New on Toolbar', 'softuni' ),
		'add_new'               => __( 'Add New', 'softuni' ),
		'add_new_item'          => __( 'Add New Property', 'softuni' ),
		'new_item'              => __( 'New Property', 'softuni' ),
		'edit_item'             => __( 'Edit Property', 'softuni' ),
		'view_item'             => __( 'View Property', 'softuni' ),
		'all_items'             => __( 'All Properties', 'softuni' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'property' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions' ),
        'show_in_rest'       => true,
	);

	register_post_type( 'property', $args );
}

add_action( 'init', 'softuni_properties_cpt' );


/**
 * Register a 'field' taxonomy for post type 'job', with a rewrite to match book CPT slug.
 *
 * @see register_post_type for registering post types.
 */
function softuni_property_type_taxonomy() {
	$labels = array(
		'name'              => _x( 'Property_types', 'taxonomy general name', 'softuni' ),
		'singular_name'     => _x( 'Property_type', 'taxonomy singular name', 'softuni' ),
		'search_items'      => __( 'Search Property_types', 'softuni' ),
		'all_items'         => __( 'All Property_types', 'softuni' ),
		'parent_item'       => __( 'Parent Property_type', 'softuni' ),
		'parent_item_colon' => __( 'Parent Property_type:', 'softuni' ),
		'edit_item'         => __( 'Edit Property_type', 'softuni' ),
		'update_item'       => __( 'Update Property_type', 'softuni' ),
		'add_new_item'      => __( 'Add New Property_type', 'softuni' ),
		'new_item_name'     => __( 'New Property_type Name', 'softuni' ),
		'menu_name'         => __( 'Property_type', 'softuni' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest'      => true,
	);

    register_taxonomy( 'property_type', 'property', $args );
}
add_action( 'init', 'softuni_property_type_taxonomy' );