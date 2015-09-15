<?php
/**
 * Template Name: recursos
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(''); ?>

<main id="content" class="<?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">
	<div class="row" id="ajax-escolas">
		<?php
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$args = array(
			'post_type' => 'recurso',
			'paged'=> $paged,
			'posts_per_page' =>8
		);
	
		$WP_Query_escola = new WP_Query( $args );
	
		if( $WP_Query_escola->have_posts()  )
		{
			
			while ( $WP_Query_escola->have_posts() ) 
			{
				$WP_Query_escola->the_post();
				?>
				<?php get_template_part('content','todos');
				
				
			}
		
			?>
	</div> <!-- id="escolad" -->
	
	
</main>
	<?php get_footer();