<?php
/**
 * Init our WordPress Theme.
 */
require_once( __DIR__ . '/../../../vendor/autoload.php' );

\Classy\Classy::get_instance();

//show_admin_bar(false);

/**
 * here we go
 */

 /**
 * register CPT event
 */
function add_event_cpt() {
    $labels = array(
        'name'                  => 'Events',
        'singular_name'         => 'Event',
        'menu_name'             => 'Events',
        'name_admin_bar'        => 'Event'
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'event' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'show_in_rest' => true,
    );
 
    register_post_type( 'event', $args );
}
 
add_action( 'init', 'add_event_cpt' );

/**
 * add ACF fields to CPT event
 */
function create_api_posts_meta_field() {
     register_rest_field( 'event', 'acf', array(
           'get_callback' => 'get_event_acf_api',
        )
    );
}
add_action( 'rest_api_init', 'create_api_posts_meta_field' );
 
function get_event_acf_api( $object ) {
    $post_id = $object['id']; 

    $date = get_field('date', $post_id);
    $status = get_field('status', $post_id);

    return array(
        'date' => $date,
        'submitted' => ($status && in_array('submitted', $status)) ? true : false
    );
}


/**
 * register custom endpoint for event status update
 */
add_action( 'rest_api_init', function () {
    register_rest_route( 'event/v1', '/update-status', array(
        'methods' => 'POST',
        'callback' => 'update_event_status',
        'permission_callback' => '__return_true'
    ));
});
function update_event_status( $request ) {
    
    $parameters = $request->get_params();
    $id = $parameters['id'];
    $status = get_field('status', $id);

    if (in_array('submitted', $status) ) {
        $key = array_search('submitted', $status);
        unset($status[$key]);
    } else {
        $status[] = 'submitted';
    }

    $update = update_field('status', $status, $id);
}
/**
 * add featured image field in nice format to rest api response
 */
function register_featured_images_field() {
    register_rest_field( 
        'event',
        'featured_image',
        array(
            'get_callback'    => 'get_featured_images_urls',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

add_action( 'rest_api_init', 'register_featured_images_field' );

function get_featured_images_urls( $object, $field_name, $request ) {

    $full = wp_get_attachment_image_src( get_post_thumbnail_id( $object->id ), 'full' );

    return array(
        'full' => $full['0'],
    );
}