<div class="col-sm-3 cada-escola animated fadeIn">
	<a href="<?php the_permalink()?>">
		<div class='img-redonda '>
			<img src="<?php 
				echo get_field( "imagem_redonda" );
			?>">	
		</div>
		<?php echo the_title();?>
		
		
		<?php 	
		
		// echo '<pre>';
		// 						echo '</pre>';
		
		?>
	</a>
</div><!-- escola-destaque -->