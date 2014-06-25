<?php
	/**
	 * WordPress Athena Theme Loop
	 * @package athena_theme
	 * @version 0.3t
	**/
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
		<div class="clearfix"></div>
		<div class="postBody">
			<?php
				/**
				 * WordPress Athena Theme Post Thumbnail
				 * @package athena_theme
				 * @version 0.3
				**/
				echo get_athena_post_thumbnail(get_global_post_id());
			?>
			<p><?php echo get_the_excerpt(); ?></p>
		</div>
		<div class="clearfix"></div>
			<?php get_template_part( 'athena','postmeta' ); ?>
		<div class="clearfix"></div>
	</article>
	<!-- post -->
	<?php endwhile; ?>
	<!-- post navigation -->
		<?php get_template_part( 'athena', 'navigation' ); ?>
	<!-- post navigation -->
	<?php else: ?>
	<!-- no posts found -->
		<?php get_template_part( 'athena', 'noposts' ); ?>
	<!-- no posts found -->
	<?php endif;
?>
