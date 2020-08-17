<?
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package FreshLondon
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.me/support/infinite-scroll/
 * See: https://jetpack.me/support/responsive-videos/
 */
function freshlondon_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'	=> 'freshlondon_infinite_scroll_render',
		'footer'	=> 'false',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support for Social Menus
	add_theme_support( 'jetpack-social-menu' );

}
add_action( 'after_setup_theme', 'freshlondon_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function freshlondon_infinite_scroll_render() {
	/* Start the Loop */
	while (have_posts()) : the_post();
		#debug(get_field('fa_icon'));
		?>
		<div class="archive-post-block" onclick="window.location.href='<? the_permalink(); ?>'">
			<div class='archive-post-block-icons'>
				<?
				$faicons = get_field('fa_icon');
				if ($faicons):
					?>
					<? # echo $faicon['label']; ?>
					<? foreach ($faicons as $faicon): ?>
					<i class="<? echo $faicon['value']; ?> fa-fw"></i>
				<? endforeach; ?>
				<? endif;
				?>
			</div>
			<div class='archive-post-block-title'>
				<? the_title(); ?>
			</div>
		</div>
	<? endwhile;
}

function freshlondon_social_menu() {
	if ( ! function_exists( 'jetpack_social_menu' ) ) {
		return;
	} else {
		jetpack_social_menu();
	}
}
