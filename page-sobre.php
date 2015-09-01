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
				<img class="icon-visao" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-olho2.png">
				<h3>visão</h3>
				<?php echo $odin_sobre_opts['visao'];?>
			</div>
			<div class="col-sm-4">
				<img class="icon-visao"  src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-alvo.png">
				<h3>Estratégia</h3>
				<?php echo $odin_sobre_opts['estrategia'];?>
				
			 </div>
			<div class="col-sm-4">
				<img class="icon-visao" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-equipe.png">
				<h3>Equipe</h3>
				<?php echo $odin_sobre_opts['equipe'];?>
			</div>
		</div><!-- visao -->
		<div class="row fotos sem-margem">
			<div id="fundo-sobre" class="sem-margem col-md-11">
			</div><!-- fundo-sobre -->
				
			
			<img class="absolute" id="sobre1" src="<?php echo get_template_directory_uri(); ?>/assets/images/sobre1.png">
			<div id="escolas-sobre" class="absolute">
				
				<div class="inline-block">
					<h2  >Escolas</h2>
					<h2  >Transformadoras</h2>
				</div>
				<div class="inline-block">
					<?php echo $odin_sobre_opts['esc_trans'];?>
				</div>
			</div>
			<img class="absolute" id="sobre2" src="<?php echo get_template_directory_uri(); ?>/assets/images/sobre2.png">
			<img class="absolute" id="barra-sobre" src="<?php echo get_template_directory_uri(); ?>/assets/images/barra-sobre.png">
			<div id="experiencias-sobre" class="absolute">
				<div class="inline-block">
					<?php echo $odin_sobre_opts['esc_trans'];?>
				</div>
				<div class="inline-block">
					<h2  >Experiências</h2>
					<h2  >Inspiradoras</h2>
				</div>
			</div>
			<img class="absolute" id="sobre3" src="<?php echo get_template_directory_uri(); ?>/assets/images/sobre3.png">
			
		</div>
		
		<div class="row apoio">
			<div class="col-md-12">
				<h4>Parceiros:</h4>
				<img class="icon-parceiros" src="<?php echo get_template_directory_uri(); ?>/assets/images/intel.png">
				<img class="icon-parceiros" src="<?php echo get_template_directory_uri(); ?>/assets/images/unicef.png">
				<img class="icon-parceiros" src="<?php echo get_template_directory_uri(); ?>/assets/images/citi.png">
				<img class="icon-parceiros" src="<?php echo get_template_directory_uri(); ?>/assets/images/staples.png">
				<img class="icon-parceiros" src="<?php echo get_template_directory_uri(); ?>/assets/images/google-apoio.png">
				
			</div>
		</div>
	</main><!-- #main -->
<?php
get_footer();

