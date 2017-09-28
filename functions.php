<?php
function add_role_viajero()
{
    remove_role( 'viajero' );
    add_role(
        'viajero',
        'Viajero',
        [
            'read'         => true,
            'edit_posts'   => true,
            'upload_files' => true,
            'publish_posts' => true,
            'edit_published_posts' => true,
            //'delete_published_posts' => true,
        ]
    );
}
 
// add the simple_role
add_action('init', 'add_role_viajero');

function reseñas_init() {
    $labels = array(
        'name'              => _x( 'Reseñas', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'     => _x( 'Reseña', 'post type general name', 'your-plugin-textdomain' ),
        'menu_name'         => _x( 'Mis reseñas', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'    => _x( 'Reseñas', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'           => _x( 'Añadir nuevo', 'reseña', 'your-plugin-textdomain' ),
        'add_new_item'      => __( 'Añadir nuevo reseña', 'your-plugin-textdomain' ),
        'new_item'          => __( 'Nuevo reseña', 'your-plugin-textdomain' ),
        'edit_item'         => __( 'Editar reseña', 'your-plugin-textdomain' ),
        'view_item'         => __( 'Ver reseña', 'your-plugin-textdomain' ),
        'all_items'         => __( 'Todos los reseñas', 'your-plugin-textdomain' ),
        'search_items'      => __( 'Buscar reseñas', 'your-plugin-textdomain' ),
        'parent_item_colon' => __( 'reseñas padre', 'your-plugin-textdomain' ),
        'not_found'         => __( 'No hemos encontrado reseñas.', 'your-plugin-textdomain' ),
        'not_found_in_trash'=> __( 'No hemos encontrado reseñas en la papelera', 'your-plugin-textdomain' ),
    );

    $args = array(
        'labels'            => $labels,
        'description'       => __('Description', 'your-plugin-textdomain'),
        'public'            => true,
        'public_queryable'  => true,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'reseña' ),
        'capability_type'   => 'post',
        'has_archive'       => true,
        'hierarchical'      => false,
        'menu_position'     => null,
        'menu_icon'         => 'dashicons-format-aside',
        'supports'          => array( 'title', 'editor', 'author', 'thumbnail' )
    );

    register_post_type( 'reseña', $args );
}

add_action( 'init', 'reseñas_init' );