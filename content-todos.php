<div class="col-sm-12 cada-item  row animated fadeIn">
		<div class=' col-sm-4 item-imagem'>
			<a href="<?php the_permalink()?>">
				<?php
				$dir = get_template_directory().'/assets/images/'.get_the_ID();
				if (!file_exists($dir)) {
				    mkdir($dir, 0755, true);
				}
				if (!file_exists($dir.'/dest.png')) {
					fopen($dir.'/dest.png', "x");
				}

				if (get_post_type( get_the_ID() )=='escola'){
					$foto3 = get_field( "imagem_redonda" );
				}
				else{
					$foto3 = get_field( "foto_redonda_geral" );
				}

				if(strlen($foto3)>3){
					$dest =  '/assets/images/'.get_the_ID().'/dest.png';
				 	$foto3 = image_resize2($foto3, get_template_directory().$dest, '200', '200', 1);
					if(getimagesize( get_template_directory().$dest)){
						$mask = get_stylesheet_directory_uri().'/assets/images/mask-redonda.png';
						$mask = imagecreatefrompng( $mask );
						$dest = imagecreatefrompng( get_template_directory_uri().$dest );

						imagealphamask( $dest, $mask );
						imagepng( $dest, get_template_directory().'/assets/images/'.get_the_ID().'/dest.png' );
						imagedestroy($dest);
						?>
						<img src="<?php echo get_template_directory_uri().'/assets/images/'.get_the_ID().'/dest.png'; ?>"alt="" />
					<?php
					}
					
				}
			 	?>
				
				
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