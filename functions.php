<?php
/**
 * Odin functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package Odin
 * @since 2.2.0
 */

/**
 * Sets content width.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

/**
 * Odin Classes.
 */
require_once get_template_directory() . '/core/classes/class-bootstrap-nav.php';
require_once get_template_directory() . '/core/classes/class-shortcodes.php';
require_once get_template_directory() . '/core/classes/class-thumbnail-resizer.php';
require_once get_template_directory() . '/core/classes/class-theme-options.php';
require_once get_template_directory() . '/core/classes/class-options-helper.php';
require_once get_template_directory() . '/core/classes/class-post-type.php';
require_once get_template_directory() . '/core/classes/class-taxonomy.php';
// require_once get_template_directory() . '/core/classes/class-metabox.php';
// require_once get_template_directory() . '/core/classes/abstracts/abstract-front-end-form.php';
// require_once get_template_directory() . '/core/classes/class-contact-form.php';
// require_once get_template_directory() . '/core/classes/class-post-form.php';
// require_once get_template_directory() . '/core/classes/class-user-meta.php';

/**
 * Odin Widgets.
 */
require_once get_template_directory() . '/core/classes/widgets/class-widget-like-box.php';

if ( ! function_exists( 'odin_setup_features' ) ) {

	/**
	 * Setup theme features.
	 *
	 * @since  2.2.0
	 *
	 * @return void
	 */
	function odin_setup_features() {

		/**
		 * Add support for multiple languages.
		 */
		load_theme_textdomain( 'odin', get_template_directory() . '/languages' );

		/**
		 * Register nav menus.
		 */
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'odin' ),
				'top-menu' => __( 'Top Menu', 'odin' ),
				'mapacol1-menu' => __( 'Mapa no footer coluna 1 ', 'odin' ),
				'mapacol2-menu' => __( 'Mapa no footer coluna 2', 'odin' ),
				'responsive-menu' => __( 'Responsive Menu', 'odin' )
				
			)
		);

		/*
		 * Add post_thumbnails suport.
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Add feed link.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Support Custom Header.
		 */
		$default = array(
			'width'         => 0,
			'height'        => 0,
			'flex-height'   => false,
			'flex-width'    => false,
			'header-text'   => false,
			'default-image' => '',
			'uploads'       => true,
		);

		add_theme_support( 'custom-header', $default );

		/**
		 * Support Custom Background.
		 */
		$defaults = array(
			'default-color' => '',
			'default-image' => '',
		);

		add_theme_support( 'custom-background', $defaults );

		/**
		 * Support Custom Editor Style.
		 */
		add_editor_style( 'assets/css/editor-style.css' );

		/**
		 * Add support for infinite scroll.
		 */
		add_theme_support(
			'infinite-scroll',
			array(
				'type'           => 'scroll',
				'footer_widgets' => false,
				'container'      => 'content',
				'wrapper'        => false,
				'render'         => false,
				'posts_per_page' => get_option( 'posts_per_page' )
			)
		);

		/**
		 * Add support for Post Formats.
		 */
		// add_theme_support( 'post-formats', array(
		//     'aside',
		//     'gallery',
		//     'link',
		//     'image',
		//     'quote',
		//     'status',
		//     'video',
		//     'audio',
		//     'chat'
		// ) );

		/**
		 * Support The Excerpt on pages.
		 */
		// add_post_type_support( 'page', 'excerpt' );

		/**
		 * Switch default core markup for search form, comment form, and comments to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
			)
		);

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
	}
}

add_action( 'after_setup_theme', 'odin_setup_features' );

/**
 * Register widget areas.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_widgets_init() {
	register_sidebar(
		array(
			'name' => __( 'Main Sidebar', 'odin' ),
			'id' => 'main-sidebar',
			'description' => __( 'Site Main Sidebar', 'odin' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'odin_widgets_init' );

/**
 * Flush Rewrite Rules for new CPTs and Taxonomies.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_flush_rewrite() {
	flush_rewrite_rules();
}

add_action( 'after_switch_theme', 'odin_flush_rewrite' );

/**
 * Load site scripts.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	// Loads Odin main stylesheet.
	wp_enqueue_style( 'odin-style', get_stylesheet_uri(), array(), null, 'all' );
	wp_enqueue_style( 'odin-custom-style', $template_url . '/assets/css/custom.css', array(), null, 'all' );
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Asap', array(), null, 'all' );
	if( is_page_template('page-equipe.php')) { 
		wp_enqueue_script( 'owl-js',$template_url .'/inc/owl-carousel/owl-carousel/owl.carousel.js', array(), null, true );
		wp_enqueue_style( 'owl-style', $template_url .'/inc/owl-carousel/owl-carousel/owl.carousel.css', array(), null, 'all' );
		wp_enqueue_style( 'owl-theme', $template_url .'/inc/owl-carousel/owl-carousel/owl.theme.css', array(), null, 'all' );

 	}
	// jQuery.
	wp_enqueue_script( 'jquery' );

	// General scripts.
		// Bootstrap.
		wp_enqueue_script( 'bootstrap', $template_url . '/assets/js/libs/bootstrap.min.js', array(), null, true );

		// FitVids.
		wp_enqueue_script( 'fitvids', $template_url . '/assets/js/libs/jquery.fitvids.js', array(), null, true );

		// Main jQuery.
		wp_enqueue_script( 'odin-main', $template_url . '/assets/js/main.js', array(), null, true );
	
	// Grunt watch livereload in the browser.
	// wp_enqueue_script( 'odin-livereload', 'http://localhost:35729/livereload.js?snipver=1', array(), null, true );

	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'odin_enqueue_scripts', 1 );

/**
 * Odin custom stylesheet URI.
 *
 * @since  2.2.0
 *
 * @param  string $uri Default URI.
 * @param  string $dir Stylesheet directory URI.
 *
 * @return string      New URI.
 */
