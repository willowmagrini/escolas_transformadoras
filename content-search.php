<?php global $html;
	$html[get_post_type( get_the_ID() )] .= '<div class="col-sm-12 cada-item-busca  row animated fadeIn">
		<div class=" col-sm-4 item-imagem">
		</div>
		<div class="col-sm-12 item-busca">
			<a href="'.get_the_permalink().'">
				'.get_the_title().'
			</a>				
		</div>
		
	</a>
</div><!-- cada escola -->';
?>
