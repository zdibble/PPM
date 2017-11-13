<?php


/*
Template Name: New Damn Template
*/

  	get_header('damn'); 
  	remove_filter('the_content', 'wpautop');
?>
<div class="container-fluid">
	<div class="row justify-content-center">
		<header>
			<div class="container">
				<nav class="navbar navbar-toggleable-sm navbar-light align">
					<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#stoney-nav" aria-controls="stoney-nav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>			
					</button>
					
					<a href="https://www.polepositionmarketing.com/digital-marketing-learning-library/ebooks/best-damn-web-marketing-checklist/" class="navbar-left">
						<img class="img-fluid" title="Best Damn Web Marketing Checklist Book" src="https://www.polepositionmarketing.com/wp-content/uploads/2014/09/2.0-logo-website.png" alt="Web Marketing Checklist Book" />
					</a>
					<div class="collapse navbar-collapse">
						<ul id="nav" class="navbar-nav justify-content-end">
			 				<li><a title="Book Stoney for Speaking Engagements" href="https://www.polepositionmarketing.com/digital-marketing-learning-library/ebooks/best-damn-web-marketing-checklist/book-stoney/">Book Stoney to Speak</a></li>
			 				<li><a title="Praise About the Book" href="https://www.polepositionmarketing.com/digital-marketing-learning-library/ebooks/best-damn-web-marketing-checklist/praise/">Praise For The Book</a></li>
			 				<li><a title="Table of Contents" href="https://www.polepositionmarketing.com/digital-marketing-learning-library/ebooks/best-damn-web-marketing-checklist/table-of-contents/">What's Included</a></li>
			 				<li><a title="Pole Position Marketing" href="https://www.polepositionmarketing.com" target="_blank" rel="noopener noreferrer">Web Marketing Solutions</a></li>
						</ul>
					</div>
					<div class="toggle-nav" id="stoney-nav">
						<ul class="navbar-nav">
			 				<li class="nav-item"><a class="nav-link" title="Book Stoney for Speaking Engagements" href="https://www.polepositionmarketing.com/digital-marketing-learning-library/ebooks/best-damn-web-marketing-checklist/book-stoney/">Book Stoney to Speak</a></li>
			 				<li class="nav-item"><a class="nav-link" title="Praise About the Book" href="https://www.polepositionmarketing.com/digital-marketing-learning-library/ebooks/best-damn-web-marketing-checklist/praise/">Praise For The Book</a></li>
			 				<li class="nav-item"><a class="nav-link" title="Table of Contents" href="https://www.polepositionmarketing.com/digital-marketing-learning-library/ebooks/best-damn-web-marketing-checklist/table-of-contents/">What's Included</a></li>
			 				<li class="nav-item"><a class="nav-link" title="Pole Position Marketing" href="https://www.polepositionmarketing.com" target="_blank" rel="noopener noreferrer">Web Marketing Solutions</a></li>
						</ul>
					</div>
				</nav>		
			</div>
		</header>
	</div>
	<div class="row justify-content-center">
		<?php the_content(); ?>
	</div>
	<div class="row justify-content-center">
		<footer>
			<ul id="nav">
 				<li><a title="The Best Damn Web Marketing Checklist, Period" href="https://www.polepositionmarketing.com/digital-marketing-learning-library/ebooks/best-damn-web-marketing-checklist/">About the Book</a></li>
 				<li><a title="Book Stoney for Speaking Engagements" href="https://www.polepositionmarketing.com/digital-marketing-learning-library/ebooks/best-damn-web-marketing-checklist/book-stoney/">Book Stoney to Speak</a></li>
 				<li><a title="Praise About the Book" href="https://www.polepositionmarketing.com/digital-marketing-learning-library/ebooks/best-damn-web-marketing-checklist/praise/">Praise For The Book</a></li>
 				<li><a title="Table of Contents" href="https://www.polepositionmarketing.com/digital-marketing-learning-library/ebooks/best-damn-web-marketing-checklist/table-of-contents/">What's Included</a></li>
 				<li><a title="Pole Position Marketing" href="https://www.polepositionmarketing.com" target="_blank" rel="noopener noreferrer">Web Marketing Solutions</a></li>
			</ul>
		</footer>
	</div>
</div>

<script>
jQuery(document).ready(function($){
	$("#btn-bread").on("click", function(e){
		e.stopPropagation();
		$("#nav-upper").toggleClass("active").slideToggle();
	});

	$('.see-older .event-btn').on('click', function() {
		$(this).parent().next(".toggle").slideToggle("slow");
	});
	
	$(document).click(function () {
		var $el = $("#nav-upper");
		if ($el.is(":visible") && $(window).width() <= 800) {
			$el.fadeOut(200).removeClass("active");
		}
	});
});
</script>
<?php get_footer('damn'); ?>