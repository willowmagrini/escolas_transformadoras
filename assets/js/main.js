jQuery(document).ready(function($) {
	// fitVids.
	$( '.entry-content' ).fitVids();
	$('#maps').fitVids({ customSelector: "iframe" });
	$( '#modal-conteudo' ).fitVids();

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

	$("#abre-fecha a .abre").click(function(e){
		e.preventDefault();
		$( "#titulo-conteudo" ).removeClass( "fechado" ).addClass( "aberto" );
		$(this).hide();
		$('.fecha').show();
			
	});
	$("#abre-fecha a .fecha").click(function(e){
		e.preventDefault();
		$(this).hide();
		$('.abre').show();
		$( "#titulo-conteudo" ).removeClass( "aberto" ).addClass( "fechado" );

	});
//ajax escolas

	$('.page-template-page-escolas .btn-loadmore').on('click',function(e){
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
	//ajax itens

		$('.pagina-itens .btn-loadmore').on('click',function(e){
			var data = {
				'action': 'itens_load_posts',
				'paged': $(this).attr('data-paged'),
			};
			var meta = {};

			
				
			var default_html = $(this).html();
			$(this).html($(this).attr('data-loading'));
			var elem = this;
			data.type = $(elem).attr('data-type');
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
		//ajax itens
	
	
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
		console.log(data)

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
				$(selector).scrollView();
				
				
				
				
			},
		});
	});
	//ajax filtros
	
	////tabs e filtro mapa///
	$(".btn-filtro-mapa").click(function(e) {
		e.preventDefault();
		filtro=$(this).attr('data-filtro');
		$('.btn-filtro-mapa').attr('data-estado','inativo');
		$('.texto-filtro-mapa').attr('data-estado','inativo');
		$('.btn-filtro-mapa[data-filtro="'+filtro+'"]').attr('data-estado','ativo');
		$('.texto-filtro-mapa[data-filtro="'+filtro+'"]').attr('data-estado','ativo');
		
		// $('.btn-filtro-mapa[data-estado="ativo"]').attr('data-estado','inativo')
		// 	$(this).attr('data-estado','ativo');
		mapa=$('#maps iframe').attr('data-filtro');
	
		if (mapa != filtro){
			$('#maps iframe').attr('data-filtro', filtro);
			alternativo = $('#maps iframe').attr('data-alternativo');
			src=$('#maps iframe').attr('src');
			$('#maps iframe').attr('data-alternativo',src);
			$('#maps iframe').attr('src',alternativo);
			
		}
			
		
	});
	
	
	$.fn.scrollView = function () {
	    return this.each(function () {
	        $('html, body').animate({
	            scrollTop: $(this).offset().top
	        }, 1000);
	    });
	}
	$('#link-video-escola').click(function(e) {
		e.preventDefault();
		$('#fundo-modal').attr('modal-estado','ativo');
		$('#modal-conteudo').attr('modal-estado','ativo');
		$('#modal-conteudo')click(function(a) {
			a.preventDefault();}
		}
		$('#botao-fechar').click(function(f) {
			f.preventDefault();
			url = $('#modal-conteudo iframe').attr('src');
			$('#modal-conteudo iframe').attr('src','');
		
			$('#fundo-modal').attr('modal-estado','inativo');
			$('#modal-conteudo').attr('modal-estado','inativo');
			$('#modal-conteudo iframe').attr('src',url);
			
			
		});
		function pausecomp(millis)
		 {
		  var date = new Date();
		  var curDate = null;
		  do { curDate = new Date(); }
		  while(curDate-date < millis);
		}
		
		
	});
	
});

