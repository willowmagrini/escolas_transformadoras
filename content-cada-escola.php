<div class="col-sm-3 cada-escola  animated fadeIn">
	<a href="<?php the_permalink()?>">
		<div class='img-redonda '>
				<?php
				$dir = get_template_directory().'/assets/images/'.get_the_ID();
				if (!file_exists($dir)) {
				    mkdir($dir, 0755, true);
				}
				if (!file_exists($dir.'/dest_single.png')) {
					fopen($dir.'/dest_single.png', "x");
				}

				if (get_post_type( get_the_ID() )=='escola'){
					$foto_escola = get_field( "imagem_redonda" );
				}
				else{
					$foto_escola = get_field( "foto_redonda_geral" );
				}

				if(strlen($foto_escola)>3){
					$dest =  '/assets/images/'.get_the_ID().'/dest_single.png';
				 	$foto_escola = image_resize2($foto_escola, get_template_directory().$dest, '200', '200', 1);
					if(getimagesize( get_template_directory().$dest)){
						$mask = get_stylesheet_directory_uri().'/assets/images/mask-redonda.png';
						$mask = imagecreatefrompng( $mask );
						$dest = imagecreatefrompng( get_template_directory_uri().$dest );

						imagealphamask( $dest, $mask );
						imagepng( $dest, get_template_directory().'/assets/images/'.get_the_ID().'/dest_single.png' );
						imagedestroy($dest);
						?>
						<img src="<?php echo get_template_directory_uri().'/assets/images/'.get_the_ID().'/dest_single.png'; ?>"alt="" />
					<?php
					}
					
				}
			 	?>
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