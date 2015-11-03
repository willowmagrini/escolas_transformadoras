<?php
/**
 * Template Name: Equipe
 *
 * @package Odin
 * @since 2.2.0
 */


get_header(); ?>

	<main id="content" class="pagina equipe <?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' ); ?>

						<div class="entry-content">
						
							<div class="row sem-margem" id="equipe">
								<?php
								$count = 0;
								$args = array(
									'post_type' => 'equipe',
								);

								$WP_Query_escola = new WP_Query( $args );

								if( $WP_Query_escola->have_posts()  )
								{

									while ( $WP_Query_escola->have_posts() ) 
									{
										$WP_Query_escola->the_post();
										if ($count == 0 ){
											?>
											<div id="equipe-l1" class= "sem-margem equipe-linha row">
											<?php 
										}
										get_template_part('content','equipe');
																	
										if ($count == 3){
											?>
										</div><!-- equipe-l1-->
										<div id="equipe-l2" class= "equipe-linha row sem-margem">
										<?php 
										}
										
										$count++;
									}
								

								?>
								<div class="clearfix"></div>
								<br>
							</div> <!-- id="escolad" -->
							<?php
								}
								wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
							?>
							
							<div id="comunidade-background">
									<h2>Comunidade Inspiradora</h2>
										
										
									<div id="owl-carousel" class="owl-carousel">
										<?php
										$args = array(
											'post_type' => 'comunidade',
										);

										$WP_Query_comunidade = new WP_Query( $args );

										if( $WP_Query_comunidade->have_posts()  ){

											while ( $WP_Query_comunidade->have_posts() ) 
											{
												$WP_Query_comunidade->the_post();
									
												get_template_part('content','equipe');
										
										
											}
								

										?>
										<div class="clearfix"></div>
										<br>
									</div>
									
									
							</div>
							<?php
								}
								wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
							?>
							
						</div><!-- .entry-content -->
					</article><!-- #post-## -->
					<?php 
					// If comments are open or we have at least one comment, load up the comment template.
				endwhile;
			?>
			<div id="fundo-modal">	</div>
			<div id="modal-conteudo">
				
				<a href="#">
					<div id="botao-fechar">x</div>
				</a>
				<div class="animated fadeIn" id="html">
				</div>		
			</div>

	</main><!-- #main -->

<?php
get_footer();



