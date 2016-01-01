<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>
	<main id="content" class="pagina <?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile;
			?>
			<div class='paginacao'>
				<div id="post-anterior" class=" paginacao-single" >
			 		<?php previous_post_link('%link','<div class="seta-pag "></div>
					'. __(' Anterior','odin')); ?> 
				</div>
				<div id="post-seguinte" class=" paginacao-single">
					<?php next_post_link('%link', __('Próximo ','odin').'<div class="seta-pag "></div>'); ?> 
				</div>
			</div>
		</main><!-- #main -->
	
		 
		<?php 
get_footer();
