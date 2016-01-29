<div class="col-sm-3  item  animated fadeIn">
		<div class='  item-imagem'>
				<?php $tipo = get_field('tipo'); 
				$dataAttr="";
				
				switch ($tipo) {
				    case "Link":
				    $link=get_field('link_material')['url'];
					    
					?>
						<a target="_blank" href="<?php echo $link;?>">
							<?php the_post_thumbnail('full', array('class' => "thumb"));?>
							
							<img class="tipo animated fadeIn" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-link.png">";
						</a>
						
				        <?php 
						break;
				    case "PDF":
						$link=get_field('pdf');?>
						<a target="_blank" href="<?php echo $link;?>">
							<?php the_post_thumbnail('full', array('class' => "thumb"));?>
							
							<img class="tipo animated fadeIn" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-pdf.png">";
						</a>
				        <?php 					       
				 		break;
				    case "Vídeo":
						$link="#";#;
						$video=get_field("video");
						$videos[$post->ID]=$video->html;
						?>
						<a class="link-video-material" data-postID="<?php echo $post->ID?>" href="#">
							<?php the_post_thumbnail('full', array('class' => "thumb link-video-material"));?>
							
							<img class="link-video-material tipo animated fadeIn" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-video.png">";
						</a>
				    	<?php					       
				        break;
				}
				?>
		</div>
		<div class=" item-descricao">
			<div class="resumo animated fadeIn">
				<a href="<?php echo $link;?>">
					<?php echo get_the_excerpt();?>
				</a>
				
			</div>
			<div class="item-titulo animated fadeIn">
				<a href="<?php echo $link;?>">
					<?php echo get_the_title();?>
				</a>
			</div>
			<div class="item-autor animated fadeIn">
				<?php 
				$term_list = wp_get_post_terms($post->ID, 'autor', array("fields" => "all"));
				foreach ($term_list as $term){
					echo $term->name;
					if ($term !== end($term_list)){
				        echo ', ';
					}
				}
				?>
			</div>
			<div class="item-tema animated fadeIn">
				<?php 
				// $term_list = wp_get_post_terms($post->ID, 'tema', array("fields" => "all"));
				// foreach ($term_list as $term){
				// 	echo $term->name;
				// 	if ($term !== end($term_list)){
				//         echo ', ';
				// 	}
				// }
				?>
			</div>				
		</div>
		<?php 	

		?>
	</a>
</div><!-- cada escola -->