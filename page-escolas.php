<?php
/**
 * Template Name: Escolas Transformadoras
 *
 * @package Odin
 * @since 2.2.0
 */

get_header('escolas'); ?>
<div class="row conteudo-citacao">
	<div class="inline-block" id="citacao">
		<form>
			<input type="text" id="filtro-pais" name="pais" placeholder="País"></input>
			<input type="text" id="filtro-cidade" name="cidade" placeholder="Cidade"></input>
			<input type="text" id="filtro-palavra" name="palavra" placeholder="Palavra-Chave"></input>
			<input type="submit" id="filtro-enviar" name="enviar" placeholder="Enviar"></input>		
		</form>
	</div>
</div><!-- .row.conteudo-citacao -->

<?php
$posts = get_posts(array(
	'posts_per_page' => 1,
	'post_type' => 'escola',
	'meta_query' => array(
		array(
			'key' => 'destaque',
			'value' => '1',
			'compare' => '==',

		)
	)
));
if( $posts )
{
	foreach( $posts as $post )
	{
		setup_postdata( $post );
		?>
			<a href="<?php the_permalink()?>">
				<?php 
				the_title();
				echo get_the_excerpt();
				
				?>
				
			</a>
		<?php
	}
	wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
}
?>
	
	<?php
	get_footer();