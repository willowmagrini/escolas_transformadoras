jQuery(document).ready(function($) {
	// fitVids.
	$( '.entry-content' ).fitVids();
	$('#maps').fitVids({ customSelector: "iframe" });
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
		};
		var meta = {};
		
		$( "select option:selected" ).each(function() {
			meta_key = ($( this ).parent().attr('data-filtro'));
			meta_value = ($( this ).attr('value'));
			if (meta_value != ""){
				meta[meta_key] = meta_value;
			}
		});
		data.meta = meta;
		console.log(data);
		
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
				$(elem).attr('data-estado-botao','sumido')
				
			}
		});

	});
	//ajax escolas
	
	
	//ajax filtros

	$('.btn-ajax-filtro').change(function(e){
		var meta = {};
		var data = {'action': 'escola_filtra_posts'};
		data.gatilho = $( this ).attr('data-filtro');
		
		$( "select option:selected" ).each(function() {
			
			meta_key = ($( this ).parent().attr('data-filtro'));
			meta_value = ($( this ).attr('value'));
			if (meta_value != ""){
				meta[meta_key] = meta_value;
			}
		});
		
		data.meta = meta;
		id=$(this).attr("id");

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
				if (obj.pais != ""){
					$('#filtro-pais option[value="'+obj.pais+'"]').attr('selected','selected');
					
				}
				estado_botao = $('.btn-loadmore').attr('data-estado-botao');
				$('.btn-loadmore').attr('data-max-paged',obj.max_pages);
				$('.btn-loadmore').attr('data-paged',2);
				if( 2 > obj.max_pages && estado_botao =='aparecido'){
					$('.btn-loadmore').fadeOut('slow');
					$('.btn-loadmore').attr('data-estado-botao','sumido')
				}
				else if ( 2 <= obj.max_pages && estado_botao =='sumido'){
					$('.btn-loadmore').fadeIn('slow');
					$('.btn-loadmore').attr('data-estado-botao','aparecido')
				}
				$(selector).html(obj.html);
				
				
				
				
			},
		});
	});
	//ajax filtros
	
});