function odin_stylesheet_uri( $uri, $dir ) {
	return $dir . '/assets/css/style.css';
}

add_filter( 'stylesheet_uri', 'odin_stylesheet_uri', 10, 2 );

/**
 * Query WooCommerce activation
 *
 * @since  2.2.6
 *
 * @return boolean
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? true : false;
	}
}

/**
 * Core Helpers.
 */
require_once get_template_directory() . '/core/helpers.php';

/**
 * WP Custom Admin.
 */
require_once get_template_directory() . '/inc/admin.php';

/**
 * Comments loop.
 */
require_once get_template_directory() . '/inc/comments-loop.php';

/**
 * WP optimize functions.
 */
require_once get_template_directory() . '/inc/optimize.php';

/**
 * Custom template tags.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
*custom post types
*/
require_once get_template_directory() . '/inc/custom-post.php';
/**
*custom fields
*/
require_once get_template_directory() . '/inc/custom-fields.php';


/**
*options
*/
require_once get_template_directory() . '/inc/options.php';
/**
*mask image
*/
require_once get_template_directory() . '/inc/mask-image.php';
/**
*funcoes do ajax
*/
require_once get_template_directory() . '/inc/ajax-functions.php';


/**
*custom post types
 * WooCommerce compatibility files.
 */
if ( is_woocommerce_activated() ) {
	add_theme_support( 'woocommerce' );
	require get_template_directory() . '/inc/woocommerce/hooks.php';
	require get_template_directory() . '/inc/woocommerce/functions.php';
	require get_template_directory() . '/inc/woocommerce/template-tags.php';
}
add_filter('show_admin_bar', '__return_false');

function strip_shortcode($code, $content)
{
    global $shortcode_tags;

    $stack = $shortcode_tags;
    $shortcode_tags = array($code => 1);

    $content = strip_shortcodes($content);

    $shortcode_tags = $stack;
    return $content;
}

// 
// add_filter(  'gettext',  'change_post_to_portfolio'  );
// add_filter(  'ngettext',  'change_post_to_portfolio'  );
// 
// function change_post_to_portfolio( $translated ) {
//   $translated = str_ireplace(  'Post',  'Notícia',  $translated );
// $translated = str_ireplace(  'Posts',  'Notícias',  $translated );  // ireplace is PHP5 only
//   return $translated;
// }

function custom_menu_page_removing() {
    remove_menu_page( 'edit.php' );
}
add_action( 'admin_menu', 'custom_menu_page_removing' );

function the_excerpt_max_charlength($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '[...]';
	} else {
		echo $excerpt;
	}
}
add_action('wp_footer', 'add_googleanalytics');
function add_googleanalytics() { ?>

	<script>
	 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	 })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	 ga('create', 'UA-67696728-1', 'auto');
	 ga('send', 'pageview');

	</script>
<?php }
add_image_size( 'quadrada', 500, 500, array( 'center', 'center' ) ); // Hard crop left top
// 
// remove_filter( 'the_content', 'wpautop' );
// remove_filter( 'the_excerpt', 'wpautop' );
// 

