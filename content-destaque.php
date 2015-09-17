<div class="row destaque-escolas">
		<?php
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$args = array(
			'post_type' => 'escola',
			'paged'=> $paged,
			'posts_per_page' =>1,
			'meta_key'=>'destaque',
			'meta_value'=> true
		);
		$WP_Query_escola = new WP_Query( $args );
	
		if( $WP_Query_escola->have_posts()  )
		{
			
			while ( $WP_Query_escola->have_posts() ) 
			{
				$WP_Query_escola->the_post();
				$dir = get_template_directory().'/assets/images/'.get_the_ID();
				if (!file_exists($dir)) {
				    mkdir($dir, 0755, true);
				}
				if (!file_exists($dir.'/dest.png')) {
					fopen($dir.'dest.png', "x");
				}
				$foto3 = wp_get_attachment_url( get_post_thumbnail_id() );
			 	$dest =  '/assets/images/'.get_the_ID().'/dest.png';
			 	$foto3 = image_resize2($foto3, get_template_directory().$dest, '950', '450', 1);
				$mask = get_stylesheet_directory_uri().'/assets/images/mask-destaque.png';

				$mask = imagecreatefrompng( $mask );
				$dest = imagecreatefrompng( get_template_directory_uri().$dest );
				$src = get_stylesheet_directory_uri().'/assets/images/transparencia-destaque.png';
				$src = imagecreatefrompng( $src );
				imagealphablending($dest, false);
				imagesavealpha($dest, true);
				imagecopymerge($dest, $src, 500, 0, 0, 0, 450, 450, 70); //have to play with these numbers for it to work for you,
				imagealphamask( $dest, $mask );
				imagepng( $dest, get_template_directory().'/assets/images/'.get_the_ID().'/dest.png' );
				imagedestroy($dest);
				imagedestroy($src);
			}
		}
			?>
				<img src="<?php echo get_template_directory_uri().'/assets/images/'.get_the_ID().'/dest.png'; ?>"alt="" />
				<div id="destaque-info">
					<h5>destaque</h5>
					<a href="<?php the_permalink()?>">
					
					<?php the_title( '<h3 class=" entry-title">', '</h3>' );?>
					</a>
					
					<p><?php echo the_excerpt_max_charlength(140);?></p>
					<a href="<?php the_permalink()?>">
						<img id="seta-destaque" src="<?php echo get_template_directory_uri().'/assets/images/seta-destaque.png'; ?>"alt="" />
					</a>
					
					
				</div>
	</div>