<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Peddle
 */

?>
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- #content -->
	
	<div class="footer widgets">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div><!-- /.col-lg-3 -->
				<div class="col-lg-3">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div><!-- /.col-lg-3 -->
				<div class="col-lg-3">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div><!-- /.col-lg-3 -->
				<div class="col-lg-3">
					<?php dynamic_sidebar( 'footer-4' ); ?>
				</div><!-- /.col-lg-3 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.footer -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class=" col-lg-6 site-info">
					<div class="copyright">
					<?php if (get_theme_mod( 'peddle_footer_copyright_text' ) !='') { ?>
						<?php echo get_theme_mod( 'peddle_footer_copyright_text' ); ?>
					<?php } else { ?>
						<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'peddle' ) ); ?>"><?php printf( esc_html__( 'Powered by %s', 'peddle' ), 'WordPress' ); ?></a>
						<span class="sep"> | </span>
						<?php printf( esc_html__( 'Theme: %1$s by %2$s', 'peddle' ), '<a href="http://www.robertdevore.com/peddle-free-wordpress-theme-for-easy-digital-downloads" target="_blank">Peddle</a>', '<a href="http://www.deviodigital.com" rel="designer" target="_blank">Devio Digital</a>' ); ?>
					<?php } ?>
					</div><!-- /.copyright -->
				</div><!-- .site-info -->
				<div class="col-lg-6 social">
					<?php peddle_social(); ?>
				</div><!-- /.col-lg-6 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Scroll to top -->
<div class="scroll-up">
	<a href="#page"><i class="fa fa-angle-up"></i></a>
</div><!-- /.scroll-up -->

</body>
</html>
