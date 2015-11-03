<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main div element.
 *
 * @package Odin
 * @since 2.2.0
 */
?>
<?php $odin_footer_opts = get_option( 'odin_footer' );?>

		</div><!-- .row -->
	</div><!-- #wrapper -->
	
	<footer id="footer" class="container" role="contentinfo">
		<div id="frases-footer" class="col-sm-5 pull-right">
			<p><?php echo $odin_footer_opts['footer1'];?></p>
			<p><?php echo $odin_footer_opts['footer2'];?></p>
			<p><?php echo $odin_footer_opts['footer3'];?></p>
		</div>
		<div class="menu-footer col-sm-7 pull-left">
			<nav class="sem-margem col-sm-6" role="navigation">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'mapacol1-menu',
							'depth'          => 2,
							'container'      => false,
							'menu_class'     => 'nav navbar-nav',
							'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
							'walker'         => new Odin_Bootstrap_Nav_Walker()
						)
					);
				?>
			</nav><!-- .navbar-collapse -->
			<nav class="sem-margem col-sm-6" role="navigation">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'mapacol2-menu',
							'depth'          => 2,
							'container'      => false,
							'menu_class'     => 'nav navbar-nav',
							'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
							'walker'         => new Odin_Bootstrap_Nav_Walker()
						)
					);
				?>	
				
			</nav><!-- .navbar-collapse -->
			
			<div id="social" class="col-md-12">
				
				<?php if ($odin_footer_opts['face']!=""){?>
					<a target=_blank  href="<?php echo $odin_footer_opts['face'];?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/face.png">          </a>
				<?php }?>
				<?php if ($odin_footer_opts['twitter']!=""){?>
					<a target=_blank  href="<?php echo $odin_footer_opts['twitter'];?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter.png">    </a>
				<?php }?>
				<?php if ($odin_footer_opts['linkedin']!=""){?>
					<a target=_blank  href="<?php echo $odin_footer_opts['linkedin'];?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedin.png">  </a>
					
				<?php }?>
				<?php if ($odin_footer_opts['flicker']!=""){?>
					<a target=_blank  href="<?php echo $odin_footer_opts['flicker'];?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/flicker.png">    </a>
					
				<?php }?>
				<?php if ($odin_footer_opts['google']!=""){?>
					<a target=_blank  href="<?php echo $odin_footer_opts['google'];?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/google.png">      </a>
					
				<?php }?>
				<?php if ($odin_footer_opts['youtube']!=""){?>
					<a target=_blank  href="<?php echo $odin_footer_opts['youtube'];?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/youtube.png">    </a>
					
				<?php }?>
			
			</div>
			<div id="copyright" class="sem-margem col-sm-6">
				<p>&copy; <?php echo date( 'Y' ); ?> Ashoka </p>
				
			</div>
			
			<div id="apoio" class="sem-margem col-sm-6">
				<p><?php echo  __('Correalização:','odin')?></p>
					<img class="inline-block" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-alana.png">
					<img class="inline-block" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-ashoka.png">
			</div>
			
		</div>
		
		
		
		
	</footer><!-- #footer -->

	<?php wp_footer(); ?>
</body>
</html>
