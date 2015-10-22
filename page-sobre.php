<?php
/**
 * Template Name: Sobre
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(''); ?>
<?php $odin_sobre_opts = get_option( 'odin_sobre' );?>

	<main id="content" class="<?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">
		<div class="row visao">
			<div class="col-sm-4"> 
				<a href="http://escolastransformadoras.com.br/sobre/visao/">
					<img class="icon-visao" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-olho2.png">
					<h3><?php echo __('visão', 'odin')?></h3>
				</a>
				<?php echo $odin_sobre_opts['visao'];?>
				
			</div>
			<div class="col-sm-4">
				<a href="http://escolastransformadoras.com.br/sobre/competencias-transformadoras/">
				
					<img class="icon-visao"  src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-alvo.png">
					<h3><?php echo __('Competências Transformadoras', 'odin')?></h3>
				</a>
				<?php echo $odin_sobre_opts['estrategia'];?>
			 </div>
			<div class="col-sm-4">
				<a href="http://escolastransformadoras.com.br/sobre/equipe/">
				
					<img class="icon-visao" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-equipe.png">
					<h3><?php echo __('Equipe', 'odin')?></h3>
				</a>
				
				<?php echo $odin_sobre_opts['equipe'];?>
			</div>
		</div><!-- visao -->
		
		
		
		<div class="row apoio">
			<div class="col-md-12">
				<h4><?php echo __('Parceiros', 'odin')?></h4>
				<img class="icon-parceiros" src="http://escolastransformadoras.com.br/wp-content/uploads/2015/09/logos-parceiros.png">
				
			</div>
		</div>
	</main><!-- #main -->
<?php
get_footer();

