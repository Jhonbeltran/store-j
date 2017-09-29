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

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_viaje',
		'title' => 'Viaje',
		'fields' => array (
			array (
				'key' => 'field_59ce7d5f283a9',
				'label' => 'Destino',
				'name' => 'destino',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59ce7d69283aa',
				'label' => 'Vacunas Requeridas',
				'name' => 'vacunas_requeridas',
				'type' => 'text',
				'default_value' => 'Ninguna',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59ce7d90283ab',
				'label' => 'Vacunas Recomendadas',
				'name' => 'vacunas_recomendadas',
				'type' => 'text',
				'default_value' => 'Ninguna',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59ce7da7283ac',
				'label' => 'Nivel de peligro',
				'name' => 'nivel_de_peligro',
				'type' => 'select',
				'choices' => array (
					'Baja' => 'Baja',
					'Media' => 'Media',
					'Alta' => 'Alta',
					'Extrema' => 'Extrema',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_59ce7fe8beb85',
				'label' => 'Moneda local',
				'name' => 'moneda_local',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'viaje',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
