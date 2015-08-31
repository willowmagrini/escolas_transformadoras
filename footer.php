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
<?php $odin_general_opts = get_option( 'odin_general' );?>

		</div><!-- .row -->
	</div><!-- #wrapper -->
	
	<footer id="footer" class="container" role="contentinfo">
		<div class="col-md-5">
			<p><?php echo $odin_general_opts['footer1'];?></p>
			<p><?php echo $odin_general_opts['footer2'];?></p>
			<p><?php echo $odin_general_opts['footer3'];?></p>
		</div>
		<div class="col-md-7 pull-right">
			<nav class="col-xs-6" role="navigation">
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
			<nav class="col-xs-6" role="navigation">
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
			<a href="<?php echo $odin_general_opts['face'];?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/face.png">          </a>
			<a href="<?php echo $odin_general_opts['twitter'];?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter.png">    </a>
			<a href="<?php echo $odin_general_opts['linkedin'];?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedin.png">  </a>
			<a href="<?php echo $odin_general_opts['flicker'];?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/flicker.png">    </a>
			<a href="<?php echo $odin_general_opts['google'];?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/google.png">      </a>
			<a href="<?php echo $odin_general_opts['youtube'];?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/youtube.png">    </a>
				
			</div>
			<div id="copyright" class="col-md-6">
				<p>&copy; <?php echo date( 'Y' ); ?> Ashoka Changemakers</p>
			</div>
			
			<div id="apoio" class="col-md-6">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-alana.png">
				
			</div>
			
		</div>
		
		
		
		
	</footer><!-- #footer -->

	<?php wp_footer(); ?>
</body>
</html>
