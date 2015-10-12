<?php
/**
 * The template for displaying posts in the Chat post format
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_single() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<?php endif; // is_single() ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() || is_home() || is_archive() ) : // Displays Excerpts ?>
	<div class="entry-summary">
     <!-- Adds the 150x150 thumbnail/featured image -->
        <div class="excerpt-thumb alignleft">
            <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentythirteen' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
            <?php if ( has_post_thumbnail() ) {
                the_post_thumbnail('excerpt-thumbnail');
                } else { ?>
                <img src="<?php bloginfo('stylesheet_directory'); ?>/images/default-image.png" alt="<?php the_title(); ?>" />
                <?php } 
                ?>
            </a>
        </div>
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php twentythirteen_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->
