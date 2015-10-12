<?php
/**
 * The homepage file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
	
		<?php if ( have_posts() ) : ?>
			<?php /* The loop */ ?>
			<?php 
			//Protect against arbitrary paged values
			$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
			// Category selection array
			$args = array( 'posts_per_page' => 7, 'category_name' => 'News & Sports, News, Sports', 'paged' => $paged );
			$posts_array = get_posts( $args ); ?>
			
			<?php foreach ( $posts_array as $post ) : setup_postdata( $post ); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endforeach; ?>	
				
			<?php wp_reset_postdata(); ?>

			<?php twentythirteen_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
		
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>