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
	);

	$WP_Query_escola = new WP_Query( $args );

	if( $WP_Query_escola->have_posts()  )
	{
		// echo '<pre>';
		// 		print_r($WP_Query_escola);
		// 	echo '</pre>';
		while ( $WP_Query_escola->have_posts() ) 
		{
			$WP_Query_escola->the_post();
			?>
			<div class="cada-escola animated  fadeIn">
				<a href="<?php the_permalink()?>">
					<?php 
					echo the_title();				
					?>
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
			
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	if ($_POST['meta_key'] == "pais"){
		$args = array(
			'post_type' => 'escola',
		);
		$meta_value = $_POST['meta_value'];
		$cidades =array();
		$cidades_id = $wpdb->get_col("SELECT  post_id FROM $wpdb->postmeta WHERE meta_value = '$meta_value'" );		
		foreach($cidades_id as $id){
			array_push($cidades , $wpdb->get_var("SELECT meta_value FROM $wpdb->postmeta WHERE post_id = '$id' AND meta_key = 'cidade'" ));		
		}
	}	
	if ($_POST['meta_value'] == "todos"){
		$args = array(
			'post_type' => 'escola',
		);
		$cidades = $wpdb->get_col("SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = 'cidade'" );
	}
	else{
		
		$args = array(
			'post_type' => 'escola',
			'meta_key'   => $_POST['meta_key'],
			'meta_value' => $_POST['meta_value'],
		);
	}
	

	$WP_Query_escola = new WP_Query( $args );

	if( $WP_Query_escola->have_posts()  )	{
		$ajax_response = array();
		$ajax_response['html'] ="";
		$ajax_temp_response =array();
		
		// echo '<pre>';
		// 		print_r($WP_Query_escola);
		// 	echo '</pre>';
		while ( $WP_Query_escola->have_posts() ) 
		{
			
			$WP_Query_escola->the_post();
				array_push($ajax_temp_response, get_post_meta( get_the_ID(), 'cidade', true ));
			$ajax_response['html'] .='<div class="cada-escola animated  fadeIn">';
				$ajax_response['html'] .='<a href="'.get_the_permalink().'">'; 
					$ajax_response['html'] .=get_the_title();	
				$ajax_response['html'] .='</a>';
			$ajax_response['html'] .= '</div><!-- escola-destaque -->';
			
		}
		wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
	}
	global $ajax_max_paged;
	$ajax_temp_response = array_unique($cidades);
	$ajax_temp_response= array_values($ajax_temp_response);
	$ajax_response['cidades'] ="";
	if ( $_POST['meta_key'] == 'pais'){
			$ajax_response['cidades'] .=' <option  value="todas">Todas</option>';
			foreach ($ajax_temp_response as $cidade){
				if ($cidade !=""){
					$ajax_response['cidades'] .=' <option  value="'.$cidade.'">'.$cidade.'</option>';
				}
			}
		}
	// $ajax_response['cidades'] = '<option  value="teste">'.$cidade.'</option>';
	$ajax_response['max_paged'] = $ajax_max_paged;
	echo json_encode($ajax_response);
	wp_die();
}
add_action( 'wp_ajax_escola_filtra_posts', 'ajax_escola_filtra_posts' );
add_action( 'wp_ajax_nopriv_escola_filtra_posts', 'ajax_escola_filtra_posts' );
