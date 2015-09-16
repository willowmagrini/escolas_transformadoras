<?php
/**
 * Template Name: experiencias
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
			'post_type' => 'experiencia',
			'paged'=> $paged,
			'posts_per_page' =>4
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
	<a data-type="experiencia" class="btn btn-loadmore" data-estado-botao="aparecido" data-paged="2" data-loading="<img src='<?php echo get_template_directory_uri(); ?>/assets/images/ajax-loader.gif'>" data-selector="#ajax-itens" data-max-paged="<?php echo $WP_Query_escola->max_num_pages;?>" style="<?php if ($WP_Query_escola->max_num_pages<2){echo 'display:none;';}?>" data-category="all">
		<?php echo __('Mais experiências ','odin'); ?>
		<img class="" src="<?php echo get_template_directory_uri(); ?>/assets/images/btn-loadmore-seta.png">
		
	</a>
		
		<?php
		}
		
	wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
?>
	<div class="row conte-sua">
		<div class="img-conte sem-margem col-sm-4">
			<img class="" src="<?php echo get_template_directory_uri(); ?>/assets/images/img-conte.png">
		</div>
		<div class="col-sm-4 link-conte">
				<h2><?php echo __('Envie sua estória','odin');?></h2>
				<a href="http://escolastransformadoras.com.br/contato/">
					<img class="botao-conte" src="<?php echo get_template_directory_uri(); ?>/assets/images/botao-conte.png">
				</a>
		</div>
		<div class="col-sm-4 boneco-conte">
			<img class="" src="<?php echo get_template_directory_uri(); ?>/assets/images/boneco-conte.png">
		</div>
	</div>
</main>

	<?php get_footer();