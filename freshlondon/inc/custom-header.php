<?
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<? if ( get_header_image() ) : ?>
	<a href="<? echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<? header_image(); ?>" width="<? echo esc_attr( get_custom_header()->width ); ?>" height="<? echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<? endif; // End header image check. ?>
 *
 * @package FreshLondon
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses freshlondon_header_style()
 */
function freshlondon_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'freshlondon_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 2000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'freshlondon_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'freshlondon_custom_header_setup' );

if ( ! function_exists( 'freshlondon_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see freshlondon_custom_header_setup().
 */
function freshlondon_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value.
	if ( HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description {
			color: #<? echo esc_attr( $header_text_color ); ?>;
		}
	<? endif; ?>
	</style>
	<?
}
endif; // freshlondon_header_style