<?php

class wiki_post{

    public function __construct(){
        add_action('init', [$this, 'set_wiki_post']);
        add_action( 'init', [$this, 'create_topics_taxonomy'], 0 );
    }

    public function set_wiki_post() {

        $labels = array(
            'name' => _x('Wikis Spotlight', 'Post Type General Name', ' wiki-theme'),
			'singular_name' => _x('wiki', 'Post Type Singular Name', ' wiki-theme'),
			'menu_name' => __('Wikis', ' wiki-theme'),
			'name_admin_bar' => __('Wikis', ' wiki-theme'),
			'archives' => __('Wikis', ' wiki-theme'),
			'attributes' => __('wiki Attributes', ' wiki-theme'),
			'all_items' => __('All Wikis', ' wiki-theme'),
			'add_wiki_item' => __('Add wiki wiki', ' wiki-theme'),
			'add_wiki' => __('Add wiki', ' wiki-theme'),
			'wiki_item' => __('wiki wiki', ' wiki-theme'),
			'edit_item' => __('Edit wiki', ' wiki-theme'),
			'update_item' => __('Update wiki', ' wiki-theme'),
			'view_item' => __('View wiki', ' wiki-theme'),
			'view_items' => __('View Wikis', ' wiki-theme'),
			'featured_image' => __('Featured Image', ' wiki-theme'),
			'set_featured_image' => __('Set Featured image', ' wiki-theme'),
			'remove_featured_image' => __('Remove featured image', ' wiki-theme'),
			'use_featured_image' => __('Use as featured image', ' wiki-theme'),
			'uploaded_to_this_item' => __('Uploaded to this wiki', ' wiki-theme'),
			'items_list' => __('Wikis list', ' wiki-theme'),
			'items_list_navigation' => __('Wikis list navigation', ' wiki-theme'),
			'filter_items_list' => __('Filter Wikis list', ' wiki-theme'),
        );
        $args = [
            'label' => __( 'Wiki', 'wikis-theme' ),
            'description' => __( 'Wikis', 'wikis-theme' ),
            'labels' => $labels,
            'supports' => ['title', 'thumbnail','editor'],            
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 13,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'show_in_rest' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'rewrite' => ['slug' => 'wikis', 'with_front' => false],
            'publicly_queryable' => true,
            'capability_type' => 'page',
            'taxonomies' => []
        ];

        register_post_type( 'wiki', $args );
    }

    public function create_topics_taxonomy() {
    
        $labels = array(
            'name' => __( 'Topics' ),
            'singular_name' => __( 'Topic' ),
            'search_items' =>  __( 'search topic' ),
            'all_items' => __( 'all brands' ),
            'parent_item' => __( 'parent brand' ),
            'parent_item_colon' => __( 'parent brand:' ),
            'edit_item' => __( 'edit topic' ), 
            'update_item' => __( 'update topic' ),
            'add_new_item' => __( 'add new' ),
            'menu_name' => __( 'Topics' ),
        ); 

        $args = array(
            'hierarchical' => true, 
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'genero' ),
            'show_in_menu' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
        );	
    
        register_taxonomy('topic', 'wiki', $args);
    
    }


}
new wiki_post();