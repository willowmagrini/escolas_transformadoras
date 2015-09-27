<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

	<main id="content" class="pagina <?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">
			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'odin' ), get_search_query() ); ?></h1>
				</header><!-- .page-header -->

					<?php
					$html=array();
						// Start the Loop.
						while ( have_posts() ) : the_post();

							/*
							 * Include the post format-specific template for the content. If you want to
							 * use this in a child theme, then include a file called called content-___.php
							 * (where ___ is the post format) and that will be used instead.
							 */
							get_template_part( 'content', 'search');
						
							
							

						endwhile;
						if ($html['escola']!=''){
							echo '<div class="row pesquisa-grupos"><h2>Escolas:</h2>'.$html['escola'].'</div>';
							
						}
						
						if ($html['recurso']!=''){
							echo '<div class="row pesquisa-grupos"><h2>Recursos:</h2>'.$html['recurso'].'</div>';
							
						}
						
						if ($html['experiencia']!=''){
							echo '<div class="row pesquisa-grupos"><h2>Experiências:</h2>'.$html['experiencia'].'</div>';
							
						}
						
						if ($html['noticia']!=''){
							echo '<div class="row pesquisa-grupos"><h2>Notícias:</h2>'.$html['noticia'].'</div>';
							
						}
						
						// Post navigation.
						odin_paging_nav();
					else :
						// If no content, include the "No posts found" template.
						get_template_part( 'content', 'none' );

				endif;
			?>

	</main><!-- #main -->

<?php
get_footer();
