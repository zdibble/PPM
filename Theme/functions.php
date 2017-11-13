<?php
/**
 * @package WordPress
 * @subpackage themename
 */

/**
 * Make theme available for translation
 * Translations can be filed in the /languages/ directory
 */
load_theme_textdomain( 'themename', get_template_directory() . '/languages' );

$locale = get_locale();
$locale_file = get_template_directory() . "/languages/$locale.php";
if ( is_readable( $locale_file ) )
	require_once( $locale_file );


//include_once( get_template_directory() . '/modules/admin/options.php' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;

/**
 * Add jQuery
 */
function add_jquery_script() {
    wp_deregister('jquery');
    wp_register_script('jquery', home_url() . '/wp-includes/js/jquery/jquery.js', array( 'json2'), false, false);
    wp_enqueue_script('jquery');
}
//d_action( 'wp_enqueue_scripts', 'add_jquery_script' );

/**
 * Remove code from the <head>
 */
//remove_action('wp_head', 'rsd_link'); // Might be necessary if you or other people on this site use remote editors.
//remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
//remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
//remove_action('wp_head', 'index_rel_link'); // Displays relations link for site index
//remove_action('wp_head', 'wlwmanifest_link'); // Might be necessary if you or other people on this site use Windows Live Writer.
//remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
//remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
//remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_filter( 'the_content', 'capital_P_dangit' ); // Get outta my Wordpress codez dangit!
remove_filter( 'the_title', 'capital_P_dangit' );
remove_filter( 'comment_text', 'capital_P_dangit' );
// Hide the version of WordPress you're running from source and RSS feed // Want to JUST remove it from the source? Try: remove_action('wp_head', 'wp_generator');
/*function hcwp_remove_version() {return '';}
add_filter('the_generator', 'hcwp_remove_version');*/
// This function removes the comment inline css
/*function twentyten_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'twentyten_remove_recent_comments_style' );*/
/* add_filter('body_class', function (array $classes) {
    if (in_array('noLegacyLinks', $classes)) {
      unset( $classes[array_search('noLegacyLinks', $classes)] );
    }
  return $classes;
}); */
/**
 * Remove meta boxes from Post and Page Screens
 */
function customize_meta_boxes() {
   /* These remove meta boxes from POSTS */
  //remove_post_type_support("post","excerpt"); //Remove Excerpt Support
  //remove_post_type_support("post","author"); //Remove Author Support
  //remove_post_type_support("post","revisions"); //Remove Revision Support
  //remove_post_type_support("post","comments"); //Remove Comments Support
  //remove_post_type_support("post","trackbacks"); //Remove trackbacks Support
  //remove_post_type_support("post","editor"); //Remove Editor Support
  //remove_post_type_support("post","custom-fields"); //Remove custom-fields Support
  //remove_post_type_support("post","title"); //Remove Title Support

  
  /* These remove meta boxes from PAGES */
  //remove_post_type_support("page","revisions"); //Remove Revision Support
  //remove_post_type_support("page","comments"); //Remove Comments Support
  //remove_post_type_support("page","author"); //Remove Author Support
  //remove_post_type_support("page","trackbacks"); //Remove trackbacks Support
  //remove_post_type_support("page","custom-fields"); //Remove custom-fields Support
  
}
add_action('admin_init','customize_meta_boxes');

/**
 * This theme uses wp_nav_menus() for the header menu, utility menu and footer menu.
 */
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'themename' ),
	'footer' => __( 'Footer Menu', 'themename' ),
	'utility' => __( 'Utility Menu', 'themename' )
) );

/** 
 * Add default posts and comments RSS feed links to head
 */
add_theme_support( 'automatic-feed-links' );

/**
 * This theme uses post thumbnails
 */
add_theme_support( 'post-thumbnails' );

/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support( 'title-tag' );
/**
 *	This theme supports editor styles
 */

