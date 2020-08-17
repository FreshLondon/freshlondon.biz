<?
/**
 * The template used for displaying projects on index view
 *
 * @package FreshLondon
 */
?>

<article id="post-<? the_ID(); ?>" <? post_class(); ?>>
	<? if ( '' != get_the_post_thumbnail() ) : ?>
		<div class="portfolio-thumbnail">
			<a href="<? the_permalink(); ?>">
				<? the_post_thumbnail( 'freshlondon-portfolio-featured-image' ); ?>
			</a>
		</div>
	<? endif; ?>

	<header class="portfolio-entry-header">
		<? the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>

		<? echo get_the_term_list( get_the_ID(), 'jetpack-portfolio-type', '<span class="portfolio-entry-meta">', esc_html_x(', ', 'Used between list items, there is a space after the comma.', 'freshlondon' ), '</span>' ); ?>
	</header>
</article>
