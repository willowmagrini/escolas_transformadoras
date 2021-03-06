<?php 

add_action( 'wp_enqueue_scripts', 'ajax_localize', 1 );
function ajax_localize(){
	wp_localize_script( 'odin-main', 'odin_main', array('ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}

// equipe
function ajax_equipe_load_posts(){
	?>

	<?php 
	$post_id=$_POST['postid'];
	echo '<div class="animated fadeIn col-sm-3">'.get_the_post_thumbnail( $post_id, 'thumbnail' ).'</div>'; 
	echo '<div class="animated fadeIn col-sm-9"><h2>'.get_the_title( $post_id ).'</h2>';
	$cargo = get_field( "cargo" , $post_id);


	    echo '<p class="animated fadeIn">'.$cargo.'</p></div><div class="clearfix"></div>';
	$content_post = get_post($post_id);
	$content = $content_post->post_content;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	echo $content;	
	?>
		
		
	<?php
	wp_die();
	
}
add_action( 'wp_ajax_equipe_load_posts', 'ajax_equipe_load_posts' );
add_action( 'wp_ajax_nopriv_equipe_load_posts', 'ajax_equipe_load_posts' );
// equipe

function ajax_escola_load_posts(){
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	$args = array(
		'paged'=> $_POST['paged'],
		'post_type' => 'escola',
		'posts_per_page'=>-1,
		'orderby' => 'title',
		'order'   => 'DESC',
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
						<img src="<?php 
							echo get_field( "imagem_redonda" );
						?>">	
					</div>
					<div class="escola-nome">
						<?php echo the_title();?>
					</div>
					<div class="escola-cidade">
						<?php echo get_field( "cidade" );?> / <?php echo get_field( "estado" );?>
					</div>
					<div class="escola-pais">
						<?php echo get_field( "pais" );?>
					</div>
					<?php 	

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


function ajax_itens_load_posts(){
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	$args = array(
		'paged'=> $_POST['paged'],
		'post_type' => $_POST['type'],
		'posts_per_page'=>4
	);
		
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
			
				get_template_part('content','todos');

					?>
				</a>
			</div><!-- escola-destaque -->
			<?php
			
		}
		wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
		
	}
wp_die();
}
add_action( 'wp_ajax_itens_load_posts', 'ajax_itens_load_posts' );
add_action( 'wp_ajax_nopriv_itens_load_posts', 'ajax_itens_load_posts' );
//ajax load itenss posts



//ajax filtra escolas posts

function ajax_escola_filtra_posts(){
	global $wpdb;
	$ajax_response = array();
	
	$html = "";
	$args= array(
		'post_type' => 'escola',
		'posts_per_page'=>-1
		
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
							<img src="'. get_field( "imagem_redonda" ).'">	
						</div>
						<div class="escola-nome">'.
							get_the_title().'
						</div>
						<div class="escola-cidade">'.
							get_field( "cidade" ). '/' .get_field( "estado" ).'
						</div>
						<div class="escola-pais">'.
							get_field( "pais" ).'
						</div>';
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




//////materiais/////
function ajax_material_load_video(){
	$postid = $_POST['postid'];
	$video=get_field("video",$postid);
	?>
	<!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ajax-loader.gif"> -->
	
	<?php
	echo $videos[$postid]=$video->html;
	wp_die();
	
}
add_action( 'wp_ajax_material_load_video', 'ajax_material_load_video' );
add_action( 'wp_ajax_nopriv_material_load_video', 'ajax_material_load_video' );



//////materiais/ filtro////
function ajax_material_filtra_posts(){
	global $wpdb;
	$ajax_response = array();
	$busca = $_POST['busca'];
	$html = "";
	$tax=$_POST['tax'];
	$meta=$_POST['meta'];
	$args= array(
		'post_type' => 'material',
		'posts_per_page'=>-1,
		'tax_query' => array(
				'relation' => 'AND',
				
			),
		's'		    => $busca
	);
	// echo count($tax);
	// echo "<pre>";
	// print_r($args);
	// echo "</pre>";
	if ($tax!=""){
		$selecionadas=array();
		foreach ($tax as  $nome => $id ) {
			array_push($args['tax_query'], array(
			 	 'taxonomy' => $nome,
			 	 'field'    => 'term_id',
			 	 'terms'    => $id,
			 	 )
			);
		}
		$verificador=true;
	}
	else{
		$verificador=false;
		$selecionadas= array();

		
	}
	if ($meta!=""){
		foreach ($meta as  $chave => $valor ) {
				$args['meta_query'][$chave.'_clause'] = array('meta_key' => $chave,'value' => $valor);
				$args['meta_query']['relation'] ='AND';
		}
	}
	
	$WP_Query_material = new WP_Query( $args);
	$ajax_response['html']="";
	$ajax_response['teste']="";
	$ajax_response['query']=$WP_Query_material;
	

	if( $WP_Query_material->have_posts()  )	{
		if (isset($tipo)){
			$tipo[get_field('tipo')]=0;
		}
		while ( $WP_Query_material->have_posts() ) 
		{
			$WP_Query_material->the_post();
			
			$taxonomias=wp_get_post_terms($WP_Query_material->post->ID,array('autor','tema'));
			foreach($taxonomias as $inci=>$valor){////para cada taxonomia dos posts ($valor->taxonomy = nome da taxonomia $valor->term_taxonomy_id = id do termo, $valor->name = nome do termo)
				if (isset($tax[$valor->taxonomy]) && ($valor->term_taxonomy_id == $tax[$valor->taxonomy]) ){//se a taxonomia esta selecionada e é o termo selecionado
					if (!isset($tax_vet[$valor->taxonomy][$valor->term_taxonomy_id])){///se não existe o termo no vetor contador ele é criado
						$tax_vet[$valor->taxonomy][$valor->term_taxonomy_id]=array(
							'nome'  => $valor->name,
							'cont'  => 1,
							'selecionado' =>1
						);
					}
					else  {///se  existe o termo no vetor contador somamos 1 na conta
						$tax_vet[$valor->taxonomy][$valor->term_taxonomy_id]['cont']++;
					}
					
				}
				else if (!isset($tax[$valor->taxonomy])){//se a taxonomia não esta selecionada (elimina o caso tax selecionada mas termo não é o selecionado)
					if (!isset($tax_vet[$valor->taxonomy][$valor->term_taxonomy_id])){///se não existe o termo no vetor contador ele é criado
						$tax_vet[$valor->taxonomy][$valor->term_taxonomy_id]=array(
							'nome'  => $valor->name,
							'cont'  => 1
						);
					}
					else  {///se  existe o termo no vetor contador somamos 1 na conta
						$tax_vet[$valor->taxonomy][$valor->term_taxonomy_id]['cont']++;
					}
				}
			}
			$tipo[get_field('tipo')]++;
			get_template_part('content','material');
		}
		echo "<div class='clearfix'></div>";
		foreach($tax_vet as $taxonomia=>$id){
			echo '<div class="resposta" nome="'.get_taxonomy($taxonomia)->labels->name.'" objeto="select" id-obj="'.$taxonomia.'">';
			
				foreach ($id as $chave=>$valor){
					echo '<option ';
					if ($valor['selecionado']){
						echo 'selected="selected"';
					}
				 	echo 'class="level-0" value="' .$chave. '">' .$valor['nome']. '&nbsp;&nbsp;(' .$valor['cont']. ')</option>';
				}
			echo '</div>';
		}
			
			echo '<div class="resposta" nome="Tipo" objeto="select" id-obj="tipo">';
			foreach ($tipo as $nome=>$contador){
				echo '<option ';
				if ($meta['tipo']==$nome){
					echo 'selected="selected"';
				}
				echo 'data-key="tipo" value="'.$nome.'">'.$nome. '&nbsp;&nbsp;(' .$contador. ')</option>';
				
			}
			echo '</div>';
			
			
		 // echo $html;
			// echo "<div><pre>";
			// print_r($tax_vet);
			// echo "</pre></div>";
		wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
	}
	else{
		echo'<div class="resposta" nome="Autores" objeto="select" id-obj="autor"></div>';
		echo'<div class="resposta" nome="Temas" objeto="select" id-obj="tema"></div>';
		echo'<div class="resposta" nome="Tipo" objeto="select" id-obj="tipo"></div>';
		echo '<h2>'.__('Não existem materiais com esses critérios...', 'odin').'</h2>';
	}
	wp_die();
	
}
add_action( 'wp_ajax_material_filtra_posts', 'ajax_material_filtra_posts' );
add_action( 'wp_ajax_nopriv_material_filtra_posts', 'ajax_material_filtra_posts' );
//////materiais/ filtro////
