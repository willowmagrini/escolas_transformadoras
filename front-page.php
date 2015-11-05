<?php
/**
 * Template Name: front-page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header('front'); ?>
<?php $odin_general_opts = get_option( 'odin_general' );?>

	<main id="content" class="<?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">
		
			<div class="row exp-insp">
				<div id="noticia-home" class="col-md-6 sem-margem">
					<h4><?php echo __('Veja Mais ','odin')?></h4>
					<a href="noticias">
						<h1><?php echo __('Notícias','odin')?></h1>
					</a>
					<hr>
						<p>
						<?php
						$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						$args = array(
							'post_type' => 'noticia',
							'paged'=> $paged,
							'posts_per_page' =>1
						);
						$WP_Query_esc_front = new WP_Query( $args );
								$WP_Query_esc_front->the_post();
								?>
								<a href="<?php the_permalink()?>">
									<?php echo get_the_title();?>
								</a>
						</p>
								
					
				</div>
				<img  class="absolute " id="olho-home" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-olho.png">
				
				<div id="video-home" class="col-md-6 sem-margem relative">
					<?php
					echo get_the_post_thumbnail( $WP_Query_esc_front->post->ID, 'quadrada' ); ?>
					<!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home2.png"> -->
									
				</div>
			</div><!-- row exp-insp -->
			<?php
	wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
	?>
			<div class="row indique">
				<div class="col-md-6 sem-margem">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/home3.jpg">
				</div>
				<div class="col-md-6 sem-margem">
					<div id="indique-uma">
						<div id="triangulo_indique"></div>
						<a href="escolas-transformadoras">
						
							<h4><?php echo __('Conheça as Escolas ','odin')?></h4>
							<h4><?php echo __('Transformadoras','odin')?></h4>
						</a>
						<?php echo $odin_general_opts['indique_uma'];?>
					</div>
					<img class="absolute" id="lista-home" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-lista.png">
					<div class="video-indique">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/video-img.png">
						<a id="link-video-escola" target="blank" href="#">
							<img id="thumb-video-play" class="absolute" src="<?php echo get_template_directory_uri().'/assets/images/thumb-video-play.png';?>">
						</a>
					</div>
				</div>
			</div><!-- row indique -->
			
			<div class="row papel sem-margem"><!-- row papel -->
				<div class="col-md-6 pull-right ">
					<h4>
					<?php echo $odin_general_opts['destaque_recursos_tit'];?>
					</h4>
					<p><?php echo $odin_general_opts['destaque_recursos'];?></p>
				</div>
				<div class="col-md-6 pull-left">
					<img id="boneco-home" src="<?php echo get_template_directory_uri(); ?>/assets/images/home4.png">
					
				</div>
			</div><!-- row papel -->
			
			<div id="fundo-modal">	</div>
			<div id="modal-conteudo">
				<a href="#">
					<div id="botao-fechar">x</div>
				</a>
				<div class="fluid-width-video-wrapper" style="padding-top: 56.3333%;">
					<iframe src="https://www.youtube.com/embed/<?php echo $odin_general_opts['video_home'];?>?feature=oembed" frameborder="0" allowfullscreen="" id="fitvid304944">
						
					</iframe>
				</div>			
			</div>

	</main><!-- #main -->

<?php
get_footer();
