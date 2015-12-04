<div class="col-sm-12 cada-item  row animated fadeIn">
		<div class=' col-sm-4 item-imagem'>
			<a href="<?php the_permalink()?>">
				
				
				<?php 
					$upload_dir = wp_upload_dir();
					$url= $upload_dir['baseurl']."/mask-img/".get_the_ID();
					$caminho = $upload_dir['basedir']."/mask-img/".get_the_ID();

					if (file_exists($caminho.'/foto_redonda_geral.png')){

				?>
				<img src="<?php echo $url.'/foto_redonda_geral.png'; ?>"alt="" />

						<?php  }
						else if (file_exists(get_template_directory().'/assets/images/'.get_the_ID().'/dest.png')){
							?>
							<img src="<?php echo get_template_directory_uri().'/assets/images/'.get_the_ID().'/dest.png';?>" alt="" />
							<?php
						}
						
						else{
						?>
				<img src="<?php echo get_template_directory_uri();?>/assets/images/sem-foto.png" alt="" />
				<?php 	}?>
				
				
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