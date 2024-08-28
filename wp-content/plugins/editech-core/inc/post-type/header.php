<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class OSF_Custom_Post_Type_Header
 */
class OSF_Custom_Post_Type_Header extends OSF_Custom_Post_Type_Abstract {

	/**
	 * @return void
	 */
	public function create_post_type() {

		$labels = array(
			'name'               => __( 'Header', "editech-core" ),
			'singular_name'      => __( 'Header', "editech-core" ),
			'add_new'            => __( 'Add New Header', "editech-core" ),
			'add_new_item'       => __( 'Add New Header', "editech-core" ),
			'edit_item'          => __( 'Edit Header', "editech-core" ),
			'new_item'           => __( 'New Header', "editech-core" ),
			'view_item'          => __( 'View Header', "editech-core" ),
			'search_items'       => __( 'Search Headers', "editech-core" ),
			'not_found'          => __( 'No Headers found', "editech-core" ),
			'not_found_in_trash' => __( 'No Headers found in Trash', "editech-core" ),
			'parent_item_colon'  => __( 'Parent Header:', "editech-core" ),
			'menu_name'          => __( 'Header Builder', "editech-core" ),
		);

		$args = array(
			'labels'              => $labels,
			'hierarchical'        => true,
			'description'         => __( 'List Header', "editech-core" ),
			'supports'            => array( 'title', 'editor', 'thumbnail' ), //page-attributes, post-formats
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => $this->get_icon( __FILE__ ),
			'show_in_nav_menus'   => false,
			'publicly_queryable'  => true,
			'exclude_from_search' => true,
			'has_archive'         => true,
			'query_var'           => true,
			'can_export'          => true,
			'rewrite'             => true,
			'capability_type'     => 'post'
		);
		register_post_type( 'header', $args );
	}

}

new OSF_Custom_Post_Type_Header;

