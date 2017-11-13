<?php
/**
 * @package WordPress
 * @subpackage themename
 */
?>

</div><!-- #main  -->
<footer id="primary_footer" class="">

  <!-- Upper Footer -->
  <section id="upper-footer" class="panel row angled-container high-right black">
   <h2 style="display: none;">Footer</h2>
   <div class="content-wrap">

    <!-- Contact Info -->
    <div id="contact-info" class="column col-4 t-12 widget">
      <section class="title-block">
      	<div class="toggle-click" title="Click to view more">
      		<h5 class="toggle-title">
      			<span class="fa fa-angle-down">
      			
      			</span>
      			Contact Us
      		</h5>
      	</div>
      	<div class="toggle-content toggle">      	
            <div class="contact-info">
              <div class="row">
              	<h6>Pole Position Marketing</h2>
              </div>
              <div class="row">
              	<p>9841 Cleveland Avenue NW</p>      
              </div>
              <div class="row">
              	<p>Uniontown, Ohio 44685</p>
              </div>
              <div class="row">
              	<p>Phone: 866-685-3374</p>
              </div>
              <div class="row">
              	<p>Email: info@polepositionmarketing.com</p>
              </div>      
          	</div>
          </div>
      </section>
     </div>
    <!-- Ask An Expert Form -->
    <div  class="column col-8 t-12 widget widget-email-subscribe">
    	<section class="title-block">
    		<div class="toggle-click" title="Click to view more">
    			<h5 class="toggle-title">
    				<span class="fa fa-angle-down">
    				   				   				
    				</span>
    				Become An Expert 
    			</h5>
    		</div>
    		<div class="toggle-content toggle">
    			<div class="row">
    				<div class="column col-8 t-12">
    					<p>Take your digital marketing to the next level by subscribing to our weekly email roundup of blog posts with actionable tips and tricks. Plus, you'll receive our SEO 101 Ebook FREE!</p>
    					<?php echo gravity_form( 8, false, false, false, null, false, 10, false ); ?>
    				</div>
    				<div class="column col-4 t-12">
    					<img class="" src="<?php echo site_url().'/wp-content/uploads/2016/01/seo-101-ebook-cover-232x300.jpg'; ?>" alt="SEO 101 Free Ebook"> 
    				</div>
    			</div>    		
    		</div> 		
		</section>
    </div>
    </div>
</section>

<!-- Lower Footer -->
<section id="lower-footer" class="row panel">
	<h2 style="display: none;">Footer</h2>
 <center>
   <div class="foo-logos" style="padding-bottom: 60px;">
