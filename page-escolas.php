<?php
/**
 * Template Name: Escolas Transformadoras
 *
 * @package Odin
 * @since 2.2.0
 */

get_header('escolas'); ?>
<?php $odin_escolas_opts = get_option( 'odin_escolas' );?>

<main id="content" class="<?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">
	
	<div class="row filtro-escolas">
		<div id="titulo-conteudo" class="inline-block" data-estado="fechado">
			<header class="entry-header">
				<!-- <div id="abre-fecha" class="fechado">
									<a href="#">
										<img class="fecha" src='<?php echo get_template_directory_uri(); ?>/assets/images/seta-mapa.png'>
										<img class="abre" src='<?php echo get_template_directory_uri(); ?>/assets/images/seta-mapa.png'>
									</a>
								</div> -->
				<a href="#">
					<h1 class="btn-filtro-mapa inline-block" data-estado="ativo" data-filtro="latam" id="global">latam</h2>
				</a>
				<h1 class="inline-block">/</h2>
				<a href="#">
					<h1 class="btn-filtro-mapa inline-block" data-estado="inativo" data-filtro="global" id="global">global</h2>
				</a>
			</header><!-- .entry-header -->
			
			<div id="texto_latam" class="texto-filtro-mapa" data-estado="ativo" data-filtro="latam">
				<p>
					<?php echo $odin_escolas_opts['texto_latam'];?>
				</p>
			</div>
			<div id="texto_global" class="texto-filtro-mapa" data-estado="inativo" data-filtro="global">
				<p>
					<?php echo $odin_escolas_opts['texto_global'];?>
				</p>
			</div>
		</div><!-- titulo-conteudo -->
		<div class="inline-block"  id="filtro">	
			<form method="get"  action="<?php bloginfo('url');?>/">
				<div id="localizacao" class="inline-block">
					<h3><?php echo  __('filtro','odin')?></h3>
						
					<select id="filtro-pais" class="btn-ajax-filtro" data-filtro="pais">
						
						<option  value=""><?php echo __( 'País','odin'); ?></option>
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
						<div class='btn-drop'></div>
						<option  value=""><?php echo __( 'Cidade','odin'); ?></option>
					
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
				</div ><!--id="localizacao"-->
				<div class="inline-block" id="palavra-chave">
					<h3><?php echo  __('busca','odin')?></h3>
					<p><?php echo  __('Encontre a escola por palavra-chave','odin')?></p>
					<input type="text" id="filtro-palavra" name="s" placeholder="Palavra-Chave"></input>
					<button type="submit" id="filtro-enviar" name="enviar" placeholder=""></input>		
				</div>
			</form>
		</div>
	</div><!-- .row.conteudo-citacao -->
	
	<div class="row" id="ajax-escolas">
		<?php
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$args = array(
			'post_type' => 'escola',
			'paged'=> $paged,
			'posts_per_page' =>8,
			'orderby'        => 'rand',
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

		
		<a data-type="escola" class="btn btn-loadmore" data-estado-botao="aparecido" data-paged="2" data-loading="<img src='<?php echo get_template_directory_uri(); ?>/assets/images/ajax-loader.gif'>" data-selector="#ajax-escolas" data-max-paged="<?php echo $WP_Query_escola->max_num_pages;?>" style="<?php if ($WP_Query_escola->max_num_pages<2){echo 'display:none;';}?>" data-category="all">
			<?php echo __('Mais Escolas ','odin'); ?>
			<img class="" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn-loadmore-seta.png">
			
		</a>
			
			<?php
			
		wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
	}
	?>
	<div class="row papel sem-margem"><!-- row papel -->
		<div class="col-md-6 pull-right ">
			<h4>
			<?php echo $odin_escolas_opts['destaque_esco_pre_tit'];?>
			</h4>
			<p><?php echo $odin_escolas_opts['destaque_esco_pre'];?></p>
		</div>
		<div class="col-md-6 pull-left">
			<img id="boneco-home" src="<?php echo get_template_directory_uri(); ?>/assets/images/home4.png">
		</div>
	</div><!-- row papel -->
</main>
	<?php
	get_footer();