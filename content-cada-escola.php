<div class="col-sm-3 cada-escola  animated fadeIn">
	<a href="<?php the_permalink()?>">
		<div class='img-redonda '>
			<img src="<?php 
				echo get_field( "imagem_redonda" );
			?>">	
		</div>
		<div class="escola-nome">
			<?php echo the_title();?>
		</div>
		<div class="escola-cidade">
			<?php echo get_field( "cidade" );?> / <?php echo get_field( "estado" );?>
		</div>
		<div class="escola-pais">
			<?php echo get_field( "pais" );?>
		</div>
		<?php 	

		?>
	</a>
</div><!-- cada escola -->