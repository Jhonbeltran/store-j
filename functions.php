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

function opiniones_init() {
    $labels = array(
        'name'              => _x( 'Opiniones', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'     => _x( 'Opinion', 'post type general name', 'your-plugin-textdomain' ),
        'menu_name'         => _x( 'Mis opiniones', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'    => _x( 'Opiniones', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'           => _x( 'Añadir nuevo', 'opinion', 'your-plugin-textdomain' ),
        'add_new_item'      => __( 'Añadir nuevo opinion', 'your-plugin-textdomain' ),
        'new_item'          => __( 'Nuevo opinion', 'your-plugin-textdomain' ),
        'edit_item'         => __( 'Editar opinion', 'your-plugin-textdomain' ),
        'view_item'         => __( 'Ver opinion', 'your-plugin-textdomain' ),
        'all_items'         => __( 'Todos los opiniones', 'your-plugin-textdomain' ),
        'search_items'      => __( 'Buscar opiniones', 'your-plugin-textdomain' ),
        'parent_item_colon' => __( 'opiniones padre', 'your-plugin-textdomain' ),
        'not_found'         => __( 'No hemos encontrado opiniones.', 'your-plugin-textdomain' ),
        'not_found_in_trash'=> __( 'No hemos encontrado opiniones en la papelera', 'your-plugin-textdomain' ),
    );

    $args = array(
        'labels'            => $labels,
        'description'       => __('Description', 'your-plugin-textdomain'),
        'public'            => true,
        'public_queryable'  => true,
        'show_ui'           => true,
        'show_in_rest'		=> true,
        'show_in_menu'      => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'opinion' ),
        'capability_type'   => 'post',
        'has_archive'       => true,
        'hierarchical'      => false,
        'menu_position'     => null,
        'menu_icon'         => 'dashicons-format-aside',
        'supports'          => array( 'title', 'editor', 'author', 'thumbnail' )
    );

    register_post_type( 'opinion', $args );
}

add_action( 'init', 'opiniones_init' );

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

/////////////////////////////////////////////////
////////////////////////////////////////////////
if ( ! function_exists( 'storefront_post_content_viaje' ) ) {
	/**
	 * Display the post content with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function storefront_post_content_viaje() {
		?>
		<div class="entry-content">
			<h1>Funcion <strong>storefront_post_content_viaje()</strong></h1>
			<h2>Funcion almacenada en el archivo functions.php del tema hijo</h2>
		<?php

		/**
		 * Functions hooked in to storefront_post_content_before action.
		 *
		 * @hooked storefront_post_thumbnail - 10
		 */
		do_action( 'storefront_post_content_before' );

		the_content(
			sprintf(
				__( 'Continue reading %s', 'storefront' ),
				'<span class="screen-reader-text">' . get_the_title() . '</span>'
			)
		);

		$campos_viaje = get_post_custom( $post_id );
		?>

		<div class="campos_viaje">
			<div class="campo_viaje">
				<div class="viaje_label">
					<strong>Destino: &nbsp;</strong>
				</div>
				<div class="viaje_valor">
					<?php echo $campos_viaje['destino'][0]; ?>
				</div>
			</div>
			<div class="campo_viaje">
				<div class="viaje_label">
					<strong>Vacunas Requeridas: &nbsp;</strong>
				</div>
				<div class="viaje_valor">
					<?php echo $campos_viaje['vacunas_requeridas'][0]; ?>
				</div>
			</div>
			<div class="campo_viaje">
				<div class="viaje_label">
					<strong>Vacunas Recomendadas: &nbsp;</strong>
				</div>
				<div class="viaje_valor">
					<?php echo $campos_viaje['vacunas_recomendadas'][0]; ?>
				</div>
			</div>
			<div class="campo_viaje">
				<div class="viaje_label">
					<strong>Nivel de Peligro: &nbsp;</strong>
				</div>
				<div class="viaje_valor">
					<?php echo $campos_viaje['nivel_de_peligro'][0]; ?>
				</div>
			</div>
			<div class="campo_viaje">
				<div class="viaje_label">
					<strong>Moneda Local: &nbsp;</strong>
				</div>
				<div class="viaje_valor">
					<?php echo $campos_viaje['moneda_local'][0]; ?>
				</div>
			</div>
		</div>

		
		<?php
		do_action( 'storefront_post_content_after' );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'storefront' ),
			'after'  => '</div>',
		) );
		?>
		</div><!-- .entry-content -->
		<?php
	}
}


/////////////////////////////////////////////
////////////////////////////////////////////
/**
 * Posts
 *
 * @see  storefront_post_header()
 * @see  storefront_post_meta()
 * @see  storefront_post_content()
 * @see  storefront_post_content_viaje()
 * @see  storefront_paging_nav()
 * @see  storefront_single_post_header()
 * @see  storefront_post_nav()
 * @see  storefront_display_comments()
 */
add_action( 'storefront_loop_post',           'storefront_post_header',          10 );
add_action( 'storefront_loop_post',           'storefront_post_meta',            20 );
add_action( 'storefront_loop_post',           'storefront_post_content',         30 );
add_action( 'storefront_loop_after',          'storefront_paging_nav',           10 );
add_action( 'storefront_single_post',         'storefront_post_header',          10 );
add_action( 'storefront_single_post',         'storefront_post_meta',            20 );
add_action( 'storefront_single_post',         'storefront_post_content',         30 );
add_action( 'storefront_single_post_viaje',   'storefront_post_header',          10 );
add_action( 'storefront_single_post_viaje',   'storefront_post_meta',            20 );
add_action( 'storefront_single_post_viaje',   'storefront_post_content_viaje',   30 );
add_action( 'storefront_single_post_bottom',  'storefront_post_nav',             10 );
add_action( 'storefront_single_post_bottom',  'storefront_display_comments',     20 );
add_action( 'storefront_post_content_before', 'storefront_post_thumbnail',       10 );

add_action('rest_api_init', 'register_custom_fields');

function register_custom_fields()
{
    register_rest_field(
        'viaje',
        'destino',
        array(
            'get_callback' => 'show_fields'
        )
    );
}

function show_fields( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name, true );
}