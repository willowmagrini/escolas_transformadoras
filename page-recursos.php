<?php
/**
 * Template Name: recursos
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(''); ?>

<main id="content" class="pagina-itens <?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">
	<div class="row" id="ajax-itens">
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
				<div class="clearfix"></div>
				<div class="row pagination">
					<?php
					$big = 999999999; // need an unlikely integer

					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $WP_Query_escola->max_num_pages
					) );
					?>
				</div>
				<div class="clearfix"></div>
			<br>
	</div> <!-- id="escolad" -->

		<?php
		}
		
	wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
?>
	
</main>
	<?php get_footer();