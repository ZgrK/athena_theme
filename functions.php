<?php
	/**
	 * WordPress Simple And Clean Blogging Theme
	 * @package athena_theme
	 * @version 0.3
	**/
	define(NAME, get_bloginfo('name'));
	define(DESC, get_bloginfo('description'));
	define(SITE, get_bloginfo('wpurl'));

	/**
	 * WordPress SEO Title Arrangement
	 * @package athena_theme
	 * @version 0.3
	**/
	function athena_title() {
		global $post;
		global $query;
	    $sitename = NAME;
		$sitedescription = DESC;
		$post_title = get_the_title(get_the_ID());
		$search_query = get_search_query();
		$categoryTitle = single_cat_title();

		if (is_home()) {
			$title .= __('Home','Athena-Theme').' - '.$sitename.' - '.$sitedescription;
		}
		if (is_singular()) {
			$title .= $post_title.' - '.$sitename;
		}
		if (is_search()) {
			$title .= __('Search Results','Athena-Theme').' - '.$search_query;
		}
		if (is_category() || is_archive() || is_tag()) {
			$title .= $categoryTitle.' - '.__('Archive','Athena-Theme').' - '.$sitename;
		}
		return $title;
	}
	add_filter('wp_title','athena_title',1);

	/**
	 * WordPress wp_footer Arrangement
	 * @package athena_theme
	 * @version 0.3
	**/
	function athena_footer() {
		$name = NAME;
		echo sprintf( __( "%s &copy; 2014 - All rights reserved. <br /> Build with <a href='http://athena.fatihtoprak.com'>Athena Wordpress Theme</a> &amp; WordPress CMS by <a href='http://www.fatihtoprak.com'>Fatih Toprak</a>. <br />", "Athena-Theme" ) , $name);
	}
	add_filter('wp_footer','athena_footer',9999);

	/**
	 * WordPress Load Languages.
	 * Add athena_theme languages.
	 * @package athena_theme
	 * @version 0.3
	**/
	load_theme_textdomain('Athena-Theme', get_template_directory() . '/lang');

	/**
	 * WordPress Header Image.
	 * Add athena_theme header image.
	 * @package athena_theme
	 * @version 0.3
	**/
	$headerImage_Athena = array(
		'width'         => 940,
		'height'        => 200,
		'default-image' => get_template_directory_uri() . '/images/header.jpg',
	);
	add_theme_support( 'custom-header', $headerImage_Athena );
	function header_imageAthena() {
		if (get_header_image() != '') {
		?>
		<style>
		#page_header_with_image {
			float:left;
			width:<?php echo get_custom_header()->width; ?>px;
			height:<?php echo get_custom_header()->height; ?>px;
			background:url('<?php header_image(); ?>') top left no-repeat;
		}
		</style>
		<?php
		} else { ?>
		<style>
		#page_header_with_image {
			float:left;
			width:940px;
			height:200px;
		}
		header h1 {
			text-shadow:0px 0px 0px #fff;
		}
		header h1 a {
			display:block;
			color:#000;
			text-decoration:none;
			display:block;
		}
		</style>
		<?php }
	}
	add_filter( 'wp_head', 'header_imageAthena' );

	/**
	 * WordPress Admin bar Athena Menus.
	 * Add athena_theme Admin bar Nav menus.
	 * @package athena_theme
	 * @version 0.3
	**/

	class athena_administrator_links {

	  function athena_administrator_links()
	  {
	      add_action( 'admin_bar_menu', array( $this, "athena_administrator_linksur" ) );
	  }

	  function add_root_menu($name, $id, $href = FALSE)
	  {
	    global $wp_admin_bar;
	    if ( !is_super_admin() || !is_admin_bar_showing() )
	        return;

	    $wp_admin_bar->add_menu( array(
	        'id'   => $id,
	        'meta' => array(),
	        'title' => $name,
	        'href' => $href ) );
	  }

	  function add_sub_menu($name, $link, $root_menu, $id, $meta = FALSE)
	  {
	      global $wp_admin_bar;
	      if ( ! is_super_admin() || ! is_admin_bar_showing() )
	          return;

	      $wp_admin_bar->add_menu( array(
	          'parent' => $root_menu,
	          'id' => $id,
	          'title' => $name,
	          'href' => $link,
	          'meta' => $meta
	      ) );
	  }

	  function athena_administrator_linksur() {
	      $this->add_root_menu( "Athena Theme", "athena-adminmenus" );
	      $this->add_sub_menu( "Documentation", "http://athena.fatihtoprak.com/", "athena-adminmenus", "1" );
	      $this->add_sub_menu( "About Author", "http://athena.fatihtoprak.com/author", "athena-adminmenus", "2" );
	      $this->add_sub_menu( "Updates", "http://athena.fatihtoprak.com/updates", "athena-adminmenus", "3" );
	  }


	}
	function remove_admin_bar_links() {
	    global $wp_admin_bar;
	    $wp_admin_bar->remove_menu('wp-logo');
	    $wp_admin_bar->remove_menu('about');
	    $wp_admin_bar->remove_menu('wporg');
	    $wp_admin_bar->remove_menu('documentation');
	    $wp_admin_bar->remove_menu('support-forums');
	    $wp_admin_bar->remove_menu('feedback');
	}
	add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );
	add_action( "init", "athenaAdminMenusInit" );
	function athenaAdminMenusInit() {
	    global $athena_administrator_links;
	    $athena_administrator_links = new athena_administrator_links();
	}

	/**
	 * WordPress Menus.
	 * Add athena_theme Nav menus.
	 * @package athena_theme
	 * @version 0.3
	**/

	$athena_theme_topmenu_nav = array(
		'theme_location'  => 'athena_top_menu',
		'menu'            => 'athena_top_menu',
		'container'       => 'athena_top_menu',
		'container_class' => '',
		'container_id'    => true,
		'menu_class'      => 'athena_top_menu',
		'menu_id'         => 'athenatopnav',
		'echo'            => true,
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 0,
	);
	$athena_theme_bottommenu_nav = array(
		'theme_location'  => 'athena_bottom_menu',
		'menu'            => 'athena_bottom_menu',
		'container'       => 'athena_bottom_menu',
		'container_class' => '',
		'container_id'    => true,
		'menu_class'      => 'athena_bottom_menu',
		'menu_id'         => 'athenabottomnav',
		'echo'            => true,
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 0,
	);

	function athena_nav_menus() {

		$locations = array(
			'athena_top_menu' => __( 'This menu will appear on page header area.', 'Athena-Theme' ),
			'athena_bottom_menu' => __( 'This menu will appear on page footer area.', 'Athena-Theme' ),
		);
		register_nav_menus( $locations );

	}
	add_action( 'init', 'athena_nav_menus' );


	/**
	 * WordPress Athena Theme Remove More Jump.
	 * @package athena_theme
	 * @version 0.3
	**/
	function removeMore_Link_Jump( $link ) {
		$link = preg_replace( '|#more-[0-9]+|', '', $link );
		return $link;
	}
	add_filter( 'the_content_more_link', 'removeMore_Link_Jump' );


	/**
	 * WordPress Athena Theme Loop POST ID.
	 * @package athena_theme
	 * @version 0.3
	**/
	function get_athena_post_ID() {
		$athena_post_id = get_the_ID();
		if (is_singular()) {
			echo 'singlepost-'.$athena_post_id;
		}
		if (is_home()) {
			echo 'homePost-'.$athena_post_id;
		}
		if (is_category()) {
			echo 'categoryPost-'.$athena_post_id;
		}
		if (is_tag()) {
			echo 'tagPost-'.$athena_post_id;
		}
	}

	/**
	 * WordPress Athena Theme Post Viewa
	 * @package athena_theme
	 * @version 0.3
	**/

	function get_athena_postviews($param){
	    $count_key = 'athena_post_views_count';
	    $count = get_post_meta($param, $count_key, true);
	    if($count==''){
	        delete_post_meta($param, $count_key);
	        add_post_meta($param, $count_key, '0');
	        return "0";
	    }
	    return $count.'';
	}
	function set_athena_postviews($param) {
	    $count_key = 'athena_post_views_count';
	    $count = get_post_meta($param, $count_key, true);
	    if($count==''){
	        $count = 0;
	        delete_post_meta($param, $count_key);
	        add_post_meta($param, $count_key, '0');
	    }else{
	        $count++;
	        update_post_meta($param, $count_key, $count);
	    }
	}

	/**
	 * WordPress Athena Theme Post Meta Function
	 * @package athena_theme
	 * @version 0.3
	**/

	function get_global_post_id() {
		$athena_post_id = get_the_ID();
		return $athena_post_id;
	}
	function get_athena_post_meta($param) {
		$athena_post_date = get_the_time('d.m.Y H:i',$param);
		$athena_post_author = get_the_author();
		$athena_post_permalink = get_permalink($param);
		$athena_post_category = get_the_category( '','',$param );
		$athena_post_tags = wp_get_post_tags($param);
		$athena_post_views = get_athena_postviews($param);
		$athena_post_comments_count = get_comments_number($param);

		$athena_metas .= '<span>'.__('Date : ', 'Athena-Theme').$athena_post_date.'</span>';
		$athena_metas .= '<span>'.__('Author : ', 'Athena-Theme').$athena_post_author.'</span>';
		$athena_metas .= '<span><a href="'.$athena_post_permalink.'#athena_comments">'.__('Reactions : ', 'Athena-Theme').$athena_post_comments_count.'</a></span>';
				$athena_metas .= '<span>'.$athena_post_views.__(' views', 'Athena-Theme').'</span><br />';
		$athena_metas .= '<span>'.__('Categories : ', 'Athena-Theme');
			foreach ($athena_post_category as $athena_cat_loop) {
				$athena_metas .= '<a href="'.get_category_link($athena_cat_loop->cat_ID).'">'.$athena_cat_loop->name.'</a>';
			}
		$athena_metas .='</span>';
		$athena_metas .= '<span>'.__('Tags : ', 'Athena-Theme');
			foreach ($athena_post_tags as $athena_cat_loop) {
				$athena_metas .= '<a href="'.get_tag_link($athena_cat_loop->term_id).'">'.$athena_cat_loop->name.'</a>';
			}
		$athena_metas .='</span>';
		return $athena_metas;
	}


	/**
	 * WordPress Athena Theme Post Thumbnails
	 * @package athena_theme
	 * @version 0.3
	**/
	add_theme_support('post-thumbnails');

	function get_athena_post_thumbnail($param) {
		if (has_post_thumbnail($param)) {
			$thumb_alt = get_the_title($param);
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($param), 'thumbnail' );
			$url = $thumb['0'];
			$thumb_width = $thumb['1'];
			$thumb_height = $thumb['2'];
			return '<figure><img class="athena_loopimage" width="'.$thumb_width.'" height="'.$thumb_height.'" alt="'.$thumb_alt.'" src="'.$url.' "/></figure>';
		}
	}
	function get_athena_post_single_image($param) {
		if (has_post_thumbnail($param)) {
			$thumb_alt = get_the_title($param);
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($param), 'full' );
			$url = $thumb['0'];
			$thumb_width = $thumb['1'];
			$thumb_height = $thumb['2'];
			return '<figure><img class="athena_single_image aligncenter" width="'.$thumb_width.'" height="'.$thumb_height.'" alt="'.$thumb_alt.'" src="'.$url.' "/></figure>';
		}
	}

	/**
	 * WordPress Athena Theme Footer Left Sidebar
	 * @package athena_theme
	 * @version 0.3
	**/
	if ( ! function_exists( 'register_athena_sidebar_footer_left' ) ) {
	function register_athena_sidebar_footer_left() {
			$args = array(
				'id'            => 'footer_left',
				'name'          => __( 'Footer Left Sidebar', 'Athena-Theme' ),
				'description'   => __( 'This sidebar area display your widgets on page left bottom (footer) area.', 'Athena-Theme' ),
				'class'         => 'athena_footer_left_widget',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
				'before_widget' => '<div class="athena_footer_widgets">',
				'after_widget'  => '</div><div class="clearfix"></div>',
			);
			register_sidebar( $args );

		}
		add_action( 'widgets_init', 'register_athena_sidebar_footer_left' );
	}
	if ( ! function_exists( 'register_athena_sidebar_footer_right' ) ) {
	function register_athena_sidebar_footer_right() {
			$args = array(
				'id'            => 'footer_right',
				'name'          => __( 'Footer Right Sidebar', 'Athena-Theme' ),
				'description'   => __( 'This sidebar area display your widgets on page right bottom (footer) area.', 'Athena-Theme' ),
				'class'         => 'athena_footer_right_widget',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
				'before_widget' => '<div class="athena_footer_widgets">',
				'after_widget'  => '</div><div class="clearfix"></div>',
			);
			register_sidebar( $args );

		}
		add_action( 'widgets_init', 'register_athena_sidebar_footer_right' );
	}

	/**
	 * WordPress Athena Theme Not Found Search Form
	 * @package athena_theme
	 * @version 0.3
	**/
	function get_athena_search_form() {
		return '<form class="notfoundsearch" action="'.SITE.'" method="get"><input type="text" name="s" placeholder="'.__('Type something here...','Athena-Theme').'"><input type="submit" value="'.__('Find','Athena-Theme').'"></form>';
	}
	/**
	 * WordPress Load Scripts And Styles.
	 * Add athena_theme header scripts and styles.
	 * @package athena_theme
	 * @version 0.3
	**/

	function athena_scripts() {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_style( 'athena-css', get_stylesheet_uri() );
		wp_enqueue_style( 'athena-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,700&amp;subset=latin,latin-ext', false,'0.3', false );
		wp_enqueue_script( 'athena-js', get_template_directory_uri() . '/js/athena-core.js', false,'0.3', false );
	}

	add_action( 'wp_enqueue_scripts', 'athena_scripts' );

?>
