<?php
/*
 * Plugin name: Site documentation 
 * Description: Plugin de prueba
 * Author: Cakedidit
 * Author URI: https://cakedidit.com/
 * Version: 1.0.0
*/

require(plugin_dir_path(__FILE__).'include/class-wiki-post.php');

add_action( 'admin_menu','Site_documentation');



function Site_documentation(){
    add_menu_page(
        'Site documentation',// title page
        'Site documentation',// title menu
        'manage_options',// capabiliy
        'site_doc',// slug
        'menucontent', // callback
        'dashicons-welcome-widgets-menus', //icono
        13

    );

    add_submenu_page(
        'site_doc',
        'Settings',
        'Settings',
        'manage_options',
        'site_doc_settings',
        'get_topics' 
    );


    add_submenu_page(
        'site_doc',
        'Calendar',
        'Calendar',
        'manage_options',
        'site_doc_Calendar',
        'calendar',
    );
    
}

function menucontent(){
    echo '<h1> Contenido aca </h1>';

}

function get_topics(){   
    
    $terms = get_terms([
        'taxonomy' => 'topic',
        'hide_empty' => true,        
    ]);

    foreach($terms as $value ){
        echo '<h1>';
        print_r($value -> name);        
        echo '</h1>';       

        
    }

    
}

function calendar(){
    $terms = get_terms([
        'taxonomy' => 'topic',
        'hide_empty' => true,        
    ]);

    foreach($terms as $value ){
        echo '<pre>';
        print_r($value -> name);
        echo '</pre>';
    }
    
}





register_activation_hook(__FILE__,'activate');
register_deactivation_hook(__FILE__,'disable');