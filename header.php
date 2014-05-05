<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
	<?php
		/**
		 * WordPress SEO Title Arrangement
		 * @package athena_theme
		 * @version 0.3
		**/
		wp_title('', true);
	?>
	</title>
	<?php
		/**
		 * WordPress wp_head Arrangement
		 * Add athena_theme header scripts and styles.
		 * @package athena_theme
		 * @version 0.3
		**/
		wp_head();
	?>
</head>
<body>
	<div id="main_body">
		<div class="athena_theme">
		<header id="page_header_with_image">

			<h1>
				<a href="<?php echo SITE; ?>" title="<?php echo NAME; ?>">
					<?php echo NAME; ?>
					<span><?php echo DESC; ?></span>
				</a>
			</h1>

		</header>

		<nav>
		<?php
			/**
			 * WordPress Athena Theme Nav Menus
			 * @package athena_theme
			 * @version 0.3
			**/
			global $athena_theme_topmenu_nav;
			wp_nav_menu( $athena_theme_topmenu_nav );
		?>
		</nav>

