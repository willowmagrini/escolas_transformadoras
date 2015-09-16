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

	<main id="content" class="pagina <?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">
			<div class="row visao">
				<div class="col-sm-4"> 
					<a href="http://escolastransformadoras.com.br/faca-parte/seja-um-parceiro">
						<img class="icon-visao" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-olho2.png">
						<h3>visão</h3>
					</a>
					<?php echo $odin_sobre_opts['parceiro'];?>

				</div>
				<div class="col-sm-4">
					<a href="http://escolastransformadoras.com.br/faca-parte/inscreva-se">

						<img class="icon-visao"  src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-alvo.png">
						<h3>Competências Transformadoras</h3>
					</a>
					<?php echo $odin_sobre_opts['inscrevase'];?>
				 </div>
				<div class="col-sm-4">
					<a href="http://escolastransformadoras.com.br/faca-parte/indique-uma-escola">

						<img class="icon-visao" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-equipe.png">
						<h3>Equipe</h3>
					</a>

					<?php echo $odin_sobre_opts['indique'];?>
				</div>
			</div><!-- visao -->
			
			
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'faca' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile;
			?>

	</main><!-- #main -->

<?php
get_footer();
