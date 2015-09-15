<?php 
/////////////CPT escola
add_action( 'init', 'escola_cpt' );

function escola_cpt() {
	$labels = array(                        
		'name'               => 'escolas',
		'singular_name'      => 'Escola',
		'menu_name'          => 'Escolas',
		'name_admin_bar'     => 'Escola',
		'add_new'            => 'Adicionar Nova',
		'add_new_item'       => 'Adicionar Nova Escola',
		'new_item'           => 'Nova Escola' ,
		'edit_item'          => 'Editar Escola',
		'view_item'          => 'Ver todas' ,
		'all_items'          => 'Todas' ,
		'search_items'       => 'Buscar',
		'parent_item_colon'  => 'Pai' ,
		'not_found'          => 'Nenhuma encontrado' ,
		'not_found_in_trash' => 'Nenhuma encontrado na lixeira' ,
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'escola' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon' => 'dashicons-store',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt')
	);

	register_post_type( 'escola', $args );
}
/////////////////////////////////////////

	/////////////CPT experiencias
	add_action( 'init', 'experiencia_cpt' );

	function experiencia_cpt() {
		$labels = array(                        
			'name'               => 'experiencias',
			'singular_name'      => 'Experiencia Inovadora',
			'menu_name'          => 'Experiencias Inovadoras',
			'name_admin_bar'     => 'Experiencia Inovadora',
			'add_new'            => 'Adicionar Nova',
			'add_new_item'       => 'Adicionar Nova experiencia Inovadora',
			'new_item'           => 'Nova experiencia inovadora' ,
			'edit_item'          => 'Editar experiencia inovadora',
			'view_item'          => 'Ver todas' ,
			'all_items'          => 'Todas' ,
			'search_items'       => 'Buscar',
			'parent_item_colon'  => 'Pai' ,
			'not_found'          => 'Nenhuma encontrado' ,
			'not_found_in_trash' => 'Nenhuma encontrado na lixeira' ,
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'experiencia' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon' => 'dashicons-welcome-learn-more',
			'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
		);

		register_post_type( 'experiencia', $args );
	}
	/////////////////////////////////////////
	
	/////////////CPT recursos
	add_action( 'init', 'recurso_cpt' );

	function recurso_cpt() {
		$labels = array(                        
			'name'               => 'recursos',
			'singular_name'      => 'Recurso inovador',
			'menu_name'          => 'Recursos inovadores',
			'name_admin_bar'     => 'Recurso inovador',
			'add_new'            => 'Adicionar Nova',
			'add_new_item'       => 'Adicionar Nova recurso inovador',
			'new_item'           => 'Nova recurso inovador' ,
			'edit_item'          => 'Editar recurso inovador',
			'view_item'          => 'Ver todas' ,
			'all_items'          => 'Todas' ,
			'search_items'       => 'Buscar',
			'parent_item_colon'  => 'Pai' ,
			'not_found'          => 'Nenhuma encontrado' ,
			'not_found_in_trash' => 'Nenhuma encontrado na lixeira' ,
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'recurso' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon' => 'dashicons-lightbulb',
			'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
		);

		register_post_type( 'recurso', $args );
	}
	/////////////////////////////////////////
?>