<?php
	/**
	 * WordPress Athena Theme Loop
	 * @package athena_theme
	 * @version 0.3
	**/
?>
	<!-- post -->
	<article id="athena_post_404_Page" class="athena_loop">
		<div class="post">
		<hgroup>
			<h2 id="athena_postTitle_404_Page">
				<?php _e('404 / Nothing Found Here.','Athena-Theme') ?>
			</h2>
		</hgroup>
		</div>
		<div class="clearfix"></div>
		<div class="postBody">
			<p>
				<?php _e('<p>Were very sorry, but the page you requested has not been found! It may have been moved or deleted.</p> <p>If there isnt, you could try searching my website for the content you were looking for:</p>','Athena-Theme') ?>
				<?php echo get_athena_search_form(); ?>
			</p>
		</div>
		<div class="clearfix"></div>
	</article>
	<!-- post -->
