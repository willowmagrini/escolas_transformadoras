<?php
/**
 * Template Name: Materiais
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(''); ?>

<main id="content" class="pagina-itens pagina-materiais <?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">
	<div class="fundo-filtro">
		<?php drop_tags('Autor', 'autor')?>
		<?php drop_tags('Tema', 'tema')?>
		<select name="tipo" id="tipo" class="ajax-filtro-materiais custom-field" >
			<option  value=""><?php echo __( 'Tipo','odin'); ?></option>
			<?php  
			$values = $wpdb->get_col("SELECT DISTINCT pm.meta_value FROM {$wpdb->postmeta} pm
		        LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
		        WHERE pm.meta_key = 'tipo' 
		        AND p.post_status = 'publish' 
		        AND p.post_type = 'material'");						
			foreach ($values as $value) {
				echo '<option  data-key="tipo" value="'.$value.'">'.$value.'</option>';
			}
			?>
		</select>
	</div>
	<div class="row" id="ajax-itens">
		<?php
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$args = array(
			'post_type' => 'material',
			'paged'=> $paged,
			'posts_per_page' =>8
		);
	
		$WP_Query_material = new WP_Query( $args );
	
		if( $WP_Query_material->have_posts()  )
		{
			
			while ( $WP_Query_material->have_posts() ) 
			{
				$WP_Query_material->the_post();
				?>
				<?php get_template_part('content','material');
				
				
			}
			?>
				<div class="clearfix"></div>
				<div class="row pagination">
					<?php
					$big = 999999999; // need an unlikely integer

					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $WP_Query_material->max_num_pages
					) );
					?>
				</div>
				<div class="clearfix"></div>
			<br>
	</div> <!-- id="escolad" -->

		<?php
		}
		
	wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
?>
	
</main>
<div id="fundo-modal">	</div>
<div id="modal-conteudo">
	<a href="#">
		<div id="botao-fechar">x</div>
	</a>
	<div id="video-material" class="fluid-width-video-wrapper" style="padding-top: 56.3333%;">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ajax-loader.gif">
		
	</div>			
</div>

	<?php get_footer();