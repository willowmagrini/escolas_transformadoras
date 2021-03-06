<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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
			<?php
		 		$url= esc_url( get_permalink() ); 
				$path= parse_url($url, PHP_URL_PATH);
				$path = explode('/',parse_url($url, PHP_URL_PATH));
				$lang=$path[1];
				$url = str_replace("/".$lang."/","/", $url);
				
				
			?>
			<div class="fb-comments" data-href="<?php echo $url?>" data-width="100%" data-numposts="5"></div>
		</main><!-- #main -->
	
		 
		<?php 
get_footer();
