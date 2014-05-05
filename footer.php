	<nav>
	<?php
	/**
	 * WordPress Athena Theme Nav Menus
	 * @package athena_theme
	 * @version 0.3
	**/
	global $athena_theme_bottommenu_nav;
	wp_nav_menu( $athena_theme_bottommenu_nav );
	?>
	</nav>

	<div class="clearfix"></div>

	<section class="footer_widgets_column">
		<?php if ( is_active_sidebar( 'footer_left' ) ) : dynamic_sidebar( 'footer_left' ); endif; ?>
		<?php if ( is_active_sidebar( 'footer_right' ) ) : dynamic_sidebar( 'footer_right' ); endif; ?>
	</section>

	<div class="clearfix"></div>

	<footer>

		<?php
			/**
			 * WordPress wp_footer Arrangement
			 * Add athena_theme footer scripts and styles.
			 * @package athena_theme
			 * @version 0.3
			**/
			wp_footer();
		?>

	</footer>
	</div>
	</div>
</body>
</html>