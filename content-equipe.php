<div class="inline-block cada-equipe">
	<?php
	 	?>
		<div>
			<a data-id="<?php echo $post->ID;?>" href="<?php the_permalink()?>">
			
		<?php 
			echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); 
		?>
		</a>
		
		</div>
		<a data-id="<?php echo $post->ID;?>" href="<?php the_permalink()?>">
			<?php echo get_the_title();
			?>
		</a>
		<p>
		<?php 
			echo the_excerpt();
		?>
		</p>
	
</div>