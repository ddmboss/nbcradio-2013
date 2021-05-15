<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		</div><!-- #main -->
		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php get_sidebar( 'main' ); ?>

			<div class="site-info">
				<?php do_action( 'twentythirteen_credits' ); ?><!-- Please don't remove or change the line below -->
				 Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> - All rights reserved | Website Designed by <a href="<?php echo esc_url( __( 'https://www.ddmbossdesigns.com', 'twentythirteen' ) ); ?>" title="<?php esc_attr_e( 'ddmboss designs', 'nbcradio' ); ?>"><?php printf( __( 'ddmboss designs', 'twentythirteen' ) ); ?></a> and <a href="<?php echo esc_url( __( 'http://www.facebook.com/dirayedesigns', 'twentythirteen' ) ); ?>" title="<?php esc_attr_e( 'DiRaye Designs', 'nbcradio' ); ?>"><?php printf( __( 'DiRaye Designs' ), 'twentythirteen' ); ?></a>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>
