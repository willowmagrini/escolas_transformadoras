<div class="col-sm-12 cada-item  row animated fadeIn">
		<div class=' col-sm-4 item-imagem'>
			<a href="<?php the_permalink()?>">
				<img src="<?php echo get_field( "foto_redonda_geral" );?>">
			</a>
		</div>
		<div class="col-sm-7 item-nome">
			<a href="<?php the_permalink()?>">
				<?php echo get_the_title();?>
			</a>				
		</div>
		<?php 	

		?>
	</a>
</div><!-- cada escola -->