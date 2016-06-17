<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till #main div
 *
 * @package Odin
 * @since 2.2.0
 */
?><!DOCTYPE html>
<?php $odin_footer_opts = get_option( 'odin_footer' );?>

<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<!-- <body <?php body_class('front-page home'); ?>> -->

<body class=" page-id-2 page-template page-template-page-frontpage page-template-page-frontpage-php logged-in front-page home">
	<a id="skippy" class="sr-only sr-only-focusable" href="#content"><div class="container"><span class="skiplink-text"><?php _e( 'Skip to content', 'odin' ); ?></span></div></a>

	<header id="header" role="banner">
		<div class="container sem-padding">
			
			<div class="page-header sem-margem col-md-3">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img id="logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png">
						
					</a>
			</div><!-- .site-header-->
			<div id="menus" class="col-md-9 sem-margem">
				<div id="top-navigation" class="navbar navbar-default">
				<div class="socials-header">
					<?php if ($odin_footer_opts['face']!=""){?>
						<a target=_blank  href="<?php echo $odin_footer_opts['face'];?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/face-azul.png">          </a>
					<?php }?>
					<?php if ($odin_footer_opts['twitter']!=""){?>
						<a target=_blank  href="<?php echo $odin_footer_opts['twitter'];?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter-azul.png">    </a>
					<?php }?>
					<?php if ($odin_footer_opts['flicker']!=""){?>
						<a target=_blank  href="<?php echo $odin_footer_opts['flicker'];?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/flicker-azul.png">    </a>
						
					<?php }?>
					<?php if ($odin_footer_opts['youtube']!=""){?>
						<a target=_blank  href="<?php echo $odin_footer_opts['youtube'];?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/youtube-azul.png">    </a>
						
					<?php }?>
				</div>
				
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-navigation">
						<span class="sr-only"><?php _e( 'Toggle navigation', 'odin' ); ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand visible-xs-block" href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</div>
					<nav class="collapse navbar-collapse navbar-main-navigation" role="navigation">
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'top-menu',
									'depth'          => 2,
									'container'      => false,
									'menu_class'     => 'nav navbar-nav',
									'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
									'walker'         => new Odin_Bootstrap_Nav_Walker()
								)
							);
						?>
						<form method="get" class="navbar-form navbar-right" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
							<label for="navbar-search" class="sr-only"><?php _e( 'Search:', 'odin' ); ?></label>
							<div class="form-group">
								<input id="busca-home" type="search" class="form-control" name="s" id="navbar-search" />
							</div>
							<button type="submit" style="display:none;height:0;width:0;border:0;padding:0;" class="btn btn-default"></button>
						</form>
					</nav><!-- .navbar-collapse -->
				</div><!-- #secondary-navigation-->
			
				<div id="main-navigation" class="navbar navbar-default">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-navigation">
						<span class="sr-only"><?php _e( 'Toggle navigation', 'odin' ); ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand visible-xs-block" href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</div>
					<nav class="collapse navbar-collapse navbar-main-navigation" role="navigation">
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'main-menu',
									'depth'          => 2,
									'container'      => false,
									'menu_class'     => 'nav navbar-nav',
									'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
									'walker'         => new Odin_Bootstrap_Nav_Walker()
								)
							);
						?>
					</nav><!-- .navbar-collapse -->
				</div><!-- #main-navigation-->
		
				<div id="responsive-navigation" class="navbar navbar-default">
					<div class="socials-header">
						<?php if ($odin_footer_opts['face']!=""){?>
							<a target=_blank  href="<?php echo $odin_footer_opts['face'];?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/face-azul.png">          </a>
						<?php }?>
						<?php if ($odin_footer_opts['twitter']!=""){?>
							<a target=_blank  href="<?php echo $odin_footer_opts['twitter'];?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter-azul.png">    </a>
						<?php }?>
						<?php if ($odin_footer_opts['flicker']!=""){?>
							<a target=_blank  href="<?php echo $odin_footer_opts['flicker'];?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/flicker-azul.png">    </a>
							
						<?php }?>
						<?php if ($odin_footer_opts['youtube']!=""){?>
							<a target=_blank  href="<?php echo $odin_footer_opts['youtube'];?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/youtube-azul.png">    </a>
							
						<?php }?>
					</div>
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-navigation">
						<span class="sr-only"><?php _e( 'Toggle navigation', 'odin' ); ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand visible-xs-block" href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</div>
					<nav class="collapse navbar-collapse navbar-main-navigation" role="navigation">
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'responsive-menu',
									'depth'          => 2,
									'container'      => false,
									'menu_class'     => 'nav navbar-nav',
									'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
									'walker'         => new Odin_Bootstrap_Nav_Walker()
								)
							);
						?>
						<form method="get" class="navbar-form navbar-right" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
							<label for="navbar-search" class="sr-only"><?php _e( 'Search:', 'odin' ); ?></label>
							<div class="form-group">
								<input type="search" class="form-control" name="s" id="navbar-search" />
							</div>
							<button type="submit" class="btn btn-default"><?php _e( 'Search', 'odin' ); ?></button>
						</form>
					</nav><!-- .navbar-collapse -->
				</div><!-- #secondary-navigation-->
			</div><!-- #menus -->
			
			<?php 
			    echo do_shortcode("[metaslider id=750]"); 
			?>
						<!-- <img id="img-header" src="<?php echo get_template_directory_uri(); ?>/assets/images/header-img.jpg"> -->
			
		</div><!-- .container-->
	</header><!-- #header -->

	<div id="wrapper" class="container ">
		<div class="row">
