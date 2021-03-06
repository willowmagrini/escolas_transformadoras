<?php 

add_action( 'wp_enqueue_scripts', 'ajax_localize', 1 );
function ajax_localize(){
	wp_localize_script( 'odin-main', 'odin_main', array('ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
function ajax_escola_load_posts(){
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	$args = array(
		'paged'=> $_POST['paged'],
		'post_type' => 'escola',
		'posts_per_page'=>8
	);
	if (isset($_POST['meta'])){ //se tem meta dados pro query
		$resposta = $_POST['meta'];//puxa os metas do ajax da forma meta_key:meta_value, meta_key:meta_value, 
		foreach ($resposta as  $meta_key => $meta_value) {///chama todas os metas como argumentos para o query
			$args['meta_query'][$meta_key.'_clause'] = array('meta_key' => $meta_key,'value' => $meta_value);
			$args['meta_query']['relation'] ='AND';
		}
	}
		
	$WP_Query_escola = new WP_Query( $args );
	// echo '<pre>';
	// 				print_r($WP_Query_escola);
	// 			echo '</pre>';
	if( $WP_Query_escola->have_posts()  )
	{
		// echo '<pre>';
		// 		print_r($WP_Query_escola);
		// 	echo '</pre>';
		while ( $WP_Query_escola->have_posts() ) 
		{
			$WP_Query_escola->the_post();
			?>
			<div class="cada-escola animated col-sm-3 fadeIn">
				<a href="<?php the_permalink()?>">
					<div class='img-redonda '>
						<img src="<?php echo get_field( "imagem_redonda" )?>">	
					</div>
					<?php echo get_the_title();?>
				</a>
			</div><!-- escola-destaque -->
			<?php
			
		}
		wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
		
	}
wp_die();
}
add_action( 'wp_ajax_escola_load_posts', 'ajax_escola_load_posts' );
add_action( 'wp_ajax_nopriv_escola_load_posts', 'ajax_escola_load_posts' );


//ajax load escolas posts
function ajax_escola_filtra_posts(){
	global $wpdb;
	$ajax_response = array();
	
	$html = "";
	$args= array(
		'post_type' => 'escola',
		'posts_per_page'=>8
		
	);
	$ajax_response['teste'] ="nao";
	if (isset($_POST['meta'])){ //se tem meta dados pro query
		$resposta = $_POST['meta'];//puxa os metas do ajax da forma meta_key:meta_value, meta_key:meta_value, 
		foreach ($resposta as  $meta_key => $meta_value) {///chama todas os metas como argumentos para o query
			$args['meta_query'][$meta_key.'_clause'] = array('meta_key' => $meta_key,'value' => $meta_value);
			$args['meta_query']['relation'] ='AND';
		}
	}	
	else{
	}
	if ($_POST['gatilho'] == 'pais' ){
		unset($args['meta_query']['cidade_clause']);
		
		$ajax_response['cidades'] ="";
		$ajax_response['cidades'] .=' <option  value="">Cidade</option>';
		if (isset($_POST['meta']['pais'])){
			$pais = $_POST['meta']['pais'];
			$cidades = array();
			$cidades_id = $wpdb->get_col("SELECT DISTINCT pm.post_id FROM {$wpdb->postmeta} pm
		        LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
		        WHERE pm.meta_value = '$pais' 
		        AND p.post_status = 'publish' 
		        AND p.post_type = 'escola'");
				foreach($cidades_id as $id){
					array_push($cidades , $wpdb->get_var("SELECT meta_value FROM $wpdb->postmeta WHERE post_id = '$id' AND meta_key = 'cidade'" ));		
					}  
			$cidades_unic = array_unique($cidades);
			$cidades_unic = array_values($cidades_unic);
			foreach ($cidades_unic as $cidade){
			 	if ($cidade !=""){
			 		$ajax_response['cidades'] .=' <option  value="'.$cidade.'">'.$cidade.'</option>';
			 	}
			 }
		}
		else{
		$cidades = $wpdb->get_col(	"SELECT DISTINCT pm.meta_value FROM {$wpdb->postmeta} pm
			        LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
			        WHERE pm.meta_key = 'cidade' 
			        AND p.post_status = 'publish' 
			        AND p.post_type = 'escola'" );						
			foreach ($cidades as $cidade) {
				$ajax_response['cidades'] .='<option value="'.$cidade.'">'.$cidade.'</option>';
			}
			
			
		}			
	}
	
	$ajax_response['html'] ="";
	$ajax_response['teste'] = $args; 
	$WP_Query_escola = new WP_Query( $args);
	$ajax_response['max_pages'] = $WP_Query_escola->max_num_pages;
	if( $WP_Query_escola->have_posts()  )	{
		
		while ( $WP_Query_escola->have_posts() ) 
		{
			$WP_Query_escola->the_post();
			$ajax_response['html'] .='<div class="cada-escola animated  col-sm-3 fadeIn">';
				$ajax_response['html'] .='<a href="'.get_the_permalink().'">'; 
					$ajax_response['html'] .='
					<div class="img-redonda ">
						<img src="'.get_field( "imagem_redonda" ).'">	
					</div>'.get_the_title();	
				$ajax_response['html'] .='</a>';
			$ajax_response['html'] .= '</div><!-- escola-destaque -->';				
		}
		wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
	}
	
		echo json_encode($ajax_response);
	wp_die();
}
add_action( 'wp_ajax_escola_filtra_posts', 'ajax_escola_filtra_posts' );
add_action( 'wp_ajax_nopriv_escola_filtra_posts', 'ajax_escola_filtra_posts' );
// do_action('wp_ajax_escola_filtra_posts');