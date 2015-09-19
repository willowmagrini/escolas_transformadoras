<?php
/**
*Template Name: Faça Parte
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>
<?php $odin_faca_opts = get_option( 'odin_faca' );?>


	<main id="content" class="pagina <?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">
			<div class="row visao">
				<div class="col-sm-4"> 
					<a href="http://escolastransformadoras.com.br/faca-parte/seja-um-parceiro">
						<img class="icon-visao" src="http://escolastransformadoras.com.br/wp-content/uploads/2015/09/bola_parceiro1.png">
						<h3><?php echo  __('seja um parceiro','odin');?></h3>
					</a>
					<?php echo $odin_faca_opts['parceiro'];?>

				</div>
				<div class="col-sm-4">
					<a href="http://escolastransformadoras.com.br/faca-parte/inscreva-se">

						<img class="icon-visao" 	 src="http://escolastransformadoras.com.br/wp-content/uploads/2015/09/bola_inscreva-se1.png">
						<h3><?php echo  __('inscreva-se','odin');?></h3>
					</a>
					<?php echo $odin_faca_opts['inscrevase'];?>
				 </div>
				<div class="col-sm-4">
					<a href="http://escolastransformadoras.com.br/faca-parte/indique-uma-escola">

						<img class="icon-visao" src="http://escolastransformadoras.com.br/wp-content/uploads/2015/09/bola_indique1.png">
						<h3><?php echo  __('indique uma escola','odin');?></h3>
					</a>

					<?php echo $odin_faca_opts['indique'];?>
				</div>
			</div><!-- visao -->
			

	</main><!-- #main -->

<?php
get_footer();
