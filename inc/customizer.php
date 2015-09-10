<?php
/**
 * Peddle Theme Customizer.
 *
 * @package Peddle
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function peddle_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	

	/** ===============
	 * Extends CONTROLS class to add textarea
	 */
	class peddle_customize_textarea_control extends WP_Customize_Control {
		public $type = 'textarea';
		public function render_content() { ?>

		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea rows="5" style="width:98%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
		</label>

		<?php }
	}
	
	/*-----------------------------------------------------------*
	 * Site Title (logo) & Tagline section
	 *-----------------------------------------------------------*/
	// section adjustments
	$wp_customize->get_section( 'title_tagline' )->title = __( 'Site Title (Logo) & Tagline', 'peddle' );
	$wp_customize->get_section( 'title_tagline' )->priority = 10;
	// site title
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_control( 'blogname' )->priority = 10;
	// site tagline
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';	
	$wp_customize->get_control( 'blogdescription' )->priority = 20;
	// logo uploader
	$wp_customize->add_setting( 'peddle_logo', array( 'default' => null ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'peddle_logo', array(
		'label'     => __( 'Custom Site Logo', 'peddle' ),
		'section'   => 'title_tagline',
		'settings'  => 'peddle_logo',
		'priority'  => 30
	) ) );
	
	/*-----------------------------------------------------------*
	 * Color options
	 *-----------------------------------------------------------*/
	/* Link Color */
	$wp_customize->add_setting(
		'peddle_main_color',
		array(
			'default'     		 => '#FF696E',
			'sanitize_callback'  	 => 'peddle_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link_color',
			array(
			    'label'      => 'Main Color',
			    'section'    => 'colors',
			    'settings'   => 'peddle_main_color'
			)
		)
	);
	
	/*-----------------------------------------------------------*
	 * Defining our own 'Display Options' section
	 *-----------------------------------------------------------*/
	$wp_customize->add_section(
		'peddle_display_options',
		array(
			'title'     => 'Footer',
			'description' 	=> __( 'Customize your copyright notice and also add social profiles (full URL required)', 'peddle' ),
			'priority'  => 40
		)
	);

	/* Display Copyright */
	$wp_customize->add_setting(
		'peddle_footer_copyright_text',
		array(
			'default'            => '',
			'sanitize_callback'  => 'peddle_sanitize_copyright',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'peddle_footer_copyright_text',
		array(
			'section'  => 'peddle_display_options',
			'label'    => 'Copyright Message',
			'type'     => 'text'
		)
	);

	/* Social - Twitter */
	$wp_customize->add_setting(
		'peddle_social_twitter',
		array(
			'default'            => '',
			'sanitize_callback'  => 'peddle_sanitize_copyright',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'peddle_social_twitter',
		array(
			'section'  => 'peddle_display_options',
			'label'    => 'Twitter',
			'type'     => 'text'
		)
	);

	/* Social - Facebook */
	$wp_customize->add_setting(
		'peddle_social_facebook',
		array(
			'default'            => '',
			'sanitize_callback'  => 'peddle_sanitize_copyright',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'peddle_social_facebook',
		array(
			'section'  => 'peddle_display_options',
			'label'    => 'Facebook',
			'type'     => 'text'
		)
	);

	/* Social - Google */
	$wp_customize->add_setting(
		'peddle_social_google',
		array(
			'default'            => '',
			'sanitize_callback'  => 'peddle_sanitize_copyright',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'peddle_social_google',
		array(
			'section'  => 'peddle_display_options',
			'label'    => 'Google+',
			'type'     => 'text'
		)
	);

	/* Social - Pinterest */
	$wp_customize->add_setting(
		'peddle_social_pinterest',
		array(
			'default'            => '',
			'sanitize_callback'  => 'peddle_sanitize_copyright',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'peddle_social_pinterest',
		array(
			'section'  => 'peddle_display_options',
			'label'    => 'Pinterest',
			'type'     => 'text'
		)
	);

	/* Social - Linkedin */
	$wp_customize->add_setting(
		'peddle_social_linkedin',
		array(
			'default'            => '',
			'sanitize_callback'  => 'peddle_sanitize_copyright',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'peddle_social_linkedin',
		array(
			'section'  => 'peddle_display_options',
			'label'    => 'Linkedin',
			'type'     => 'text'
		)
	);

	/* Social - Github */
	$wp_customize->add_setting(
		'peddle_social_github',
		array(
			'default'            => '',
			'sanitize_callback'  => 'peddle_sanitize_copyright',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'peddle_social_github',
		array(
			'section'  => 'peddle_display_options',
			'label'    => 'Github',
			'type'     => 'text'
		)
	);

	/* Social - Instagram */
	$wp_customize->add_setting(
		'peddle_social_instagram',
		array(
			'default'            => '',
			'sanitize_callback'  => 'peddle_sanitize_copyright',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'peddle_social_instagram',
		array(
			'section'  => 'peddle_display_options',
			'label'    => 'Instagram',
			'type'     => 'text'
		)
	);

	/* Social - Medium */
	$wp_customize->add_setting(
		'peddle_social_medium',
		array(
			'default'            => '',
			'sanitize_callback'  => 'peddle_sanitize_copyright',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'peddle_social_medium',
		array(
			'section'  => 'peddle_display_options',
			'label'    => 'Medium',
			'type'     => 'text'
		)
	);

	/* Social - Vine */
	$wp_customize->add_setting(
		'peddle_social_vine',
		array(
			'default'            => '',
			'sanitize_callback'  => 'peddle_sanitize_copyright',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'peddle_social_vine',
		array(
			'section'  => 'peddle_display_options',
			'label'    => 'Vine',
			'type'     => 'text'
		)
	);

	/* Social - Tumblr */
	$wp_customize->add_setting(
		'peddle_social_tumblr',
		array(
			'default'            => '',
			'sanitize_callback'  => 'peddle_sanitize_copyright',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'peddle_social_tumblr',
		array(
			'section'  => 'peddle_display_options',
			'label'    => 'Tumblr',
			'type'     => 'text'
		)
	);

	/* Social - Youtube */
	$wp_customize->add_setting(
		'peddle_social_youtube',
		array(
			'default'            => '',
			'sanitize_callback'  => 'peddle_sanitize_copyright',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'peddle_social_youtube',
		array(
			'section'  => 'peddle_display_options',
			'label'    => 'Youtube',
			'type'     => 'text'
		)
	);

	/*-----------------------------------------------------------*
	 * Easy Digital Downloads section
	 *-----------------------------------------------------------*/
	// only if EDD is activated
	if ( class_exists( 'Easy_Digital_Downloads' ) ) {
		$wp_customize->add_section( 'peddle_edd_options', array(
			'title'       	=> __( 'Easy Digital Downloads', 'peddle' ),
			'description' 	=> __( 'All other EDD options are under Dashboard => Downloads. If you deactivate EDD, these options will no longer appear.', 'peddle' ),
			'priority'   	=> 30,
		) );
		// store front/downloads archive headline
		$wp_customize->add_setting( 'peddle_edd_store_archives_title', array( 'default' => null ) );
		$wp_customize->add_control( 'peddle_edd_store_archives_title', array(
			'label'		=> __( 'Store Front Main Title', 'peddle' ),
			'section'	=> 'peddle_edd_options',
			'settings'	=> 'peddle_edd_store_archives_title',
			'priority'	=> 10,
		) );
		// store front/downloads archive description
		$wp_customize->add_setting( 'peddle_edd_store_archives_description', array( 'default' => null ) );
		$wp_customize->add_control( new peddle_customize_textarea_control( $wp_customize, 'peddle_edd_store_archives_description', array(
			'label'		=> __( 'Store Front Description', 'peddle' ),
			'section'	=> 'peddle_edd_options',
			'settings'	=> 'peddle_edd_store_archives_description',
			'priority'	=> 20,
		) ) );
		// hide download description (excerpt)?
		$wp_customize->add_setting( 'peddle_download_description', array( 'default' => 0 ) );
		$wp_customize->add_control( 'peddle_download_description', array(
			'label'		=> __( 'Hide Download Description', 'peddle' ),
			'section'	=> 'peddle_edd_options',
			'priority'	=> 30,
			'type'      => 'checkbox',
		) );
		// store front/archive item count
		$wp_customize->add_setting( 'peddle_store_front_count', array( 'default' => 9 ) );		
		$wp_customize->add_control( 'peddle_store_front_count', array(
				'label' 	=> __( 'Store Front Item Count', 'peddle' ),
				'section' 	=> 'peddle_edd_options',
			'settings' 	=> 'peddle_store_front_count',
			'priority'	=> 50,
		) );
	}
}
add_action( 'customize_register', 'peddle_customize_register' );

/**
 * Sanitizes the incoming input and returns it prior to serialization.
 *
 * @param      string    $input    The string to sanitize
 * @return     string              The sanitized string
 * @package    peddle
 * @since      1.0.0
 * @version    1.0.0
 */
function peddle_sanitize_input( $input ) {
	return strip_tags( stripslashes( $input ) );
} // end peddle_sanitize_input
function peddle_sanitize_copyright( $input ) {
	$allowed = array(
		's'			=> array(),
		'br'			=> array(),
		'em'			=> array(),
		'i'			=> array(),
		'strong'		=> array(),
		'b'			=> array(),
		'a'			=> array(
			'href'			=> array(),
			'title'			=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'form'			=> array(
			'id'			=> array(),
			'class'			=> array(),
			'action'		=> array(),
			'method'		=> array(),
			'autocomplete'		=> array(),
			'style'			=> array(),
		),
		'input'			=> array(
			'type'			=> array(),
			'name'			=> array(),
			'class' 		=> array(),
			'id'			=> array(),
			'value'			=> array(),
			'placeholder'		=> array(),
			'tabindex'		=> array(),
			'style'			=> array(),
		),
		'img'			=> array(
			'src'			=> array(),
			'alt'			=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
			'height'		=> array(),
			'width'			=> array(),
		),
		'span'			=> array(
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'p'			=> array(
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'div'			=> array(
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'blockquote'		=> array(
			'cite'			=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
	);
    return wp_kses( $input, $allowed );
} // end peddle_sanitize_copyright

/**
 * Writes styles out the `<head>` element of the page based on the configuration options
 * saved in the Theme Customizer.
 *
 * @since      1.0.0
 * @version    1.0.0
 */
function peddle_customizer_css() {
?>
	<style type="text/css">
		-moz-selection,
		::selection{
			background: <?php echo get_theme_mod( 'peddle_main_color' ); ?>;
		}
		body{
			webkit-tap-highlight-color: <?php echo get_theme_mod( 'peddle_main_color' ); ?>;
		}
		a,
		.main-navigation ul li a:hover,
		.menu-toggle:hover,
		.main-navigation.toggled ul:hover,
		.main-navigation ul li ul li a:hover,
		.main-navigation ul li:hover a,
		.main-navigation ul li a:hover,
		.entry-title a:hover,
		.widget a:hover,
		h1.site-title a,
		h2.site-title a,
		h1.site-title a:visited,
		h2.site-title a:visited,
		.store-pagination a:hover,
		.copyright a:hover,
		footer#colophon a:hover,
		footer#colophon .social a:hover,
		.cart-total	{
			color: <?php echo get_theme_mod( 'peddle_main_color' ); ?>;
		}
		.pager li>a:hover, .pager li>a:focus {
			color: #fff;
			background-color: <?php echo get_theme_mod( 'peddle_main_color' ); ?>;
			border: 1px solid <?php echo get_theme_mod( 'peddle_main_color' ); ?>;
		}
		button:hover,
		input[type="button"]:hover,
		input[type="reset"]:hover,
		input[type="submit"]:hover {
			border-color: <?php echo get_theme_mod( 'peddle_main_color' ); ?>;
		}
		button:focus,
		input[type="button"]:focus,
		input[type="reset"]:focus,
		input[type="submit"]:focus,
		button:active,
		input[type="button"]:active,
		input[type="reset"]:active,
		input[type="submit"]:active {
			border-color: <?php echo get_theme_mod( 'peddle_main_color' ); ?>;
		}
		input[type="text"]:focus,
		input[type="email"]:focus,
		input[type="url"]:focus,
		input[type="password"]:focus,
		input[type="search"]:focus,
		textarea:focus,
		a.product-price-wrap:hover,
		.edd-submit.button:hover {
			border-color: <?php echo get_theme_mod( 'peddle_main_color' ); ?> !important;
		}
		
		.edd_checkout a:hover {
			border-color: <?php echo get_theme_mod( 'peddle_main_color' ); ?> !important;
			color: #0F1925;
		}
	</style>
<?php
} // end peddle_customizer_css
add_action( 'wp_head', 'peddle_customizer_css' );
/**
 * Registers the Theme Customizer Preview with WordPress.
 *
 * @package    peddle
 * @since      1.0.0
 * @version    1.0.0
 */
function peddle_customizer_live_preview() {
	wp_enqueue_script(
		'peddle-theme-customizer',
		get_template_directory_uri() . '/js/customizer.js',
		array( 'customize-preview' ),
		'1.0.0',
		true
	);
} // end peddle_customizer_live_preview
add_action( 'customize_preview_init', 'peddle_customizer_live_preview' );
