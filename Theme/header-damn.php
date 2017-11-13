<!doctype html>

<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. --> 

<head>

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
	<?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

		// Add the blog name.
	//	bloginfo( 'name' );

		// Add the blog description for the home/front page.
	//	$site_description = get_bloginfo( 'description', 'display' );
	//	if ( $site_description && ( is_home() || is_front_page() ) )
	//		echo " | $site_description";

		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'themename' ), max( $paged, $page ) );

	?>
	</title>
	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<!--[if IE ]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->

	

    
	<!--[if lte IE 8]>
		<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php wp_head(); ?>

	<?php
		if(is_page(25324)) {
	?>
		<!-- Facebook Conversion Code for Cheat Sheet Downloads -->
		<script>(function() {
		  var _fbq = window._fbq || (window._fbq = []);
		  if (!_fbq.loaded) {
		    var fbds = document.createElement('script');
		    fbds.async = true;
		    fbds.src = '//connect.facebook.net/en_US/fbds.js';
		    var s = document.getElementsByTagName('script')[0];
		    s.parentNode.insertBefore(fbds, s);
		    _fbq.loaded = true;
		  }
		})();
		window._fbq = window._fbq || [];
		window._fbq.push(['track', '6020475011015', {'value':'0.00','currency':'USD'}]);
		</script>
		<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6020475011015&amp;cd[value]=0.00&amp;cd[currency]=USD&amp;noscript=1" /></noscript>
	<?php
		}
		else if(is_page(26002)) {
	?>
		<!-- Facebook Conversion Code for BDWMC Landing Page View -->
		<script>(function() {
		  var _fbq = window._fbq || (window._fbq = []);
		  if (!_fbq.loaded) {
		    var fbds = document.createElement('script');
		    fbds.async = true;
		    fbds.src = '//connect.facebook.net/en_US/fbds.js';
		    var s = document.getElementsByTagName('script')[0];
		    s.parentNode.insertBefore(fbds, s);
		    _fbq.loaded = true;
		  }
		})();
		window._fbq = window._fbq || [];
		window._fbq.push(['track', '6020475174215', {'value':'0.00','currency':'USD'}]);
		</script>
		<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6020475174215&amp;cd[value]=0.00&amp;cd[currency]=USD&amp;noscript=1" /></noscript>
<?php
}
?>
    <link rel="stylesheet" type="text/css" href="https://www.polepositionmarketing.com/wp-content/themes/poleposition/assets/css/best-damn-style.css" media="all" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body <?php body_class(); ?>>

<div id="whitewrap" style="background-color: #fff;">
	<div id="wrapper-58" class="wrapper wrapper-fixed wrapper-fixed-grid grid-fixed-24-22-21 wrapper-last" data-alias="">
		<div class="grid-container clearfix">


