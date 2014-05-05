<?php get_header(); ?>
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
<?php get_footer(); ?>