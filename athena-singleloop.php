<?php
	/**
	 * WordPress Athena Theme Loop
	 * @package athena_theme
	 * @version 0.3
	**/
	if ( have_posts() ) : while ( have_posts() ) : the_post();
	/**
	 * WordPress Athena Theme Post Views Count
	 * @package athena_theme
	 * @version 0.3
	**/
	set_athena_postviews(get_global_post_id());
	?>
	<!-- post -->
	<article id="athena_post_<?php get_athena_post_ID() ?>" class="athena_loop">
		<div class="post">
		<hgroup>
			<h2 id="athena_postTitle_<?php get_athena_post_ID() ?>">
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php $title_var = get_the_title(get_the_ID()); echo sprintf( __( "Read More : %s", "Athena-Theme" ) , $title_var); ?>">
					<?php
						/**
						 * WordPress Athena Theme Post Title
						 * @package athena_theme
						 * @version 0.3
						**/
						the_title();
					?>
				</a>
			</h2>
		</hgroup>
		</div>

		<div class="postBody athena_singular">
		<?php
			/**
			 * WordPress Athena Theme Post Single Image
			 * @package athena_theme
			 * @version 0.3
			**/
			echo get_athena_post_single_image(get_global_post_id());
		?>
		<?php the_content(__('Continue Reading','Athena-Theme')); ?>
		</div>
		<div class="clearfix"></div>
			<?php
			if (!is_page()) {
				get_template_part( 'athena','postmeta' );
			}
			?>
		<div class="clearfix"></div>
	</article>
	<!-- post -->
	<div class="Athena_Disqus_comments_Section">
	<h2 id="athena_comments"><?php _e('Comments','Athena-Theme'); ?></h2>
		<?php
			/**
			 * WordPress Athena Theme Comments
			 * @package athena_theme
			 * @version 0.3
			**/
			comments_template( '/athena-comments.php' );
		?>
	</div>
	<?php endwhile; ?>
	<!-- post navigation -->
	<?php else: ?>
	<!-- no posts found -->
		<?php get_template_part( 'athena', 'noposts' ); ?>
	<!-- no posts found -->
	<?php endif;
?>