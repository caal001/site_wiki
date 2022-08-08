<?php
/**
 * Plugin Name: Wiki topic
 * Description: Replaces the WordPress topic flow.
 * Author: Cakedidit
 * Author URI: https://cakedidit.com/
 * Version: 1.0.0
 */

class wiki_topic {

    public function __construct (){

        add_shortcode( 'wiki-topic-form', [ $this, 'render_topic_form' ] );
    }

    /**
	 * Plugin activation hook.
	 *
	 * Creates all WordPress pages needed by the plugin.
	 */
    public static function plugin_activated() {

		// Information needed for creating the plugin's pages
		$page_definitions = [
			'topic' => [
				'title' => __( 'topic to wiki', 'site_wiki' ),
				'content' => '[wiki-topic-form]'
            ]			
        ];

		
		foreach ( $page_definitions as $slug => $page ) :

			// Check that the page doesn't exist already
			$query = new WP_Query( 'pagename=' . $slug );
			if ( ! $query->have_posts() ) :

				// Add the page using the data from the array above
				wp_insert_post([
                    'post_content' => $page[ 'content' ],
                    'post_name' => $slug,
                    'post_title' => $page[ 'title' ],
                    'post_status' => 'publish',
                    'post_type' => 'page',
                    'ping_status' => 'closed',
                    'comment_status' => 'closed',
                ]);

			endif;
		endforeach;
	}

	// revisar esto!!!!!!!!!!
	function get_template_html( $template_name, $attributes = null ) {
		$template_name = 'topic-form';
		if ( ! $attributes ) :
			$attributes = [];
		endif;

		ob_start(); 

		do_action( 'personalize_login_before_' . $template_name );

		require( 'templates/' . $template_name . '.php');

		do_action( 'personalize_login_after_' . $template_name );

		$html = ob_get_contents();
		ob_end_clean();

		return $html;
	}

    /**
	 * A shortcode for rendering the topic form.
	 *
	 * @param  array   $attributes  Shortcode attributes.
     * @param  string  $content     The text content for shortcode. Not used.
	 *
	 * @return string  The shortcode output
	 */
    public function render_topic_form( $attributes, $content = null ) {

		$terms = get_terms([
			'taxonomy' => 'topic',
			'hide_empty' => true,        
		]);
	
		foreach($terms as $value ){

			echo '<h2>'.$value -> name.'</h2>';

			$args = [
				'post_type' => 'wiki',
				'posts_per_page' => 5,                
				'tax_query' => [
					[ 
						'taxonomy' => 'topic',
						'field'    => 'slug',
						'terms'    => $value -> name,
						'include_children' => true,
						'operator' => 'IN',
					],
				],
			];  
			
			$query = new WP_Query( $args );
			if ( $query->have_posts() ) {        
				while ( $query->have_posts() ) : $query->the_post();
				?><li><?php the_title(); ?></li><?php
				endwhile;   
			} else {
				echo 'No posts found.'; 
			}    
			wp_reset_postdata(); 
	
		}
			
		
		// Render the topic form using an external template
		return $this->get_template_html( 'topic-form', $attributes );
	}

}

// Initialize the plugin
$wiki_topic_pages = new wiki_topic();

// Create the custom pages at plugin activation
register_activation_hook( __FILE__, array( 'wiki_topic', 'plugin_activated' ) );
