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
                <br />
                <br />
                <div style="float: none; clear:both;">
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.3&appId=219271641464428";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>	
                    <div style="top:-5px;" class="fb-like" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                    
                     <a class="twitter-share-button">Tweet</a>
                    <script>
                    window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return t;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
                    </script>
                    <!-- Place this tag in your head or just before your close body tag. -->
					<script src="https://apis.google.com/js/platform.js" async defer></script>
                    
                    <!-- Place this tag where you want the +1 button to render. -->
                    <div class="g-plusone" data-size="medium"></div>
                    
                </div>
			
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