add_editor_style("/css/layout-style.css");

/**
 * Remove superfluous elements from the admin bar (uncomment as necessary)
 */
function remove_admin_bar_links() {
	global $wp_admin_bar;

	//$wp_admin_bar->remove_menu('wp-logo');
	//$wp_admin_bar->remove_menu('updates');	
	//$wp_admin_bar->remove_menu('my-account');
	//$wp_admin_bar->remove_menu('site-name');
	//$wp_admin_bar->remove_menu('my-sites');
	//$wp_admin_bar->remove_menu('get-shortlink');
	//$wp_admin_bar->remove_menu('edit');
	//$wp_admin_bar->remove_menu('new-content');
	//$wp_admin_bar->remove_menu('comments');
	//$wp_admin_bar->remove_menu('search');
}
//add_action('wp_before_admin_bar_render', 'remove_admin_bar_links');

/**
 *	Replace the default welcome 'Howdy' in the admin bar with something more professional.
 */
function admin_bar_replace_howdy($wp_admin_bar) {
    $account = $wp_admin_bar->get_node('my-account');
    $replace = str_replace('Howdy,', 'Welcome,', $account->title);            
    $wp_admin_bar->add_node(array('id' => 'my-account', 'title' => $replace));
}
add_filter('admin_bar_menu', 'admin_bar_replace_howdy', 25);

/**
 * This enables post formats. If you use this, make sure to delete any that you aren't going to use.
 */
