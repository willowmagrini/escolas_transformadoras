<?php 
function opcoes_tema() {

    $settings = new Odin_Theme_Options(
        'odin-settings', // Slug/ID of the Settings Page (Required)
        'Opções do tema', // Settings page name (Required)
        'manage_options' // Page capability (Optional) [default is manage_options]
    );

    $settings->set_tabs(
        array(
            
			array(
                'id' => 'odin_general', // Slug/ID of the Settings tab (Required)
                'title' => __( 'Home', 'odin' ), // Settings tab title (Required)
            ),
			array(
                'id' => 'odin_footer', // Slug/ID of the Settings tab (Required)
                'title' => __( 'Rodapé', 'odin' ), // Settings tab title (Required)
            ),
			array(
                'id' => 'odin_sobre', // Slug/ID of the Settings tab (Required)
                'title' => __( 'Sobre', 'odin' ), // Settings tab title (Required)
            ),
		   array(
	           'id' => 'odin_escolas', // Slug/ID of the Settings tab (Required)
	           'title' => __( 'Escolas', 'odin' ), // Settings tab title (Required)
	       ),
           
        )
    );

    $settings->set_fields(
        array(
			'odin_footer_fields_section' => array( // Slug/ID of the section (Required)
                'tab'   => 'odin_footer', // Tab ID/Slug (Required)
                'title' => __( 'Configurações do rodapé', 'odin' ), // Section title (Required)
                'fields' => array( // Section fields (Required)
					array(
                        'id'         => 'face', // Required
                        'label'      => __( 'Endereço do Facebook', 'odin' ), // Required
                        'type'       => 'text', // Required
                    ),
					array(
                        'id'         => 'twitter', // Required
                        'label'      => __( 'Endereço do Twitter', 'odin' ), // Required
                        'type'       => 'text', // Required
                    ),
					array(
                        'id'         => 'linkedin', // Required
                        'label'      => __( 'Endereço do Linkedin', 'odin' ), // Required
                        'type'       => 'text', // Required
                    ),
					array(
                        'id'         => 'flicker', // Required
                        'label'      => __( 'Endereço do Flicker', 'odin' ), // Required
                        'type'       => 'text', // Required
                    ),
					array(
                        'id'         => 'google', // Required
                        'label'      => __( 'Endereço do Google', 'odin' ), // Required
                        'type'       => 'text', // Required
                    ),
					array(
                        'id'         => 'youtube', // Required
                        'label'      => __( 'Endereço do Youtube', 'odin' ), // Required
                        'type'       => 'text', // Required
                    ),
					array(
					    'id'          => 'footer1', // Obrigatório
					    'label'       => __( 'Texto do footer 1', 'odin' ), // Obrigatório
					    'type'        => 'editor', // Obrigatório
					    'default'     => 'Default text', // Opcional
					    'options'     => array( // Opcional (aceita argumentos do wp_editor)
					        'textarea_rows' => 3
					    ),
					),
					array(
                        'id'         => 'footer2', // Required
                        'label'      => __( 'Texto do footer 2', 'odin' ), // Required
					    'type'        => 'editor', // Obrigatório
					    'default'     => 'Default text', // Opcional
					    'options'     => array( // Opcional (aceita argumentos do wp_editor)
					        'textarea_rows' => 3
					    ),
					),
					array(
                        'id'         => 'footer3', // Required
                        'label'      => __( 'Texto do footer 3', 'odin' ), // Required
					    'type'        => 'editor', // Obrigatório
					    'default'     => 'Default text', // Opcional
					    'options'     => array( // Opcional (aceita argumentos do wp_editor)
					        'textarea_rows' => 3
					    ),
                    )
				)
			),
			'odin_sobre_fields_section' => array( // Slug/ID of the section (Required)
                'tab'   => 'odin_sobre', // Tab ID/Slug (Required)
                'title' => __( 'Página Sobre', 'odin' ), // Section title (Required)
                'fields' => array( // Section fields (Required)
					array(
                        'id'         => 'visao', // Required
                        'label'      => __( 'Texto para visão', 'odin' ), // Required
					    'type'        => 'editor', // Obrigatório
					    'default'     => '', // Opcional
					    'options'     => array( // Opcional (aceita argumentos do wp_editor)
					        'textarea_rows' => 3
					    ),
					),
					array(
                        'id'         => 'estrategia', // Required
                        'label'      => __( 'Texto para estratégia ', 'odin' ), // Required
					    'type'        => 'editor', // Obrigatório
					    'default'     => '', // Opcional
					    'options'     => array( // Opcional (aceita argumentos do wp_editor)
					        'textarea_rows' => 3
					    ),
					),
					array(
                        'id'         => 'equipe', // Required
                        'label'      => __( 'Texto para equipe ', 'odin' ), // Required
					    'type'        => 'editor', // Obrigatório
					    'default'     => '', // Opcional
					    'options'     => array( // Opcional (aceita argumentos do wp_editor)
					        'textarea_rows' => 3
					    ),
					),
					array(
                        'id'         => 'esc_trans', // Required
                        'label'      => __( 'Destaque Experiências Escolas transformadoras ', 'odin' ), // Required
					    'type'        => 'editor', // Obrigatório
					    'default'     => '', // Opcional
					    'options'     => array( // Opcional (aceita argumentos do wp_editor)
					        'textarea_rows' => 3
					    ),
					),
					array(
                        'id'         => 'exp_ins', // Required
                        'label'      => __( 'Destaque Experiências Inspiradoras na página sobre ', 'odin' ), // Required
					    'type'        => 'editor', // Obrigatório
					    'default'     => '', // Opcional
					    'options'     => array( // Opcional (aceita argumentos do wp_editor)
					        'textarea_rows' => 3
					    ),
					),
					
					
				)
            ),
            'odin_general_fields_section' => array( // Slug/ID of the section (Required)
                'tab'   => 'odin_general', // Tab ID/Slug (Required)
                'title' => __( 'Configurações do tema', 'odin' ), // Section title (Required)
                'fields' => array( // Section fields (Required)
					array(
                        'id'         => 'destaque_insp', // Required
                        'label'      => __( 'Destaque Experiências Inspiradoras na Home ', 'odin' ), // Required
					    'type'        => 'editor', // Obrigatório
					    'default'     => 'Default text', // Opcional
					    'options'     => array( // Opcional (aceita argumentos do wp_editor)
					        'textarea_rows' => 3
					    ),
					),
					array(
                        'id'         => 'indique_uma', // Required
                        'label'      => __( 'Destaque Indique uma escola ', 'odin' ), // Required
					    'type'        => 'editor', // Obrigatório
					    'default'     => 'Default text', // Opcional
					    'options'     => array( // Opcional (aceita argumentos do wp_editor)
					        'textarea_rows' => 2
					    ),
					),
					
					
				)
            ),
			'odin_escolasl_fields_section' => array( // Slug/ID of the section (Required)
                'tab'   => 'odin_escolas', // Tab ID/Slug (Required)
                'title' => __( 'Configurações da página Escolas Transformadoras', 'odin' ), // Section title (Required)
                'fields' => array( // Section fields (Required)
					array(
                        'id'         => 'destaque', // Required
                        'label'      => __( 'Destaque Escola Inspiradoras', 'odin' ), // Required
					    'type'        => 'editor', // Obrigatório
					    'options'     => array( // Opcional (aceita argumentos do wp_editor)
					        'textarea_rows' => 3
					    ),
					),
					array(
                        'id'         => 'texto_latam', // Required
                        'label'      => __( 'Texto para o filtro do mapa LATAM ', 'odin' ), // Required
					    'type'        => 'textarea', // Obrigatório
					    'options'     => array( // Opcional (aceita argumentos do wp_editor)
					        'textarea_rows' => 2
					    ),
					),
					array(
                        'id'         => 'texto_global', // Required
                        'label'      => __( 'Texto para o filtro do mapa GLOBAL ', 'odin' ), // Required
					    'type'        => 'textarea', // Obrigatório
					    'options'     => array( // Opcional (aceita argumentos do wp_editor)
					        'textarea_rows' => 2
					    ),
					),
					
					
				)
            )
         )
    );
    
}

add_action( 'init', 'opcoes_tema', 1 );
?>