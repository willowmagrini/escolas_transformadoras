<div class="inline-block cada-equipe">
	<?php
	 	?>
		<div>
			<?php if($post->post_content != "") {
				?>
			<a data-id="<?php echo $post->ID;?>" href="<?php the_permalink()?>">
			
		<?php 
			echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); 
		?>
		</a>
		<?php
				}
				else{
					echo get_the_post_thumbnail( $post->ID, 'thumbnail' );
				}
			?>
		</div>
		<?php if($post->post_content != "") {
			?>
			<a data-id="<?php echo $post->ID;?>" href="<?php the_permalink()?>">
				<?php echo get_the_title();?>
			</a>
			<?php
		}
		else{
			echo get_the_title();
			
		}
			?>
		
		<p>
		<?php 
			echo get_field('cargo');
		?>
		</p>
	
</div>