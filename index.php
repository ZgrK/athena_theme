<?php
	/**
	 * WordPress Athena Theme Header
	 * @package athena_theme
	 * @version 0.3
	**/
get_header(); ?>
	<section>
		<?php
			if (!is_singular()) {
				get_template_part( 'athena', 'loop' );
			} elseif (is_404()) {
				get_template_part( 'athena', 'noposts' );
			} else {
				get_template_part( 'athena', 'singleloop' );
			}
		?>
	</section>
<?php
	/**
	 * WordPress Athena Theme Footer
	 * @package athena_theme
	 * @version 0.3
	**/
get_footer(); ?>