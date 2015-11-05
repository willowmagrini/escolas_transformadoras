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
								<p><b><?php echo  __(	'Nível de ensino: ','odin')?></b><?php echo get_field( "numero_de_alunos" );	?></p>
								<p><b><?php echo  __('Categoria:','odin')?></b> <?php echo get_field( "numero_de_professores" );	?> </p>
								<div class="clearfix"></div>
								
							</div>
						</div>
						<div id="contato-escola" class="">
							<img class="inline-block icon-info" src="<?php echo get_template_directory_uri().'/assets/images/icon-msg.png';?>">
							<div class="inline-block">
								<?php 
								the_field( "contato" );	
								?>
							</div>

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
			?>
			
		</div><!-- titulo-conteudo -->
	
	</div><!-- .row.conteudo-citacao -->
	<div class="row  info">
		<div id="foto-escola-1" class="inline-block esquerda">
			<?php 
				
				$foto1 = $gallery[0];
				$dir = get_template_directory().'/assets/images/'.get_the_ID();
				
				if (!file_exists($dir)) {
				    mkdir($dir, 0755, true);
				}
				if (!file_exists($dir.'/foto-1-temp.png')) {
					fopen($dir.'/foto-1-temp.png', "x");
				}	
				$foto1_temp =  '/assets/images/'.get_the_ID().'/foto-1-temp.png';
				
				$foto1 = image_resize2($foto1, get_template_directory().$foto1_temp, '420', '380', 1);
				echo 'foto1'.$foto1;
			?>
			<img src="<?php echo get_template_directory_uri().$foto1_temp; ?>" width="420" height="370" alt="" />
		</div>
		<div class = ""></div>
		<div id="foto-escola-2" class="inline-block esquerda">
			<?php 
				$foto2 = $gallery[1];
				$foto2_temp =  '/assets/images/'.get_the_ID().'/foto-2-temp.png';
				$foto2 = image_resize2($foto2, get_template_directory().$foto2_temp, '420', '380', 1);
				
			?>
			<img src="<?php echo get_template_directory_uri().$foto2_temp; ?>" width="420" height="195" alt="" />
			
		</div>
		<div id="foto-escola-2-5" class="inline-block esquerda">
			<?php 
				$foto2 = $gallery[2];
				$foto2_5_temp =  '/assets/images/'.get_the_ID().'/foto-2-5-temp.png';
				$foto2 = image_resize2($foto2, get_template_directory().$foto2_5_temp, '420', '195', 1);
				
			?>
			<img src="<?php echo get_template_directory_uri().$foto2_5_temp; ?>" width="420" height="195" alt="" />
			
		</div>
		<div id="video-escola" class="inline-block esquerda">
			<?php 
				$thumb_video = get_field('thumbnail_do_video', false, true);
				$thumb_video= $thumb_video['url'];
				$dest_thumb_video =  '/assets/images/'.get_the_ID().'/dest_thumb_video.png';	
				$thumb_video = image_resize2($thumb_video, get_template_directory().$dest_thumb_video, '420', '195', 1);
				$mask_video = get_stylesheet_directory_uri().'/assets/images/mask-thumb-video.png';
				$mask_video = imagecreatefrompng( $mask_video );
				$dest_thumb_video = imagecreatefrompng( get_template_directory().$dest_thumb_video );
				imagealphamask( $dest_thumb_video, $mask_video );
				imagepng( $dest_thumb_video, get_template_directory().'/assets/images/'.get_the_ID().'/video-thumb.png' );
			?>
			<a id="link-video-escola" target="blank" href="#">
				<img id="thumb-video-play" class="absolute" src="<?php echo get_template_directory_uri().'/assets/images/thumb-video-play.png';?>">
			</a>
			<img src="<?php echo get_template_directory_uri().'/assets/images/'.get_the_ID().'/video-thumb.png'; ?>" width="420" height="195" alt="" />
			
		</div>
		<div class=""></div>
		<div id="foto3-foto4">
			<div id="foto-escola-3" class="inline-block esquerda">
				<?php 
					$foto3 = $gallery[3];
					$dest =  '/assets/images/'.get_the_ID().'/dest.png';
					$foto3 = image_resize2($foto3, get_template_directory().$dest, '220', '220', 1);
					$mask = get_stylesheet_directory_uri().'/assets/images/mask-img1.png';
					$mask = imagecreatefrompng( $mask );
					$dest = imagecreatefrompng( get_template_directory_uri().$dest );
					imagealphamask( $dest, $mask );
				 	imagepng( $dest, get_template_directory().'/assets/images/'.get_the_ID().'/dest.png' );
				?>
				<img src="<?php echo get_template_directory_uri().'/assets/images/'.get_the_ID().'/dest.png'; ?>" width="220" height="220" alt="" />
			</div>
	
			<div id="foto-escola-4" class="inline-block esquerda">
					<?php 
						$foto4 = $gallery[4];
						$foto4_temp =  '/assets/images/'.get_the_ID().'/foto-4-temp.png';
						$foto4 = image_resize2($foto4, get_template_directory().$foto4_temp, '440', '220', 1);
					?>
				<img src="<?php echo get_template_directory_uri().'/assets/images/'.get_the_ID().'/foto-4-temp.png'; ?>" width="440" height="220" alt="" />
				
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
