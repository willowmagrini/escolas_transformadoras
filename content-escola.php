<?php
/**
 * The default template for displaying content.de escolas
 *
 * Used for both single and index/archive/author/catagory/search/tag.
 *
 * @package Odin
 * @since 2.2.0
 */

?>
<?php  $gallery = get_post_gallery_images( $post ); ?> 


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row conteudo-citacao">
		<div id="titulo-conteudo" class="inline-block">
			<header class="entry-header">
				<?php
						the_title( '<h1 class=" entry-title">', '</h1>' );
				?>
			</header><!-- .entry-header -->
			<div class="conteudo-single-escola">
					<div id="info-escola" class="inline-block esquerda">
						<h2 id="titulo-info-escola" class="absolute sem-margem">informações</h2>
						
						<div id="endereco-escola" class="">
							<img class="inline-block icon-info" src="<?php echo get_template_directory_uri().'/assets/images/icon-marker.png';?>">
							<div class="border-bottom inline-block">
								<?php echo get_field( "endereco_texto" ).', ';	?>	
								<?php echo get_field( "cidade" ).', ';	?>	
								<?php echo get_field( "estado" ).', ';	?>	
								<?php echo get_field( "pais" );	?>	
							</div>
						</div>
						<div id="numeros-escola" class="">
							<img class="inline-block icon-info" src="<?php echo get_template_directory_uri().'/assets/images/icon-nivel-ensino.png';?>">
							<div class="border-bottom inline-block">
								<p><b><?php echo get_field( "numero_de_alunos" );	?></b></p>
								<div class="clearfix"></div>
							</div>
						</div>
						<div id="numeros-escola2" class="">
							<img class="inline-block icon-info" src="<?php echo get_template_directory_uri().'/assets/images/icon-categoria.png';?>">
							<div class="border-bottom inline-block">
								<p><b><?php echo get_field( "numero_de_professores" );	?> </b></p>
								<div class="clearfix"></div>
							</div>
						</div>
						<div id="contato-escola" class="">
							<img class="inline-block icon-info" src="<?php echo get_template_directory_uri().'/assets/images/icon-msg.png';?>">
							<div class="inline-block">
								<?php 
								the_field( "contato" );	
								?>
								<div class="clearfix"></div>
							</div>
							<div class="clearfix"></div>
							
						</div>
						<?php if (get_field( "alunos" )!=""): ?>
							<div id="alunos-escola" class="">
								<img class="inline-block icon-info" src="<?php echo get_template_directory_uri().'/assets/images/icon-alunos.png';?>">
								<div class="border-bottom inline-block">
									<p><b><?php echo get_field( "alunos" );	?></b></p>
									<div class="clearfix"></div>
								</div>
							</div>
						<?php endif ?>
						<?php if (get_field( "ano_de_eleicao" )!=""): ?>
							<div id="ano-escola" class="">
								<img class="inline-block icon-info" src="<?php echo get_template_directory_uri().'/assets/images/icon-ano.png';?>">
								<div class="border-bottom inline-block">
									<p><b><?php echo get_field( "ano_de_eleicao" );	?></b></p>
									<div class="clearfix"></div>
								</div>
							</div>	
						<?php endif ?>
						<?php if (get_field( "nome_do_lider" )!=""): ?>
							<div id="nome-lider-escola" class="">
								<img class="inline-block icon-info" src="<?php echo get_template_directory_uri().'/assets/images/icon-lider.png';?>">
								<div class="border-bottom inline-block">
									<p><b><?php echo get_field( "nome_do_lider" );	?></b></p>
									<div class="clearfix"></div>
								</div>
							</div>
						<?php endif ?>
					</div>
			<?php 
				$content= get_the_content( );
				$content = strip_shortcode('gallery', $content);
				echo $content;
				
				?>
				
					
					
				<?php
				echo '</div>';
				if( ! has_shortcode( $post->post_content, 'gallery' ) )
				 		return $content;

				 	// Retrieve the first gallery in the post
				 	$gallery = get_post_gallery_images( $post );
					$upload_dir = wp_upload_dir();
					$url= $upload_dir['baseurl']."/mask-img/".get_the_ID();
					$caminho = $upload_dir['basedir']."/mask-img/".get_the_ID();
			?>
			
		</div><!-- titulo-conteudo -->
	
	</div><!-- .row.conteudo-citacao -->
		
	<div id="fundo-modal">	</div>
	<div id="modal-conteudo">
		<a href="#">
			<div id="botao-fechar">x</div>
		</a>
		<?php echo get_field('video')?>
	</div>
</article><!-- #post-## -->
