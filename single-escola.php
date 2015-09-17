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
			<div id="post-anterior" class="inline-block paginacao-single" >
			 		<?php previous_post_link('%link','<div class="seta-pag inline-block"></div>
					'. __(' Anterior','odin')); ?> 
			</div>
			<div id="post-seguinte" class="inline-block paginacao-single">
				<?php next_post_link('%link', __('Próximo 
				','odin').'<div class="seta-pag inline-block"></div>'); ?> 
				
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
