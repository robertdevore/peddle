<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Peddle
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) { the_post_thumbnail('large-image'); } ?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
		<?php
			$download_categories = get_the_term_list( // get the download categories
				$post->ID,
				'download_category',
				'<i class="fa fa-folder"></i> ',
				', ',
				''
			);
			echo $download_categories;
		?>
		</div><!-- /.entry-meta -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'peddle' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- /.entry-content -->

</article><!-- /#post-## -->