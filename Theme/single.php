<?php
/**
 * @package WordPress
 * @subpackage themename
 */


get_header(); ?>
<?php 
  $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  if (strpos($url, 'blog') !== false || strpos($url, 'emp') !== false) {
    $title = 'Blog';
  } else {
    $title = the_title( '', '', false );
  }
?>
<script type='application/ld+json'>
{
"@context":"http:\/\/schema.org",
"@type":"WebSite",
"@id":"#website",
"url":"https:\/\/www.polepositionmarketing.com\/",
"name":"Pole Position Marketing",
"alternateName":"Pole Position Marketing",
"potentialAction":{
    "@type":"SearchAction",
    "target":"https:\/\/www.polepositionmarketing.com\/?s={search_term_string}",
    "query-input":"required name=search_term_string"
    }
}
</script>

	<section id="cta-heading" class="not-fullscreen" style="background: url('<?php echo get_template_directory_uri(); ?>/assets/img/blog-banner.jpg') center bottom; background-size: cover; height: auto;">
	<h2 style="display:none;">EBLOG</h2>
		<div class="content-wrap" >
			<div class="row">
				<div class="column col-12">
					<div class="title" style="font-weight: bold;">E-Marketing Performance Blog</div>
				</div>
			</div>
		</div>
	</section>

	<div id="page-content" class="content-wrap row">
		<div id="primary"  class="column col-9 l-8 t-12 flip-flop">
			<div id="content">
				
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<header class="entry-header">
						
						<h1 class="entry-title"><?php the_title(); ?></h1>
						
						<div class="entry-meta">
							<?php
								printf( __( '<span class="meta-prep meta-prep-author">Posted on </span><time class="entry-date post-date updated" datetime="%2$s">%3$s</time> <span class="meta-sep"> by </span> <span class="author vcard"><span class="fn">%6$s</span></span>', 'themename' ),
									get_permalink(),
									get_the_date( 'c' ),
									get_the_date(),
									get_author_posts_url( get_the_author_meta( 'ID' ) ),
									sprintf( esc_attr__( 'View all posts by %s', 'themename' ), get_the_author() ),
									get_the_author()
								);
							?>
						</div><!-- .entry-meta -->
						
					</header><!-- .entry-header -->
					
					<div class="entry-content page-tags">
						<?php the_content(); ?>
						<div id="tag-content">
							<?php 
								$cnt = '';
								$tags = get_the_tags($post->ID); 
							?>
							<span>Tagged As: </span>
							<?php foreach($tags as $tag){ ?>
								<?php
									echo ' <a class="btn btn-warning" href="https://www.polepositionmarketing.com/emp/tag/'.$tag->slug.'">'.$tag->name.'</a> ';
								?>
							<?php } ?>
							<div id="mobshare">
								<?php echo do_shortcode( '[addtoany]' ); ?>
							</div>
							
							<nav id="nav-below" role="article">
								<div class="nav-previous">
									<?php $previous_post = get_next_post(); if (!empty($previous_post)) { echo '<a href="'.esc_url(get_permalink($previous_post->ID)).'"><span class="meta-nav">&larr;</span> Previous Posts</a>'; } ?>
								</div>
								<div class="nav-next">
									<?php $next_post = get_previous_post(); if (!empty($next_post)) { echo '<a href="'.esc_url(get_permalink($next_post->ID)).'">Next Post <span class="meta-nav">&rarr;</span></a>'; } ?>
								</div>
							</nav>						
							
						</div>
					</div><!-- .entry-content -->					
				</article><!-- #post-<?php the_ID(); ?> -->
				
				<?php comments_template( '', true ); ?>
				
			<?php endwhile; // end of the loop. ?>
				
			</div><!-- #content -->
		</div><!-- #primary -->
		
		<?php get_sidebar(); ?>
	</div><!-- #page-content -->

<?php get_footer(); ?>