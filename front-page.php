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
				<div class="col-md-6 sem-margem">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/home1.png">
					<img  class="absolute " id="olho-home" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-olho.png">
					
				</div>
				<div class="col-md-6 sem-margem relative">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/home2.png">
					<div id="destaque_insp" class="absolute">
						<?php echo $odin_general_opts['destaque_insp'];?>
					</div>
				</div>
			</div><!-- row exp-insp -->
			
			<div class="row indique">
				<div class="col-md-6 sem-margem">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/home3.png">
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
			
	</main><!-- #main -->

<?php
get_footer();