// function mascara_imagem($post_id){
// 	
// 	$imagens=get_post_gallery_images($post_id);
// 	
// 	if (count($imagens)>=5){
// 		$count=0;
// 		$upload_dir = wp_upload_dir();
// 
// 		$dir_dest = $upload_dir['basedir'].'/mask-img/'.get_the_ID();
// 
// 		if (!file_exists($dir_dest)) {
// 		    mkdir($dir_dest, 0755, true);
// 		} 	
// 
// 
// 		$tamanhos = array( 
// 						array( 420 , 380),
// 						array( 420 , 380),
// 						array( 420 , 195),
// 						array( 220 , 220),
// 						array( 420 , 220),
// 		             );
// 		foreach ($tamanhos as $tamanho){
// 			if ($count == 3){
// 				$foto[$count]= $imagens[$count];
// 				$foto[$count] = image_resize2($foto[$count],$dir_dest.'/foto'.$count.'.png', $tamanho[0], $tamanho[1], 1);
// 				$mask_img3 = get_stylesheet_directory_uri().'/assets/images/mask-img1.png';
// 				$mask_img3 = imagecreatefrompng( $mask_img3 );
// 				$foto[$count] = imagecreatefrompng($dir_dest.'/foto'.$count.'.png' );
// 				imagealphamask( $foto[$count], $mask_img3 );
// 				imagepng( $foto[$count], $dir_dest.'/foto'.$count.'.png');
// 			}
// 			else{
// 				$foto[$count]= $imagens[$count];
// 				$foto[$count] = image_resize2($foto[$count],$dir_dest.'/foto'.$count.'.png', $tamanho[0], $tamanho[1], 1);
// 				
// 			}
// 			$count++;
// 		}
// 	}
// 
// }
// add_action( 'save_post_escola', 'mascara_imagem' );
// 
// 
// function my_acf_save_post( $post_id ) {
// 	$upload_dir = wp_upload_dir();
// 	
// 	$dir_dest = $upload_dir['basedir'].'/mask-img/'.get_the_ID();
// 	if (!file_exists($dir_dest)) {
// 	    mkdir($dir_dest, 0755, true);
// 	} 	
// 	
// 	    $thumb_video = get_field('thumbnail_do_video', $post_id, true);
// 	if ($thumb_video['url'] !=""){
// 		$thumb_video = image_resize2($thumb_video['url'],$dir_dest.'/thumb_video.png', 420, 195, 1);
// 		$mask_video = get_stylesheet_directory_uri().'/assets/images/mask-thumb-video.png';
// 		$mask_video = imagecreatefrompng( $mask_video );
// 		$thumb_video = imagecreatefrompng($dir_dest.'/thumb_video.png' );
// 	   	imagealphamask( $thumb_video, $mask_video );
// 	  	imagepng( $thumb_video, $dir_dest.'/thumb_video.png');
// 		
// 	}
// 	
// 	   	
// 	    $foto_redonda = get_field('imagem_redonda', $post_id, true);
// 	if ($foto_redonda !=""){
// 		$foto_redonda = image_resize2($foto_redonda,$dir_dest.'/foto_redonda.png', 200, 200, 1);
// 		$mask_redonda = get_stylesheet_directory_uri().'/assets/images/mask-redonda.png';
// 		$mask_redonda = imagecreatefrompng( $mask_redonda );
// 		$foto_redonda = imagecreatefrompng($dir_dest.'/foto_redonda.png' );
// 		imagealphamask( $foto_redonda, $mask_redonda );
// 		imagepng( $foto_redonda, $dir_dest.'/foto_redonda.png');
// 	}
// 	
// 	
// 	$foto_redonda_geral = get_field('foto_redonda_geral', $post_id, true);
// 	if ($foto_redonda_geral !=""){
// 		$foto_redonda_geral = image_resize2($foto_redonda_geral,$dir_dest.'/foto_redonda_geral.png', 200, 200, 1);
// 		
// 		$mask_redonda = get_stylesheet_directory_uri().'/assets/images/mask-redonda.png';
// 		
// 		$mask_redonda = imagecreatefrompng( $mask_redonda );
// 		
// 		$foto_redonda_geral = imagecreatefrompng($dir_dest.'/foto_redonda_geral.png' );
// 		
// 		imagealphamask( $foto_redonda_geral, $mask_redonda );
// 		imagepng( $foto_redonda_geral, $dir_dest.'/foto_redonda_geral.png');
// 		// echo '<script>alert("'.imagepng( $foto_redonda_geral, $dir_dest.'/foto_redonda_geral.png').'")</script>';
// 		
// 	}
// }

// add_action('acf/save_post', 'my_acf_save_post', 20);
// echo '<script>alert("'.$foto[$count].'")</script>';

function custom_posts_per_page($query) {
   
    if (is_search()) {
        $query->set('posts_per_page', -1);
    }
    
} //function

//this adds the function above to the 'pre_get_posts' action     
add_action('pre_get_posts', 'custom_posts_per_page');

add_image_size( 'foto0', 420, 380, array( 'left', 'top' ) ); // Hard crop left top
add_image_size( 'foto1', 420, 380, array( 'left', 'top' ) ); // Hard crop left top
add_image_size( 'foto2', 420, 195, array( 'left', 'top' ) ); // Hard crop left top
add_image_size( 'foto3', 420, 220, array( 'left', 'top' ) ); // Hard crop left top
add_image_size( 'foto4', 420, 220, array( 'left', 'top' ) ); // Hard crop left top
add_image_size( 'redonda', 220, 220, array( 'left', 'top' ) ); // Hard crop left top


function drop_tags($nome,$tax)
{?>
		<?php wp_dropdown_categories( 'show_option_none='.$nome.'&option_none_value=&taxonomy='.$tax.'&show_count=1&class=ajax-filtro-materiais taxonomia&id='.$tax.'&name='.$tax.'&include='.$include.'&option_none_value=0&selected='.$selected ); ?>
<?php
}