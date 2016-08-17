<div class="col-sm-3 cada-escola  animated fadeIn">
	<a href="<?php the_permalink()?>">
		<div class='img-redonda '>
			<?php 
				$upload_dir = wp_upload_dir();
				$url= $upload_dir['baseurl']."/mask-img/".get_the_ID();
				$caminho = $upload_dir['basedir']."/mask-img/".get_the_ID();
				
				if (file_exists($caminho.'/foto_redonda.png')){
				
			?>
			<img src="<?php echo $url.'/foto_redonda.png'; ?>"alt="" />
					
					<?php  }
				elseif (get_field('imagem_redonda')!="") {
				$image = get_field('imagem_redonda');
				
				$image_url = $image['sizes']['redonda'];
 
				?>
			<img src="<?php echo $image_url;?>" alt="" />
				<?php 
				}
				else{
					?>
			<img src="<?php echo get_template_directory_uri();?>/assets/images/sem-foto.png" alt="" />
			<?php 	}?>
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