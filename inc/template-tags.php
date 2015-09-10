<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Peddle
 */

if ( ! function_exists( 'peddle_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function peddle_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( ' %s', 'post date', 'peddle' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'peddle' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on"><i class="fa fa-clock-o fa-lg"></i>' . $posted_on . '</span><span class="byline"><i class="fa fa-user fa-lg"></i> ' . $byline . '</span>'; // WPCS: XSS OK.

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link"><i class="fa fa-comments-o fa-lg"></i> ';
		comments_popup_link( esc_html__( 'Leave a comment', 'peddle' ), esc_html__( '1 Comment', 'peddle' ), esc_html__( '% Comments', 'peddle' ) );
		echo '</span>';
	}

	edit_post_link( esc_html__( 'Edit', 'peddle' ), '<span class="edit-link"><i class="fa fa-pencil fa-lg"></i> ', '</span>' );

}
endif;

if ( ! function_exists( 'peddle_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function peddle_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'peddle' ) );
		if ( $categories_list && peddle_categorized_blog() ) {
			printf( '<div class="cat-links"><i class="fa fa-folder fa-lg"></i> ' . esc_html__( '%1$s', 'peddle' ) . '</div>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'peddle' ) );
		if ( $tags_list ) {
			printf( '<div class="tags-links"><i class="fa fa-tags fa-lg"></i> ' . esc_html__( '%1$s', 'peddle' ) . '</div>', $tags_list ); // WPCS: XSS OK.
		}
	}

}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function peddle_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'peddle_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'peddle_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so peddle_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so peddle_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in peddle_categorized_blog.
 */
function peddle_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'peddle_categories' );
}
add_action( 'edit_category', 'peddle_category_transient_flusher' );
add_action( 'save_post',     'peddle_category_transient_flusher' );

if ( ! function_exists( 'peddle_social' ) ) :
/**
 * Adds the social profile links into the theme's footer.php file
 */
function peddle_social() { ?>

		<?php if (get_theme_mod( 'peddle_social_twitter' ) !='') { ?>
			<a href="<?php echo get_theme_mod( 'peddle_social_twitter' ); ?>" target="_blank">
				<i class="fa fa-twitter"></i>
			</a>
		<?php } ?>
		<?php if (get_theme_mod( 'peddle_social_facebook' ) !='') { ?>
			<a href="<?php echo get_theme_mod( 'peddle_social_facebook' ); ?>" target="_blank">
				<i class="fa fa-facebook"></i>
			</a>
		<?php } ?>
		<?php if (get_theme_mod( 'peddle_social_google' ) !='') { ?>
			<a href="<?php echo get_theme_mod( 'peddle_social_google' ); ?>" target="_blank">
				<i class="fa fa-google"></i>
			</a>
		<?php } ?>
		<?php if (get_theme_mod( 'peddle_social_linkedin' ) !='') { ?>
			<a href="<?php echo get_theme_mod( 'peddle_social_linkedin' ); ?>" target="_blank">
				<i class="fa fa-linkedin"></i>
			</a>
		<?php } ?>
		<?php if (get_theme_mod( 'peddle_social_pinterest' ) !='') { ?>
			<a href="<?php echo get_theme_mod( 'peddle_social_pinterest' ); ?>" target="_blank">
				<i class="fa fa-pinterest"></i>
			</a>
		<?php } ?>
		<?php if (get_theme_mod( 'peddle_social_github' ) !='') { ?>
			<a href="<?php echo get_theme_mod( 'peddle_social_github' ); ?>" target="_blank">
				<i class="fa fa-github"></i>
			</a>
		<?php } ?>
		<?php if (get_theme_mod( 'peddle_social_instagram' ) !='') { ?>
			<a href="<?php echo get_theme_mod( 'peddle_social_instagram' ); ?>" target="_blank">
				<i class="fa fa-instagram"></i>
			</a>
		<?php } ?>
		<?php if (get_theme_mod( 'peddle_social_medium' ) !='') { ?>
			<a href="<?php echo get_theme_mod( 'peddle_social_medium' ); ?>" target="_blank">
				<i class="fa fa-medium"></i>
			</a>
		<?php } ?>
		<?php if (get_theme_mod( 'peddle_social_vine' ) !='') { ?>
			<a href="<?php echo get_theme_mod( 'peddle_social_vine' ); ?>" target="_blank">
				<i class="fa fa-vine"></i>
			</a>
		<?php } ?>
		<?php if (get_theme_mod( 'peddle_social_tumblr' ) !='') { ?>
			<a href="<?php echo get_theme_mod( 'peddle_social_tumblr' ); ?>" target="_blank">
				<i class="fa fa-tumblr"></i>
			</a>
		<?php } ?>
		<?php if (get_theme_mod( 'peddle_social_youtube' ) !='') { ?>
			<a href="<?php echo get_theme_mod( 'peddle_social_youtube' ); ?>" target="_blank">
				<i class="fa fa-youtube"></i>
			</a>
		<?php } ?>

<?php }
endif;