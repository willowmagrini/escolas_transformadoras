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
					the_title();
					echo get_the_excerpt();
				
					?>
				
				</a>
			</div><!-- escola-destaque -->
			<?php
		}

		wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
	}

	$tempo = microtime() -$tempo;
	echo 'tempo de destaque'.$tempo;
	?>
	<hr>
	<hr>
	<hr>
	<div id="ajax-escolas">
		<?php
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$args = array(
			'post_type' => 'escola',
		);
	
		$WP_Query_escola = new WP_Query( $args );
	
		if( $WP_Query_escola->have_posts()  )
		{
			
			while ( $WP_Query_escola->have_posts() ) 
			{
				$WP_Query_escola->the_post();
				?>
				<div class="cada-escola animated fadeIn">
					<a href="<?php the_permalink()?>">
						<?php echo the_title();?>
						<?php 	
						echo '<pre>';
							print_r(get_post_meta( $post->ID));
						echo '</pre>';
						
						?>
					</a>
				</div><!-- escola-destaque -->
				<?php
			}
		
			?>
	</div> <!-- id="escolad" -->

		<a class="btn btn-loadmore" data-paged="2" data-loading="'.__('Carregando...', 'odin').'" data-selector="#ajax-escolas" data-max-paged="<?php echo $WP_Query_escola->max_num_pages;?>" data-category="all">
			<?php echo __('Carregar +','odin'); ?>
		</a>
			
			<?php
			
		wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
	}
	

	$tempo = microtime() -$tempo;
	echo $tempo;
	?>
</main>
	<?php
	get_footer();