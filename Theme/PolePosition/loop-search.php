<?php
/**
 * @package WordPress
 * @subpackage polepositionmarketing
 */
?>

<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
    
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
		<header class="entry-header">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'polepositionmarketing' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

			
		</header><!-- .entry-header -->

		<?php if ( is_archive() || is_search() ) : // Only display Excerpts for archives & search ?>
		<div class="entry-summary">
			<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'polepositionmarketing' ) ); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
            
			<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'polepositionmarketing' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'polepositionmarketing' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

        <div class="entry-meta">
				
			</div><!-- .entry-meta -->
        
		<footer class="entry-meta">
            <?php
                printf( __( '<span class="sep">Posted on </span><time class="entry-date" datetime="%2$s" pubdate>%3$s</time> <span class="sep"> by </span> <span class="author vcard">%6$s</span>', 'polepositionmarketing' ),
                    get_permalink(),
                    get_the_date( 'c' ),
                    get_the_date(),
                    get_author_posts_url( get_the_author_meta( 'ID' ) ),
                    sprintf( esc_attr__( 'View all posts by %s', 'polepositionmarketing' ), get_the_author() ),
                    get_the_author()
                );
            ?>
            <div class="read-more" <?php if (1 !== $paged) { echo 'style="display: inline-block !important;"'; }?>>
            	<?php if (get_post_type() == 'page') { 
            	    echo '<a href="<?php echo get_permalink(); ?>">View this page</a>'; 
            	   } else {
            	       echo '<a href="<?php echo get_permalink(); ?>">View this post</a>';
            	   }          	       
            	    ?>
			  </div>
<!--			<span class="comments-link"><?php //comments_popup_link( __( 'Leave a comment', 'polepositionmarketing' ), __( '1 Comment', 'polepositionmarketing' ), __( '% Comments', 'polepositionmarketing' ) ); ?></span>-->
			<?php //edit_post_link( __( 'Edit', 'polepositionmarketing' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
		</footer><!-- #entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->

	<?php comments_template( '', true ); ?>
    <?php $loop_counter++; ?>
<?php endwhile; ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
	<nav id="nav-below" role="article">
<!--		<h6 class="section-heading"><?php _e( 'Post navigation', 'polepositionmarketing' ); ?></h6>-->
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Previous', 'polepositionmarketing' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Next <span class="meta-nav">&rarr;</span>', 'polepositionmarketing' ) ); ?></div>
	</nav><!-- #nav-below -->
<?php endif; ?>