//add_theme_support( 'post-formats', array( 'aside', 'audio', 'image', 'video', 'gallery', 'chat', 'link', 'quote', 'status' ) );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function handcraftedwp_widgets_init() {
	register_sidebar( array (
		'name' => __( 'Sidebar', 'themename' ),
		'id' => 'sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
}
add_action( 'init', 'handcraftedwp_widgets_init' );

/*
 * Remove senseless dashboard widgets for non-admins. (Un)Comment or delete as you wish.
 */
function remove_dashboard_widgets() {
	global $wp_meta_boxes;

	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // Plugins widget
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPress Blog widget
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // Other WordPress News widget
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // Right Now widget
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // Quick Press widget
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // Incoming Links widget
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // Recent Drafts widget
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Recent Comments widget
}

/**
 *	Hide Menu Items in Admin
 */
function themename_configure_dashboard_menu() {
	global $menu,$submenu;

	global $current_user;
	get_currentuserinfo();

		// $menu and $submenu will return all menu and submenu list in admin panel
		
		// $menu[2] = ""; // Dashboard
		// $menu[5] = ""; // Posts
		// $menu[15] = ""; // Links
		// $menu[25] = ""; // Comments
		// $menu[65] = ""; // Plugins

		// unset($submenu['themes.php'][5]); // Themes
		// unset($submenu['themes.php'][12]); // Editor
}


// For non-admins, add action to Hide Dashboard Widgets and Admin Menu Items you just set above
// Don't forget to comment out the admin check to see that changes :)
if (!current_user_can('manage_options')) {
	add_action('wp_dashboard_setup', 'remove_dashboard_widgets'); // Add action to hide dashboard widgets
	add_action('admin_head', 'themename_configure_dashboard_menu'); // Add action to hide admin menu items
}










/* Begin PPM Functions Here */
function get_user_browser() {
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $ub = '';
    if(preg_match('/MSIE/i',$u_agent)) {
      $ub = "ie";
    } elseif(preg_match('/Firefox/i',$u_agent)) {
      $ub = "firefox";
    } elseif(preg_match('/Safari/i',$u_agent)) {
      $ub = "safari";
    } elseif(preg_match('/Chrome/i',$u_agent)) {
      $ub = "chrome";
    } elseif(preg_match('/Flock/i',$u_agent)) {
      $ub = "flock";
    } elseif(preg_match('/Opera/i',$u_agent)) {
      $ub = "opera";
    }

    return $ub;
}

/**
 * Proper way to enqueue scripts and styles
 */
function ppm_styles() {
  wp_enqueue_style( 'default_styles', get_stylesheet_directory_uri() . '/assets/css/style.css' );
  wp_enqueue_style( 'animate_styles', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css' );
//  wp_enqueue_style( 'glide_core', get_stylesheet_directory_uri() . '/libs/glide.js/dist/css/glide.core.min.css' );
//  wp_enqueue_style( 'glide_theme', get_stylesheet_directory_uri() . '/libs/glide.js/dist/css/glide.theme.min.css' );
//  wp_enqueue_style( 'flexisel_styles', get_stylesheet_directory_uri() . '/libs/flexisel/css/style.css' );
  wp_enqueue_style( 'owl_styles', get_stylesheet_directory_uri() . '/libs/owl-carousel/owl.carousel.css' );
  wp_enqueue_style( 'owl_theme_styles', get_stylesheet_directory_uri() . '/libs/owl-carousel/owl.theme.css' );
//  wp_enqueue_style( 'owl_transition_styles', get_stylesheet_directory_uri() . '/libs/owl-carousel/owl.transitions.css' );
  
  if( is_front_page() ) {
    wp_enqueue_style( 'home_styles', get_stylesheet_directory_uri() . '/assets/css/home/home.css' );
  }
}

add_action('wp_enqueue_scripts', 'ppm_styles' );


/**
 * Add PPM Javascript
 */
function add_custom_javascript() {

  wp_register_script( 'ppm-scripts',  get_stylesheet_directory_uri() . '/assets/js/scripts.js', array('jquery'), '1.0.0', true );
  wp_register_script( 'owl-scripts',  get_stylesheet_directory_uri() . '/libs/owl-carousel/owl.carousel.min.js', array('jquery'), '4.4.2', true );
  wp_register_script( 'mousewheel',  get_stylesheet_directory_uri() . '/assets/js/jquery.mousewheel.min.js', array('jquery'), '1.0.0', true );
  wp_register_script( 'smoothscroll',  get_stylesheet_directory_uri() . '/assets/js/jquery.simplr.smoothscroll.min.js', array('jquery'), '1.0.0', true );
  wp_register_script( 'chromeSmoothscroll',  get_stylesheet_directory_uri() . '/assets/js/chromeSmoothScroll.js', array('jquery'), '1.0.0', true );
  
  wp_enqueue_script( 'ppm-scripts' );  
  wp_enqueue_script( 'owl-scripts' );
//  wp_enqueue_script( 'mousewheel' );
//  wp_enqueue_script( 'smoothscroll' );
  
  $browser = get_user_browser();
  if($browser == "ie"){
    wp_enqueue_script( 'chromeSmoothscroll' );
  }
  
  
}    
add_action('wp_enqueue_scripts', 'add_custom_javascript');






/**
 * Get an attachment ID given a URL.
 * 
 * @source http://wpscholar.com/blog/get-attachment-id-from-wp-image-url/
 *
 * @param string $url
 *
 * @return int Attachment ID on success, 0 on failure
 */
function get_attachment_id( $url ) {
	$attachment_id = 0;
	$dir = wp_upload_dir();
	if ( false !== strpos( $url, $dir['baseurl'] . '/' ) ) { // Is URL in uploads directory?
		$file = basename( $url );
		$query_args = array(
			'post_type'   => 'attachment',
			'post_status' => 'inherit',
			'fields'      => 'ids',
			'meta_query'  => array(
				array(
					'value'   => $file,
					'compare' => 'LIKE',
					'key'     => '_wp_attachment_metadata',
				),
			)
		);
		$query = new WP_Query( $query_args );
		if ( $query->have_posts() ) {
			foreach ( $query->posts as $post_id ) {
				$meta = wp_get_attachment_metadata( $post_id );
				$original_file       = basename( $meta['file'] );
				$cropped_image_files = wp_list_pluck( $meta['sizes'], 'file' );
				if ( $original_file === $file || in_array( $file, $cropped_image_files ) ) {
					$attachment_id = $post_id;
					break;
				}
			}
		}
	}
	return $attachment_id;
}


/**
 * function Get Attachment ID From URL
 *
 * Get the ID of a post from the url
 * 
 * @return int Post ID
 *
 */
function get_attachment_id_from_src ($image_src) {
	global $wpdb;
	$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
	$id = $wpdb->get_var($query);
	return $id;
}


/**
 * function Get Post's First Image
 *
 * Description get the first post of an image
 * 
 * @return string HTML image element
 *
 */
function get_post_first_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img_url = $matches[1][0];
  if(empty($first_img_url)) {
    return false;
  }

//  $image_id = get_attachment_id($first_img_url);
  $image_id = get_attachment_id_from_src($first_img_url);
  $first_img = wp_get_attachment_image ( $image_id, 'large', false );
  
  return $first_img;
}






/* ////////////////////////////////////////////////////////////////////////////////////////
    //  Update the Excerpt Length  \\
//////////////////////////////////////////////////////////////////////////////////////// */
function new_excerpt_length($length) {
  return 30;
}
add_filter('excerpt_length', 'new_excerpt_length');



/**
 * 
 * function create_page_heading()
 * 
 * @description create the page heading content
 * based on user settings.
 *
 * @notes "ph" stands for "page heading"
 * 
 * @return echo html
 *
 */
function create_page_heading() {
  $page_id = get_the_ID();
  $ph_display_type = get_post_meta($page_id, 'page_heading_display_type', true);

  if($ph_display_type == 'Jumbotron') {
    $ph_entry_type = get_post_meta($page_id, 'page_heading_display_entry_type', true);

    if($ph_entry_type == 'Template') {

      $ph_title = get_post_meta($page_id, 'page_heading_display_title', true);
      $ph_description = get_post_meta($page_id, 'page_heading_display_description', true);
      $ph_button_text = get_post_meta($page_id, 'page_heading_display_button_text', true);
      $ph_button_link = get_post_meta($page_id, 'page_heading_display_button_link', true);
      $ph_image_id = get_post_meta($page_id, 'page_heading_display_image', true);
      $ph_image = wp_get_attachment_image ($ph_image_id, 'medium' );
      if( strlen($ph_title) <= 2 ) {
        $ph_title = the_title( '', '', false );
      }
      ?>

      <div class="column col-4 t-12 flip-flop">
        <?php echo $ph_image; ?>
      </div>

      <div class="column col-8 t-12 flip-flop">
        <h1 class="title"><?php echo $ph_title; ?></h1>
        <p class="supporting-text"><?php echo $ph_description; ?></p>
        <a href="<?php echo $ph_button_link; ?>" class="cta-heading-button"><?php echo $ph_button_text; ?></a>
      </div>
      <?php
    } else {
      $ph_custom_content = get_post_meta($page_id, 'page_heading_display_custom_content', true);
      echo '<div class="ph_custom_content">';
      echo wpautop($ph_custom_content);
      echo '</div>';
    }

  } else {
    ?>
      <div class="column col-12">
        <h1 class="title"><?php the_title( '', '', true ); ?></h1>
      </div>
    <?php
  }
}



function my_comment_form_before() {
  ob_start();
}
add_action( 'comment_form_before', 'my_comment_form_before' );



function my_comment_form_after() {
    $html = ob_get_clean();
    $html = preg_replace(
        '/<h3 id="reply-title"(.*)>(.*)<\/h3>/',
        '<h4 id="reply-title"\1>\2</h4>',
        $html
    );
    echo $html;
}
add_action( 'comment_form_after', 'my_comment_form_after' );

function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  /* if(empty($first_img)){ //Defines a default image
    $first_img = "/images/default.jpg";
  } */
  return $first_img;
}



