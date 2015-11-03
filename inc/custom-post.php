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
			'add_new'            => 'Adicionar Novo',
			'add_new_item'       => 'Adicionar Novo recurso inovador',
			'new_item'           => 'Novo recurso inovador' ,
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

		/////////////CPT noticias
		add_action( 'init', 'noticia_cpt' );

		function noticia_cpt() {
			$labels = array(                        
				'name'               => 'noticias',
				'singular_name'      => 'Notícia',
				'menu_name'          => 'Notícias',
				'name_admin_bar'     => 'Notícia',
				'add_new'            => 'Adicionar Notícia',
				'add_new_item'       => 'Adicionar nova notícia',
				'new_item'           => 'Nova notícia' ,
				'edit_item'          => 'Editar Notícia',
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
				'rewrite'            => array( 'slug' => 'noticia' ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'menu-position' => 5,
				'menu_icon' => 'dashicons-admin-post',
				'supports'           => array( 'title','comments', 'editor', 'thumbnail', 'excerpt' )
			);

			register_post_type( 'noticia', $args );
		}
		/////////////////////////////////////////
		
		/////////////CPT equipe
		add_action( 'init', 'equipe_cpt' );

		function equipe_cpt() {
			$labels = array(                        
				'name'               => 'equipe',
				'singular_name'      => 'Membro de equipe',
				'menu_name'          => 'Equipe',
				'name_admin_bar'     => 'Equipe',
				'add_new'            => 'Adicionar Membro de Equipe',
				'add_new_item'       => 'Adicionar novo membro',
				'new_item'           => 'Novo membro de equipe' ,
				'edit_item'          => 'Editar ',
				'view_item'          => 'Ver todos' ,
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
				'rewrite'            => array( 'slug' => 'equipe' ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'menu-position' => 5,
				'menu_icon' => 'dashicons-universal-access',
				'supports'           => array( 'title','comments', 'editor', 'thumbnail', 'excerpt' )
			);

			register_post_type( 'equipe', $args );
		}
		/////////////////////////////////////////
			/////////////CPT comunidade
			add_action( 'init', 'comunidade_cpt' );

			function comunidade_cpt() {
				$labels = array(                        
					'name'               => 'comunidade',
					'singular_name'      => 'Membro da comunidade',
					'menu_name'          => 'Comunidade Inspiradora',
					'name_admin_bar'     => 'Comunidade Inspiradora',
					'add_new'            => 'Adicionar Membro da comunidade',
					'add_new_item'       => 'Adicionar novo membro',
					'new_item'           => 'Novo membro da comunidade' ,
					'edit_item'          => 'Editar ',
					'view_item'          => 'Ver todos' ,
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
					'rewrite'            => array( 'slug' => 'comunidade' ),
					'capability_type'    => 'post',
					'has_archive'        => true,
					'hierarchical'       => false,
					'menu_position'      => null,
					'menu-position' => 5,
					'menu_icon' => 'dashicons-universal-access-alt',
					'supports'           => array( 'title','comments', 'editor', 'thumbnail', 'excerpt' )
				);

				register_post_type( 'comunidade', $args );
			}
			/////////////////////////////////////////