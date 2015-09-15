<?php 
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_escolas',
		'title' => 'Escolas',
		'fields' => array (
			array (
				'key' => 'field_55e58e0378cf2',
				'label' => 'video',
				'name' => 'video',
				'type' => 'oembed',
				'instructions' => 'Vídeo da escola',
				'preview_size' => 0,
				'returned_size' => 0,
				'returned_format' => 'url',
			),
			array (
				'key' => 'field_55e5fe9e6fc5f',
				'label' => 'Thumbnail do vídeo',
				'name' => 'thumbnail_do_video',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_55e5920af5a1f',
				'label' => 'Contato',
				'name' => 'contato',
				'type' => 'textarea',
				'instructions' => 'Digite as informações de contato',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_55e591f840b51',
				'label' => 'Citação',
				'name' => 'cit',
				'type' => 'text',
				'instructions' => 'Digite a citação ou destaque que irá aparecer na página individual da escola.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55f31f2377d0a',
				'label' => 'País',
				'name' => 'pais',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55f31f7e409e0',
				'label' => 'Estado',
				'name' => 'estado',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55f31f37cf276',
				'label' => 'Cidade',
				'name' => 'cidade',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55e672eec5510',
				'label' => 'Endereço',
				'name' => 'endereco_texto',
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
					'value' => 'escola',
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
	register_field_group(array (
		'id' => 'acf_escolas-lateral',
		'title' => 'Escolas lateral',
		'fields' => array (
			array (
				'key' => 'field_55e58fe2ffb54',
				'label' => 'Número de alunos',
				'name' => 'numero_de_alunos',
				'type' => 'number',
				'instructions' => 'Digite o número de alunos da escola',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => 'Alunos',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_55e5900effb55',
				'label' => 'Número de professores',
				'name' => 'numero_de_professores',
				'type' => 'number',
				'instructions' => 'Digite o número de professores da escola',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => 'Professores',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_55e5906250fd9',
				'label' => 'Imagem redonda',
				'name' => 'imagem_redonda',
				'type' => 'image',
				'instructions' => 'Selecione a imagem para a exibição na lista de escolas',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_55e59321e0763',
				'label' => 'Upload de PDF',
				'name' => 'upload_de_pdf',
				'type' => 'file',
				'instructions' => 'Selecione o arquivo em PDF para envio',
				'save_format' => 'url',
				'library' => 'all',
			),
			array (
				'key' => 'field_55f1f7df76103',
				'label' => 'Destaque',
				'name' => 'destaque',
				'type' => 'true_false',
				'message' => 'Destacar?',
				'default_value' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'escola',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}