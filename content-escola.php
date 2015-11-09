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
							<img class="inline-block icon-info" src="<?php echo get_template_directory_uri().'/assets/images/icon-pessoas.png';?>">
							<div class="border-bottom inline-block">
								<p><b><?php echo get_field( "numero_de_alunos" );	?></b></p>
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
			?>
			
		</div><!-- titulo-conteudo -->
	
	</div><!-- .row.conteudo-citacao -->
	<div class="row  info">
		<div id="foto-escola-1" class="inline-block esquerda">
			<img src="<?php echo $url.'/foto0.png'; ?>" width="420" height="380" alt="" />
		</div>
		<div class = ""></div>

		<div id="foto-escola-2" class="inline-block esquerda">
			<img src="<?php echo $url.'/foto1.png'; ?>" width="420" height="380" alt="" />
		</div>

		<div id="foto-escola-2-5" class="inline-block esquerda">
			<img src="<?php echo $url.'/foto2.png'; ?>" width="420" height="195" alt="" />
			
		</div>
		<div id="video-escola" class="inline-block esquerda">
			<?php 
			if (get_field('video')){?>
				<a id="link-video-escola" target="blank" href="#">
					<img id="thumb-video-play" class="absolute" src="<?php echo get_template_directory_uri().'/assets/images/thumb-video-play.png';?>">
				</a>
			<?php
			}
			?>
			<img src="<?php echo $url.'/thumb_video.png'; ?>" width="420" height="195" alt="" />
			
		</div>
		<div class=""></div>
		<div id="foto3-foto4">
			<div id="foto-escola-3" class="inline-block esquerda">
				<img src="<?php echo $url.'/foto3.png' ?>" width="220" height="220" alt="" />
			</div>
	
			<div id="foto-escola-4" class="inline-block esquerda">
					
				<img src="<?php echo $url.'/foto4.png' ?>" width="440" height="220" alt="" />
				
			</div>
		</div ><!-- id="foto3-foto4" -->
	</div>	
		
	<div id="fundo-modal">	</div>
	<div id="modal-conteudo">
		<a href="#">
			<div id="botao-fechar">x</div>
		</a>
		<?php echo get_field('video')?>
	</div>
</article><!-- #post-## -->