<a href="https://www.bbb.org/canton/business-reviews/marketing-programs-and-services/pole-position-marketing-inc-in-uniontown-oh-92001336"target="_blank"><img style="height: auto;margin-bottom: 18px;width: 243px;" src="https://www.polepositionmarketing.com/wp-content/themes/poleposition/assets/img/bbb.png" alt="BBB Image"></a>
<style>.foo-logos iframe{margin-bottom: 31px !important;}#footer-copyright a { text-decoration : none !important;}</style>
<!--<div class="g-partnersbadge" data-agency-id="2606032098"></div>-->
<img src="/wp-includes/images/google-partner-badge.png" style="height: 107px;margin-bottom: 18px; padding-left: 20px; image-rendering: -moz-crisp-edges; image-rendering: -o-crisp-edges; image-rendering: -webkit-optimize-contrast; -ms-interpolation-mode: nearest-neighbor;">
   <a href="https://clutch.co/seo-firms/consultants/research"target="_blank"><img src="https://clutch.co/badges/2017/seo_consultants_2017.png" style="width: 141px;   padding-left: 20px; " /></a>
 <a href="https://clutch.co/agencies/ppc"target="_blank"><img  style="    float: none;    padding-left: 20px;    width: auto;    height:115px; margin-bottom: 12px;" src="https://clutch.co/badges/2015/ppc_consultants_2015.png" alt="" width="169" height="98" /></a>
   </div>
   </center>
  <div class="content-wrap">

    <div class="column col-4 t-12 flip-flop">
      <ul class="row social-media-profiles">
        <li><span class="ppm-wpfl cart" data-destination="<?php echo base64_encode('https://twitter.com/PolePositionMkg'); ?>" onclick="destination(this)" data-target="_self"><i class="fa fa-twitter "></i></span></li>
        <li><span class="ppm-wpfl cart" data-destination="<?php echo base64_encode('https://www.facebook.com/PolePositionMarketing'); ?>" onclick="destination(this)" data-target="_self"><i class="fa fa-facebook "></i></span></li>
        <li><span class="ppm-wpfl cart" data-destination="<?php echo base64_encode('https://www.linkedin.com/company/pole-position-marketing'); ?>" onclick="destination(this)" data-target="_self"><i class="fa fa-linkedin "></i></span></li>
        <li><span class="ppm-wpfl cart" data-destination="<?php echo base64_encode('https://www.youtube.com/user/PolePositionMKG'); ?>" onclick="destination(this)" data-target="_self"><i class="fa fa-youtube "></i></span></li>
        <li><span class="ppm-wpfl cart" data-destination="<?php echo base64_encode('https://plus.google.com/+PolePositionMarketing'); ?>" onclick="destination(this)" data-target="_self"><i class="fa fa-google-plus f "></i></span></li>
        <li><span class="ppm-wpfl cart" data-destination="<?php echo base64_encode('http://feeds.feedblitz.com/polepositionmarketing'); ?>" onclick="destination(this)" data-target="_self"><i class="fa fa-rss "></i></span></li>

      </ul>
    </div>
    <div id="footer-copyright" class="column col-8 t-12 flip-flop">
      <p>&copy; 1998 - <?php echo date("Y") ?> Pole Position Marketing | Canton / Akron / Cleveland Ohio | <a href="<?php echo get_site_url(); ?>/privacy/" >Privacy Policy</a> &nbsp;| <a href="https://www.polepositionmarketing.com/site-map/">Sitemap</a></p>
    </div>
    </div>

  </div>
</section>

</footer>
<script>
	jQuery(document).ready(function(){
		if (jQuery(window).width() < 768) {
			jQuery("#secondary .widget_categories ul").css("display","none");
			jQuery("#secondary .widget_categories h4.widget-title").addClass("toggle");
			jQuery("#secondary .widget_categories h4.widget-title").click(function(){
				jQuery("#secondary .widget_categories ul").toggle();
				jQuery(this).toggleClass("open");
			});
		}
		
		jQuery("#tag-content").insertBefore('#cab-author');

		if (jQuery(window).width() > 1000) {
			jQuery('.widget-email-subscribe .toggle').addClass('open');
			jQuery('#contact-info .toggle').addClass('open');
		}

		jQuery(".widget-email-subscribe .toggle-click").on("click", function() {
			jQuery('.widget-email-subscribe .toggle').slideToggle('slow').toggleClass('open');
			var isVisible = jQuery('.widget-email-subscribe .toggle').is('.open');
			if (isVisible === true)
				jQuery('.widget-email-subscribe .title-block .toggle-click .fa').css({"transform":"none","-webkit-transform":"none"});
			else
				jQuery('.widget-email-subscribe .title-block .toggle-click .fa').css({"transform":"rotate(180deg)","-webkit-transform":"rotate(180deg)"});			
		});

		jQuery("#contact-info .toggle-click").on("click", function() {
			jQuery('#contact-info .toggle').slideToggle('slow').toggleClass('open');
			var isVisible = jQuery('#contact-info .toggle').is('.open');
			if (isVisible === true)
				jQuery('#contact-info .title-block .toggle-click .fa').css({"transform":"none","-webkit-transform":"none"});				
			else
				jQuery('#contact-info .title-block .toggle-click .fa').css({"transform":"rotate(180deg)","-webkit-transform":"rotate(180deg)"});
		});		
	});
</script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
