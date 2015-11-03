<div class="inline-block cada-equipe">
	<?php
	 	?>
		<div>
		<?php 
			echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); 
		?>
		</div>
		<a data-id="<?php echo $post->ID;?>" href="<?php the_permalink()?>">
			<?php echo get_the_title();
			?>
		</a>
		<?php 
			echo the_excerpt();
		?>
	
</div>