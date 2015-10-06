<?php
/**
 * Template Name: EDD Page Template
 *
 * @package Peddle
 */

get_header(); ?>

	<div id="primary" class="col-lg-9 content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar('edd'); ?>
<?php get_footer(); ?>
