<?php
/**
 * @package WordPress
 * @subpackage themename
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html <?php language_attributes(); ?> class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><! <html <?php language_attributes(); ?>>[endif]-->

<?php
$upload_dir = wp_upload_dir();
include_once(get_template_directory() . '/modules/breadcrumbs.php');
?>
<head>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K2QPZHH');</script>
<!-- End Google Tag Manager -->


    <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="author" content="Pole Position Marketing"/>
    <!--<meta http-equiv="X-UA-Compatible" content="chrome=1 value=IE=edge"/>-->
    <meta name="format-detection" content="telephone=no">
	<!--  Mobile Viewport Fix -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!-- Place favicon.ico and apple-touch-icons in the images folder -->
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico"/>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->	
	<script>
		function copyToClipboard(el) {
			jQuery(el).focus();
			jQuery(el).select();
			document.execCommand('copy');
			jQuery('.copy').text("Copied!");
		}
	</script>
	
	<?php wp_head(); ?>
 
<meta name="google-site-verification" content="qxb8FB_rBQMINS0CcfCw60na4mQEjJkgwT9u_FprhU0" />
<?php
global $wp;
$current_url = home_url(add_query_arg(array(),$wp->request));
if($current_url == "https://www.polepositionmarketing.com/about-us/max-speed"){
?>
	<script>
		window.location.href = 'https://www.polepositionmarketing.com/about-us/';
	</script>
<?php
}
?>
<style>
    
    #bbb_image {
/*
      max-width: 80%; 
      margin: 1em auto; 
      display: block;
*/
      max-width: 170px;
      display: block;
      margin: 1em;
    }
    
    
  </style>



</head>
	<body <?php body_class(); ?> >
 
	 

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K2QPZHH"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
      
	<div id="page" class="hfeed">
		<header id="primary_header">
          
          <div id="mobile_menu" class="row">
            
            <div id="mobile_logo" class="column col-10 t-10">
              <a href="<?php echo home_url( '/' ); ?>" title="Pole Position Marketing" rel="home">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/ppm-site-logo-white-transparent400x108.png" alt="Logo">
              </a>
            </div>
            
            <p id="mobile_menu_open" class="column col-2 t-2"><i class="fa fa-bars"></i></p>
            

            <div id="mobile_menu_content">
              <div class="row">
                <div class="column col-9">
                  <div id="mobile_search" class="row">
                    <form method="get" id="form" action="#">
                      <input type="text" name="s" id="s" placeholder="Search.." onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">
                      <button type="submit" class="btn btn-success">
                        <i class="fa fa-search"></i>
                      </button>
                    </form>
                  </div>
                </div>
                <div class="column col-3">
                  <span id="mobile_menu_close"><i class="fa fa-close"></i></span>
                </div>
              </div>
              
              

              <div class="nav_tabs">
                <ul>
                  <li data-tab="services_navigation" class="active">Services</li>
                  <li data-tab="content_navigation" >Info</li>
                </ul>
              </div>
              <div class="nav_content">
                <nav id="services_navigation"  class="active">
                  <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                </nav>
                <nav id="content_navigation">
                  <?php wp_nav_menu( array( 'theme_location' => 'utility' ) ); ?>
                </nav>
                
              </div>
            </div>
          </div>
          
          
          <!-- Upper Navigation -->
          <section id="upper_navigation" class="row">
		  <h2 style="display: none;">Head</h2>
            <div class="content-wrap">
              <div class="column col-3 t-12" id="logo">
                <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/ppm-site-logo-white-transparent400x108.png" alt="Logo">
                </a>
              </div>

              <div class="column col-9 t-12">
                <div id="site_search" class="row">
                  
                    <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
                      <div>
                        <input type="text" name="s" placeholder="Search.." onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
                        <button type="submit" class="btn btn-success">
                          <i class="fa fa-search"></i>
                        </button>
                      </div>
                    </form>
                    
                    <div id="phone_number"><a href="tel:866-685-3374"><i class="fa fa-phone"></i> 866-685-3374</a></div>
                </div>
                <div class="row">
                  <nav id="utility_navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'utility' ) ); ?>
                  </nav>
                  <!-- Shrunken Search Form Toggle --> 
                  <div id="shrunk_search_toggle">
                    <i class="fa fa-search"></i>
                    <i class="fa fa-chevron-up" ></i>
                  </div>
                </div>
              </div>
            </div>
          </section>
          
          <!-- Shrunken Search Form --> 
          <section>
          <h2 style="display: none;">Form</h2>
            <form method="get" id="shrunk_search_form" action="<?php bloginfo('url'); ?>/">
            
            <input type="text" name="s" value="Search.." onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
              <button type="submit" class="btn btn-success">
                <i class="fa fa-search"></i>
                
              </button>
            </form>
            
          </section>
          
          <!-- Lower Navigation --> 
          <section id="lower_navigation">
		  <h2 style="display: none;">Lower Head</h2>
            <div class="content-wrap">
              <nav id="primary_navigation" class="row">
                <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
              </nav>
            </div>
          </section>
          
          <?php 
          
            if( is_front_page() ) { ?>
<!--              <div id="scroll_down" class="bounce animated infinite"><i class="fa fa-arrow-down "></i></div>-->
          
            <a id="indicator_link" href="#services_title"></a>
              <div class="indicator">
              
                <div>&lsaquo;</div>
                <div>&lsaquo;</div>
              
              </div>
            
            <?php }
          
          ?>
          
    <?php
          $schema = get_post_meta(get_the_ID(), 'schema', true);
          if(!empty($schema)) {
	           echo $schema;
           }
           ?>

		</header><!-- #primary_header -->
	
	
		<div id="main">