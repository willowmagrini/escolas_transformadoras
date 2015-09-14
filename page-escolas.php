<?php
/**
 * Template Name: Escolas Transformadoras
 *
 * @package Odin
 * @since 2.2.0
 */

get_header('escolas'); ?>

<main id="content" class="<?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">
	
	<div class="row filtro-escolas">
		<div id="titulo-conteudo" class="inline-block">
			<header class="entry-header">
				<?php
						the_title( '<h1 class=" entry-title">', '</h1>' );
				?>
			</header><!-- .entry-header -->
			<?php 
				$content= get_the_content( );
				$content = strip_shortcode('gallery', $content);
				echo '<p>'.$content.'</p>';
				if( ! has_shortcode( $post->post_content, 'gallery' ) )
				 		return $content;

				 	// Retrieve the first gallery in the post
				 	$gallery = get_post_gallery_images( $post );
			?>
			
		</div><!-- titulo-conteudo -->
		
		<div class="inline-block"  id="filtro">	
			<form>
				<select id="filtro-pais" class="btn-ajax-filtro" data-filtro="pais">
					<option  value=""><?php echo __( 'Todos','odin'); ?></option>
					<?php  
                
                
					$values = $wpdb->get_col("SELECT DISTINCT pm.meta_value FROM {$wpdb->postmeta} pm
				        LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
				        WHERE pm.meta_key = 'pais' 
				        AND p.post_status = 'publish' 
				        AND p.post_type = 'escola'");						
					foreach ($values as $value) {
						echo '<option  data-key="pais" value="'.$value.'">'.$value.'</option>';
					}
					
					
					
					
					?>
                
				</select>
				
				<select id="filtro-cidade" class="btn-ajax-filtro" data-filtro="cidade">
					<option  value=""><?php echo __( 'Todas','odin'); ?></option>
					
					<?php  
                
                	
					$values = $wpdb->get_col("SELECT DISTINCT pm.meta_value FROM {$wpdb->postmeta} pm
				        LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
				        WHERE pm.meta_key = 'cidade' 
				        AND p.post_status = 'publish' 
				        AND p.post_type = 'escola'" );						
					foreach ($values as $value) {
						echo '<option value="'.$value.'">'.$value.'</option>';
					}
					?>
                
				</select>
				<input type="text" id="filtro-palavra" name="palavra" placeholder="Palavra-Chave"></input>
				<input type="submit" id="filtro-enviar" name="enviar" placeholder="Enviar"></input>		
			</form>
		</div>
	</div><!-- .row.conteudo-citacao -->

	<?php
	$tempo=microtime();
	$posts = get_posts(array(
		'posts_per_page' => 1,
		'post_type' => 'escola',
		'meta_query' => array(
			array(
				'key' => 'destaque',
				'value' => '1',
				'compare' => '==',

			)
		)
	));
	
	if( $posts )
	{
		foreach( $posts as $post )
		{
			setup_postdata( $post );
			?>
			<div id="escola-destaque" class="row">
				<a href="<?php the_permalink()?>">
					<?php 
					echo get_the_post_thumbnail( get_the_ID());
					the_title();
					echo get_the_excerpt();
				
					?>
				
				</a>
			</div><!-- escola-destaque -->
			<?php
		}

		wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
	}


	?>
	
	<div class="row" id="ajax-escolas">
		<?php
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$args = array(
			'post_type' => 'escola',
			'paged'=> $paged,
			'posts_per_page' =>8
		);
	
		$WP_Query_escola = new WP_Query( $args );
	
		if( $WP_Query_escola->have_posts()  )
		{
			
			while ( $WP_Query_escola->have_posts() ) 
			{
				$WP_Query_escola->the_post();
				?>
				<?php
				
				get_template_part('content', 'cada-escola');
				
			}
		
			?>
	</div> <!-- id="escolad" -->

		<a class="btn btn-loadmore" data-estado-botao="aparecido" data-paged="2" data-loading="'.__('Carregando...', 'odin').'" data-selector="#ajax-escolas" data-max-paged="<?php echo $WP_Query_escola->max_num_pages;?>" data-category="all">
			<?php echo __('Carregar +','odin'); ?>
		</a>
			
			<?php
			
		wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
	}
	

	
	?>
</main>
	<?php
	get_footer();