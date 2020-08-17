<?
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FreshLondon
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><? esc_html_e( 'Nothing Found', 'freshlondon' ); ?></h1>
	</header>
	<div class="page-content">
		<?
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><? printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'freshlondon' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<? elseif ( is_search() ) : ?>

			<p><? esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'freshlondon' ); ?></p>
			<?
				get_search_form();

		else : ?>

			<p><? esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'freshlondon' ); ?></p>
			<?
				get_search_form();

		endif; ?>
	</div>
</section><!-- .no-results -->