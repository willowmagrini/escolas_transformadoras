jQuery(document).ready(function($) {
	// fitVids.
	$( '.entry-content' ).fitVids();

	// Responsive wp_video_shortcode().
	$( '.wp-video-shortcode' ).parent( 'div' ).css( 'width', 'auto' );

	/**
	 * Odin Core shortcodes
	 */

	// Tabs.
	$( '.odin-tabs a' ).click(function(e) {
		e.preventDefault();
		$(this).tab( 'show' );
	});

	// Tooltip.
	$( '.odin-tooltip' ).tooltip();
	// altura_img_header=$('#img-header').css('height');
	// $('#header .container').css('height',altura_img_header);

//ajax escolas

	$('.btn-loadmore').on('click',function(e){
		var data = {
			'action': 'escola_load_posts',
			'paged': $(this).attr('data-paged'),
			'category': $(this).attr('data-category')
		};
		var default_html = $(this).html();
		$(this).html($(this).attr('data-loading'));
		var elem = this;
		var selector = $(elem).attr('data-selector');
		$.post(odin_main.ajaxurl, data, function(response) {
			$(selector).append(response);
			$(elem).html(default_html);
			var paged = parseInt($(elem).attr('data-paged')) + 1;
			var max_paged = parseInt($(elem).attr('data-max-paged'));
			$(elem).attr('data-paged',paged);
			if(paged > max_paged){
				$(elem).fadeOut('slow');
			}
		});

	});
	//ajax escolas
	
	
	//ajax filtros

	$('.btn-ajax-filtro').change(function(e){
		var_pais_value
		var meta_key = $(this).attr("data-filtro");
		id=$(this).attr("id");
		$( "#"+id+" option:selected" ).each(function() {
		 	meta_value=$( this ).attr('value');
		});
		var data = {
			'action': 'escola_filtra_posts',
			'meta_key': meta_key,
			'meta_value': meta_value
		};
		console.log(data);
		var elem = this;
		var selector = $('.btn-loadmore').attr('data-selector');
		$.ajax({
			type: 'POST',
			url: odin_main.ajaxurl,
			data: data,
			dataType: 'json',
			complete: function(response){
				var obj = $.parseJSON(response.responseText);
				if (obj.cidades != ""){
					$('#filtro-cidade').html(obj.cidades);
				}
				$(selector).html(obj.html);
				
				
				
			},
		});
	});
	//ajax filtros
	
});

