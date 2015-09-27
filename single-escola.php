<?php
/**
 * The Template for displaying escolas
 *
  */

get_header(); ?>

	<div id="primary" class="<?php echo odin_classes_page_full(); ?>">
		<main id="main-content" class="site-main" role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					
					get_template_part( 'content', 'escola' );

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
	</div><!-- #primary -->

<?php
get_footer();
