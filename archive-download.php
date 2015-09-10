<?php
/**
 *
 * The template for displaying the EDD archives.
 *
 * @package Peddle
 */

$store_page_setting = (is_front_page() && is_page_template('edd-store-front.php') ? 'page' : 'paged' );
$current_page = get_query_var( $store_page_setting );
$per_page = intval( get_theme_mod( 'peddle_store_front_count', 9 ) );
$offset = $current_page > 0 ? $per_page * ( $current_page-1 ) : 0;
$product_args = array(
	'post_type'			=> 'download',
	'posts_per_page'	=> $per_page,
	'offset'			=> $offset
);
$products = new WP_Query( $product_args );

get_header(); ?>

	<div id="primary" class="col-lg-12 edd-pagetitle">
		<main id="main" class="site-main" role="main">
			<div class="store-info">
				<?php if ( get_theme_mod( 'peddle_edd_store_archives_title' ) ) : ?>
					<h1 class="store-title"><?php echo get_theme_mod( 'peddle_edd_store_archives_title' ); ?></h1>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'peddle_edd_store_archives_description' ) ) : ?>
					<div class="store-description">
						<?php echo wpautop( get_theme_mod( 'peddle_edd_store_archives_description' ) ); ?>
					</div>
				<?php endif; ?>
			</div><!-- /.store-info -->
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php if ( $products->have_posts() ) : $i = 1; ?>
		<div class="product-grid">
			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<div class="col-lg-4 product">
					<div class="product-image">
					<?php if ( has_post_thumbnail() ) { ?>
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'product-image' ); ?>
						</a>
					<?php } ?>
					</div><!-- /.product-image -->
					<div class="product-description">
						<a class="product-title" href="<?php the_permalink(); ?>">
							<?php the_title( '<h3>', '</h3>' ); ?>
						</a>
						<div class="download-categories-title">
						<?php
							$download_categories = get_the_term_list( // get the download categories
								$post->ID,
								'download_category',
								'<span><i class="fa fa-folder"></i></span> ',
								', ',
								''
							);
							echo $download_categories;
						?>
						</div><!-- /.download-categories-title -->
						<?php if ( get_theme_mod( 'peddle_download_description' ) != 1 ) : // show downloads description? ?>
						<div class="product-info">
							<p><?php echo excerpt(25); ?></p>
						</div><!-- /.product-info -->
						<?php endif; ?>

						<?php if ( edd_has_variable_prices( get_the_ID() ) ) : ?>
							<a class="product-price-wrap" href="<?php the_permalink(); ?>"><span class="product-price"><?php _e( 'Starting at: ', 'vendd'); edd_price( get_the_ID() ); ?></span></a>
						<?php elseif ( '0' != edd_get_download_price( get_the_ID() ) && ! edd_has_variable_prices( get_the_ID() ) ) : ?>	
							<a class="product-price-wrap" href="<?php the_permalink(); ?>"><span class="product-price"><?php _e( 'Price: ', 'vendd' ); edd_price( get_the_ID() ); ?></span></a>
						<?php else : ?>
							<a class="product-price-wrap" href="<?php the_permalink(); ?>"><span class="product-price"><?php _e( 'Free Download','vendd' ); ?></span></a>
						<?php endif; ?>

					</div><!-- /.product-description -->
				</div><!-- /.col-lg-4.product -->

				<?php $i+=1; ?>
			<?php endwhile; ?>
		</div><!-- /.product-grid clear -->
		<div class="store-pagination">
			<?php 					
				$big = 999999999; // need an unlikely integer
				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, $current_page ),
					'total' => $products->max_num_pages
				) );
			?>
		</div><!-- /.store-pagination -->
	<?php else : ?>
	
		<h2 class="center"><?php _e( 'Not Found', 'peddle' ); ?></h2>
		<p class="center"><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'peddle' ); ?></p>
		<?php get_search_form(); ?>
	
	<?php endif; ?>

<?php get_footer(); ?>